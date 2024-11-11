<?php



include("db.php");
// include("NOM_inventory\js\index.js");

// insert date Customers table
//if (($_POST['id'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ||| --- ledger Form --- |||

    if (isset($_POST['id']) && isset($_POST['del'])) {
        //Delete statment
        $dltid = $_POST['id'];
        $sqldlt = "DELETE FROM `ledger` where id='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
            //header("Location: ../index.php");
            echo json_encode("A Ledger deleted successfuly");
            exit();
        }

    } else {
        $date = $_POST['date'];
        $total = $_POST['total'];
        $credit = $_POST['credit'];
        $debit = $_POST['debit'];
        $cstmrid = $_POST['cstmrid'];
        //$desc = $_POST['desc'];

        if (empty($_POST['ledgerId'])) {

            $sqlInsert = "INSERT INTO `ledger`(`date`, `total`, `credit`, `debit`, `cstmr_id`) VALUES ('$date','$total','$credit','$debit','$cstmrid')";

            if (!mysqli_query($con, $sqlInsert)) {
                die('Insertion Error' . mysqli_error($con));
            } else {
                echo json_encode("A Ledger Inserted successfuly");
                //header("Location: ../index.php");

                //echo "<script> window.history.back(); </script>";
                exit();
            }
        } else {
            $updateid = $_POST['ledgerId'];
            
            $sqledit = mysqli_query($con, "SELECT *from `ledger` where `id`='$updateid'");

            if(mysqli_num_rows($sqledit)>0){

                $sqlupdate = mysqli_query($con, "UPDATE `ledger` SET `date`='$date',`total`='$total',`credit`='$credit',`debit`='$debit',`cstmr_id`='$cstmrid' WHERE `id`='$updateid'");
    
                if ($sqlupdate) {
                    echo json_encode("A Ledger Updated successfuly");
    
                    //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
                    //header("Location: ../index.php");
                    exit();
                }
            }

        }
    }


}
