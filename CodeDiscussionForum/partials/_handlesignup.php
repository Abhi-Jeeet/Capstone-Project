<?php
include '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $user_email=$_POST['signupEmail'];
    $pass=$_POST['signupPassword'];
    $cpass=$_POST['signupcPassword'];

    $existsql="select * from `users` where user_email='$user_email'";
    $result=mysqli_query($conn,$existsql);
    $numRow=mysqli_num_rows($result);
        if($numRow>0){
            $showError="Username already in use";

        }
        else{
            if($pass==$cpass){
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result=mysqli_query($conn,$sql);

                if($result){
                
                    $showAlert=true;
                    header("Location:/Capstone Project/Home1/Home2/Forum/index.php?signupsuccess=true");
                    exit();
                }
            }
            
                else{
                    $showError="Password doesn't match";
                
                }
        }
        
    header("Location:/Capstone Project/Home1/Home2/Forum/index.php?signupsuccess=false");
}





?>