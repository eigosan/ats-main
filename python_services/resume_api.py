from flask import Flask, request, jsonify
import pickle
import numpy as np
from sklearn.feature_extraction.text import CountVectorizer

# Load the trained model and vectorizer
with open('resume_classifier.pkl', 'rb') as model_file:
    model = pickle.load(model_file)
with open('vectorizer.pkl', 'rb') as vec_file:
    vectorizer = pickle.load(vec_file)

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    # Get resume text from the request
    resume_text = request.json.get('resume_text')

    # Vectorize the resume text
    text_vector = vectorizer.transform([resume_text])

    # Make prediction
    prediction = model.predict(text_vector)

    # Return the prediction result as JSON
    return jsonify({'category': prediction[0]})

if __name__ == '__main__':
    app.run(debug=True)
