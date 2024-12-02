<?php
// Include database connection here if needed (similar to the login page)
session_start(); // Start the session

$servername = "localhost";
$dbusername = "root";  // Sesuaikan dengan username database Anda
$dbpassword = "";      // Sesuaikan dengan password database Anda
$dbname = "login_laprak";

// Koneksi ke database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk mendaftarkan user
    $query = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $query->bind_param("ss", $username, $hashedPassword);
    $query->execute();
    $query->close();

    // Redirect ke halaman login setelah registrasi sukses
    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('rb20.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            margin: 0;
        }
        .register-container {
            background-color: rgba(0, 0, 0, 0.85);
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .register-container h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .btn-register {
            background-color: #E50914;
            color: white;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
        }
        .btn-register:hover {
            background-color: #b20710;
        }
        .form-control {
            background-color: #333;
            border: none;
            color: #bbb;  /* Dimmed color for text inside the input */
        }

        .form-control::placeholder {
            color: #888;
            font-style: italic;
        }

        .form-control:focus {
            background-color: #333;
            box-shadow: none;
            border: 1px solid #E50914;
            color: white;
        }

        .form-control:focus::placeholder {
            color: #888;
        }

        .btn-continue-login {
            background-color: white;
            color: black;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-continue-login:hover {
            background-color: #808080;
            color: red;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Create Account</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="button-container">
                <button type="submit" name="register" class="btn btn-register">Register</button>
                <a href="index.php">
                    <button type="button" class="btn btn-continue-login">Continue to Login</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
