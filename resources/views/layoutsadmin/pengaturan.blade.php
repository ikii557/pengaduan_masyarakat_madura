<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengaturan - Mode Gelap/Terang</title>
    @include('layoutsadmin.head')
    <style>
        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #1e1e2f;
            color: #ffffff;
        }

        .dark-mode .main-panel, .dark-mode .sidebar {
            background-color: #2a2a40;
        }

        .dark-mode .navbar {
            background-color: #33334d;
        }
    </style>
</head>

<body id="body" class="{{ $theme == 'dark' ? 'dark-mode' : '' }}">
    <div class="wrapper">
        @include('layoutsadmin.sidebar')

        <div class="main-panel">
            <div class="main-header">
                @include('layoutsadmin.navbar')
            </div>

            <div class="container">
                <h2>Pengaturan Tema</h2>
                <label class="toggle-switch">
                    <input type="checkbox" id="darkModeToggle" {{ $theme == 'dark' ? 'checked' : '' }}>
                    <span class="slider"></span> Dark Mode
                </label>
            </div>
        </div>
        <h2>Pengaturan Tema</h2>
        <label>
            <input type="checkbox" id="darkModeToggle" {{ $theme == 'dark' ? 'checked' : '' }}>
            Dark Mode
        </label>
        <footer class="footer mt-auto">
            <div class="container-fluid">
                <p>&copy; 2024 Toko Kelontong</p>
            </div>
        </footer>
    </div>

    <!-- Script -->
    <script>
        const darkModeToggle = document.getElementById('darkModeToggle');

        darkModeToggle.addEventListener('change', () => {
            const isDarkMode = darkModeToggle.checked;
            document.body.classList.toggle('dark-mode', isDarkMode);

            // Kirim request ke server untuk menyimpan pilihan tema
            fetch("/pengaturan/theme", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ theme: isDarkMode ? 'dark' : 'light' })
            })
            .then(response => response.json())
            .then(data => console.log('Theme switched:', data))
            .catch(error => console.error('Error:', error));
        });
    </script>

    @include('layoutsadmin.footer')
</body>

</html>
