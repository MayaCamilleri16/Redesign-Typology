<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "Maya";
$password = "xqeXXyp*-RePcD(R";
$database = "Maya";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-nav navbar-nav-left">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
    <?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        echo '<a class="nav-link" href="#">Welcome, ' . htmlspecialchars($username) . '</a>';
    } else {
        echo '<a class="nav-link" href="register.php">Register</a>';
    }

    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourites</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        .side-cart {
            position: fixed;
            right: -100%; 
            top: 0;
            width: 300px; 
            height: 100%;
            background: white;
            z-index: 1000;
            transition: right 0.3s;
           
        }

        .side-cart.visible {
            right: 0;
        }

      
    </style>
</head>
<body>
</li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown
-item" href="facecare.php">Face Care</a></li>
<!-- <li><a class="dropdown-item" href="stageofskinageing.php">Stage of Skin Aging</a></li> -->
<!-- <li><a class="dropdown-item" href="bodyandhaircare.php">Body and Hair Care</a></li> -->

<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="byedit.php">By Edit</a></li>
</ul>
</li>
<li class
="nav-item">
<a class="nav-link active" aria-current="page" href="about.php">About</a>
</li>
</ul>
</div>



<a class="navbar-brand navbar-brand-center menu-center" href="index.php">Typology.</a>

<div class="navbar-nav navbar-nav-right">
<ul class="navbar-nav">
<li class="nav-item">

<div class="navbar-nav navbar-nav-right">
                <ul class="navbar-nav">
                    <li class="nav-item">
                       <!-- <div class="searchIconDiv">
    <svg class="svg-icon search-icon" aria-labelledby="title desc" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.9 19.7">
        <title id="title">Search Icon</title>
        <desc id="desc">A magnifying glass icon.</desc>
        <g class="search-path" fill="none" stroke="#848F91">
            <path stroke-linecap="square" d="M18.5 18.3l-5.4-5.4"/>
            <circle cx="8" cy="8" r="7"/>
        </g>
    </svg>
</div> -->

                    </li>
                    <li>
<!-- Favourites -->
<li>
                        <a href="addToFavorites.php" class="add-favourites">
                            <span class="add-favourites__icon">♥</span>
                        </a>
                    </li>
<!-- Cart -->
<li>
                        <a class="add-cart" onclick="toggleSideCart()">
                            <svg height="23px" viewBox="0 -31 512.00026 512" width="25px" xmlns="http://www.w3.org/2000/svg">
                                <path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0"/>
                                <path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/>
                                <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/>
                            </svg>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="account.php">Account</a>
</li>
</ul>
</div>
</div>

</nav>

<!-- Side Cart -->
<div id="side-cart" class="side-cart">
    
    </div>

    <script>
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            
            document.getElementById('side-cart').innerHTML = xhr.responseText;
            toggleSideCart(true); 
        } else {
            alert('Error adding product to cart.');
        }
    };
    xhr.send('product_id=' + productId);
}

function toggleSideCart(open = false) {
    var cart = document.getElementById('side-cart');
    if (open || cart.classList.contains('visible')) {
       
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'cart.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                cart.innerHTML = xhr.responseText;
                cart.classList.add('visible');
            } else {
                alert('Error fetching cart content.');
            }
        };
        xhr.send();
    } else {
        cart.classList.remove('visible');
    }
}

</script>

</body>
</html>