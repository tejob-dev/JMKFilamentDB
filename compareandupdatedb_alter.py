import pymysql
import pandas as pd

def get_table_names(connection):
    with connection.cursor() as cursor:
        cursor.execute("SHOW TABLES")
        tables = cursor.fetchall()
    return [list(table.values())[0] for table in tables]

def get_dataframe_from_sql(query, connection):
    with connection.cursor() as cursor:
        # Read a single record
        cursor.execute(query)
        result = cursor.fetchall()
        columns = [desc[0] for desc in cursor.description]
        # Convert the result to a pandas DataFrame
        df = pd.DataFrame(result, columns=columns)
        # debugC(df.columns)
    return df

def update_table_with_dataframe(dataframe, table_name, connection, primary_key):
    queries = []  # List to store the formatted SQL queries
    with connection.cursor() as cursor:
        cursor.execute("SET FOREIGN_KEY_CHECKS = 0;")
        for index, row in dataframe.iterrows():
            update_query = f"""
            UPDATE {table_name}
            SET {', '.join([f'{col} = %s' for col in dataframe.columns if col != primary_key])}
            WHERE {primary_key} = %s
            """
            params = [row[col] for col in dataframe.columns if col != primary_key]
            params.append(row[primary_key])
            # print(dataframe.columns)
            # print(params)
            try:
                formatted_params = [v if isinstance(v, str) else str(v) for v in params]
                formatted_query = insert_query % tuple(formatted_params)
                queries.append(formatted_query)
                # cursor.execute(update_query, params)
            except ValueError as er:
                print(er)

        cursor.execute("SET FOREIGN_KEY_CHECKS = 1;")
    # try:
        # connection.commit()
    # except ValueError as er:
    #     print(er)
    with open(f"up_file_{table_name}.sql", 'w') as f:
        for query in queries:
            f.write(f"{query};\n")

def export_table_schema_and_data(table_name, connection):
    with connection.cursor() as cursor:
        # Export the schema
        cursor.execute(f"SHOW CREATE TABLE {table_name}")
        create_table_query = cursor.fetchone()['Create Table']
        
        # Export the data
        cursor.execute(f"SELECT * FROM {table_name}")
        data = cursor.fetchall()
        columns = [desc[0] for desc in cursor.description]
        
        return create_table_query, pd.DataFrame(data, columns=columns)

def create_table_from_schema_and_data(create_table_query, dataframe, table_name, connection):
    with connection.cursor() as cursor:
        cursor.execute("SET FOREIGN_KEY_CHECKS = 0;")
        
        # Create the table
        cursor.execute(create_table_query)
        
        # Insert the data
        for index, row in dataframe.iterrows():
            insert_query = f"""
            INSERT INTO {table_name} ({', '.join(dataframe.columns)})
            VALUES ({', '.join(['%s' for _ in dataframe.columns])})
            """
            params = [row[col] for col in dataframe.columns]
            cursor.execute(insert_query, params)
        
        cursor.execute("SET FOREIGN_KEY_CHECKS = 1;")
    
    connection.commit()

def get_table_columns(table_name, connection):
    with connection.cursor() as cursor:
        cursor.execute(f"SHOW COLUMNS FROM {table_name}")
        columns = cursor.fetchall()
    return [col['Field'] for col in columns]

def get_column_definition(table_name, column_name, connection):
    with connection.cursor() as cursor:
        cursor.execute(f"""
            SELECT COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = '{table_name}' AND COLUMN_NAME = '{column_name}'
        """)
        col_def = cursor.fetchone()
        definition = col_def['COLUMN_TYPE']
        if col_def['IS_NULLABLE'] == 'NO':
            definition += ' NOT NULL'
        if col_def['COLUMN_DEFAULT'] is not None:
            definition += f" DEFAULT '{col_def['COLUMN_DEFAULT']}'"
        if col_def['EXTRA']:
            definition += f" {col_def['EXTRA']}"
        return definition

def alter_table_columns(table_name, new_columns, old_columns, new_version_conn, last_version_conn):
    with last_version_conn.cursor() as cursor:
        for col in new_columns - old_columns:
            column_definition = get_column_definition(table_name, col, new_version_conn)
            print(f"ALTER TABLE {table_name} ADD COLUMN {col} {column_definition}")
            cursor.execute(f"ALTER TABLE {table_name} ADD COLUMN {col} {column_definition}")
        for col in old_columns - new_columns:
            print(f"ALTER TABLE {table_name} DROP COLUMN {col}")
            cursor.execute(f"ALTER TABLE {table_name} DROP COLUMN {col}")
    last_version_conn.commit()

def debugC(*printed):
    print(printed)
    exit()

def main():
    # Connect to the databases
    last_version_conn = pymysql.connect(host='127.0.0.1',
                                        user='root',
                                        password='',
                                        database='last_jmk_db',
                                        cursorclass=pymysql.cursors.DictCursor)

    new_version_conn = pymysql.connect(host='127.0.0.1',
                                       user='root',
                                       password='',
                                       database='new_jmk_db',
                                       cursorclass=pymysql.cursors.DictCursor)

    with last_version_conn:
        with new_version_conn:
            # Get all table names from both databases
            last_version_tables = set(get_table_names(last_version_conn))
            new_version_tables = set(get_table_names(new_version_conn))

            # Find common tables to compare
            common_tables = last_version_tables.intersection(new_version_tables)
            un_common_tables = new_version_tables - last_version_tables
            print("Tables only in new version:", un_common_tables)
            
            # Export and create tables that are only in the new version
            for table in un_common_tables:
                create_table_query, df = export_table_schema_and_data(table, new_version_conn)
                create_table_from_schema_and_data(create_table_query, df, table, last_version_conn)
            
            # debugC("All db is update")

            for table in common_tables:
                # Load data from corresponding tables into dataframes
                df_last_version = get_dataframe_from_sql(f"SELECT * FROM {table}", last_version_conn)
                df_new_version = get_dataframe_from_sql(f"SELECT * FROM {table}", new_version_conn)

                # Identify primary key (assuming it's the first column for simplicity)
                primary_key = df_last_version.columns[0]

                # Ensure columns match
                # common_columns = (df_last_version.columns).intersection(df_new_version.columns)
                # df_last_version = df_last_version[common_columns]
                # df_new_version = df_new_version[common_columns]

                # updates_df = df_last_version[df_last_version[primary_key].isin(df_new_version[primary_key]) & ~(df_last_version.equals(df_new_version))]
                # debugC(df_new_version.columns)
                # updates_df = df_new_version[(df_new_version.equals(df_last_version))]

                new_columns = set(get_table_columns(table, new_version_conn))
                old_columns = set(get_table_columns(table, last_version_conn))

                # print(table)
                # if table == "contacts":
                #     print(old_columns)
                #     debugC(f"Table {table} updated")
               
                if new_columns != old_columns:
                    print(new_columns)
                    print(old_columns)
                    # debugC(f"Table {table} updated")
                    alter_table_columns(table, new_columns, old_columns, new_version_conn, last_version_conn)

                # Perform updates
                # if not updates_df.empty:
                #     update_table_with_dataframe(updates_df, table, last_version_conn, primary_key)
               

if __name__ == "__main__":
    main()
