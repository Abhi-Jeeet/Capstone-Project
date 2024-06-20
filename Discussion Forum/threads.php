<?php include 'partials/_dbconnect.php' ?>

<?php
$id=$_GET['catid'];
$sql="SELECT * FROM `categories` WHERE category_id=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  $catname=$row['category_name'];
  $catdesc=$row['category_desc'];
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "$catname Forum" ?></title>
    <link rel="stylesheet" href="back.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>






  <!-- php -->
    <?php include 'partials/header.php'?>
    <?php include 'partials/_dbconnect.php' ?>

    <!-- collecting the data from the database for category namr and description -->

    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $catname=$row['category_name'];
      $catdesc=$row['category_desc'];
    }


    ?>
    <?php
    $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert the thread into db
      $th_title=$_POST['title'];
      $th_desc=$_POST['desc'];
      $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
      $result= mysqli_query($conn,$sql);
      $showAlert=true;
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Huraaha!!!</strong> Your problem is successfully submitted, kindly wait for the community to respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    }



    ?>



    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo "$catname"  ?> Forum</h1>
            <p class="lead"><?php echo "$catdesc" ?></p>
            <hr class="my-4">
            <p>Tooh chaliye suru krte hai.....!!!!</p>

        </div>
    </div>

    <!-- Form -->

    <?php
    if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)){

    echo '<div class="container my-5">
        <div class="card ">
            <h1 class="display-6 my-2 mx-3 mb-2">Start a Discussion!!!</h1>
            <div class="card-body my-3">
                <h6 class="card-title">
                    <form action="'.$_SERVER['REQUEST_URI'] .'" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Whats your problem??</label>
                            <input type="text" class="form-control" id="title" name="title"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Keep your title catchy.</div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="desc" name="desc"></textarea>
                            <label for="floatingTextarea">Elaborate your problem here</label>
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Submit</button>
                    </form>
                </h6>
            </div>
        </div>
    </div>';
    }
    else{
      echo '
      <div class="container">
      <h1>Start a Discussion!!!</h1>

    <p>You are not logged in. Please login to be able to start a Discussion</p>
    </div>';

    }



?>





    <div class="container my-4">
        <h1 class='py-3'>Browse Questions</h1>
   <?php
      $id=$_GET['catid'];
      $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['thread_id'];
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        
        
        echo '
        <div class="container">
          <div class="d-flex my-3">
            <div class="flex-shrink-0 mx-2">
              <img src="img/userdefault.jpg" width=40px alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
              <h5><a href="threadsview.php?threadid='.$id.'">' .$title.'</a></h5>
              '.$desc.'
            </div>
          </div>
        </div>';}
      ?>

    <?php include 'partials/footer.php'?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>