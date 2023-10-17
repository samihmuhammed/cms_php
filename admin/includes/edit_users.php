<?php

// catch the date from admin panel adding posts
if(isset($_GET['post_id_edit'])){

    $the_post_edit_id=$_GET['post_id_edit'];
}

if(isset($_POST['update_post'])){
   
    $post_catagoris_id=$_POST['post_category'];
    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_date=date('d-m-y');
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags'];
    
    $post_status=$_POST['post_status'];
    $post_comment_count=4;

    move_uploaded_file($post_image_temp,"../images/$post_image");

    // QUERY INSERT POSST BY ADMIN 

    $query="UPDATE posts SET ";
    $query.=" post_catagoris_id='$post_catagoris_id' , ";
    $query.=" post_title='$post_title' , ";
    $query.=" post_author='$post_author ', ";
    $query.=" post_date=now() , ";
    $query.=" post_image='$post_image' , ";
    $query.=" post_content='$post_content' , ";
    $query.=" post_tags='$post_tags' , ";
    $query.=" post_status='$post_status' , ";
    $query.=" post_comment_count='$post_comment_count' WHERE post_id='$the_post_edit_id' ";
    // $query.=" ";
  

    $query_update_post=mysqli_query($con,$query);
    if(!$query_update_post){
        die("Error query".mysqli_error($con));
    }
}

?>


<!-- QUERY SHOW DATA DETERMAIN IN THE FAILD INPUT DETERMAIN  -->
 <!-- QUERY SHOW ALL POSTS START -->
 <?php
    $query="SELECT * FROM posts WHERE post_id='$the_post_edit_id'";
    $query_select_all_post=mysqli_query($con,$query);
    if(!$query_select_all_post){
        echo "not all posts shwo";
    }
    while($row=mysqli_fetch_assoc($query_select_all_post)){
        $post_id_db=$row['post_id'];
        $post_catagoris_id_db=$row['post_catagoris_id'];
        $post_title_db=$row['post_title'];
        $post_author_db=$row['post_author'];	
        $post_date_db=$row['post_date'];
        $post_image_db=$row['post_image'];
        $post_content_db=$row['post_content'];
        $post_tags_db=$row['post_tags'];
        $post_comment_count_db=$row['post_comment_count'];
        $post_status_db=$row['post_status'];
    }
    ?>
<div class="col-xs-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">title</label>
        <input value="<?php echo $post_title_db; ?>" type="text" name="post_title" class="form-control">
    </div>
    <div class="form-group">
    <label for="">post_category</label>
        <select name="post_category" id="">

        
        <?php
        // a QUERY TO SHOW catgeory relationship
        $query="SELECT * FROM catagories";
        $queyr_select_category=mysqli_query($con,$query);
        if(!$queyr_select_category){
            echo "query faild";
        }
        while($row=mysqli_fetch_assoc($queyr_select_category)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];

                echo "<option value='$cat_id='>$cat_title</option>";
        }
        
        ?>
        
        </select>
    </div>
    <div class="form-group">
        <label for="">author</label>
        <input value="<?php echo $post_author_db; ?>" type="text"  name="post_author" class="form-control">
    </div>
   
    <div class="form-group">
        <label for="">image</label>
        <input  type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control">
        <?php echo $post_content_db; ?>
        </textarea>
        
    </div>
    <div class="form-group" >
        <label for="">tags</label>
        
        <input value="<?php echo $post_tags_db; ?>" type="text" name="post_tags" class="form-control"> 
    </div>
    <div class="form-group">
       
        <label for="">status</label>
        <select name="post_status" id="">
            
            <option value="<?php echo $post_status_db; ?>"><?php echo $post_status_db; ?></option>
            <?php
            if($post_status_db=="publish"){
             echo "<option value='draft'>draft</option>";
            }
            else{
                echo "<option value='publish'>publsih</option>";
            }
            ?>
            
        </select>
        
    </div>

    <input type="submit" name="update_post" value="update post " class="btn btn-primary">
</form>
</div>

