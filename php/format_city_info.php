<?php

function main(array $args) : array
{
    $size = $args["size"] ?? "large";
    $city = $args["city"] ?? "";

    if($size=="large"){
        $population = $args["population"] ?? "";
        $latitude = $args["latitude"] ?? "";
        $longitude = $args["longitude"] ?? "";
        $temp = $args["temp"] ?? "";
        $message = "La ville $city compte $population habitants, elle est située à la latitude $latitude et la longitude $longitude, il y fait actuellement $temp °C";
        return ["result" => $message];
    } else {
        $picture = $args["picture"] ?? "";
        $message = "La charmante ville de $city peut être intriguante ou méconnue, regardez cette photo pour en apprendre plus $picture";
        return ["result" => $message];
    }
}