
<?php include "includes/header.php"; ?>
  
<!-- navigation section -->

<?php include "includes/navigation.php"; ?>

    <?php
    if(isset($_POST['search'])){
    $search=$_POST['search_text'];
    }
    
    ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- show all post in the home page -->

                <?php
                
                // QUERY SHOW ALL POST
                $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $query_show_all_posts=mysqli_query($con,$query);
                if(!$query_show_all_posts){
                    echo "QUERY ERROR";
                }
                $count=mysqli_num_rows($query_show_all_posts); // to count the number of rows database
                $count; 
                
                if($count==0){
                    echo "<h1>sorry not found<h1>";
                }
                else{

                
                while($row=mysqli_fetch_assoc($query_show_all_posts)){
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    
                
                
                ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
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
                    <?php } } ?>
                


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