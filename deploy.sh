#!/bin/bash
wsk -i action create conductor js/conductor.js -a conductor true
wsk -i action create generate_name --docker odreal/wsk-runtime-nodejs js/random_city.js
wsk -i action create get_weather php/get_weather.php
wsk -i action create get_info python/fetch_city_infos.py
wsk -i action create get_picture php/get_picture.php
wsk -i action create text_formatter php/format_city_info.php