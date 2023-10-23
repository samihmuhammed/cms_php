<?php

// catch the date from admin panel adding user

if(isset($_POST['add_user'])){
   
   
    $username=$_POST['username'];
    $user_password=$_POST['user_password'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['image']['name'];
    $user_image_temp=$_FILES['image']['tmp_name'];
    $user_role=$_POST['user_role'];
    $user_date=$_POST['user_date'];

    move_uploaded_file($user_image_temp,"../images/$user_image");

    // QUERY INSERT POSST BY ADMIN 

    $query="INSERT INTO users (username,user_password,user_firstname,user_lastname,user_email,user_image,user_role,user_date) ";
    $query.=" VALUES('$username','$user_password','$user_firstname','$user_lastname','$user_email','$user_image','$user_role','$user_date')";

    $quer_insert_user=mysqli_query($con,$query);
    if(!$quer_insert_user){
        echo "QUERY FAILD";
    }
    header("Location:./users.php");
}

?>

<div class="col-xs-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">username</label>
        <input type="text" name="username" class="form-control">
    </div>
   
    <div class="form-group">
        <label for="">password</label>
        <input type="text"  name="user_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="">firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="">image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">lastName</label>
        <input type="text" name="user_lastname">
        
    </div>
    <div class="form-group" >
        <label for="">email</label>
        
        <input type="email" name="user_email" class="form-control"> 
    </div>
    <div class="form-group" >
        <label for="">date</label>
        
        <input type="date" name="user_date" class="form-control"> 
    </div>
    <div class="form-group">
        <label for="">status</label>
        <select name="user_role" id="">
            <option value="admin">select status</option>
            <option value="admin">admin</option>
            <option value="subscriber">subscriber</option>
        </select>
        
    </div>

    <input type="submit" name="add_user" value="add user" class="btn btn-primary">
</form>
</div>
