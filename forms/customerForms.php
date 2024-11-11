<?php
include("forms/db.php");

if (isset($_POST['cstmr_ID'])) {
    $updateid = $_POST['cstmr_ID'];
    $sqledit = mysqli_query($con, "SELECT *from `customer` where cstmr_id='$updateid'");

    $row = mysqli_fetch_assoc($sqledit);
    $fName = $row['f_name'];
    $lName = $row['l_name'];
    $gender = $row['gander'];
    $phnNo = $row['phone'];
    $email = $row['email'];
    $desc = $row['description'];
}

?>
<!-- <script src="../js/validation.js"></script> -->

<!-- Customers Modal -->
<div class="modal fade " id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">Customers </h1>
                <button type="button" class="btn-close" id="close-cstmrMdl" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- || Customers Form || -->
            <form action="" method="post" id="cstmrForm">
                <div class=" modal-body">
                    <div class="container-fuild ">

                        <div class="row g-2">
                            <input type="hidden" name="cstmrId" id="cstmrId" value="">

                            <div class="col-12 col-sm-6  mb-sm-2 inp-grp">
                                <input type="text" name="fName" id="fName" value="" placeholder="First Name" class=" form-control" aria-label="First Name">
                                <div class="error"></div>
                            </div>
                            <div class="col-12 col-sm-6  mb-sm-2 inp-grp">
                                <input type="text" name="lName" id="lName" value="" placeholder="Last Name" class="form-control" aria-label="Last Name">
                                <div class="error"></div>
                            </div>
                            <div class="col-12   mb-sm-2 d-flex d-inline justify-content-around">

                                <label class="form-check-label" for="">
                                    Gender
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 mb-sm-2 inp-grp">
                                <input type="number" name="phnNo" id="phnNo" value="" placeholder="Phone Number" class="form-control" aria-label="Phone Number" minlength="9" maxlength="10">
                                <div class="error"></div>
                            </div>
                            <div class="col-12 col-sm-6  mb-sm-2 inp-grp">
                                <input type="text" name="email" id="email" value="" placeholder="E-mail" class="form-control" aria-label="E-mail">
                                <div class="error"></div>
                            </div>
                            <div class="col-12 ">
                                <textarea class="form-control" name="desc" id="desc" rows="3" value="" placeholder="Description" aria-label="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" name="cstmrSubmit" class="form-control btn btn-outline-primary mb-md-2 btnSubmit" placeholder="" aria-label="" value="Save" id="cstmrSave">
                    <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                </div>

            </form>
        </div>
    </div>
</div>