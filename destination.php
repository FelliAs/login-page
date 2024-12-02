<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Proses logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagani Huayra R Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('huayra.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            color: white;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 0.5rem 1rem;
        }
        .content-container {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            margin: 100px auto 1rem auto;
        }
        .content-container h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .content-text {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        @media (max-width: 768px) {
            .content-container {
                padding: 1rem;
            }
            .content-container h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="moai-emoji.png" alt="Logo" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form method="POST" action="">
                            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="content-container">
            <h1>Pagani Huayra R Information</h1>
            <div class="content-text">
            <p>The Pagani Huayra R is a track-focused hypercar that embodies the pinnacle of Pagani’s commitment to performance and craftsmanship. It is powered by the Pagani V12-R Evo engine, a 6.0-liter naturally aspirated 12-cylinder engine that delivers a staggering 900 hp (662 kW) at 8,750 rpm and a maximum torque of 770 Nm. This engine is a significant evolution from the Mercedes-AMG M158 V12 engine used in the standard Huayra, which is a 6.0-liter twin-turbocharged unit.</p>
            <p>The Huayra R’s aerodynamics are meticulously engineered to provide maximum downforce and minimum drag. The car’s design includes a front splitter and a massive rear wing, contributing to its ability to generate 1000 kg of downforce at 320 km/h. This ensures the car remains stable and glued to the track during high-speed runs.</p>
            <p>Pagani has utilized advanced materials to construct the Huayra R, including a carbon-titanium monocoque chassis and Carbo-Triax HP62, which provide an incredibly rigid yet lightweight structure. This contributes to the car’s exceptional handling characteristics.</p>
            <p>The interior of the Huayra R is a testament to Pagani’s dedication to luxury and attention to detail. It features a blend of carbon fiber, aluminum, and fine leather, all crafted with meticulous precision.</p>
            <p>With its limited production and a price tag of over $3 million, the Huayra R is an exclusive masterpiece of automotive engineering. It is not just a hypercar but a piece of art that offers an unparalleled driving experience for those fortunate enough to take its wheel.</p>
            <p>In summary, the Pagani Huayra R is a hypercar that pushes the boundaries of performance and design. It is a track-only vehicle that offers the ultimate expression of speed, power, and beauty, all wrapped up in a package that is as much a work of art as it is an engineering marvel. 🏎️💨</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
