<?php
function main(array $args): array
{
    $city = $args["city"] ?? "";
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/ImageSearchAPI?q=".$city."&pageNumber=1&pageSize=10&autoCorrect=true",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com",
            "X-RapidAPI-Key: 1cf282f1bcmshada208a77b3900fp1020bdjsn67e2b4a7018c"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $res = json_decode($response);
    if(!$err){
        if($res->value[0]->url){
            $args['picture'] = $res->value[0]->url;
        } else {
            $args['picture'] = 'https://images-na.ssl-images-amazon.com/images/I/41bLP6NzvKL.jpg';
        }
    } else {
        $args['picture'] = 'https://images-na.ssl-images-amazon.com/images/I/41bLP6NzvKL.jpg';
    }

    curl_close($curl);
    return ['city'=>$args['city'],
        'temp'=>0,
        'population'=>$args['population'],
        'size'=>$args['size'],
        'latitude'=>$args['latitude'],
        'longitude'=>$args['longitude'],
        'picture'=>$args['picture'],];
}