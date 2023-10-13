 <?php
 $the_edit_id=$_GET['edit'];
 $query="SELECT * FROM catagories WHERE cat_id='$the_edit_id' ";
 $query_select_all_category=mysqli_query($con,$query);
 if(!$query_select_all_category){
     echo "QUERY FAILD";
 }
 while($row=mysqli_fetch_assoc($query_select_all_category)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
 }
 ?>

 <!-- stop in query update category -->

 <?php
 
//  catch the date updaet category title
if (isset($_POST['update_category']))
{

    $cat_title= $_POST['cat_title'];
    // QUERY UPDATE

        if($cat_title==""||empty($cat_title)){
            echo "faild coud not be empty";
        }
        else{
                $query="UPDATE catagories SET cat_title='$cat_title' WHERE cat_id='$the_edit_id'";
                $query_update_category=mysqli_query($con,$query);
                if(!$query_update_category)
                {
                    echo "not update ";
                }
                header("Location:categories.php");
        }
}

?>
 
 <!-- QUERY ADD CATEGORY -->
 <form action="" method="post">
    <div class="form-group">
        <label for="title" >title</label>
        <input value="<?php echo $cat_title;  ?>" type="text" name="cat_title" class="form-control">
    </div>
    <input type="submit" value="UPDATE" name="update_category" class="btn btn-primary" >
</form>