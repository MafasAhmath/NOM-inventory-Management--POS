 <!-- Company Modal -->
 <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5 " id="companyModalLabel">New Company</h1>
                 <button type="button" class="btn-close" id="close-cmpnyMdl" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <!-- ||Company Form || -->
             <form action="" method="post" id="cmpnyForm">
                 <div class="modal-body">
                     <div class="container-fuild ">

                         <div class="row g-2 ">
                             <input type="hidden" name="cmpnyId" id="cmpnyId" value="">
                             <div class="col-12 inp-grp">
                                 <input type="text" class="form-control" name="cmpnyname" id="cmpnyname" placeholder="Name" aria-label="TNameotal">
                                 <div class="error"></div>
                             </div>


                             <div class="col-12 inp-grp">

                                 <div class="input-group input-outline ">
                                     <select class="form-select " name="supplierId" id="supplierId">
                                         <option class="text-muted" selected>Supplier Name</option>
                                         <?php
                                            $Splrdrop = mysqli_query($con, "SELECT * FROM supplier");

                                            if (mysqli_num_rows($Splrdrop) > 0) {

                                                while ($row = mysqli_fetch_assoc($Splrdrop)) {

                                                    $s_ID = $row['s_id'];
                                                    $idFLName = $s_ID . " - " . $row['f_name'] . " " . $row['l_name'];
                                                    $FLName = $row['f_name'] . ' ' . $row['l_name'];

                                                    echo '<option value="' . $s_ID . '" data-suppliername="' . $FLName . '">' . $idFLName . '</option>';
                                                }
                                            }
                                            ?>
                                     </select>
                                     <button class="input-group-text" type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#supplierModal"><i class="bi bi-plus-circle"></i></button>
                                 </div>
                                 <div class="error"></div>
                             </div>

                         </div>

                     </div>
                 </div>
                 <div class="modal-footer">
                     <input type="submit" name="cmpnySubmit" class="form-control btn btn-outline-primary mb-md-2 btnSubmit" placeholder="" aria-label="" value="Save" id="cmpnySave">
                     <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal -->

 <?php include("supplierForm.php") ?>