<?php
function main(array $args): array
{
    $city = $args["city"] ?? "";
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=".$city."&lat=0&lon=0&id=2172797&lang=null&units=metric&mode=json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: community-open-weather-map.p.rapidapi.com",
            "X-RapidAPI-Key: 1cf282f1bcmshada208a77b3900fp1020bdjsn67e2b4a7018c"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if(!$err) {
        $res = json_decode($response);
        if ($res->main->temp) {
            $args['temp'] = $res->main->temp;
        } else {
            $args['temp'] = 0;
        }
    } else {
        $args['temp'] = 0;
    }
    curl_close($curl);
    return ['city'=>$args['city'],
    'temp'=>$args['temp'],
    'population'=>$args['population'],
    'size'=>$args['size'],
    'latitude'=>$args['latitude'],
    'longitude'=>$args['longitude'],
    'picture'=>"",
    ];
}