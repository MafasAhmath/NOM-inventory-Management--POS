<?php
header('Content-Type: application/json');
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle Delete Request
    if (isset($_POST['id']) && isset($_POST['del'])) {
        $dltid = $_POST['id'];
        $sqldlt = "DELETE FROM `product` WHERE barcode='$dltid'";

        if (mysqli_query($con, $sqldlt)) {
            $response = [
                'status' => 'success',
                'message' => 'Product deleted successfully'
            ];
            echo json_encode($response);
            exit();
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to delete product'
            ];
            echo json_encode($response);
            exit();
        }
    } else {

        // Handle Insert or Update Request
        $barcode = $_POST['barcode'];
        $name = $_POST['prdctName'];
        $cmpnyId = $_POST['cmpnyId'];
        $brndId = $_POST['brndId'];
        $ctgryId = $_POST['ctgryId'];
        $size = $_POST['size'];
        $unCst = $_POST['unCst'];
        $unPrc = $_POST['unPrc'];
        $qty = $_POST['qty'];
        $desc = $_POST['desc'];

        $sqlCheck = mysqli_query($con, "SELECT * FROM product WHERE barcode = '$barcode'");

        if (mysqli_num_rows($sqlCheck) > 0) {
            // Update existing product
            $sqlupdate = "UPDATE `product` SET `name`='$name', `company_id`='$cmpnyId', `brand_id`='$brndId', `category_id`='$ctgryId', `size`='$size', `unit_cost`='$unCst', `unit_prc`='$unPrc', `qty`='$qty', `description`='$desc' WHERE `barcode`='$barcode'";

            if (mysqli_query($con, $sqlupdate)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Product updated successfully'
                ];
                echo json_encode($response);
                exit();
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to update product'
                ];
                echo json_encode($response);
                exit();
            }
        } else {
            // Insert new product
            $sqlInsert = "INSERT INTO `product`(`barcode`, `name`, `company_id`, `brand_id`, `category_id`, `size`, `unit_cost`, `unit_prc`, `qty`, `description`) VALUES ('$barcode','$name','$cmpnyId','$brndId','$ctgryId','$size','$unCst','$unPrc','$qty','$desc')";

            if (mysqli_query($con, $sqlInsert)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Product inserted successfully'
                ];
                echo json_encode($response);
                exit();
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to insert product'
                ];
                echo json_encode($response);
                exit();
            }
        }
    }
}

?>



<?php
// // echo "hi";
// // echo print_r($_POST);

// include("db.php");
// // include("NOM_inventory\js\index.js");

// // insert date Customers table
// //if (($_POST['id'])) {
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // ||| --- Customer Form --- |||

//     if (isset($_POST['id']) && isset($_POST['del'])) {
//         //Delete statment
//         $dltid = $_POST['id'];
//         $sqldlt = "DELETE FROM `product` where barcode='$dltid'";

//         if (mysqli_query($con, $sqldlt)) {
//             //echo "<div class='alert alert-danger col-3'>One student details was deleted</div>";
//             //header("Location: ../index.php");
//             echo json_encode("A Product deleted successfuly");
//             exit();
//         }
//     } else {

//         $barcode = $_POST['barcode'];
//         $name = $_POST['prdctName'];
//         $cmpnyId = $_POST['cmpnyId'];
//         $brndId = $_POST['brndId'];
//         $ctgryId = $_POST['ctgryId'];
//         $size = $_POST['size'];
//         $unCst = $_POST['unCst'];
//         $unPrc = $_POST['unPrc'];
//         $qty = $_POST['qty'];
//         $desc = $_POST['desc'];        

//         $sqlCheck = mysqli_query($con, "SELECT * FROM product WHERE barcode = '$barcode'");

//         if (mysqli_num_rows($sqlCheck) > 0) {


//             $updateid = $_POST['barcode'];
//             //$sqledit = mysqli_query($con, "SELECT *from `customer` where `cstmr_id`='$updateid'");

//             $sqlupdate = mysqli_query($con, "UPDATE `product` SET `name`='$name',`company_id`='$cmpnyId',`brand_id`='$brndId',`category_id`='$ctgryId',`size`='$size',`unit_cost`='$unCst',`unit_prc`='$unPrc',`qty`='$qty',`description`='$desc' WHERE `barcode`='$updateid'");

//             if ($sqlupdate) {
//                 echo json_encode("A Product updated successfuly");
//                 //echo "<div class='alert alert-info col-3'> Student<b> $name </b>details was updated!</div>";
//                 //header("Location: ../index.php");
//                 exit();
//             }
//         } else {

//             $sqlInsert = "INSERT INTO `product`(`barcode`, `name`, `company_id`, `brand_id`, `category_id`, `size`, `unit_cost`, `unit_prc`, `qty`, `description`) VALUES ('$barcode','$name','$cmpnyId','$brndId','$ctgryId','$size','$unCst','$unPrc','$qty','$desc')";

//             if (!mysqli_query($con, $sqlInsert)) {
//                 die('Insertion Error' . mysqli_error($con));
//             } else {
//                 echo json_encode("A Product inserted successfuly");
//                 //header("Location: ../index.php");

//                 //echo "<script> window.history.back(); </script>";
//                 exit();
//             }
//         }
//     }

    
//}

?>
