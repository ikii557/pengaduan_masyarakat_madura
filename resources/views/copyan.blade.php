<!DOCTYPE html>
<html lang="id">

<head>
    <title>Sukai Layanan Kami</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
            padding: 20px;
        }

        .newsletter-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        input[type="email"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
        }

        .alert-error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>

    <h2>Sukai Layanan Kami</h2>

    <form action="forms/like_service.php" method="POST" class="php-email-form">
        <div class="newsletter-form">
            <label for="email">Sukai Layanan Kami:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            <input type="submit" value="Suka">
        </div>
    </form>

    <!-- Notifikasi -->
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success">Terima kasih! Anda menyukai layanan kami.</div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        <div class="alert alert-error">Terjadi kesalahan. Silakan coba lagi!</div>
    <?php endif; ?>

</body>

</html>
