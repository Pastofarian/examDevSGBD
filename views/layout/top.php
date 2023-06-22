<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: url('/images/wallpaper2.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .navbar .navbar-brand {
            font-size: 30px;
            color: #007bff; 
        }
        .navbar .nav-link.active {
            color: white; 
            background-color: #007bff; 
            border-radius: 10px; 
        }
    </style>
</head>
<body>
    <?php if (!isset($currentPage)) {
        $currentPage = ''; 
    }?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/owners">Escale Canine</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'animals' ? 'active' : ''; ?>" href="/animals">Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'owners' ? 'active' : ''; ?>" href="/owners">Propriétaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'stays' ? 'active' : ''; ?>" href="/stays">Séjours</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container content mt-5">
