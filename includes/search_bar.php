<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
   
    

        <form action="./search.php" method="post">
        <div class="input-group">
        
        <input type="text" class="form-control" name="search_text">
        
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="search">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        
      </span>

        </div>

        </form>
    
    <!-- /.input-group -->
</div>



        <!-- Blog login -->
        <div class="well">
            <h4>login</h4>
        
            

                <form action="./includes/login.php" method="post">
                    <div class="form-group">
                    <input placeholder="username" type="text" class="form-control" name="username">
                    </div>
                <div class="input-group">
                
                
                <input placeholder="paswword" type="password" class="form-control" name="password">
                
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="login">
                        <span >login</span>
                </button>
                
            </span>

                </div>

                </form>
            
            <!-- /.input-group -->
        </div>