<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login_laprak";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $query->store_result();
    $query->bind_result($userId, $hashedPassword);

    if ($query->num_rows > 0) {
        $query->fetch();
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;
            header("Location: destination.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
    $query->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background-color: rgba(0, 0, 0, 0.85);
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-container h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .btn-login {
            background-color: #E50914;
            color: white;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
        }
        .btn-login:hover {
            background-color: #b20710;
        }
        .form-control {
            background-color: #333;
            border: none;
            color: #bbb;
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
            color: white;
        }
        .btn-register {
            background-color: white;
            color: black;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-register:hover {
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
    <div class="login-container">
        <h1>Sign In</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="button-container">
                <button type="submit" name="login" class="btn btn-login">Login</button>
                <a href="register.php">
                    <button type="button" class="btn btn-register">Register</button>
                </a>
            </div>
        </form>
        <?php if (isset($error)) echo "<p class='text-danger mt-3 text-center'>$error</p>"; ?>
    </div>
</body>
</html>
