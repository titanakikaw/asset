<?php
require('../static_components/header.php');
?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <a href="newasset.php" class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> New Asset</a>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3" onclick="Edit()"><i class="fa-solid fa-pencil"></i> Edit Asset</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> Delete Asset</button>
            </div>
        </div>
        <div class="col-6">

        </div>
        <div class="col-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width: 100%;">
                <!-- <button class="btn btn-primary me-md-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" type="button" style="width: 100%;">Filter Search</button> -->
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
                    <th>Location</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Assigned Employee</th>
                </tr>
            </thead>
            <div class="tbody">

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
                        <input type="text" class="form-control" id="assetdteFrom" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">End Date :</span>
                        <input type="text" class="form-control" id="assetdteTo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Assigned Employee :</span>
                        <select class="form-select" id="assgnEmp">
                            <option></option>
                        </select>
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
    let assetTable = $('.asset-table').DataTable({
        searching: false,
        ordering: false,
        "ajax": {
            "url": "../clsController/asset.php",
            "type": "POST",
            "contentType": "application/x-www-form-urlencoded",
            "data": {
                "action": "getCustomTable",
            },
            "success": (data) => {
                if (data.length > 0) {
                    data.forEach(data => {
                        assetTable.row.add([
                            `<input type="checkbox" id="tbldata" value="${data['assetno']}">`,
                            `${data['assetno']}`,
                            `${data['description']}`,
                            `${data['cat_code']}`,
                            `${data['loc_code']}`,
                            `${data['dept_code']}`,
                            `${data['dtefrom']}`,
                            `${data['dteto']}`,
                            `${data['status']}`,
                            `${data['name'] ? data['name'] : 'None'}`,

                        ]).draw(false)
                    });

                }
            },
            "error": (error) => {
                console.log(error)
            }
        }
    })
    $(document).ready(() => {
        $('.filter-asset select').map((index, element) => {
            $(`#${element.id}`).select2({
                dropdownCssClass: "myFont",
                dropdownParent: $(".filter-asset")
            })
        })

        $('#assetdteFrom').datepicker({
            format: "mm-dd-yyyy"
        })
        $('#assetdteTo').datepicker({
            format: "mm-dd-yyyy"
        })

    })

    function Edit() {
        if (getCheckedValues("tbldata").length == 1) {
            window.location.href = `newasset.php?asset=${btoa(getCheckedValues("tbldata")[0])}`
        } else if (getCheckedValues("tbldata").length == 0) {
            alertify.error("Please select a asset")
        } else if (getCheckedValues("tbldata").length > 1) {
            alertify.error("One asset only should be selected")
        }
    }


    function getCheckedValues(elemIdentyId) {
        let values = [];
        let checkboxes = document.querySelectorAll(`#${elemIdentyId}`);
        checkboxes.forEach(element => {
            if (element.checked) {
                values.push(element.value)
            }
        });
        return values
    }
</script>