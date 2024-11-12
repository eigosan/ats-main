from flask import Flask, request, jsonify
import spacy
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.neighbors import NearestNeighbors

# Load NLP model
nlp = spacy.load("en_core_web_sm")

# Initialize Flask
app = Flask(__name__)

# Sample dataset of resumes for testing
resumes = [
    "Experienced Java developer with knowledge in backend systems.",
    "Data scientist skilled in Python and machine learning.",
    "Web developer proficient in PHP, Laravel, and Vue.",
    # Add more sample resumes or load from your database
]

# Process resumes with TF-IDF and KNN
vectorizer = TfidfVectorizer()
X = vectorizer.fit_transform(resumes)
knn = NearestNeighbors(n_neighbors=3, metric='cosine')
knn.fit(X)

@app.route('/filter', methods=['POST'])
def filter_resumes():
    # Get the user's resume text
    data = request.json
    resume_text = data.get("resume_text")

    # Vectorize the user’s resume and find the closest matches
    resume_vec = vectorizer.transform([resume_text])
    distances, indices = knn.kneighbors(resume_vec)
    matched_resumes = [resumes[i] for i in indices[0]]

    # Return the matches as JSON
    return jsonify({"matches": matched_resumes})

if __name__ == '__main__':
    app.run(port=5000)
