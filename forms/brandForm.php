<!-- brand Model -->
<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">New Brand</h1>
                <button type="button" class="btn-close" id="close-brndMdl" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- ||brand Form || -->
            <form action="" method="post" id="brndForm">
                <div class="modal-body">
                    <div class="container-fuild ">
                        <div class="row g-2">
                            <input type="hidden" name="brndId" id="brndId" value="">
                            <div class="col-12 inp-grp">
                                <input type="text" class="form-control" name="brndname" id="brndname" placeholder="Name" value="">
                                <div class="error"></div>
                            </div>

                            <div class="col-12 inp-grp">

                                <div class="input-group input-outline">
                                    <select class="form-select " name="cmpnyId" id="cmpnyId">
                                        <option class="text-muted" selected>Company Name</option>
                                        <?php
                                        $Cmpnydrop = mysqli_query($con, "SELECT * FROM company");

                                        if (mysqli_num_rows($Cmpnydrop) > 0) {

                                            while ($row = mysqli_fetch_assoc($Cmpnydrop)) {

                                                $company_id = $row['company_id'];
                                                $cmpnyName = $company_id . " - " . $row['name'];

                                                echo '<option value="' . $company_id . '" data-cmpnyname="' . $row['name'] . '">' . $cmpnyName . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button class="input-group-text" type="button" name="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#companyModal"><i class="bi bi-plus-circle"></i></button>
                                </div>
                                <div class="error"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="cmpnySubmit" class="form-control btn btn-outline-primary mb-md-2 btnSubmit" placeholder="" aria-label="" value="Save" id="brndSave">
                    <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  Modals -->
<?php include("companyForms.php") ?>