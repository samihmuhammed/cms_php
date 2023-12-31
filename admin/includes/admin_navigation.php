<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_admin"><i class="fa fa-fw fa-arrows-v"></i> posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_admin" class="collapse">
                            <li>
                                <a href="./posts.php?source=view_all_posts">View All Post</a>
                            </li>
                            <li>
                                <a href="./posts.php?source=add_posts">add post</a>
                            </li>
                          
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-desktop"></i> category</a>
                    </li>
                    <li>
                        <a href="./comments.php"><i class="fa fa-fw fa-wrench"></i> comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> user <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./users.php?user_source=view_users">view all users</a>
                            </li>
                            <li>
                                <a href="./users.php?user_source=add_users">add users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="./profile.php"><i class="fa fa-fw fa-file"></i> profile</a>
                    </li>
                    <!-- <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            
        </nav>