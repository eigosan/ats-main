import sys
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import pandas as pd

def calculate_match(job_description, skills):
    """
    Calculate cosine similarity between job description and applicant's skills.
    """
    # Convert text to lowercase
    job_description = job_description.lower()
    skills = skills.lower()

    # Vectorize the text (convert words into numerical vectors)
    vectorizer = CountVectorizer().fit_transform([job_description, skills])
    vectors = vectorizer.toarray()

    # Compute cosine similarity between the job description and applicant's skills
    similarity = cosine_similarity(vectors)

    # Return match score as percentage
    return similarity[0, 1] * 100

if __name__ == "__main__":
    # Input arguments: job_description, applicant_skills
    job_description = sys.argv[1]
    skills = sys.argv[2]

    match_score = calculate_match(job_description, skills)
    print(match_score)  # Output match score
