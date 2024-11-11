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
        $sqldlt = "DELETE FROM `supplier` where s_id='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
            //header("Location: ../index.php");
            echo json_encode("A Supplier deleted successfuly");
            exit();
        }
    } else {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $gender = $_POST['gender'];
        $phnNo = $_POST['phnNo'];
        $email = $_POST['email'];
        $nic = $_POST['nic'];

        if (empty($_POST['slprId'])) {

            $sqlInsert = "INSERT INTO `supplier`(`f_name`, `l_name`, `gander`, `phone_no`, `email`, `nic`) VALUES ('$fName','$lName','$gender','$phnNo','$email','$nic')";

            if (!mysqli_query($con, $sqlInsert)) {
                die('Insertion Error' . mysqli_error($con));
            } else {
                echo json_encode("A Supplier Inserted successfuly");
                //header("Location: ../index.php");

                //echo "<script> window.history.back(); </script>";
                exit();
            }
        } else {
            $updateid = $_POST['slprId'];
            $sqledit = mysqli_query($con, "SELECT *from `supplier` where `s_id`='$updateid'");
            if (mysqli_num_rows($sqledit) > 0) {
                $sqlupdate = mysqli_query($con, "UPDATE `supplier` SET `f_name`='$fName',`l_name`='$lName',`gander`='$gender',`phone_no`='$phnNo',`email`='$email',`nic`='$nic' WHERE `s_id`='$updateid'");

                if ($sqlupdate) {
                    echo json_encode("A Supplier updated successfuly");

                    //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
                    //header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
}
