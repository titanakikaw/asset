<?php
require('../static_components/header.php');
require('../model/clsConnection.php');
$GlobalData['loc_code'] = '';
$GlobalData['dept_code'] ='';
$GlobalData['status_code'] = '';
$GlobalData['assetno'] = '';
$GlobalData['modelno'] = '';
$GlobalData['serialno'] = '';
$GlobalData['description'] = '';
$GlobalData['dtefrom'] = '';
$GlobalData['dteto'] = '';
$GlobalData['cost'] = '';
$GlobalData['qty'] = '';
$GlobalData['annualdep'] = '';
$GlobalData['monthlydep'] = '';
$GlobalData['salvalue'] = '';
$GlobalData['usefullife'] = '';
if(isset($_GET['asset'])){
    if (base64_decode($_GET['asset']) != '') {
        // var_dump("test");
        try {
            $dbConn = new dbConnection();
            $conn = $dbConn->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * from assets where assetno=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([base64_decode($_GET['asset'])]);
            $GlobalData = $stmt->fetch();
        } catch (\Throwable $th) {
            var_dump($th);
        
        }
    }
    
}

?>
<form id="form-asset" enctype="multipart/form-data">
    <div class="container-fluid" style="background-color: #f3f3f3;">
        <div class="container" style="padding: 10px;">
            <div class="row">
                <!-- Asset Information -->
                <div class="col-7">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                                <select class="form-select" id="location" name="data[loc_code]" style="width:100%">
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
                        </div>
                        <div class="col-6">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Status :</span>
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
                                            if ($value['status_code'] == $GlobalData['status_code']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option value='" . $value['status_code'] . "'  $selected >" . $value['description'] . "</option>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Category :</span>
                                <select class="form-select" id="cat" style="width:100%" name="data[cat_code]">
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
                                            if ($value['cat_code'] == $GlobalData['cat_code']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
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

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Asset Code :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[assetno]" id="assetno" value="<?php echo $GlobalData['assetno'] ? $GlobalData['assetno'] : '' ?>">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Asset Description :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[description]" value="<?php echo $GlobalData['assetno'] ? $GlobalData['description'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Model No :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[modelno]" value="<?php echo $GlobalData['modelno'] ? $GlobalData['modelno'] : '' ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Serial No :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[serialno]" value="<?php echo $GlobalData['serialno'] ? $GlobalData['serialno'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Purchase Date Warranty :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" id="assetdteFrom" aria-describedby="inputGroup-sizing-sm" name="data[dtefrom]" value="<?php echo $GlobalData['dtefrom'] ? $GlobalData['dtefrom'] : '' ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">End Warranty Date :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="assetdteTo" name="data[dteto]" value="<?php echo $GlobalData['dteto'] ? $GlobalData['dteto'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Amount :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[cost]" id="txtAssetAmount" onkeyup="moneyFormat(this, 'currency')" onchange="calcDep()" required value="<?php echo $GlobalData['cost'] ?  "PHP " . $GlobalData['cost'] : '' ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Quantity :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[qty]" value="<?php echo $GlobalData['qty'] ? $GlobalData['qty'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Useful Lifecycle (months):</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[usefullife]" id="txtusefullife" onkeyup="calcDep()" value="<?php echo $GlobalData['usefullife'] ? $GlobalData['usefullife'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="font-size: 10px;">Salvage Value :</p>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="byAmount" onclick="salvageValueBy()" onkeyup="calcDep()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    By Amount
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="byPercentage" onclick=" salvageValueBy(),calcDep()">
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
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="txtByAmount" onkeyup="moneyFormat(this, 'currency'),calcDep()" onchange="handleChangeMoney(this)" name="data[salvalue]" disabled required value="<?php echo $GlobalData['salvalue'] ?  "PHP " . $GlobalData['salvalue'] : '' ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">By Percentage:</span>
                                <input type="text" class="form-control" onkeyup="moneyFormat(this, 'percentage'),calcPerAmount(),calcDep()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="txtByPercent" disabled name="data[salpercent]" value="<?php echo $GlobalData['salvalue'] ?  "PHP " . $GlobalData['salpercent'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Monthly Depreciation :</span>
                                <input type="text" disabled class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="txtdepreciation" name="data[monthlydep]" value="<?php echo $GlobalData['monthlydep'] ? "PHP " . $GlobalData['monthlydep'] : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Annual Depreciation :</span>
                                <input type="text" disabled class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="txtannualdepreciation" name="data[annualdep]" value="<?php echo $GlobalData['annualdep'] ? $GlobalData['annualdep'] : '0' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <!-- <span class="input-group-text" id="inputGroup-sizing-sm">Net Book Value :</span>
                                <input type="text" disabled class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
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
                                <input class="form-control" type="file" id="formFileMultiple" multiple style="font-size: 10px;" name="data[files]" onchange="previewImages()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-evenly img-container" style="background-color: white; padding: 5px">
                                <?php
                                if($GlobalData['assetno'] != ''){
                                    try {
                                        $dbConn = new dbConnection();
                                        $conn = $dbConn->conn();
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $query = "SELECT * from asset_files where assetno =?";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute([$GlobalData['assetno']]);
                                        $db_data = $stmt->fetchAll();
                                        foreach ($db_data as $key => $value) {
                                            echo "<img src=" . $value['filename'] . " alt='img' style='height:100px'>";
                                        }
                                    } catch (\Throwable $th) {
                                        var_dump($th);
                                    }
                                }
                                
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end table-actions">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#impRepair" type="button" style="color: white!important;"><i class="fa-solid fa-compass-drafting" style="color: #f3f3f3!important;"></i> &nbsp;Improvement & Repairs</button>
                                <button class="btn btn-primary" id="assginBtn" data-bs-toggle="modal" data-bs-target="#AssignEmp" type="button" style="color: white!important;" onclick="  getEmployee()"><i class="fa-solid fa-users" style="color: #f3f3f3!important;"></i> &nbsp;Assigned Employee History</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end table-actions">
                                <button class="btn btn-success" type="button" onclick="save()"><i class="fa-solid fa-check" style="color: white!important;"></i> &nbsp; Save Asset</button>
                                <a href="assets.php" class="btn btn-danger" type="button"><i class="fa-solid fa-ban" style="color: white!important;"></i> &nbsp; Cancel Asset</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asset Employee Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-9">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee :</span>
                            <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                            <select id="selectassignemp" style="width:100%">

                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary" id="assignBtn" onclick="assignEmployee()">Assign Employee</button>
                    </div>
                </div>
                <div class="row">
                    <table class="table assign-emp">
                        <thead>
                            <tr>
                                <!-- <th>Employee No.</th> -->
                                <th>Fullname</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <td>1</td> -->
                                <td>1</td>
                                <td></td>
                                <td>Unassigned</td>
                                <td><input type="button" class="btn btn-primary" style="font-size: 11px;border-radius:3px;" value="Unassign"></td>
                            </tr>
                        </tbody>
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
    let assigntable = $('.assign-emp').DataTable({
        searching: false,
        "ajax": {
            "url": "../clsController/asset.php",
            "type": "POST",
            "contentType": "application/x-www-form-urlencoded",
            "data": {
                "action": "getAssignedEmployee",
                "assetno": `${$('#assetno').val()}`
            },
            "success": (data) => {
                let assignStatus = false;
                data.forEach((data) => {
                    let inputBtn = '';
                    if (data['status'] == "Assigned") {
                        assignStatus = true
                        inputBtn = `<input type="button" class="btn btn-primary" style="font-size: 11px;border-radius:3px;" value="Unassign">`
                    } else if (data['status'] == "Unassigned") {
                        inputBtn = `<input type="button" class="btn btn-primary" style="font-size: 11px;border-radius:3px;" value="Re-Assign">`
                    }
                    assigntable.row.add([
                        `${data['lname']}, ${data['fname']} ${data['mi']}`,
                        `${data['date']}`,
                        `${data['status']}`,
                        `${inputBtn}`,
                    ]).draw(false)
                })

                if (assignStatus) {
                    $('#assignBtn').attr("disabled", true)
                }
            },
            "error": (data) => {
                $('.assign-emp tbody').empty()
                $('.assign-emp tbody').append("<tr><td colspan='4' style='text-align:center'>No Data Available</td></tr>")
            }
        }
    })


    $(document).ready(() => {
        $('#selectassignemp').select2()
        $('#location').select2()
        $('#dept').select2()
        $('#status').select2()
        $('#cat').select2()
        $('#assetdteFrom').datepicker({
            format: "mm-dd-yyyy"
        })
        $('#assetdteTo').datepicker({
            format: "mm-dd-yyyy"
        })
    })

    function moneyFormat(field, type) {
        let originalValue = field.value
        if (type == "currency") {
            let newValue = originalValue.replace(" PHP ", '')
            let value = ''
            let decimalValue = 0
            if (newValue.indexOf(".") >= 0) {
                value = newValue.substring(0, newValue.indexOf("."))
                value = value.replace(/\D/g, '');
                decimalValue = newValue.substring(newValue.indexOf("."))
                decimalValue = decimalValue.replace(/[^.\d]/g, '');
                value += decimalValue.toString()
            } else {
                value = newValue
                value = value.replace(/\D/g, '');
            }
            field.value = " PHP " + value
        } else if (type == "percentage") {
            let originalValue = field.value
            let newVal = originalValue.replace("%", '')
            field.value = newVal + '%'
        }
    }

    function handleChangeMoney(field) {

        let originalValue = field.value
        if (originalValue.replace(" PHP ", '') == '') {
            field.value = " PHP " + 0
        } else {
            moneyFormat(field)
        }
    }

    function salvageValueBy() {
        let rds = $(":radio[name=flexRadioDefault]");
        rds.map((index, item) => {
            if (item.checked) {
                if (item.value == "byPercentage") {
                    $('#txtByAmount').attr('disabled', true)
                    $('#txtByAmount').val("")
                    $('#txtByPercent').attr('disabled', false)
                } else {
                    $('#txtByAmount').attr('disabled', false)
                    $('#txtByPercent').attr('disabled', true)
                    $('#txtByPercent').val("")
                }

            }
        })
    }

    function calcPerAmount() {
        let percentage = $('#txtByPercent').val()
        let newVal = percentage.replace("%", '')
        let assetAmount = $('#txtAssetAmount').val()
        assetAmount = parseFloat(assetAmount.replace(" PHP ", ''));
        const Amount = newVal / 100 * assetAmount;
        $('#txtByAmount').val(Amount)
        moneyFormat($('#txtByAmount')[0], "currency")
    }

    function calcDep() {
        let SalvageValue = $('#txtByAmount').val()
        let UsefulLife = $('#txtusefullife').val();
        let Depreciation = $('#txtdepreciation');
        let AnnualDepreciation = $('#txtannualdepreciation');
        let assetAmount = $('#txtAssetAmount').val()

        assetAmount = assetAmount.replace("PHP ", "")
        SalvageValue = SalvageValue.replace("PHP ", "")
        assetAmount = parseFloat(assetAmount.replace(" PHP ", ''));
        console.log(assetAmount)
        SalvageValue = parseFloat(SalvageValue.replace(" PHP ", ''));

        if (assetAmount == '') {
            assetAmount = 0
        }
        if (SalvageValue == '') {
            SalvageValue = 0
        }
        if (UsefulLife == '') {
            UsefulLife = 0
        }


        const deprecialbleCost = assetAmount - SalvageValue;
        const monthlyDepreciation = deprecialbleCost / UsefulLife;

        Depreciation.val(monthlyDepreciation)
        if (UsefulLife >= 12) {
            AnnualDepreciation.val(monthlyDepreciation * 12);
        } else {
            AnnualDepreciation.val(0);
        }

        moneyFormat($('#txtdepreciation')[0], 'currency')
        moneyFormat($('#txtannualdepreciation')[0], 'currency')
    }

    function previewImages() {
        const files = $('#formFileMultiple');
        const Images = files[0].files
        const container = $('.img-container');
        container.empty()
        Object.keys(Images).map((index) => {
            let img = Images[index];
            let newImg = document.createElement('img');
            newImg.classList = 'rounded float-start '
            newImg.style.width = "100px"
            newImg.style.height = "100px"
            newImg.style.border = "1px solid #f3f3f3"
            newImg.src = URL.createObjectURL(img)
            container.append(newImg)
        })
    }

    function getData(table, target) {
        $(`#${target}`).empty()
        $.ajax({
            url: "../clsController/asset.php",
            type: "POST",
            contentType: "application/x-www-form-urlencoded",
            data: `table=${table}&action=getdata`,
            error: (error) => {

            },
            success: (res) => {
                let data = JSON.parse(res)
                if (data.lenght != 0) {
                    data.forEach(item => {
                        $(`#${target}`).append(`<option value="${item[1]}">${item[2]}</option>`)
                    });
                }
            }
        })
    }

    function save() {
        if (checkforminput()) {
            $.ajax({
                url: "../clsController/asset.php",
                type: "POST",
                contentType: 'application/x-www-form-urlencoded',
                data: $('#form-asset').serialize() + `&data[annualdep]=${$('#txtannualdepreciation').val()}` + `&data[monthlydep]=${$('#txtdepreciation').val()}&` + getFiles() + '&action=new',
                error: (error) => {
                    console.log(error)
                },
                success: (data) => {
                    if (data) {
                        getEmployee();
                        saveImages();
                        alertify.success("Asset Saved")
                        alertify.confirm('Asset Notification', 'Would you like to assign this asset to an employee ?',
                            function() {

                                $('#assginBtn').click()

                            },
                            function() {
                                alertify.error('Cancel')
                                window.location.replace("assets.php");
                            }
                        );
                        clearInputs()
                    } else {
                        alertify.warning("Error in saving, Please check all valid fields.")
                    }

                }
            })
        }

    }

    function saveImages() {
        let images = $('#formFileMultiple').prop("files");
        let formdata = new FormData();
        for (let index = 0; index < images.length; index++) {
            formdata.append("file[]", images[index])
        }
        formdata.append('action', "saveImages")
        $.ajax({
            url: "../clsController/asset.php",
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: formdata,
            enctype: 'multipart/form-data',
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                if (data) {
                    alertify.success("Images successfully saved")
                }
            }
        })
    }

    function checkforminput() {
        let formInputs = $('#form-asset input')
        let passed = true;
        formInputs.map((index, element) => {
            if (element.type == "text") {
                if (element.id != "txtByPercent") {
                    if (element.value == '') {
                        element.style.border = ".5px solid red"
                        passed = false;
                    } else {
                        element.style.border = ".5px solid #ced4da"
                    }
                }
            }
        })
        return passed
    }

    function clearInputs() {
        let formInputs = $('#form-asset input')
        let passed = true;
        formInputs.map((index, element) => {
            if (element.type == "text") {
                element.value = ""
            }
        })
    }

    function getEmployee() {
        $('#selectassignemp').empty();
        $.ajax({
            url: "../clsController/employee.php",
            type: "POST",
            contentType: "application/x-www-form-urlencoded",
            data: `department=${$('#dept').val()}&location=${$('#location').val()}&action=getEmployee`,
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                data = JSON.parse(data)
                data.forEach(item => {
                    $('#selectassignemp').append(`<option value="${item['empno']}">${item['lname']}, ${item['fname']} ${item['mi']}</option>`)
                });
            }
        })
    }

    function getFiles() {
        let formfiles = $('#formFileMultiple')[0].files;
        let queryFile = '';

        for (let index = 0; index < formfiles.length; index++) {
            if (queryFile != '') {
                queryFile += '&'
            }
            queryFile += `file[${index}]=${formfiles[index].name}`

        }
        return (queryFile)
    }

    function assignEmployee() {
        if ($('#assetno').val() != '') {
            $.ajax({
                url: "../clsController/asset.php",
                type: 'POST',
                data: `data[empno]=${$('#selectassignemp').val()}&data[assetno]=${$('#assetno').val()}&action=assignemployee`,
                error: (error) => {
                    console.log(error)
                },
                success: (data) => {
                    if (data) {
                        alertify.success("Successfully assigned employee!")
                        $('.assign-emp').DataTable().ajax.reload();
                    }
                }
            })
        } else {
            alertify.error("Asset Code is Empty")
        }
    }
    // getData("department", "dept")
    // getData("status", "status")
    // // getData("category", "cat")
    // getData("location", "location")
    // getData("employee","assignemp")
</script>