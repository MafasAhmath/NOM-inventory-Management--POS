<section class="" id="credit">
    <?php

    // include('functions/table.php');


    include("forms/db.php");

    $tblCstmr = mysqli_query($con, "SELECT * FROM customer");

    $tblledgerview = mysqli_query($con, "SELECT * FROM ledgerview");


    ?>

    <script src="js/index.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/validation.js"></script>
    <link rel="stylesheet" href="css/validation.css">

    <div class="mb-3">
        <h4>credit</h4>
    </div>

    <div class="container-fuild g-1">

        <!-- || ledger || -->
        <div class="row">
            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>Ledger <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblledgerview); ?> </span></h4>
                            </div>
                            <!-- || Search || -->
                            <div class="col-10 col-md-4  ">
                                <form action="" method="" class="d-flex " enctype="multipart/form-data">
                                    <div class="input-group input-outline ">

                                        <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                                        <button class="input-group-text" type="submit" name="search"><i class="bi bi-search"></i></button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-2 col-md-4 my-2 my-md-0 d-flex  align-items-center justify-content-end">

                                <div class="">

                                    <button type="button" class="btn btn-primary mx-md-2" data-bs-toggle="modal" data-bs-target="#ledgerModal">
                                        <i class="bi bi-plus-circle pe-0 pe-md-2"></i><span class="d-none d-md-inline"> New </span>
                                    </button>

                                    <!-- Ledger Modal -->
                                    <?php include("forms/ledgerForm.php") ?>

                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- ||Table Ledger || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col">NO</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col" colspan="2" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ledgerTbl">
                                    <!--|| display in table ||-->

                                    <?php


                                    if (mysqli_num_rows($tblledgerview) > 0) {
                                        $noOfLedger = 0;
                                        while ($row = mysqli_fetch_assoc($tblledgerview)) {

                                            echo "<tr>";
                                            echo "<td>" . ++$noOfLedger .  "</td>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>" . $row['total'] . "</td>";
                                            echo "<td>" . $row['credit'] . "</td>";
                                            echo "<td>" . $row['debit'] . "</td>";
                                            echo "<td>" . $row['full_name'] . "</td>";
                                            //echo "<td>" . $row['description'] . "</td>";
                                            $ledgerID = $row['id'];
                                            echo "<td class='text-center'>  <a  class='btn btn-outline-primary btn-sm ' id='ledgerUpdate' data-id='$ledgerID' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td> 
                                            <td class='text-center'> <a  class='btn btn-outline-warning btn-sm' id='ledgerDel' data-id='$ledgerID' value='del'> <i class='bi bi-trash3'></i></a> </td>
                                            </tr>";
                                            //href = 'index.php?cstmr_ID=$cstmrID'
                                            //href = 'forms/formHandle.php?cstmr_ID=$cstmrID'
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

        <!-- || Customer || -->

        <div class="row ">
            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4 d-flex align-items-center ">

                                <h4>Customers <span class="badge text-bg-info"><?php echo mysqli_num_rows($tblCstmr); ?> </span></h4>
                                <!-- <a class="btn" onclick="cstmtRefresh(event)"><i class="bi bi-arrow-clockwise"></i></a> -->
                            </div>
                            <!-- || Search || -->
                            <div class="col-10 col-md-4  ">
                                <form action="" method="" class="d-flex " enctype="multipart/form-data">
                                    <div class="input-group input-outline ">

                                        <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                                        <button class="input-group-text" type="submit" name="search"><i class="bi bi-search"></i></button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-2 col-md-4 my-2 my-md-0 d-flex  align-items-center justify-content-end">

                                <div class="">

                                    <button type="button" class="btn btn-primary mx-md-2" data-bs-toggle="modal" data-bs-target="#customerModal">
                                        <i class="bi bi-plus-circle pe-0 pe-md-2"></i><span class="d-none d-md-inline"> New </span>
                                    </button>

                                    <!-- Customers Modal -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ||Table Customer || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark ">
                                    <tr class="text-center">
                                        <th scope="col">NO</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">GENDER</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col"> E-Mail </th>
                                        <th scope="col">Description</th>
                                        <th scope="col" colspan="2" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cstmrTbl">
                                    <!--|| display in table ||-->

                                    <?php


                                    if (mysqli_num_rows($tblCstmr) > 0) {
                                        $noOfCstmr = 0;
                                        while ($row = mysqli_fetch_assoc($tblCstmr)) {

                                            echo "<tr>";
                                            echo "<td>" . ++$noOfCstmr .  "</td>";
                                            echo "<td>" . $row['cstmr_id'] . "</td>";
                                            echo "<td>" . $row['f_name'] . "</td>";
                                            echo "<td>" . $row['l_name'] . "</td>";
                                            echo "<td>" . $row['gander'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            $cstmrID = $row['cstmr_id'];
                                            echo "<td class='text-center'>  <a  class='btn btn-outline-primary btn-sm ' id='cstmrUpdate' data-id='$cstmrID' value='edit'> <i class='bi bi-pencil-square' ></i></a> </td> 
                                            <td class='text-center'> <a  class='btn btn-outline-warning btn-sm' id='cstmrDel' data-id='$cstmrID' value='del'> <i class='bi bi-trash3'></i></a> </td>
                                            </tr>";
                                            //href = 'index.php?cstmr_ID=$cstmrID'
                                            //href = 'forms/formHandle.php?cstmr_ID=$cstmrID'
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
<?php //include("supplierForm.php") 
?>
<?php //include("forms/customerForms.php") 
?>