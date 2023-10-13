<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>




        <div id="page-wrapper">

            <div class="container-fluid">

            <!-- stop in query add category section -->
            <?php
            
            
            if(isset($_POST['add_category']))
                {

                    $cat_title= $_POST['cat_title'];
                    if($cat_title=="" || empty($_POST['add_category'])){
                        echo "faild coud not be empty";
                    }
                    else{
                            // send the qeury to the database 
                            $query="INSERT INTO catagories (cat_title) VALUES('$cat_title')";
                            $query_add_category=mysqli_query($con,$query); //conttion is corrcet and query add
                            if(!$query_add_category)
                            {
                                echo "not ensert";
                                // die("QUERY FAILD".mysqli_error($con));
                            }
                            header("Location:categories.php");
                        }
                }
            ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>author</small>
                        </h1>
                        <div class="col-xs-6">
                            <!-- QUERY ADD CATEGORY -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title" >title</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <input type="submit" value="ADD CATEGORY" name="add_category" class="btn btn-primary" >
                            </form>

                            <?php
                            if(isset($_GET['edit'])){

                                $the_edit_id= $_GET['edit'];
                                include "./includes/category_edit.php";

                            }
                            
                            ?>
                        

                            
                           
                            
                        </div>
                       
                        

                        <!-- shwo all catgeories -->
                        <div class="col-xs-6">

                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>title</th>
                                                <th>edit</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- QUERY SHOW ALL CATEGORY -->
                                            <?php 
                                          showCategory();
                                            ?>
                                            
                                                
                                                
                                            
                                        </tbody>
                                    </table>
                            </div>
                        <!-- QUERY DELET CATEGORY -->
                                <?php
                                if(isset($_GET['delet'])){

                                    $the_delet_id= $_GET['delet'];
                                    // QUERY DELET QUERY CATGEORY

                                    $query="DELETE FROM catagories WHERE cat_id='$the_delet_id'";
                                    $query_delet_cat_title=mysqli_query($con,$query);
                                    if(!$query_delet_cat_title){
                                        echo "not deleted";

                                    }
                                   
                                    header("Location:categories.php");
                                }
                                
                                ?>

                        </div>
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