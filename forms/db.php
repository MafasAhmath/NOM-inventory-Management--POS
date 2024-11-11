<?php

    $con=mysqli_connect("localhost","root","","nom_inventory");
    if(!$con){
        die("DB connection error: ".mysqli_connect_error($con));
    }
    else{
        // echo "Successfully connected";
    }

    

?>

<!-- <h1>HI</h1> -->