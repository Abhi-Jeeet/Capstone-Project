<?php include 'partials/_dbconnect.php' ?>
<?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
    }


    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "$title Forum" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/header.php'?>
    <?php include 'partials/_dbconnect.php' ?>

    <!-- collecting the data from the database for category name and description -->

    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
    }


    ?>
    <!-- POSTING A COMMENT -->

    <!-- Entering the comments data in the database -->
    <?php
    $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert the comments into db
      $comm=$_POST['comment'];
      $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comm', '$id', '0', current_timestamp())";
      $result=mysqli_query($conn,$sql);
      $showAlert=true;
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Huraaha!!!</strong> Your comment is successfully added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

    }


    ?>


    <div class="container mt-4">
        <div class="jumbotron">
            <h1><?php echo "$title"  ?> Forum</h1>
            <p class="lead"><?php echo "$desc" ?></p>
            <hr class="my-4">
            

        </div>
    </div>






    <div class="container my-6">
        <h3 class="display-6">Post a Comment</h3>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Type your comment</label>
            </div>
            <button type="submit" class="btn btn-primary my-3">Post</button>
        </form>
    </div>

    <div class="container">
        <h3 class='py-2'>Discussions</h3>
    </div>

    <?php
    //Fetching comments from the db
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $comment=$row['comment_content'];
      echo '
        <div class="container">
          <div class="d-flex my-3">
            <div class="flex-shrink-0 mx-2">
              <img src="img/userdefault.jpg" width=40px alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
              <p class="fw-bold my-0">Annonymous User</p>
            
              
              '.$comment.'
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