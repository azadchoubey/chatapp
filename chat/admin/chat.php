<?php session_start();

if(isset($_SESSION['roomname'])){
    
?>
<!DOCTYPE html>
<html lang="en" class="h-100">  

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <i class="bi bi-chat-square-text-fill"></i>
    <title>Chat</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" href="http://www.w3.org/2000/svg" sizes="180x180" />
    <!-- Custom styles for this template -->
    <link href="http://localhost/project/chat/css/chat.css" rel="stylesheet" />
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start">Chat App</h3>
                <nav class="nav nav-masthead justify-content-center
                        float-md-end">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Contact</a>
                    <?php if(isset($_SESSION['roomname'])){
                        echo '<a class="nav-link" href="https://localhost/project/chat/admin/logout.php">Logout</a>';
                }?>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h1>Chat With Your Friends</h1>
            <div class="container">
                <div class="roomclass">
                    <img src="/w3images/bandmember.jpg" alt="Avatar" style="width: 100%" />
                    <p>Hello. How are you today?</p>
                    <span class="time-right">11:00</span>
                </div>
            </div>
            <form id="form">
            <input type="text" id="chatmsg" placeholder="Add a chat message" class="form-control" />
                <input type="button" class="d-grid gap-2 col-6 mx-auto btn btn-secondary mt-4"  id="sendmsg" value="Send">
                </form>
            
        </main>

        <footer class="mt-auto text-white-50">
            <p>Created by Azad</p>
        </footer>
    </div>
   <script>var room= "<?php echo $_SESSION['roomname'];?>"; 
        var to = ""; 

    </script>
    <script src="https://localhost/projectject/chat/js/chat.js"></script>
</body>

</html>
<?php }else{
                header('Location:index.php');

} ?>
