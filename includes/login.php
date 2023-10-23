<?php session_start(); ?>
<?php include "db.php"; ?>

<?php
if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    // clear the data from sql injection

    $username=mysqli_real_escape_string($con,$username);
    $password=mysqli_real_escape_string($con,$password);

    // retrun the database users
    $query="SELECT * FROM users WHERE username='$username'";
    $query_exe=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($query_exe)){
        $username_db=$row['username'];
        $user_role_db=$row['user_role'];
        $user_password_db=$row['user_password'];
    }
    
   
   
    
    

    if($username===$username_db){
        $_SESSION['username']=$username_db;
        $_SESSION['user_role']=$user_role_db;
        header("Location:../admin");
    }
    else{
        header("Location:../index.php");
    }


}

?>