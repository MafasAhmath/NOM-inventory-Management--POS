<?php

// echo print_r($_POST);

include("db.php");
// include("NOM_inventory\js\index.js");

// insert date Customers table
//if (($_POST['id'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ||| --- Customer Form --- |||

    if (isset($_POST['id']) && isset($_POST['del'])) {
        //Delete statment
        $dltid = $_POST['id'];
        $sqldlt = "DELETE FROM `company` where company_id='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
            //header("Location: ../index.php");
            echo json_encode("A Company deleted successfuly");
            exit();
        }

    } else {
        $name = $_POST['cmpnyname'];
        $supplier_id = $_POST['supplierId'];
        
        if (empty($_POST['cmpnyId'])) {

            $sqlInsert = "INSERT INTO `company`(`name`,`supplier_id`) VALUES ('$name','$supplier_id')";

            if (!mysqli_query($con, $sqlInsert)) {
                die('Insertion Error' . mysqli_error($con));
            } else {
                echo json_encode("A Company inserted successfuly");
                //header("Location: ../index.php");

                //echo "<script> window.history.back(); </script>";
                exit();
            }
        } else {
            $updateid = $_POST['cmpnyId'];

            $sqledit = mysqli_query($con, "SELECT *from `company` where `company_id`='$updateid'");
            if (mysqli_num_rows($sqledit) > 0) {

                $sqlupdate = mysqli_query($con, "UPDATE `company` SET `name`='$name' ,`supplier_id`='$supplier_id'  WHERE `company_id`='$updateid'");
    
                if ($sqlupdate) {
                    echo json_encode("A Company updated successfuly");
    
                    //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
                    //header("Location: ../index.php");
                    exit();
                }
            }
        }
    }

    
}
