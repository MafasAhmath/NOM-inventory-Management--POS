<?php

include("db.php");
// include("NOM_inventory\js\index.js");

// insert date Customers table
//if (($_POST['id'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ||| --- Customer Form --- |||

    if (isset($_POST['id']) && isset($_POST['del'])) {
        //Delete statment
        $dltid = $_POST['id'];
        $sqldlt = "DELETE FROM `customer` where cstmr_id='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
            //header("Location: ../index.php");
            echo json_encode("A Customer deleted successfuly");
            exit();
        }
    } else {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $gender = $_POST['gender'];
        $phnNo = $_POST['phnNo'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];

        if (empty($_POST['cstmrId'])) {

            $sqlInsert = "INSERT INTO `customer`(`f_name`, `l_name`, `gander`, `phone`, `email`, `description`) VALUES ('$fName','$lName','$gender','$phnNo','$email','$desc')";

            if (!mysqli_query($con, $sqlInsert)) {
                die('Insertion Error' . mysqli_error($con));
            } else {
                echo json_encode("A Customer Inserted successfuly");
                //header("Location: ../index.php");

                //echo "<script> window.history.back(); </script>";
                exit();
            }
        } else {
            $updateid = $_POST['cstmrId'];
            $sqledit = mysqli_query($con, "SELECT *from `customer` where `cstmr_id`='$updateid'");
            if (mysqli_num_rows($sqledit) > 0) {

                $sqlupdate = mysqli_query($con, "UPDATE `customer` SET `f_name`='$fName',`l_name`='$lName',`gander`='$gender',`phone`='$phnNo',`email`='$email',`description`='$desc' WHERE `cstmr_id`='$updateid'");

                if ($sqlupdate) {
                    echo json_encode("A Customer Updated successfuly");

                    //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
                    //header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
}
