
<?php include "includes/header.php"; ?>
  
<!-- navigation section -->

<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                
                if(isset($_GET['p_id_post'])){

                    $the_post_id=$_GET['p_id_post'];
                }
                ?>

                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- show all post in the home page -->

                <?php
                
                // QUERY SHOW ALL POST
                $query="SELECT * FROM posts WHERE post_id='$the_post_id'";
                $query_show_all_posts=mysqli_query($con,$query);
                if(!$query_show_all_posts){
                    echo "QUERY ERROR";
                }

                while($row=mysqli_fetch_assoc($query_show_all_posts)){
                     $post_id_determain=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    
                
                
                ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id_post=<?php echo $post_id_determain; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>


                <hr>
                    <?php } ?>
                
                    <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <?php

                   
                    // QUERY ADDING COMMENT SECTION
                    if(isset($_POST['add_comment'])){

                        
                        $comment_author=$_POST['comment_author'];
                        $comment_email=$_POST['comment_email'];
                        $comment_content=$_POST['comment_content'];
                        $comment_date=date('d-m-y');
                       
                    
                       
                        $query_comment="INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                        $query_comment.="VALUES('$post_id_determain','$comment_author','$comment_email','$comment_content','unprove',now()) ";
                        $query_comment_ex=mysqli_query($con,$query_comment);
                        if(!$query_comment_ex){
                            echo "mot execute";
                        }
                      // section return the id detrmain
                        // $query_select="SELECT * FROM posts WHERE post_id='{$the_post_id}'";
                        // $query_post_select_ex=mysqli_query($con,$query_select);
                        // while($row=mysqli_fetch_assoc($query_post_select_ex)){
                        //     $post_id_detrmain=$row['post_id'];
                        // }
                        // $query="INSERT INTO comments (comment_author,comment_email,comment_content,comment_date,comment_status) ";
                        // $query.=" VALUES ('$comment_author','$comment_email','$comment_content','$comment_date','$comment_status')";
                        
                        // $query_insert=mysqli_query($con,$query);
                        // if(!$query_insert){
                            
                        //         die("QUERY FAILD".mysqli_error($con));
                        // }
                        
                    }
                    
                    ?>
                    <h4>Leave a Comment:</h4>
                    <form action="" role="form" method="post">
                        <div class="form-group">
                            <label for="author">author:</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment email">email:</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment content">content:</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                    <!-- UERY SHOW ALL COMMENTS RELATED THAT POST WE POSTED IN THE LIST  -->
                <!-- Comment -->
                <!-- QUERY SELCT COMMENTS -->
                <?php
                
                $query="SELECT * FROM comments WHERE comment_post_id='$the_post_id' AND comment_status='aprove'";
                $query_comments_find=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($query_comments_find)){
                    $commnet_author_db=$row['comment_author'];
                    $commnet_content_db=$row['comment_content'];
                    $commnet_date_db=$row['comment_date'];
                
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $commnet_author_db; ?>
                            <small><?php echo $commnet_date_db; ?></small>
                        </h4>
                        <?php echo $commnet_content_db; ?>
                    </div>
                </div>
                    <?php } ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

              <?php include "includes/search_bar.php"; ?>

                <!-- Blog Categories Well -->
             <?php include "includes/slidbar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <?php include "includes/footer.php"; ?>