<?php
require('../static_components/header.php');
require('../model/clsConnection.php');
?>

<div class="reports container" style="margin-top:1rem; padding: 5px;">
    <h4>REPORTS</h4>
    <hr>
    <ul>
        <li>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Asset Report
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Asset Report By Assignment
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Asset Report By Additional Cost
            </button>
        </li>
        <li>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Physical Count
            </button>
        </li>
    </ul>
</div>
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="assetReport">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asset Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p style=" letter-spacing:1px; text-transform:uppercase">Warranty</p>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Start Date :</span>
                                <input type="text" class="form-control" id="dteFrom" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[dteFrom]">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">End Date :</span>
                                <input type="text" class="form-control" id="dteTo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[dteTo]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p style=" letter-spacing:1px;text-transform:uppercase">CATEGORY</p>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">[ FROM ] :</span>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                <select class="form-select" id="cat_from" style="width:100%" name="data[cat_code_from]">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from category";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            echo "<option value='" . $value['cat_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">[ TO ] :</span>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                <select class="form-select" id="cat_to" style="width:100%" name="data[cat_code_to]">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from category";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            echo "<option value='" . $value['cat_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p style=" letter-spacing:1px;text-transform:uppercase">Department</p>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">[ FROM ] :</span>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                <select class="form-select" id="dept_from" name="data[dept_code_from]" style="width:100%">
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
                                            echo "<option value='" . $value['dept_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">[ TO ] :</span>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                <select class="form-select" id="dept_to" name="data[dept_code_to]" style="width:100%">
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

                                            echo "<option value='" . $value['dept_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p style=" letter-spacing:1px;text-transform:uppercase">Location</p>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">[ FROM ] :</span>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                <select class="form-select" id="location_from" name="data[loc_code_from]" style="width:100%">
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

                                            echo "<option value='" . $value['loc_code'] . "'  >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">[ TO ] :</span>
                                <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                <select class="form-select" id="location_to" name="data[loc_code_to]" style="width:100%">
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

                                            echo "<option value='" . $value['loc_code'] . "'>" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p style=" letter-spacing:1px;text-transform:uppercase">STATUS</p>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <select class="form-select" id="status" name="data[status_code]" style="width:100%">
                                    <?php
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from status";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            echo "<option value='" . $value['status_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="generateAsset()">Generate Report</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require('../static_components/footer.php');
?>
<script>
    $('#dteFrom').datepicker({
        format: "mm-dd-yyyy"
    })
    $('#dteTo').datepicker({
        format: "mm-dd-yyyy"
    })
    $(document).ready(() => {
        let selectElements = document.querySelectorAll("select")
        selectElements.forEach((element) => {
            $(`#${element.id}`).select2({
                // tags: true,
                dropdownParent: $('#exampleModal')
            })
        })
    })

    function generateAsset() {
        let a = document.createElement('a');
        a.href = `../reports/asset.php?${$('#assetReport').serialize()}`;
        a.target = "_blank";
        a.click();
    }
</script>