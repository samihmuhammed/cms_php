<table class="table table-hover table-borderd">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>image</th>
            <th>role</th>
            <th>date</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

    </thead>
    <tbody>

    <!-- QUERY SHOW ALL POSTS START -->
    <?php
    $query="SELECT * FROM users";
    $query_select_all_post=mysqli_query($con,$query);
    if(!$query_select_all_post){
        echo "not all posts shwo";
    }
    while($row=mysqli_fetch_assoc($query_select_all_post)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
        $user_date=$row['user_date'];
        

        // a QUERY TO SHOW catgeory relationship
        $query="SELECT * FROM   users";
        $query_select_users=mysqli_query($con,$query);
        if(!$query_select_users){
            die("query faild".mysqli_error($con));
        }
       

        echo "<tr>";
        echo "<th>$user_id</th>";
        // echo "$post_catagoris_id";
        echo "<th> $username</th>";
        echo "<th>$user_password</th>";
        echo "<th>$user_firstname</th>";
        echo "<th>$user_lastname</th>";
        echo "<th>$user_email</th>";
        echo "<th><img width='100' src='../images/$user_image' alt=''></th>";
        echo "<th>$user_role</th>";
        echo "<th>$user_date</th>";
        echo "<th><a href='posts.php?source=edit_posts&post_id_edit=$user_id'>edit<a/></th>";
        echo "<th><a href='posts.php?delet=$user_id'>Delete<a/></th>";
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