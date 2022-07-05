<?php
require('../static_components/header.php');
?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">

        </div>
    </div>
</div>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> &nbsp; New Count</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-pencil"></i> &nbsp; Edit Count</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> &nbsp; Delete Count</button>
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
        <table class="table phc-table" style="background-color: white;">
            <thead style="background: #f3f3f3;">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>PHC Code</th>
                    <th>Department</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Encoded By</th>
                    <th>Reviewed By</th>
                    <th>Remarks</th>
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
                        <span class="input-group-text" id="inputGroup-sizing-sm">PHC Code :</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                        <select class="form-select" id="location">
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
                    <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
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
                        <span class="input-group-text str-date" id="inputGroup-sizing-sm">Date :</span>
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



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Physical Count Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">PHC Code :</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
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
                            <span class="input-group-text" id="inputGroup-sizing-sm">Date :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Reviewed By :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Reviewed By :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="newphc.php" type="button" class="btn btn-primary">Save</a>
            </div>
        </div>
    </div>
</div>
<?php
require('../static_components/footer.php');
?>
<script>
    let table = $('.phc-table').DataTable({
        searching: false,
        "ajax" : {
            "url" : "../clsController/physicalcount.php",
            "type" : "POST",
            "data" : "",
            "error" : (error) => {
                $('.phc-table tbody').empty()
                $('.phc-table tbody').append("<tr><td colspan='8' style='text-align:center'>No Data Available</td></tr>")
            },
            "success" : (data) => {
                if(data.length > 0 ){
                    table.clear()
                    data.forEach((loc) => {
                        table.row.add([
                            `<input type="checkbox" id="tbldata" value="${loc['cat_code']}">`,
                            `${loc['phc_code']}`,
                            `${loc['loc_code']}`,
                            `${loc['dept_code']}`,
                            `${loc['date']}`,
                            `${loc['countedBy']}`,
                            `${loc['reviewedBy']}`,
                            `${loc['remarks']}`,
                        ]).draw(false)
                    })
                }
            }
        }
    })
</script>