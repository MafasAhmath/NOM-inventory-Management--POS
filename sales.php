<section class="" id="sales">
    <?php
    include("forms/db.php");


    ?>

    <script src="js/index.js"></script>
    <script src="js/ajax.js"></script>


    <div class="mb-3">
        <h4>Sales</h4>
    </div>
    <div class="container-fluid g-1">
        <!-- || Sales || -->
        <div class="row">
            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>Sales</h4>
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

                    <!-- ||Table Sales || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col no">NO</th>
                                        <th scope="col">Sales ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Customer Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry the Bird</td>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- || Sales details || -->
        <div class="row">
            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>Sales Details</h4>
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

                    <!-- ||Table Sales details || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col ">NO</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Sales ID</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Sale or Not</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry the Bird</td>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- || Return product || -->
        <div class="row">
            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>Returned products</h4>
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

                                    <button type="button" class="btn btn-primary mx-md-2" data-bs-toggle="modal" data-bs-target="#rtrnproductModal">
                                        <i class="bi bi-plus-circle pe-0 pe-md-2"></i><span class="d-none d-md-inline"> New </span>
                                    </button>

                                    <!-- Return product Modal -->


                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- ||Table Return product || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Return ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Customer Name</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry the Bird</td>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- || Return Details || -->
        <div class="row">
            <div class="col">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-md-4">

                                <h4>Return Details</h4>
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

                                    <button type="button" class="btn btn-primary mx-md-2" data-bs-toggle="modal" data-bs-target="#rtrndetailModal">
                                        <i class="bi bi-plus-circle pe-0 pe-md-2"></i><span class="d-none d-md-inline"> New </span>
                                    </button>

                                    <!-- Return product Modal -->


                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- ||Table Return details in || -->
                    <div class="card-body ">
                        <div class="table-responsive rounded">
                            <table class="table table-hover table-bordered table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col ">NO</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Return ID</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry the Bird</td>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Return product Modal -->
<?php include("forms/rtrndetailForm.php") ?>

<!-- Return product Modal -->
<?php include("forms/rtrnproductForm.php") ?>