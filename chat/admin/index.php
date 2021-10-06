<?php session_start();
    if(isset($_SESSION['roomname'])){
        print_r($_SESSION['roomname']);
    }
 ?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <i class="bi bi-chat-square-text-fill"></i>
    <title>Chat</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="http://www.w3.org/2000/svg" sizes="180x180">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="http://localhost/project/chat/css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start ">Chat App</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Contact</a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h1>Chat With Your Friends</h1>
            <p class="lead"> Fun with your friends like chat and much more .</p>
            <form method="post" action="chatroom.php">
                <input class="form-control  mb-3 " type="text" name="room" placeholder=" Enter Room Name " required>
                <input class="form-control  mb-3 " type="text" name="from" placeholder=" Your Name " required>
                <input type="submit" class="btn btn-lg btn-secondary fw-bold border-white bg-white " value="Join Chat Room">
            </form>
            </p>
        </main>

        <footer class="mt-auto text-white-50 ">
            <p>Created by Azad</p>
        </footer>
    </div>


</body>

</html>