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
        $sqldlt = "DELETE FROM `brand` where b_id='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
            //header("Location: ../index.php");
            echo json_encode("A Brand deleted successfuly");
            exit();
        }
    } else {
        $name = $_POST['brndname'];
        $cmpnyId = $_POST['cmpnyId'];

        if (empty($_POST['brndId'])) {

            $sqlInsert = "INSERT INTO `brand`(`name`,`company_id`) VALUES ('$name','$cmpnyId')";

            if (!mysqli_query($con, $sqlInsert)) {
                die('Insertion Error' . mysqli_error($con));
            } else {
                echo json_encode("A Brand inserted successfuly");
                //header("Location: ../index.php");

                //echo "<script> window.history.back(); </script>";
                exit();
            }
        } else {
            $updateid = $_POST['brndId'];
            $sqledit = mysqli_query($con, "SELECT *from `brand` where `b_id`='$updateid'");
            if (mysqli_num_rows($sqledit) > 0) {

                $sqlupdate = mysqli_query($con, "UPDATE `brand` SET `name`='$name' ,`company_id`='$company_id'  WHERE `b_id`='$updateid'");

                if ($sqlupdate) {
                    echo json_encode("A Brand updated successfuly");

                    //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
                    //header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
}
