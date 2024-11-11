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
        $sqldlt = "DELETE FROM `category` where c_id='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
            //header("Location: ../index.php");
            echo json_encode("A Catagery deleted successfuly");
            exit();
        }
    } else {
        $name = $_POST['ctgtyname'];

        if (empty($_POST['ctgtyId'])) {

            $sqlInsert = "INSERT INTO `category`(`name`) VALUES ('$name')";

            if (!mysqli_query($con, $sqlInsert)) {
                die('Insertion Error' . mysqli_error($con));
            } else {
                echo json_encode("A Catagery Inserted successfuly");
                //header("Location: ../index.php");

                //echo "<script> window.history.back(); </script>";
                exit();
            }
        } else {
            $updateid = $_POST['ctgtyId'];
            $sqledit = mysqli_query($con, "SELECT *from `category` where `c_id`='$updateid'");
            if (mysqli_num_rows($sqldlt) > 0) {

                $sqlupdate = mysqli_query($con, "UPDATE `category` SET `name`='$name'WHERE `c_id`='$updateid'");

                if ($sqlupdate) {
                    echo json_encode("A Catagery updated successfuly");

                    //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
                    //header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
}
