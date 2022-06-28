<?php
require('../static_components/header.php');
?>

<div class="container-fluid" style="background-color: #f3f3f3;">
    <div class="container" style="padding: 10px;">
        <div class="row">
            <div class="col-6">
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
                            <span class="input-group-text" id="inputGroup-sizing-sm">Branch :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
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
                    <div class="col-6">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Status :</span>
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
                            <button class="btn btn-primary" type="button" style="color: white!important;"><i class="fa-solid fa-compass-drafting" style="color: #f3f3f3!important;"></i> &nbsp;Add Improvement & Repairs</button>
                            <button class="btn btn-primary" type="button" style="color: white!important;"><i class="fa-solid fa-users" style="color: #f3f3f3!important;"></i> &nbsp;Assign Employee</button>
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

<?php
require('../static_components/footer.php');
?>