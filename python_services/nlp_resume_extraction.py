import pandas as pd
import nltk
import psycopg2
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
import string

# Download necessary NLTK resources
nltk.download('punkt')
nltk.download('stopwords')

# Database connection details (replace with your own)
db_params = {
    "dbname": "applicant_tracking_system",
    "user": "postgres",
    "password": "admin1324",
    "host": "localhost",  # or your database host
    "port": "5432"        # default PostgreSQL port
}

# Function for text preprocessing
def preprocess_text(text):
    # Convert to lowercase
    text = text.lower()

    # Tokenize the text
    tokens = word_tokenize(text)

    # Remove punctuation and stopwords
    stop_words = set(stopwords.words('english'))
    tokens = [word for word in tokens if word not in stop_words and word not in string.punctuation]

    # Return cleaned text as a space-separated string
    return ' '.join(tokens)

# Connect to PostgreSQL database
conn = psycopg2.connect(**db_params)
cursor = conn.cursor()

# Fetch unfiltered resumes from the database
cursor.execute("SELECT * FROM application_forms;")
resumes = cursor.fetchall()

# Convert to pandas DataFrame for easy processing
df = pd.DataFrame(resumes, columns=['ID', 'Resume_str', 'Resume_html', 'Category'])

# Apply preprocessing to Resume_str column
df['Cleaned_Resume'] = df['Resume_str'].apply(preprocess_text)

# Insert the cleaned data into the filtered_resumes table
for index, row in df.iterrows():
    cursor.execute("""
        INSERT INTO filtered_resumes (ID, Cleaned_Resume, Category)
        VALUES (%s, %s, %s);
    """, (row['ID'], row['Cleaned_Resume'], row['Category']))

# Commit and close the connection
conn.commit()
cursor.close()
conn.close()

print("NLP processing and data insertion complete.")
