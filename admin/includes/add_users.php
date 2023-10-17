<?php

// catch the date from admin panel adding posts

if(isset($_POST['add_post'])){
   
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

    $query="INSERT INTO posts (post_catagoris_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status,post_comment_count) ";
    $query.=" VALUES('$post_catagoris_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status','$post_comment_count')";

    $quer_insert_post=mysqli_query($con,$query);
    if(!$quer_insert_post){
        echo "query faild";
    }
}

?>

<div class="col-xs-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">title</label>
        <input type="text" name="post_title" class="form-control">
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
        <input type="text"  name="post_author" class="form-control">
    </div>
    <div class="form-group">
        <label for="">date</label>
        <input type="date" name="post_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="">image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control">

        </textarea>
        
    </div>
    <div class="form-group" >
        <label for="">tags</label>
        
        <input type="text" name="post_tags" class="form-control"> 
    </div>
    <div class="form-group">
        <label for="">status</label>
        <select name="post_status" id="">
            <option value="publish">select status</option>
            <option value="publish">publish</option>
            <option value="draft">draft</option>
        </select>
        
    </div>

    <input type="submit" name="add_post" value="add post " class="btn btn-primary">
</form>
</div>
