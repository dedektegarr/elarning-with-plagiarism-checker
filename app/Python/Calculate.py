import sys
import json
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

def calculate_similarity(wordTokens):
    vectorizer = TfidfVectorizer()
    matrix = vectorizer.fit_transform(wordTokens)

    result = cosine_similarity(matrix[0], matrix)

    return result[0].tolist()

if __name__ == "__main__":
    wordTokensPath = sys.argv[1]

    with open(wordTokensPath, 'r') as file:
        wordTokens = json.load(file)

    results = calculate_similarity(wordTokens)
    print(results)
