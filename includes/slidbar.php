<div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php

                            $query="SELECT * FROM catagories "; //"SELECT * FROM categories LIMIT 2" write LIMIT 3 mean just show 2 catgegory
                            $query_categories_slidbar=mysqli_query($con,$query);

                            while ($row=mysqli_fetch_assoc($query_categories_slidbar)){

                                $cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];
                                echo "<li><a href='./category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                            }
                            ?>
                            
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

               <?php include "widget.php" ;?>

            </div>