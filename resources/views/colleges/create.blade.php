@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <h1> Add New School </h1>
    </div>

    <div class="container">
        <div class="row">
            <form action="{{ route('colleges.store') }}" method="POST">

                @csrf {{-- to avoid repetitive submission of entry in the form --}}

                <div class="form-group">
                  <label for="name" class="form-label">HEI Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        {{-- start validation for error  --}}
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        {{-- end validation for error  --}}
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">HEI Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        {{-- start validation for error  --}}
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{-- end validation for error  --}}
                </div>

                <div class="row">

                    <div class="col">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="decimal" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}" >

                            {{-- start validation for error  --}}
                            @error('latitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {{-- end validation for error  --}}
                    </div>
                    <div class="col">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="decimal" class="form-control" id="longitude" name="longitude"  value="{{ old('longitude') }}" >
                            {{-- start validation for error  --}}
                            @error('longitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {{-- end validation for error  --}}
                    </br>
                    </div>

                    {{-- <button id="fetchCoordinates" class="btn btn-primary">Find Coordinates</button> --}}

                    <div id="map">


                    </div>

  {{-- for auto fetching coordinates --}}
{{--
                    <script>
                        // Initialize the map only once
                        var map = L.map('map').setView([10.0, 10.0], 13);

                        // Add OpenStreetMap tiles
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '© OpenStreetMap contributors'
                        }).addTo(map);

                        // Initialize a marker but don't add it to the map initially
                        var marker = null;

                        // Event listener for "Find Coordinates" button
                        document.getElementById('fetchCoordinates').addEventListener('click', function () {
                            var address = document.getElementById('address').value;

                            if (!address) {
                                alert('Please enter an address.');
                                return;
                            }

                            // Geocoding request to Nominatim API
                            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.length === 0) {
                                        alert('Address not found.');
                                        return;
                                    }

                                    // Extract latitude and longitude from the first result
                                    var lat = parseFloat(data[0].lat);
                                    var lng = parseFloat(data[0].lon);

                                    // Populate latitude and longitude fields
                                    document.getElementById('latitude').value = lat;
                                    document.getElementById('longitude').value = lng;

                                    // Update marker position
                                    if (marker) {
                                        marker.setLatLng([lat, lng]).openPopup();
                                    } else {
                                        marker = L.marker([lat, lng]).addTo(map).bindPopup(`<b>${address}</b><br>Lat: ${lat}, Lng: ${lng}`).openPopup();
                                    }

                                    // Center the map on the new position
                                    map.setView([lat, lng], 13);
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Failed to fetch coordinates. Please try again.');
                                });
                        });
                    </script> --}}

                    <script>
                        var map = L.map('map').setView([13.1208588,123.608361], 10);
                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);

                               var marker = L.marker([13.1208588,123.608361],{
                                    draggable: true
                                }).addTo(map);

                                marker.on('dragend', function (data) {
                                    var coordinate = marker.getLatLng();
                                    document.getElementById('latitude').value =coordinate.lat
                                    document.getElementById('longitude').value =coordinate.lng
                                })
                    </script>
                    </br>

                </div>
                <div class="form-group">
                    <label for="website" class="form-label">HEI Website</label>
                    <input type="text" placeholder="www.unifast.com" class="form-control" id="website" name="website" value=" ">
                </div>

                <div class="form-group">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" placeholder="e.g 09088949035" class="form-control" id="contact_number" name="contact_number" value=" ">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('colleges.index') }}" type="submit" class="btn btn-warning">Back</a>
              </form>
        </div>
    </div>
    </div>
@endsection

