
<?php



function table($tblName)
{
    include("forms/db.php");

    // Check if the table exists before proceeding
    $result = mysqli_query($con, "SHOW TABLES LIKE '$tblName'");
    if (mysqli_num_rows($result) == 0) {
        echo "Table '$tblName' does not exist.";
        return;
    }

    // Get the table columns
    $columnName = mysqli_query($con, "SHOW COLUMNS FROM $tblName");
    if ($columnName) {
        echo "<tr>";
        foreach ($columnName as $column) {
            echo "<th>" . $column['Field'] . "</th>";
        }
        echo "<th>Actions</th>";
        echo "</tr>";
    } else {
        echo "Error retrieving columns: " . mysqli_error($con);
        return;
    }

    

    // Get the table data
    $tblProductview = mysqli_query($con, "SELECT * FROM $tblName");
    if (!$tblProductview) {
        echo "Error retrieving data: " . mysqli_error($con);
        return;
    }

    // Display the table data
    if (mysqli_num_rows($tblProductview) > 0) {
        $noOfPrdct = 0;
        while ($row = mysqli_fetch_assoc($tblProductview)) {
            echo "<tr>";
            echo "<td>" . ++$noOfPrdct . "</td>";
            foreach ($columnName as $column) {
                $fieldName = $column['Field'];
                if (isset($row[$fieldName])) {
                    echo "<td>" . $row[$fieldName] . "</td>";
                } else {
                    echo "<td>N/A</td>";
                }
            }


            $primaryKeyQuery = mysqli_query($con, "SHOW KEYS FROM $tblName WHERE Key_name = 'PRIMARY'");
            $primaryKeyRow;
            if ($primaryKeyQuery && mysqli_num_rows($primaryKeyQuery) > 0) {
                $primaryKeyRow = mysqli_fetch_assoc($primaryKeyQuery);
                return $primaryKeyRow['Column_name'];
            } else {
                return null;
            }


            //$barcode = $row['barcode'];
            echo "<td>
                    <a class='btn btn-outline-primary btn-sm' id='prdctUpdate' data-id='$primaryKeyRow' value='edit'>
                        <i class='bi bi-pencil-square'></i>
                    </a>
                    <a class='btn btn-outline-warning btn-sm' id='prdctDel' data-id='$primaryKeyRow' value='del'>
                        <i class='bi bi-trash3'></i>
                    </a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . (mysqli_num_fields($tblProductview) + 1) . "'>No records found</td></tr>";
    }
}




function tableTest($tblName)
{

    include("forms/db.php");
    $tblProductview = mysqli_query($con, "SELECT * FROM $tblName");

    $columnName = mysqli_query($con, "SHOW COLUMNS FROM $tblName");

    if ($columnName !== false) {
        foreach ($columnName as $column) {
            echo $column['Field'] . '<br>';
        }
    }

    if (mysqli_num_rows($tblProductview) > 0) {
        $noOfPrdct = 0;
        while ($row = mysqli_fetch_assoc($tblProductview)) {






            echo "<tr>";
            echo "<td>" . ++$noOfPrdct .  "</td>";
            echo "<td>" . $row['barcode'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['company_name'] . "</td>";
            echo "<td>" . $row['brand_name'] . "</td>";
            echo "<td>" . $row['category_name'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td>" . $row['unit_cost'] . "</td>";
            echo "<td>" . $row['unit_prc'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            $barcode = $row['barcode'];
            echo "<td >  <a  class='btn btn-outline-primary btn-sm ' id='prdctUpdate' data-id='$barcode' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td> 
                                            <td> <a  class='btn btn-outline-warning btn-sm' id='prdctDel' data-id='$barcode' value='del'> <i class='bi bi-trash3'></i></a> </td>
                                            </tr>";
        }
    }
}


?>