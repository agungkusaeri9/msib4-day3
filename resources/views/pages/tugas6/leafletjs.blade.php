@extends('layouts.app')
@section('content')
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Menampilkan Lokasi Purwakarta</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <style>
        #map {
            height: 480px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(function() {
            let long = -6.5569442;
            let lat = 107.4373563;
            var map = L.map('map').setView([long,lat], 15);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([long,lat]).addTo(map)
                .bindPopup('Purwakarta Istimewa')
                .openPopup();
        })
    </script>
@endpush
