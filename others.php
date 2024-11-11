<section class="" id="others">
        <?php
        include("forms/db.php");
        $tblSupplier = mysqli_query($con, "SELECT * FROM supplier");

        $tblCatagery = mysqli_query($con, "SELECT * FROM category");

        $tblCampanyView = mysqli_query($con, "SELECT * FROM companyview");

        $tblBrandView = mysqli_query($con, "SELECT * FROM brandview");
        //$tblledger = mysqli_query($con, "SELECT * FROM ledger");


        ?>

        <script src="js/index.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/validation.js"></script>
        <link rel="stylesheet" href="css/validation.css">

        <div class="container-fluid g-0">
                <div class="mb-3">
                        <h4>Others </h4>
                </div>

                <div class="row g-2">
                        <!-- Table Company -->
                        <div class="col-12  ">

                                <div class="card border-0 ">
                                        <div class="card-header d-flex  align-items-center justify-content-between">
                                                <h5 class=" "> Companies <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblCampanyView); ?></h5>

                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#companyModal">
                                                        <i class="bi bi-plus-circle "></i>
                                                </button>
                                                <!-- Company Modal -->
                                                <?php include("forms/companyForms.php") ?>
                                        </div>
                                        <div class="card-body ">
                                                <div class="table-responsive rounded caption-top ">

                                                        <table class="table table-hover table-bordered table-sm ">
                                                                <thead class="table-dark text-center">
                                                                        <tr>
                                                                                <th scope="col" width="3%">NO</th>
                                                                                <th scope="col">C ID</th>
                                                                                <th scope="col">COMPANY NAME</th>
                                                                                <th scope="col">SUPPLIER NAME</th>
                                                                                <th scope="col" colspan="2" width="10%">ACTION</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody id="cmpnyTbl">
                                                                        <?php

                                                                        if (mysqli_num_rows($tblCampanyView) > 0) {
                                                                                $noOfCmpny = 0;
                                                                                while ($row = mysqli_fetch_assoc($tblCampanyView)) {

                                                                                        echo "<tr>";
                                                                                        echo "<td>" . ++$noOfCmpny .  "</td>";
                                                                                        echo "<td>" . $row['company_id'] . "</td>";
                                                                                        echo "<td>" . $row['company_name'] . "</td>";
                                                                                        echo "<td>" . $row['supplier_name'] . "</td>";
                                                                                        $company_id = $row['company_id'];
                                                                                        echo "<td  class='text-center' >  <a   class='btn btn-outline-primary btn-sm ' id='cmpnyUpdate' data-id='$company_id' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td>
                                                                                        <td class='text-center'> <a  class='btn btn-outline-warning btn-sm' id='cmpnyDel' data-id='$company_id' value='del'> <i class='bi bi-trash3'></i></a> </td> </tr>";
                                                                                }
                                                                        }
                                                                        ?>

                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>


                        <!-- Table brand -->
                        <div class="col-12  ">

                                <div class="card border-0 ">
                                        <div class="card-header d-flex  align-items-center justify-content-between">
                                                <h5 class=""> Brands <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblBrandView); ?></h5>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brandModal">
                                                        <i class="bi bi-plus-circle "></i>
                                                </button>
                                                <!-- brand Model -->
                                                <?php include("forms/brandForm.php") ?>
                                        </div>
                                        <div class="card-body ">
                                                <div class="table-responsive rounded caption-top">

                                                        <table class="table table-hover table-bordered table-sm">
                                                                <thead class="table-dark text-center">
                                                                        <tr>
                                                                                <th scope="col" width="3%">NO</th>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">BRAND NAME</th>
                                                                                <th scope="col">COMPANY NAME</th>
                                                                                <th scope="col" colspan="2" width="10%">Action</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody id="brndTbl">
                                                                        <?php

                                                                        if (mysqli_num_rows($tblBrandView) > 0) {
                                                                                $noOfBrnd = 0;
                                                                                while ($row = mysqli_fetch_assoc($tblBrandView)) {

                                                                                        echo "<tr>";
                                                                                        echo "<td>" . ++$noOfBrnd .  "</td>";
                                                                                        echo "<td>" . $row['b_id'] . "</td>";
                                                                                        echo "<td>" . $row['brand_name'] . "</td>";
                                                                                        echo "<td>" . $row['company_name'] . "</td>";
                                                                                        $b_id = $row['b_id'];
                                                                                        echo "<td class='text-center'>  <a  class='btn btn-outline-primary btn-sm ' id='brndUpdate' data-id='$b_id' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td>
                                                                                        <td class='text-center'> <a  class='btn btn-outline-warning btn-sm' id='brndDel' data-id='$b_id' value='del'> <i class='bi bi-trash3'></i></a> </td> </tr>";
                                                                                }
                                                                        }
                                                                        ?>

                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <!-- Table catagery -->
                        <div class="col-12  ">

                                <div class="card border-0 ">
                                        <div class="card-header d-flex  align-items-center justify-content-between">
                                                <h5 class=""> Catagories <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblCatagery); ?></h5>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#catageryModal">
                                                        <i class="bi bi-plus-circle "></i>
                                                </button>
                                                <!-- catagery Modal -->
                                                <?php include("forms/catageryForm.php") ?>

                                        </div>
                                        <div class="card-body ">
                                                <div class="table-responsive rounded ">

                                                        <table class="table table-hover table-bordered table-sm">
                                                                <thead class="table-dark text-center">
                                                                        <tr>
                                                                                <th scope="col" width="3%">NO</th>
                                                                                <th scope="col">C_ID</th>
                                                                                <th scope="col">NAME</th>
                                                                                <th scope="col" colspan="2" width="10%">Action</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody id="ctgryTbl">
                                                                        <?php

                                                                        if (mysqli_num_rows($tblCatagery) > 0) {
                                                                                $noOfCtgry = 0;
                                                                                while ($row = mysqli_fetch_assoc($tblCatagery)) {

                                                                                        echo "<tr>";
                                                                                        echo "<td>" . ++$noOfCtgry .  "</td>";
                                                                                        echo "<td>" . $row['c_id'] . "</td>";
                                                                                        echo "<td>" . $row['name'] . "</td>";
                                                                                        $c_ID = $row['c_id'];
                                                                                        echo "<td class='text-center'>  <a  class='btn btn-outline-primary btn-sm ' id='ctgryUpdate' data-id='$c_ID' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td>
                                                                                        <td class='text-center'> <a  class='btn btn-outline-warning btn-sm' id='ctgryDel' data-id='$c_ID' value='del'> <i class='bi bi-trash3'></i></a> </td> </tr>";
                                                                                }
                                                                        }
                                                                        ?>

                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- Table Supplier -->
                        <div class="col-12 ">

                                <div class="card border-0 ">
                                        <div class="card-header d-flex  align-items-center justify-content-between">
                                                <h5 class=""> Suppliers <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblSupplier); ?> </span></h5>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supplierModal">
                                                        <i class="bi bi-plus-circle "></i>
                                                </button>
                                                <!-- Supplier Modal -->
                                                <?php include("forms/supplierForm.php") ?>
                                        </div>
                                        <div class="card-body ">
                                                <div class="table-responsive rounded caption-top">

                                                        <table class="table table-hover table-bordered table-sm">
                                                                <thead class="table-dark text-center">
                                                                        <tr>
                                                                                <th scope="col" width="3%">NO</th>
                                                                                <th scope="col" >ID</th>
                                                                                <th scope="col">FISRT NAME</th>
                                                                                <th scope="col">LAST NAME</th>
                                                                                <th scope="col">GENDER</th>
                                                                                <th scope="col">PHONE NO</th>
                                                                                <th scope="col">E-MAIL</th>
                                                                                <th scope="col">NIC</th>
                                                                                <th scope="col" colspan="2" width="10%">ACTION</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody id="slprTbl">
                                                                        <?php

                                                                        if (mysqli_num_rows($tblSupplier) > 0) {
                                                                                $noOfSupplier = 0;
                                                                                while ($row = mysqli_fetch_assoc($tblSupplier)) {

                                                                                        echo "<tr>";
                                                                                        echo "<td>" . ++$noOfSupplier .  "</td>";
                                                                                        echo "<td>" . $row['s_id'] . "</td>";
                                                                                        echo "<td>" . $row['f_name'] . "</td>";
                                                                                        echo "<td>" . $row['l_name'] . "</td>";
                                                                                        echo "<td>" . $row['gander'] . "</td>";
                                                                                        echo "<td>" . $row['phone_no'] . "</td>";
                                                                                        echo "<td>" . $row['email'] . "</td>";
                                                                                        echo "<td>" . $row['nic'] . "</td>";
                                                                                        $s_ID = $row['s_id'];
                                                                                        echo "<td class='text-center'>  <a  class='btn btn-outline-primary btn-sm ' id='slprUpdate' data-id='$s_ID' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td>
                                                                                        <td class='text-center'> <a  class='btn btn-outline-warning btn-sm' id='slprDel' data-id='$s_ID' value='del'> <i class='bi bi-trash3'></i></a> </td> </tr>";
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

<?php //include("forms/companyForms.php") ?>