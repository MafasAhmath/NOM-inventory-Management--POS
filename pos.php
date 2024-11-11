<section class="" id="pos">
        <?php
        include("forms/db.php");


        ?>
        <script src="js/index.js"></script>
        <script src="js/ajax.js"></script>
        <script src="./js/pos.js"></script>

        <style>
                .suggestion-box {
                        border: 1px solid #ccc;
                        max-height: 150px;
                        overflow-y: auto;
                        position: absolute;
                        z-index: 1000;
                        background: #fff;
                        display: none;
                }

                .suggestion-box div {
                        padding: 8px;
                        cursor: pointer;
                }

                .suggestion-box div:hover {
                        background: #f0f0f0;
                }

                /* Chrome, Safari, Edge, Opera */
                input::-webkit-outer-spin-button,
                input::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                }

                /* Firefox */
                input[type=number] {
                        -moz-appearance: textfield;
                }
        </style>


        <div class="container-fluid g-0">
                <div class="row">
                        <h4>POS </h4>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                        <div class="card border-0 ">
                                <div class="card-header px-1">
                                        <!-- || Product Search Form || -->
                                        <form action="" method="post" id="posSearchForm" name="posSearchFrom">
                                                <div class="container-fuild ">
                                                        <div class="row d-flex justify-content-center align-items-center g-2">
                                                                <div class="col-2 ">

                                                                        <input type="text" class="form-control form-control-sm" name="barcode" id="barcode" placeholder="Barcode" aria-label="Barcode">
                                                                        <div id="barcodeSuggestions" class="suggestion-box"></div>
                                                                </div>
                                                                <div class="col">
                                                                        <div class="input-group ">
                                                                                <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Name" aria-label="Name">
                                                                                <button type="button" class="btn btn-sm btn-outline-secondary " id="btn-clear"><i class="bi bi-x"></i></button>
                                                                        </div>
                                                                        <div id="nameSuggestions" class="suggestion-box"></div>
                                                                </div>
                                                                <div class="col-1">
                                                                        <input type="number" class="form-control form-control-sm" name="size" id="size" placeholder="size" aria-label="size" readonly>
                                                                        <!-- <span id="size" placeholder="size" hidden> </span> -->
                                                                </div>
                                                                <div class="col-1">
                                                                        <input type="number" class="form-control form-control-sm" name="unPrc" id="unPrc" placeholder="Unit Prc" aria-label="Unit Prc" readonly>
                                                                        <!-- <span name="unPrc" id="unPrc"> 0 </span> -->
                                                                </div>
                                                                <div class="col-1">
                                                                        <input type="number" class="form-control form-control-sm" name="qty" id="qty" placeholder="Qty" aria-label="Qty" value="" min="0">
                                                                </div>


                                                                <div class="col-1">
                                                                        <input type="number" class="form-control form-control-sm" name="discount" id="discount" placeholder="Discount" aria-label="Discount" value="">
                                                                </div>
                                                                <div class="col-1">
                                                                        <!-- <input type="number" class="form-control form-control-sm" placeholder="Total" aria-label="Total"> -->
                                                                        <span name="ttl" id="ttl"> 0 </span>
                                                                </div>
                                                                <div class="col-1 ">
                                                                        <span id="unitCst" placeholder="Total" > </span>
                                                                </div>
                                                                <div class="col-1 d-flax">
                                                                        <button type="button" name="prdctAdd" class="form-control btn btn-sm btn-outline-primary" placeholder="" aria-label="" value="" id="prdctAdd" disabled>
                                                                                <i class="bi bi-plus-circle"></i>
                                                                        </button>
                                                                </div>
                                                        </div>
                                                        

                                                </div>
                                        </form>
                                </div>
                                <div class="card-body px-1">
                                        <div class="row justify-content-center align-items-start g-1">
                                                <div class="col-12 col-md-9">
                                                        <div class="table-responsive rounded">
                                                                <table class="table table-hover table-bordered table-sm" id="posTbl">
                                                                        <thead class="table-dark text-center">
                                                                                <tr>
                                                                                        <th scope="col" width="5%">NO</th>
                                                                                        <th scope="col" width="auto">Barcode</th>
                                                                                        <th scope="col" width="auto">Name</th>
                                                                                        <th scope="col" width="7%">Size</th>
                                                                                        <th scope="col">Unit Prc</th>
                                                                                        <th scope="col" width="5%">Qty</th>
                                                                                        <th scope="col" width="7%">Discount</th>
                                                                                        <th scope="col" width="10%">Total</th>
                                                                                        <th scope="col " width="5%">Action</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody class=" text-center">
                                                                                <!-- script  -->
                                                                        </tbody>



                                                                </table>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                        <div class="card p-2 ">

                                                                <form action="" method="post" id="prodectTotelForm">
                                                                        <div class="container-fuild ">

                                                                                <div class="row d-flex align-items-center mb-2 ">
                                                                                        <label class="col-12 col-md-6  col-form-label col-form-label-sm ">Card Count : <span id='cardCount'></span> </label>
                                                                                        <label class="col-12 col-md-6  col-form-label col-form-label-sm">Item Qty : <span id='qtyCount'></span></label>
                                                                                </div>
                                                                                <div class="row d-flex align-items-center mb-2 ">
                                                                                        <div class="col-12 col-md-4  mx-0">
                                                                                                <label for="inputTotal" class="col-form-label col-form-label-sm">Total : </label>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-8  mx-0">
                                                                                                <input type="text" id="inputTotal" class="form-control form-control-sm" aria-describedby="TotalHelpInline">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row d-flex align-items-center mb-2 ">
                                                                                        <div class="col-12 col-md-4  mx-0">
                                                                                                <label for="inputDiscount" class="col-form-label col-form-label-sm">Discount : </label>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-8  mx-0">
                                                                                                <input type="text" id="inputDiscount" class="form-control form-control-sm" aria-describedby="DiscountTotalHelpInline">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row d-flex align-items-center mb-2 ">
                                                                                        <div class="col-12 col-md-4  mx-0">
                                                                                                <label for="inputDiscount" class="col-form-label col-form-label-sm">Discount : </label>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-8  mx-0">
                                                                                                <input type="text" id="inputDiscount" class="form-control form-control-sm" aria-describedby="DiscountTotalHelpInline">
                                                                                        </div>
                                                                                </div>

                                                                                <div class="row d-flex justify-content-center align-items-center g-2">
                                                                                        <div class="col-12">
                                                                                                <input type="text" class="form-control form-control-sm" name="barcode" id="barcode" placeholder="Barcode" aria-label="Barcode">
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                                <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Name" aria-label="Name">
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                                <input type="number" class="form-control form-control-sm" name="unPrc" id="unPrc" placeholder="Unit Prc" aria-label="Unit Prc">
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                                <input type="number" class="form-control form-control-sm" name="qty" id="qty" placeholder="Qty" aria-label="Qty">
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                                <span id="unitCst">

                                                                                                </span>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                                <button type="submit" name="prdctSubmit " class="form-control  btn btn-sm btn-outline-primary " placeholder="" aria-label="" value="" id="prdctSave"> <i class="bi bi-plus-circle"></i></button>
                                                                                        </div>
                                                                                </div>

                                                                        </div>

                                                                </form>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>


                </div>




        </div>

        <?php
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $query = $_POST['query'];
        //         $type = $_POST['type'];

        //         $searchValue = mysqli_query($con, "SELECT * product WHERE description LIKE  {$query}%' OR barcode LIKE  {$query}%'");



        // }

        ?>

</section>