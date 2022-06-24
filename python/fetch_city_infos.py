import requests
import json

def main(args):
    name = args.get("city", "Paris")
    api_url = 'https://api.api-ninjas.com/v1/city?name={}'.format(name)
    response = requests.get(api_url, headers={'X-Api-Key': 'E3sdpdNG62W4YlBZNw5Zfw==wEk1CcmkYq7aRxH0'})
    response_object = json.loads(response.text)
    if len(response_object)>0:
        return {
            "size": "large",
            "population": response_object[0].get('population', 0),
            "city": name,
            "longitude": response_object[0].get("longitude", ""),
            "latitude": response_object[0].get("latitude", "")
            }
    else:
        return {
            "size": "small",
            "population": 0,
            "city": name,
            "longitude": 0,
            "latitude": 0
        }