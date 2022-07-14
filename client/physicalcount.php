<?php
require('../static_components/header.php');
// require('../model/clsConnection.php');
if ($settings['phc_auto'] == 1) {
    $phc_auto = "AUTO GENERATED";
    $disabled = 'disabled';
} else {
    $phc_auto = '';
    $disabled = '';
}
?>
<style>
    .select2-dropdown {
        z-index: 9999999;
    }

    span.select2-container {
        z-index: 9999999;
    }

    .reports li {
        margin: 10px 0;
    }
</style>
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
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3" onclick="edit()"><i class="fa-solid fa-pencil"></i> &nbsp; Edit Count</button>
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
                    <th>Date & Time</th>
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


<div class="offcanvas offcanvas-end filter-asset" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 500px;">
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



<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="formPHC">
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
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[phc_code]" <?php echo $disabled ?> value="<?php echo $phc_auto ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                                <select class="form-select" id="loc_new" name="data[loc_code]" style="width:100%">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from location";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            if ($value['loc_code'] == $GlobalData['loc_code']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option value='" . $value['loc_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[loc_code]">
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
                                <select class="form-select" id="dept" name="data[dept_code]" style="width:100%">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from department";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            if ($value['dept_code'] == $GlobalData['dept_code']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option value='" . $value['dept_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[dept_code]">
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Date :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[date]">
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Counted By :</span>
                                <select class="form-select" id="emp_counted" name="data[countedBy]" style="width:100%">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from employee";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            echo "<option value='" . $value['empno'] . "'  $selected >" . $value['lname'] . ", " . $value['fname'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[countedBy]"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Reviewed By :</span>
                                <select class="form-select" id="emp_reviewed" name="data[reviewedBy]" style="width:100%">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from employee";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            echo "<option value='" . $value['empno'] . "'  $selected >" . $value['lname'] . ", " . $value['fname'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[reviewedBy]"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Remarks :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[remarks]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btnclosemodal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save()">Close</button>

                    <a href="newphc.php" type="button" class="btn btn-primary" style="display: hidden;">Save</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
require('../static_components/footer.php');
?>
<script>
    $(document).ready(() => {
        $('#emp_counted').select2({

        })
        $('#emp_reviewed').select2({

        })
        $('#loc_new').select2({

        })
        $('#dept').select2({

        })
    })


    let table = $('.phc-table').DataTable({
        searching: false,
        "ajax": {
            "url": "../clsController/physicalcount.php",
            "type": "POST",
            "data": {
                "action": 'table'
            },
            "error": (error) => {
                console.log(error)
                $('.phc-table tbody').empty()
                $('.phc-table tbody').append("<tr><td colspan='8' style='text-align:center'>No Data Available</td></tr>")
            },
            "success": (data) => {

                if (data.length > 0) {
                    table.clear()
                    data.forEach((loc) => {
                        table.row.add([
                            `<input type="checkbox" id="tbldata" value="${loc['phc_code']}">`,
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

    function save() {
        let formData = $('#formPHC').serialize();
        $.ajax({
            url: "../clsController/physicalcount.php",
            type: "POST",
            data: formData + '&action=new',
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                $('.asset-table').DataTable().ajax.reload();
                if (data) {
                    $('#btnclosemodal').click();
                    $('.phc-table').DataTable().ajax.reload();
                    // window.location.href = "newphc.php"
                }
            }
        })
    }

    function edit() {
        if (getCheckedValues("tbldata").length == 1) {
            window.location.href = `newphc.php?phc=${btoa(getCheckedValues("tbldata")[0])}`
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