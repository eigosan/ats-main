import psycopg2
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.neighbors import KNeighborsClassifier
from sklearn.model_selection import train_test_split
import pickle

# Database connection details (replace with your own)
db_params = {
    "dbname": "applicant_tracking_system",
    "user": "postgres",
    "password": "admin1324",
    "host": "localhost",  # or your database host
    "port": "5432"        # default PostgreSQL port
}

# Function to fetch filtered resumes from the database
def fetch_filtered_resumes():
    conn = psycopg2.connect(**db_params)
    cursor = conn.cursor()
    cursor.execute("SELECT ID, cleaned_resume_text, job_position FROM filtered_resumes;")
    resumes = cursor.fetchall()
    cursor.close()
    conn.close()
    return pd.DataFrame(resumes, columns=['ID', 'cleaned_resume_text', 'job_position'])

# Load the filtered resumes
df = fetch_filtered_resumes()

# Check if the 'cleaned_resume_text' column has valid data
if df['cleaned_resume_text'].isnull().sum() > 0:
    print(f"Warning: {df['cleaned_resume_text'].isnull().sum()} rows with missing resume text.")
    df = df.dropna(subset=['cleaned_resume_text'])  # Drop rows with missing cleaned resume text

# Convert text into numerical features using TF-IDF
tfidf_vectorizer = TfidfVectorizer(max_features=1000)
X = tfidf_vectorizer.fit_transform(df['cleaned_resume_text']).toarray()

# Convert job_position into numerical labels
df['job_position'] = df['job_position'].astype('category')
y = df['job_position'].cat.codes

# Split the data into training and test sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train the KNN model
knn = KNeighborsClassifier(n_neighbors=5)
knn.fit(X_train, y_train)

# Score the model
accuracy = knn.score(X_test, y_test)
print(f"Model accuracy: {accuracy:.4f}")

# Save the trained KNN model and TF-IDF vectorizer for later use
with open('models/knn_model.pkl', 'wb') as f:
    pickle.dump(knn, f)
with open('models/tfidf_vectorizer.pkl', 'wb') as f:
    pickle.dump(tfidf_vectorizer, f)

# Function to add scores back to the database
def add_scores_to_db():
    conn = psycopg2.connect(**db_params)
    cursor = conn.cursor()

    # For each filtered resume, score and update
    for index, row in df.iterrows():
        resume_vector = tfidf_vectorizer.transform([row['cleaned_resume_text']]).toarray()
        score = knn.predict(resume_vector)[0]  # Get the predicted category
        cursor.execute("""
            UPDATE filtered_resumes
            SET knn_score = %s
            WHERE ID = %s;
        """, (score, row['ID']))

    conn.commit()
    cursor.close()
    conn.close()
    print("KNN scoring and data update complete.")

# Run the function to add KNN scores to the database
add_scores_to_db()
