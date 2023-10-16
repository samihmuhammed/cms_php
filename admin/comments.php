<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>




        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>author</small>
                        </h1>
                       
                        <!-- show all comments -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>comment post id</th>
                                    <th>author</th>
                                    <th>email</th>
                                    <th>content</th>
                                    <th>status</th>
                                    <th>date</th>
                            
                                    <th>aprove</th>
                                    <th>unprove</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                // QUERY TO SHOW ALL COMMENTS
                                $query="SELECT * FROM comments";
                                $query_select_comments=mysqli_query($con,$query);
                                if(!$query_select_comments){
                                    die("QUERY FAILD".mysqli_error($con));
                                }
                                while($row=mysqli_fetch_assoc($query_select_comments)){
                                    $id=$row['comment_id'];
                                    $comment_post_id=$row['comment_post_id'];
                                    $author=$row['comment_author'];
                                    $email=$row['comment_email'];
                                    $content=$row['comment_content'];
                                    $status=$row['comment_status'];
                                    $date=$row['comment_date'];

                                    echo "<tr>";
                                    echo "<th>$id</th>";
                                    echo "<th>$comment_post_id</th>";
                                    echo "<th>$author</th>";
                                    echo "<th>$email</th>";
                                    echo "<th>$content</th>";
                                    echo "<th>$status</th>";
                                    echo "<th>$date</th>";
                                    echo "<th><a href='comments.php?status=aprove&status_id=$id'>aprove</a></th>";
                                    echo "<th><a href='comments.php?status=unprove&status_id=$id'>unprove</a></th>";
                                    echo "<th><a href='comments.php?com_id=$id'>delete</a></th>";
                                    echo "</tr>";
                                }
                                ?>
                                
                                    <?php
                                    
                                    if(isset($_GET['com_id'])){
                                        $the_comment_id=$_GET['com_id'];
                                        $query="DELETE FROM comments WHERE comment_id='$the_comment_id'";
                                        $query_delet_comment=mysqli_query($con,$query);
                                        if(!$query_delet_comment){
                                            echo "query faild";
                                        }
                                        header("Location:comments.php");
                                    }
                                    
                                    
                                    if(isset($_GET['status'])){
                                        $the_comment_status=$_GET['status'];
                                        if($the_comment_status=='aprove'){
                                            
                                            $the_comment_status_id=$_GET['status_id'];
                                            $query="UPDATE comments SET comment_status='$the_comment_status' WHERE comment_id='$the_comment_status_id'";
                                            $query_aprove_comment=mysqli_query($con,$query);
                                            if(!$query_aprove_comment){
                                                echo "query faild";
                                            }
                                            header("Location:comments.php");
                                        }
                                        if($the_comment_status=='unprove'){
                                            $the_comment_status_id=$_GET['status_id'];
                                            $query="UPDATE comments SET comment_status='$the_comment_status' WHERE comment_id='$the_comment_status_id'";
                                            $query_unprove_comment=mysqli_query($con,$query);
                                            if(!$query_unprove_comment){
                                                echo "query faild";
                                            }
                                            header("Location:comments.php");
                                        }
                                      
                                    }
                                    
                                    ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
<?php include "includes/admin_footer.php"; ?>