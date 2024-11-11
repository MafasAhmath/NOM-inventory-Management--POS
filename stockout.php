<section class="" id="stkOut">
    <?php
    include("forms/db.php");

    $tblProductview = mysqli_query($con, "SELECT * FROM productview where qty <= 0");

    ?>

    <script src="js/index.js"></script>
    <script src="js/ajax.js"></script>

    <div class="mb-3">
        <h4>Stock out</h4>
    </div>
    <div class="container-fluid g-1">
        <div class="row">

            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>Stock out <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblProductview); ?> </h4>
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

                        </div>

                    </div>

                    <!-- ||Table Stock in || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Campany</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Description</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


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
                                            echo "<td>" . $row['qty'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td> 
                                            </tr>";
                                            // $barcode = $row['barcode'];
                                            // echo "<td >  <a  class='btn btn-outline-primary btn-sm ' id='prdctUpdate' data-id='$barcode' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td> 
                                            // <td> <a  class='btn btn-outline-warning btn-sm' id='prdctDel' data-id='$barcode' value='del'> <i class='bi bi-trash3'></i></a> </td>

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