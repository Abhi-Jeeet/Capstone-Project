<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


    <?php include 'partials/header.php' ?>
    <?php include 'partials/_dbconnect.php'?>

    <!-- Craousel -->
    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slider2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slider3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- Adding cards -->

    <div class="container my-4">
        <h1 class='text-center my-3'>FORUM CATEGORIES</h1>
        <div class="row my-3">


          <!-- Fetching all the categories through database -->
          <?php
          $sql="SELECT * FROM `categories`";
          $result=mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result)){
            $catid=$row['category_id'];
            $catname=$row['category_name'];
            $catdesc=$row['category_desc'];
            // echo $row['category_id'];
            // echo $row['category_name'];
            echo '<div class="col-md-4 my-3">
                    <div class="card" style="width: 18rem;">
                      <img src="https://source.unsplash.com/random/500x300/?'.$catname.',programmer" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><a href="threads.php?catid='.$catid.'">'.$catname.'</a></h5>
                        <p class="card-text">'.substr($catdesc,0,90).'...</p>
                        <a href="threads.php?catid='.$catid.'" class="btn btn-primary">View Threads</a>
                      </div>
                    </div>
                  </div>';}
          ?>
                           
    
            
        </div>
    </div>
    



    <?php include 'partials/footer.php'  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>