<?php
include("forms/db.php");



?>
<!-- catagery Modal -->
<div class="modal fade" id="catageryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">New Catagory</h1>
                <button type="button" class="btn-close" id="close-ctgryMdl" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- ||catagery Form || -->
            <form action="" method="post" id="ctgryForm">
                <div class="modal-body">
                    <div class="container-fuild ">
                        <div class="row g-2">
                            <input type="hidden" name="ctgtyId" id="ctgtyId" value="">
                            <div class="col-12 inp-grp">
                                <input type="text" name="ctgtyname" id="ctgtyname" class="form-control" placeholder="Name" aria-label="Name">
                                <div class="error"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="ctgtySubmit" class="form-control btn btn-outline-primary mb-md-2 btnSubmit" placeholder="" aria-label="" value="Save" id="ctgtySave">
                    <button type="reset" class="form-control btn btn-outline-secondary " placeholder="" aria-label=""> Clear </button>
                </div>
            </form>
        </div>
    </div>
</div>