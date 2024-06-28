import pandas as pd
import mysql.connector

def get_table_names(connection):
    query = "SHOW TABLES"
    cursor = connection.cursor()
    cursor.execute(query)
    tables = cursor.fetchall()
    cursor.close()
    return [table[0] for table in tables]

def get_dataframe_from_sql(query, connection):
    return pd.read_sql(query, connection)

def update_table_with_dataframe(dataframe, table_name, connection, cursor, primary_key):
    for index, row in dataframe.iterrows():
        update_query = f"""
        UPDATE {table_name}
        SET {', '.join([f'{col} = %s' for col in dataframe.columns if col != primary_key])}
        WHERE {primary_key} = %s
        """
        cursor.execute(update_query, tuple(row[col] for col in dataframe.columns if col != primary_key) + (row[primary_key],))
    connection.commit()

def insert_into_table_with_dataframe(dataframe, table_name, connection, cursor):
    for index, row in dataframe.iterrows():
        insert_query = f"""
        INSERT INTO {table_name} ({', '.join(dataframe.columns)})
        VALUES ({', '.join(['%s'] * len(dataframe.columns))})
        """
        cursor.execute(insert_query, tuple(row))
    connection.commit()

def main():
    # MySQL connection to the last version database
    last_version_conn = mysql.connector.connect(
        host='127.0.0.1',
        user='root',
        password='',
        database='last_jmk_db'
    )

    # MySQL connection to the new version database
    new_version_conn = mysql.connector.connect(
        host='127.0.0.1',
        user='root',
        password='',
        database='new_jmk_db'
    )

    cursor_last_version = last_version_conn.cursor()
    cursor_new_version = new_version_conn.cursor()

    # Get all table names from both databases
    last_version_tables = set(get_table_names(last_version_conn))
    new_version_tables = set(get_table_names(new_version_conn))

    # Find common tables to compare
    common_tables = last_version_tables.intersection(new_version_tables)

    for table in common_tables:
        # Load data from corresponding tables into dataframes
        df_last_version = get_dataframe_from_sql(f"SELECT * FROM {table}", last_version_conn)
        df_new_version = get_dataframe_from_sql(f"SELECT * FROM {table}", new_version_conn)

        # Identify primary key (assuming it's the first column for simplicity)
        primary_key = df_last_version.columns[0]

        # Identify rows that need to be updated
        updates_df = df_new_version[df_new_version[primary_key].isin(df_last_version[primary_key]) & (df_new_version != df_last_version)]
        updates_df = updates_df[df_last_version.columns]  # Ensure the columns match the last version table

        # Identify new rows that need to be inserted
        inserts_df = df_new_version[~df_new_version[primary_key].isin(df_last_version[primary_key])]

        # Perform updates
        update_table_with_dataframe(updates_df, table, last_version_conn, cursor_last_version, primary_key)

        # Perform inserts
        insert_into_table_with_dataframe(inserts_df, table, last_version_conn, cursor_last_version)

        print(f"Table {table} updated in the last version database based on the new version database")

    # Close the connections
    cursor_last_version.close()
    cursor_new_version.close()
    last_version_conn.close()
    new_version_conn.close()

if __name__ == "__main__":
    main()
