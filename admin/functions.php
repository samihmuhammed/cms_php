<?php


function showCategory(){
    global $con;
    $query="SELECT * FROM catagories";
    $query_select_all_category=mysqli_query($con,$query);
    if(!$query_select_all_category){
        echo "QUERY FAILD";
    }
    while($row=mysqli_fetch_assoc($query_select_all_category)){
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?edit=$cat_id'>edit</a></td>";
        echo "<td><a href='categories.php?delet=$cat_id'>delete</a></td>";
        echo "</tr>";
    }
}



?>