<?php
require('../static_components/header.php');
?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> New Asset</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-pencil"></i> Edit Asset</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> Delete Asset</button>
            </div>
        </div>
        <div class="col-6">

        </div>
        <div class="col-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width: 100%;">
                <button class="btn btn-primary me-md-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" type="button" style="width: 100%;">Filter Search</button>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">
    <div class="container">
        <table class="table asset-table" style="background-color: white;">
            <thead style="background: #f3f3f3;">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Asset Code</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Assigned Employee</th>
                </tr>
            </thead>
            <div class="tbody">
                <tr>
                    <td><input type="checkbox"></td>
                    <td>test</td>
                    <td>test</td>
                    <td>tesasdsadt</td>
                    <td>tesasdsadt</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                </tr>
            </div>
        </table>
    </div>

</div>

<div class="offcanvas offcanvas-end filter-asset" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 500px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Filter Asset</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container" style="margin-top:1rem; padding: 5px;">
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
                <div class="col-6">
                    <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Category :</span>
                        <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                        <select class="form-select" id="category">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Type :</span>
                        <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                        <select class="form-select" id="type">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                        <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                        <select class="form-select" id="location">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
                        <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                        <select class="form-select" id="department">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text str-date" id="inputGroup-sizing-sm">Start Date :</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">End Date :</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Assigned Employee :</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-grid gap-2 d-md-block-end">
                        <button class="btn btn-success" type="button">Search</button>
                        <button class="btn btn-primary" type="button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('../static_components/footer.php');
?>

<script>
    $(document).ready(() => {
        $('.asset-table').DataTable({
            searching: false,
            ordering: false,
            select: true
        })


        $('.filter-asset select').map((index, element) => {
            $(`#${element.id}`).select2({
                dropdownCssClass: "myFont",
                dropdownParent: $(".filter-asset")
            })
        })
        $('.str-date').datePicker()
    })
</script>