@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

            <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <title>Map View</title>

    <style>
        #map {
             height: 300px;
             width: 100%;
             }
    </style>

</head>
<body>
<input type="text" id="lat">
<input type="text" id="lng">

        <div id="map">


        </div>
<script>
    var map = L.map('map').setView([13.1208588,123.608361], 8);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

           var marker = L.marker([13.1208588,123.608361],{
                draggable: true
            }).addTo(map);

            marker.on('dragend', function (data) {
                var coordinate = marker.getLatLng();
                document.getElementById('lat').value =coordinate.lat
                document.getElementById('lng').value =coordinate.lng
            })
</script>

</body>
</html>
