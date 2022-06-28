<?php
require('../static_components/header.php');
?>

<div class="container-fluid" style="background-color: #f3f3f3;">
    <div class="container" style="padding: 10px;">
        <div class="row">

            <!-- Asset Information -->
            <div class="col-7">
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Asset Code :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Asset Description :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Model No :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Serial No :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                            <select class="form-select" id="dept">
                                <option selected>Open this select menu</option>
                                <option value="1">Operational</option>
                                <option value="2">Non - Operational</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
                            <select class="form-select" id="dept">
                                <option selected>Open this select menu</option>
                                <option value="1">Operational</option>
                                <option value="2">Non - Operational</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Status :</span>
                            <select class="form-select" id="status">
                                <option selected>Open this select menu</option>
                                <option value="1">Operational</option>
                                <option value="2">Non - Operational</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Purchase Date Warranty :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">End Warranty Date :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Amount :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Quantity :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Useful Lifecycle:</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p style="font-size: 10px;">Salvage Value :</p>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                By Amount
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                By Percentage
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">By Amount:</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">By Percentage:</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Accumulated Depreciation :</span>
                            <input type="text" disabled class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Net Book Value :</span>
                            <input type="text" disabled class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!--Additional Cost -->
            <div class="col">
                <div class="row">
                    <div class="col">
                        <p>Asset Additional Information</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Upload Asset Images :</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple style="font-size: 10px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-start">
                            <div class="">
                                <img src="../images/img-3785.webp" class="img-thumbnail" alt="...">
                            </div>
                            <div class="">
                                <img src="../images/img-3785.webp" class="img-thumbnail" alt="...">
                            </div>
                            <div class="">
                                <img src="../images/img-3785.webp" class="img-thumbnail" alt="...">
                            </div>
                            <div class="">
                                <img src="../images/img-3785.webp" class="img-thumbnail" alt="...">
                            </div>
                            <div class="">
                                <img src="../images/img-3785.webp" class="img-thumbnail" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end table-actions">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#impRepair" type="button" style="color: white!important;"><i class="fa-solid fa-compass-drafting" style="color: #f3f3f3!important;"></i> &nbsp;Improvement & Repairs</button>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AssignEmp" type="button" style="color: white!important;"><i class="fa-solid fa-users" style="color: #f3f3f3!important;"></i> &nbsp;Assigned Employee History</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end table-actions">
                            <button class="btn btn-success" type="button"><i class="fa-solid fa-check" style="color: white!important;"></i> &nbsp; Save Asset</button>
                            <a href="assets.php" class="btn btn-danger" type="button"><i class="fa-solid fa-ban" style="color: white!important;"></i> &nbsp; Cancel Asset</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<!-- Improvement Cost & Repair  -->
<div class="modal fade" id="impRepair" tabindex="-1" aria-labelledby="impRepairLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Improvement & Repair Cost</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <p>Addtional Cost Type :</p>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IRC" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Improvement Cost
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IRC" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Repair Cost
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Amount :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Added Useful Life :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Assign Employee -->
<div class="modal fade" id="AssignEmp" tabindex="-1" aria-labelledby="impRepairLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asset Employee Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary">Assign Employee</button>
                    </div>
                </div>
                <div class="row">
                    <table class="table assign-emp">
                        <thead>
                            <tr>
                                <th>Employee No.</th>
                                <th>Fullname</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
require('../static_components/footer.php');
?>
<script>
    $('.assign-emp').DataTable({
        searching: false
    })
</script>