<!-- <script src="../js/ajax.js"></script> -->
<!-- Supplier Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">New Supplier</h1>
                <button type="button" class="btn-close" id="close-splrMdl" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- ||Supplier Form || -->
            <form action="" method="post" id="supplierForm">
                <div class="modal-body">
                    <div class="container-fuild ">
                        <div class="row g-2">
                            <input type="hidden" name="slprId" id="slprId" value="">

                            <div class="col-12 inp-grp">
                                <input type="text" class="form-control" name="fName" id="fName" placeholder="First Name" aria-label="First Name">
                                <div class="error"></div>
                            </div>
                            <div class="col-12 inp-grp">
                                <input type="text" class="form-control" name="lName" id="lName" placeholder="Last Name" aria-label="Last Name">
                                <div class="error"></div>
                            </div>
                            <div class="col-12   mb-sm-2 d-flex d-inline justify-content-around align-items-center">
                                <?php ?>
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
                            <div class="col-12 inp-grp">
                                <input type="number" class="form-control" name="phnNo" id="phnNo" placeholder="Phone Number" aria-label=" Phone Number">
                                <div class="error"></div>
                            </div>
                            <div class="col-12 inp-grp">
                                <input type="mail" class="form-control" name="email" id="email" placeholder="E-Mail" aria-label="E-Mail">
                                <div class="error"></div>
                            </div>

                            <div class="col-12 inp-grp">
                                <input type="text" class="form-control " name="nic" id="nic" placeholder="NIC" aria-label="NIC">
                                <div class="error"></div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="slprSubmit" class="form-control btn btn-outline-primary mb-md-2 btnSubmit" placeholder="" aria-label="" value="Save" id="slprSave">
                    <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                </div>
            </form>
        </div>
    </div>
</div>