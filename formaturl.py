import sys
import re

def convert_to_url_friendly(input_str):
    # Convert to lowercase
    url_friendly = input_str.lower()
    
    # Replace spaces with hyphens
    url_friendly = re.sub(r'\s+', '-', url_friendly)
    
    # Remove any characters that are not alphanumeric or hyphens
    url_friendly = re.sub(r'[^a-z0-9-]', '', url_friendly)
    
    # Add the .html extension
    url_friendly += '.html'
    
    return url_friendly

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python script_name.py 'Your String Here'")
        sys.exit(1)
    
    input_str = sys.argv[1]
    for item in input_str.split(","):
        output_str = convert_to_url_friendly(item)
        print(output_str)
