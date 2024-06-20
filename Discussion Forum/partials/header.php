<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <!-- navbar -->
    <?php
    session_start();
    
    echo'

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Php Projects/Forum/contactUs/index.html">Contactus</a>
                    </li>
                    
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>
                    
                </ul>
                <form class="d-flex" role="search">';
                if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)){
                    echo '
                    <p class="text-light my-1 mx-3">Welcome'.$_SESSION['user_email'].'</p>
                    <a href="partials/_logout.php" class="btn btn-primary" >Logout</a>
                     </form>';
        
                }
                else{

                echo '
                </form>
                

                <!-- login and signup button -->
                <div class="mx-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';}
                echo '</div>

            </div>
        </div>
    </nav>';

    ?>

    <?php include 'partials/_loginmodal.php';  ?>


    <?php include 'partials/_signupmodal.php';  ?>
    <?php
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!!</strong> You have successfully sign up, now you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
?>
    <?php
if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=='false'){
  
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Invalid !!</strong>Either username already exist or password doesnt match.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }




?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>