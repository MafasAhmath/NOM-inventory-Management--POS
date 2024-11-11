<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['query']) && isset($_POST['type'])) {
        $query = $_POST['query'];
        $type = $_POST['type'];

        $sqlSearch = mysqli_query($con, "SELECT * FROM product WHERE $type LIKE '%$query%'");

        if (mysqli_num_rows($sqlSearch) > 0) {
            $results = [];
            while ($row = mysqli_fetch_assoc($sqlSearch)) {
                $results[] = [
                    'barcode' => $row['barcode'],
                    'name' => $row['description'],
                    'unit_price' => $row['unit_prc'],
                    'qty' => $row['qty'],
                    'size' => $row['size'],
                    'unit_cost' => $row['unit_cost']
                ];
            }
            echo json_encode(['success' => true, 'data' => $results]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No product found']);
        }
    }
}
