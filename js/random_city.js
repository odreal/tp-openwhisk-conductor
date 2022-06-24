const axios = require('axios');
async function main(params) {
    try {
        const resp = await axios.get('https://query.wikidata.org/sparql?query=SELECT%20DISTINCT%20%3Fcity%20%3Fcountry%20%3Flabel%20WHERE%20%7B%0A%20%20%3Fcity%20rdfs%3Alabel%20%3Flabel.%0A%20%20%3Fcity%20wdt%3AP31%20wd%3AQ515.%0A%20%20FILTER((LANG(%3Flabel))%20%3D%20%22fr%22)%0A%7D%0AORDER%20BY%20UUID()%0ALIMIT%2010&format=json');
        var row = resp.data.results.bindings[Math.floor(Math.random() * resp.data.results.bindings.length)]
        params.city = row.label.value;
        return {city: params.city};
    } catch (err) {
        params.city = "Toulouse";
        return {city: params.city};
    }
}