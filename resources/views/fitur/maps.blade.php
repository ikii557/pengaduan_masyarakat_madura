@extends('layoutsadmin.app')

<title>Peta Interaktif</title>

<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }
    #map {
        height: 500px;
        width: 80%;
        margin: 20px auto;
    }
</style>

<!-- Tambahkan CSS Leaflet -->
<link href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" rel="stylesheet">

@section('content')

<h2>Peta Interaktif</h2>
<div id="map"></div>

<!-- Tambahkan JS Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi peta
        var map = L.map('map');

        // Tambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Cek dukungan geolokasi
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                // Atur tampilan peta di lokasi pengguna
                map.setView([lat, lng], 15);

                // Tambahkan marker di lokasi pengguna
                L.marker([lat, lng]).addTo(map)
                    .bindPopup("Lokasi Anda Saat Ini")
                    .openPopup();
            }, function() {
                alert("Gagal mendapatkan lokasi.");
                // Default lokasi (contoh: Jakarta)
                map.setView([-6.200000, 106.816666], 13);
            });
        } else {
            alert("Browser Anda tidak mendukung geolokasi.");
            // Lokasi default jika geolokasi tidak didukung
            map.setView([-6.200000, 106.816666], 13);
        }
    });
</script>

@endsection
