 <!--New Product Modal -->
 <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable ">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5 " id="exampleModalLabel">New Product</h1>
                 <button type="button" class="btn-close" id="close-prdctMdl" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <!-- || Form || -->
             <form action="" method="post" id="prdctFrom">
                 <div class="modal-body">
                     <div class="container-fuild ">
                         <div class="row g-2">
                             <div class="col-12 col-sm-6  mb-sm-2 inp-grp">
                                 <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" aria-label="Barcode">
                                 <div class="error"></div>
                             </div>
                             <div class="col-12 col-sm-6  mb-sm-2 inp-grp">
                                 <input type="text" class="form-control" name="prdctName" id="prdctName" placeholder="Name" aria-label="Name">
                                 <div class="error"></div>
                             </div>
                             <div class="col-12 col-sm-6 mb-sm-2 inp-grp">

                                 <div class="input-group input-outline">
                                     <select class="form-select " name="cmpnyId" id="cmpnyId">
                                         <option class="text-muted" selected>Campany</option>
                                         <?php
                                            $Cmpnydrop = mysqli_query($con, "SELECT * FROM company");

                                            if (mysqli_num_rows($Cmpnydrop) > 0) {

                                                while ($row = mysqli_fetch_assoc($Cmpnydrop)) {

                                                    $company_id = $row['company_id'];
                                                    $cmpnyName = $company_id . " - " . $row['name'];

                                                    echo '<option value="' . $company_id . '" data-cmpnyname="' . $row['name'] . '" >' . $cmpnyName . '</option>';
                                                }
                                            }
                                            ?>
                                     </select>
                                     <button class="input-group-text" type="button" name="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#companyModal"><i class="bi bi-plus-circle"></i></button>
                                 </div>
                                 <div class="error"></div>
                             </div>
                             <div class="col-12 col-sm-6 mb-sm-2 inp-grp">

                                 <div class="input-group input-outline">
                                     <select class="form-select " name="brndId" id="brndId">
                                         <option class="text-muted" selected>Brand</option>
                                         <?php
                                            $Brnddrop = mysqli_query($con, "SELECT * FROM brand");

                                            if (mysqli_num_rows($Brnddrop) > 0) {

                                                while ($row = mysqli_fetch_assoc($Brnddrop)) {

                                                    $b_id = $row['b_id'];
                                                    $brndName = $b_id . " - " . $row['name'];

                                                    echo '<option value="' . $b_id . '" data-brndname="' . $row['name'] . '">' . $brndName . '</option>';
                                                }
                                            }
                                            ?>
                                     </select>
                                     <button class="input-group-text" type="button" name="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#brandModal"><i class="bi bi-plus-circle"></i></button>
                                 </div>
                                 <div class="error"></div>
                             </div>
                             <div class="col-12 col-sm-6  mb-sm-2 inp-grp">
                                 <div class="input-group input-outline">
                                     <select class="form-select " name="ctgryId" id="ctgryId">
                                         <option class="text-muted" selected>Category</option>
                                         <?php
                                            $Ctgrydrop = mysqli_query($con, "SELECT * FROM category");

                                            if (mysqli_num_rows($Ctgrydrop) > 0) {

                                                while ($row = mysqli_fetch_assoc($Ctgrydrop)) {

                                                    $c_id = $row['c_id'];
                                                    $ctgryName = $c_id . " - " . $row['name'];

                                                    echo '<option value="' . $b_id . '" data-ctgryname="' . $row['name'] . '">' . $ctgryName . '</option>';
                                                }
                                            }
                                            ?>
                                     </select>
                                     <button class="input-group-text" type="button" name="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#catageryModal"><i class="bi bi-plus-circle"></i></button>
                                 </div>
                                 <div class="error"></div>
                             </div>
                             <div class="col-6 mb-sm-2 inp-grp">
                                 <input type="number" class="form-control" name="size" id="size" placeholder="size" aria-label="size">
                                 <div class="error"></div>
                             </div>
                             <div class="col-6 mb-sm-2 inp-grp">
                                 <input type="number" class="form-control" name="unCst" id="unCst" placeholder="Unit Cost" aria-label="Unit Cost">
                                 <div class="error"></div>
                             </div>
                             <div class="col-6 mb-sm-2 inp-grp">
                                 <input type="number" class="form-control" name="unPrc" id="unPrc" placeholder="Unit Prc" aria-label="Unit Prc">
                                 <div class="error"></div>
                             </div>
                             <div class="col-12 mb-sm-2 inp-grp">
                                 <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" aria-label="Qty">
                                 <div class="error"></div>
                             </div>
                             <div class="col-12 inp-grp">
                                 <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Description" aria-label="Description"></textarea>
                                 <div class="error"></div>
                             </div>

                         </div>

                     </div>
                 </div>
                 <div class="modal-footer">
                     <input type="submit" name="prdctSubmit" class="form-control btn btn-outline-primary mb-md-2 btnSubmit" placeholder="" aria-label="" value="Save" id="prdctSave">
                     <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                 </div>
             </form>
             <script>
                 $(document).ready(function() {
                     const prdctFrom = document.querySelector('#prdctFrom');
                     const nameInput = prdctFrom.querySelector('#prdctName');
                     const cmpnyId = prdctFrom.querySelector('#cmpnyId');
                     const brndId = prdctFrom.querySelector('#brndId');
                     const ctgryId = prdctFrom.querySelector('#ctgryId');
                     const desc = prdctFrom.querySelector('#desc');
                     let name = '';
                     let cmpnyname = '';
                     let brndname = '';
                     let ctgryname = '';

                     function getIndex(selection) {
                         const selectedOption = selection.options[selection.selectedIndex];
                         return selectedOption ? selectedOption.dataset : {};
                     }
                     prdctFrom.addEventListener('mouseover', function() {
                         name = nameInput.value;
                     });
                     prdctFrom.addEventListener('mouseover', function() {
                         cmpnyname = getIndex(cmpnyId).cmpnyname;
                     });
                     prdctFrom.addEventListener('mouseover', function() {
                         brndname = getIndex(brndId).brndname;
                     });
                     prdctFrom.addEventListener('mouseover', function() {
                         ctgryname = getIndex(ctgryId).ctgryname;
                     });

                     $(nameInput).add(cmpnyId).add(brndId).add(ctgryId).on('change mouseover', function() {
                         desc.value = name + '-' + ctgryname + '-' + brndname + '-' + cmpnyname;
                     });
                 });
             </script>
         </div>
     </div>
 </div>

 <!--  Modals -->
 <?php include("companyForms.php"); 
    ?>
 <?php include("brandForm.php"); 
    ?>
 <?php include("catageryForm.php"); 
    ?>