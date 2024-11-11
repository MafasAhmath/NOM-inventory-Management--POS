 <!--rtrndetailForm Modal -->
 <div class="modal fade" id="rtrndetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5 " id="exampleModalLabel">Return prodect Details</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <!-- || Form || -->
             <form action="" method="">
                 <div class="modal-body">
                     <div class="container-fuild ">
                         <div class="col-12  mb-2">

                             <div class="input-group input-outline">
                                 <select class="form-select " id="inlineFormSelectPref">
                                     <option class="text-muted" selected>Return ID</option>
                                     <?php
                                        $rtnIddrop = mysqli_query($con, "SELECT * FROM returnproduct");

                                        if (mysqli_num_rows($rtnIddrop) > 0) {

                                            while ($row = mysqli_fetch_assoc($rtnIddrop)) {

                                                $return_id = $row['return_id'];
                                                //$FLName = $cstmrID . " - " . $cstmrRow['f_name'] . " " . $cstmrRow['l_name'];

                                                echo '<option value="' . $return_id . '">' . $return_id . '</option>';
                                            }
                                        }
                                        ?>
                                 </select>
                                 <button class="input-group-text" type="" name="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#rtrnproductModal"><i class="bi bi-plus-circle"></i></button>
                             </div>
                         </div>

                         <div class="col-12   mb-2">
                             <input type="date" class="form-control" placeholder="Barcode" aria-label="Barcode">
                         </div>
                         <div class="col-12 mb-2">
                             <input type="number" class="form-control" placeholder="Qty" aria-label="Qty">
                         </div>



                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="form-control btn btn-outline-primary mb-md-2" placeholder="" aria-label=""> Save</button>
                     <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!--  Modals -->
 <?php include("rtrnproductForm.php") ?>