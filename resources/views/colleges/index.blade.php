@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <h1> State Universities and Colleges Locator </h1>
    </div>

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <a href="{{ route('colleges.index', ['view' => 'table']) }}" class="btn btn-outline-success" type="button">Table View</a>
          <a href="{{ route('colleges.index', ['view' => 'map']) }}" class="btn btn-outline-primary" type="button">Map View</a>
        </form>
      </nav>

    {{-- <a href="{{ route('colleges.create') }}" type="submit" class="btn btn-primary">Add New HEI</a> --}}




    {{-- <a href = "{{ route('colleges.create') }}" class="btn btn-primary">Create new Book</a> --}}

    <!-- Conditional rendering based on viewType -->
    @if($viewType === 'table')

    <input type="text" id="search" onkeyup="myFunction()" placeholder="Search Colleges.." title="Type the college name" style="float: right;padding:5px 5px 5px 5px;width:250px">
    <br>

    <div class="row>">
        <table class="table table-striped" id="colleges">
            <thead>
            <tr>
                <th scope="col">SEQ</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">CONTACT</th>
                <th scope="col">WEBSITE</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college )
                <tr>
                    <th scope="row">{{ $college['id'] }}</th>
                    <td>{{ $college['name']}}</td>
                    <td>{{ $college['address']}}</td>
                    <td>{{ $college['contact_number']}}</td>
                    <td>{{ $college['website']}}</td>
                    <td>
                        <a href="{{ route('colleges.edit',['college' => $college['id']]) }}" type="submit" class="btn btn-success">Edit</a>
                        <div class="row">
                    </td>
                    <td>
                        <form action="{{ route('colleges.destroy',['college' => $college['id']]) }}" method="POST">
                            @csrf
                            @method('Delete')
                            <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@elseif($viewType === 'map')
        <div id="map">

        </div>

    <script>

    // Initialize the map
        var map = L.map('map').setView([13.1208588,123.608361], 8);

    // Add OpenStreetMap tiles
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

    // Create a bounds object to include all markers
            //var bounds = L.latLngBounds([]);

    //add draggable marker
        // var marker = L.marker([13.1208588,123.608361],{
        //         draggable: true
        //     }).addTo(map);

    //Add markers for each college
            @foreach($colleges as $college)
                L.marker([{{ $college->latitude }},
                         {{ $college->longitude }}])
                    .addTo(map)
                    // .bindTooltip('<strong>{{ $college->name  }}</strong>', {
                    // permanent: true,  // Make the tooltip always visible
                    // direction: 'top', // Position the tooltip above the marker
                    // className: 'custom-tooltip' // Optional: add a custom class for styling
                    // });
                    //.bindPopup('<strong>{{ $college->name }}</strong><br>{{ $college->address }}').openPopup();
                        .bindPopup('<strong>{{ $college->name }}</strong><br>{{ $college->address }}');

     // Extend the bounds to include this marker
             //bounds.extend(marker.getLatLng());

            @endforeach

            marker.on('dragend', function (data) {
                var coordinate = marker.getLatLng();
                document.getElementById('lat').value =coordinate.lat
                document.getElementById('lng').value =coordinate.lng
            })

            // Adjust the map view to fit all markers
            //map.fitBounds(bounds);
     </script>

     @else
     <p>Invalid view type.</p>
    @endif

{{-- search function script --}}
<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      table = document.getElementById("colleges");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
{{-- End search function script --}}
@endsection


