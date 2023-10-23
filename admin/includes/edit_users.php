<?php

// catch the date from admin panel adding posts
if(isset($_GET['user_id_edit'])){

  $the_user_edit_id=$_GET['user_id_edit'];
}

if(isset($_POST['update_user'])){
   
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

    $query="UPDATE users SET ";
    $query.=" username='$username' , ";
    $query.=" user_password='$user_password' , ";
    $query.=" user_firstname='$user_firstname ', ";
    $query.=" user_lastname='$user_lastname' , ";
    $query.=" user_email='$user_email' , ";
    $query.=" user_image='$user_image' , ";
    $query.=" user_role='$user_role' , ";
    $query.=" user_date=now() WHERE user_id='$the_user_edit_id' ";
  
  

    $query_update_user=mysqli_query($con,$query);
    if(!$query_update_user){
        die("Error query".mysqli_error($con));
    }
    header("Location:./users.php");
}

?>


<!-- QUERY SHOW DATA DETERMAIN IN THE FAILD INPUT DETERMAIN  -->
 <!-- QUERY SHOW ALL POSTS START -->
 <?php
    $query="SELECT * FROM users WHERE user_id='$the_user_edit_id'";
    $query_select_all_user=mysqli_query($con,$query);
    if(!$query_select_all_user){
        echo "QUERY FAILD";
    }
    while($row=mysqli_fetch_assoc($query_select_all_user)){
        // $user_id_db=$row['user_id'];
        $username_db=$row['username'];
        $user_password_db=$row['user_password'];
        $user_firstname_db=$row['user_firstname'];
        $user_lastname_db=$row['user_lastname'];
        $user_email_db=$row['user_email'];
        $user_image_db=$row['user_image'];
        $user_role_db=$row['user_role'];
        $user_date_db=$row['user_date'];
    }
    ?>
<div class="col-xs-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">username</label>
        <input value="<?php echo $username_db; ?>" type="text" name="username" class="form-control">
    </div>
   
    <div class="form-group">
        <label for="">password</label>
        <input value="<?php echo $user_password_db; ?>" type="text"  name="user_password" class="form-control">
    </div>
    <div class="form-group">
        <label for="">firstname</label>
        <input value="<?php echo $user_firstname_db; ?>" type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="">image</label>
    <img width="100" src="../images/<?php echo $user_image_db; ?>" alt="" srcset="">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">lastName</label>
        <input value="<?php echo $user_lastname_db; ?>" type="text" name="user_lastname">
        
    </div>
    <div class="form-group" >
        <label for="">email</label>
        
        <input value="<?php echo $user_email_db; ?>" type="email" name="user_email" class="form-control"> 
    </div>
    <div class="form-group" >
        <label for="">date</label>
        
        <input  value="<?php echo $user_date_db; ?>" type="date" name="user_date" class="form-control"> 
    </div>
    <div class="form-group">
        <label for="">status</label>
        <select name="user_role" id="" >
        <option value="<?php echo $user_role_db; ?>"><?php echo $user_role_db; ?></option>
            <?php
            if($user_role_db=='admin'){
                echo "<option value='subscriber'>subscriber</option>";
            }
            else{
                echo "<option value='admin'>admin</option>";
            }
            ?>
            
            
            
        </select>
        
    </div>

    <input type="submit" name="update_user" value="update user" class="btn btn-primary">
</form>
</div>

