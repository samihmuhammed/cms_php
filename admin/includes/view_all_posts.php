<table class="table table-hover table-borderd">
    <thead>
        <tr>
            <th>id</th>
            <th>post_category</th>
            <th>title</th>
            <th>author</th>
            <th>date</th>
            <th>image</th>
            <th>content</th>
            <th>tags</th>
            <th>communt count</th>
            <th>status</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

    </thead>
    <tbody>

    <!-- QUERY SHOW ALL POSTS START -->
    <?php
    $query="SELECT * FROM posts";
    $query_select_all_post=mysqli_query($con,$query);
    if(!$query_select_all_post){
        echo "not all posts shwo";
    }
    while($row=mysqli_fetch_assoc($query_select_all_post)){
        $post_id=$row['post_id'];
        $post_catagoris_id=$row['post_catagoris_id'];
        $post_title=$row['post_title'];
        $post_author=$row['post_author'];	
        $post_date=$row['post_date'];
        $post_image=$row['post_image'];
        $post_content=$row['post_content'];
        $post_tags=$row['post_tags'];
        $post_comment_count=$row['post_comment_count'];
        $post_status=$row['post_status'];

        // a QUERY TO SHOW catgeory relationship
        $query="SELECT * FROM   catagories WHERE cat_id='$post_catagoris_id'";
        $query_select_category=mysqli_query($con,$query);
        if(!$query_select_category){
            die("query faild".mysqli_error($con));
        }
       

        echo "<tr>";
        echo "<th>$post_id</th>";
        while($row=mysqli_fetch_assoc($query_select_category)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
            echo "<th>$cat_title</th>";
                
        }
        
        // echo "$post_catagoris_id";
        echo "<th> $post_title</th>";
        echo "<th>$post_author</th>";
        echo "<th>$post_date</th>";
        echo "<th><img width='100' src='../images/$post_image' alt=''></th>";
        echo "<th>$post_content</th>";
        echo "<th>$post_tags</th>";
        echo "<th>$post_comment_count</th>";
        echo "<th>$post_status</th>";
        echo "<th><a href='posts.php?source=edit_posts&post_id_edit=$post_id'>edit<a/></th>";
        echo "<th><a href='posts.php?delet=$post_id'>Delete<a/></th>";
        echo "</tr>";
    }
    
    ?>
        
            <?php
            if(isset($_GET['delet'])){
                $the_delet_id=$_GET['delet'];
                $query="DELETE FROM posts WHERE post_id='$the_delet_id'";
                $query_delet_post=mysqli_query($con,$query);
                if($query_delet_post){
                    echo "not delet";
                }
                header("Location:posts.php");
            }
            
            
            ?>
            
            
            
            
            
            
            
            
            
        
        </tbody>
</table>