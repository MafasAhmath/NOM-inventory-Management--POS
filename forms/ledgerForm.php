 <!-- Ledger Modal -->
 <?php

    include("forms/db.php");

    ?>
 <div class="modal fade" id="ledgerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable ">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5 " id="exampleModalLabel">New Ledger</h1>
                 <button type="button" class="btn-close" id="close-ledgerMdl" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <!-- ||Ledger Form || -->
             <form action="" method="" id="ledgerForm">
                 <div class="modal-body">
                     <div class="container-fuild ">

                         <div class="row g-2">

                             <input type="hidden" name="ledgerId" id="ledgerId" value="">

                             <div class="col-12 col-sm-6  mb-sm-2">
                                 <input type="date" name="date" id="date" class="form-control" placeholder="Date" aria-label="Date">
                             </div>
                             <div class="col-12 col-sm-6  mb-sm-2">
                                 <input type="number" name="total" id="total" class="form-control" placeholder="Total" aria-label="Total">
                             </div>

                             <div class="col-6 mb-sm-2">
                                 <input type="number" name="credit" id="crdt" class="form-control" placeholder="Credit" aria-label="Credit">
                             </div>
                             <div class="col-6 mb-sm-2">
                                 <input type="number" name="debit" id="debit" class="form-control" placeholder="Debit" aria-label="Debit">
                             </div>
                             <div class="col-12 col-sm-6 mb-sm-2">

                                 <div class="input-group input-outline">
                                     <select class="form-select " id="inlineFormSelectPref" name="cstmrid" id="cstmrid">
                                         <option class="text-muted" selected>Customer Name</option>
                                         <?php
                                            $Cstmrdrop = mysqli_query($con, "SELECT * FROM customer");

                                            if (mysqli_num_rows($Cstmrdrop) > 0) {

                                                while ($cstmrRow = mysqli_fetch_assoc($Cstmrdrop)) {

                                                    $cstmrID = $cstmrRow['cstmr_id'];
                                                    $FLName = $cstmrID . " - " . $cstmrRow['f_name'] . " " . $cstmrRow['l_name'];

                                                    echo '<option value="' . $cstmrID . '">' . $FLName . '</option>';
                                                }
                                            }
                                            ?>
                                     </select>
                                     <button class="input-group-text" type="button" name="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#customerModal"><i class="bi bi-plus-circle"></i></button>
                                 </div>
                             </div>

                         </div>

                     </div>
                 </div>
                 <div class="modal-footer">
                     <input type="submit" name="ledgerSubmit" class="form-control btn btn-outline-primary mb-md-2" placeholder="" aria-label="" value="Save" id="ledgerSave">
                     <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!--  Modals -->
 <?php include("customerForms.php") ?>