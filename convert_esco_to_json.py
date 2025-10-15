import csv
import json

skills = []

with open('data/ESCO dataset - v1.2.0 - classification - en - csv/skills_en.csv', encoding='utf-8') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
        label = row.get('preferredLabel', '').strip()
        if label:
            skills.append(label)

with open('data/esco_skills.json', 'w', encoding='utf-8') as jsonfile:
    json.dump(skills, jsonfile, ensure_ascii=False, indent=2)

print(f"✅ {len(skills)} skills saved to esco_skills.json")
