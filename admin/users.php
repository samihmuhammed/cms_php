<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>
    
       <!-- start section user in the pannel  -->



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>author</small>
                        </h1>
                        <!-- source=view_all_users
                        source=add_users -->
                       <?php
                       
                       if(isset($_GET['user_source'])){
                        $source= $_GET['user_source'];
                       }
                       else{
                        $source="";
                       }
                       switch($source){
                        case 100:echo "nononwelcoem";break;
                        case 'add_users':include "includes/add_users.php";break;
                        default:include "includes/view_users.php";break;
                       }


                       ?>
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