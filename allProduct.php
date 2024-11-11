<section class="" id="allProduct">
    <?php
    include("forms/db.php");
    $tblProductview = mysqli_query($con, "SELECT * FROM productview");

    // include('functions/table.php');

    ?>

    <script src="js/index.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/validation.js"></script>
    <link rel="stylesheet" href="css/validation.css">

    <div class="mb-3">
        <h4>All product</h4>
    </div>
    <div class="container-fuild g-1">

        <div class="row">
            <div class="col">
                <div class="card border-0 productCard" id='productCard'>
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>All Product <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblProductview); ?> </h4>
                            </div>
                            <!-- || Search || -->
                            <div class="col-12 col-md-4  ">
                                <form action="" method="" class="d-flex " enctype="multipart/form-data">
                                    <div class="input-group input-outline ">

                                        <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                                        <button class="input-group-text" type="submit" name="search"><i class="bi bi-search"></i></button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 my-2 my-md-0 d-flex  align-items-center justify-content-end">

                                <div class="">

                                    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#productModal">
                                        <i class="bi bi-plus-circle pe-0 pe-md-2"></i><span class="d-none d-md-inline"> New </span>
                                    </button>

                                    <!--New Product Modal -->

                                </div>

                                <!-- Add Bulk -->
                                <button class="btn btn-success accordion-button-sm " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" id="accordionExample"> <i class="bi bi-file-earmark-spreadsheet pe-2"></i> Add Bulk</button>
                            </div>


                        </div>
                        <div class="row justify-content-end ">
                            <div class="col-12 col-md-4">
                                <!-- || Bulk Form || -->
                                <div class="accordion mt-2">
                                    <div class="accordion-item ">
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <form action="" method="" class="d-flex " enctype="multipart/form-data">
                                                <div class="input-group input-outline ">

                                                    <input class="form-control " type="file" placeholder="" aria-label="">
                                                    <button class="input-group-text" type="submit" name=""><i class="bi bi-upload "></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- ||Table All Product || -->
                    <div class="card-body ">


                        <script>
                            
                        </script>


                        <div class="table-responsive rounded table-sm">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Campany</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Unit Cost</th>
                                        <th scope="col">Unit Prc</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="prdctTbl">
                                    <?php

                                    // table("productview");

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
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!--New Product Modal -->
<?php include("forms/productForms.php") ?>