<?php
require('../static_components/header.php');
ob_start();

if (count($_GET) == 0) {
    echo '<script>window.location.href="physicalcount.php"</script>';
}

?>
<div class="container" style="margin-top: 1rem;background-color:#f3f3f3; padding:1rem;">
    <div class="row">
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">PHC Code :</span>
                <input type="text" class="form-control" aria-label="Sizing example input" id="phc_code" aria-describedby="inputGroup-sizing-sm" disabled value="<?php echo base64_decode($_GET['phc']) ?>">
            </div>
        </div>

        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Date :</span>
                <input type="text" class="form-control" id="dte" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Reviewed By:</span>
                <input type="text" class="form-control" aria-label="Sizing example input" id="checkedBy" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Location:</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled id="location">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Department:</span>
                <input type="text" class="form-control" aria-label="Sizing example input" id="department" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>

        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"> Counted By :</span>
                <input type="text" class="form-control" id="countedby" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"> Remarks :</span>
                <input type="text" class="form-control" id="remarks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-success" onclick="save()"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Save</button>
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-ban"></i> &nbsp; Back</button>
            </div>
        </div>

    </div>
</div>
<div class="container" style=" padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3" onclick=" getAssetTable()"><i class="fa-solid fa-plus"></i> &nbsp; Add Asset</button>
                <button class="btn" type="button" onclick="deleteAsset()" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> &nbsp; Delete</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> &nbsp; Import File</button>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="container" style="background-color:#f3f3f3">
        <table class="table asset-table-final" style="background-color: white;">
            <thead style="background: #f3f3f3;">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Asset Code</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <div class="tbody">

            </div>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Department Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table asset-table" style="width: 100%; ">
                        <thead style="background-color: #f3f3f3;">
                            <tr>
                                <td><input type="checkbox"></td>
                                <th>Asset Code</th>
                                <th>Asset Description</th>
                                <th>Category Code</th>
                                <th>Quantity</th>
                                <th>Counted Asset</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>test123</td>
                                <td>test123asd</td>
                                <td>test</td>
                                <td> 12</td>
                                <td> <input type="text" style="font-size: 10px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>test123</td>
                                <td>test123asd</td>
                                <td>test</td>
                                <td>11</td>
                                <td> <input type="text" style="font-size: 10px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCloseAssetModal">Close</button>
                <button type="button" class="btn btn-primary" onclick="importAsset()">Add asset</button>
            </div>
        </div>
    </div>
</div>


<?php
require('../static_components/footer.php');
?>
<script>
    let currentTable = $('.asset-table-final').DataTable({
        searching: false,
        ordering: false,
        select: true,
        "ajax": {
            "url": "../clsController/physicalcount.php",
            "type": "POST",
            "data": {
                "phc_code": $('#phc_code').val(),
                "action": "getPhcAssets"
            },
            "error": (error) => {
                $('.asset-table-final tbody').empty()
                $('.asset-table-final tbody').append("<tr><td colspan='5' style='text-align:center'>No Data Available</td></tr>")
            },
            "success": (data) => {
                currentTable.clear();
                if (data.length > 0) {
                    data.forEach((asset) => {
                        currentTable.row.add([
                            `<input type="checkbox" id="tbldata" value="${asset['master_id']}">`,
                            `<p id="assetno">${asset['assetno']}<p>`,
                            `${asset['description']}`,
                            `${asset['cat_code']}`,
                            `${asset['qty']}`
                        ]).draw(false)
                    })
                } else {
                    $('.asset-table-final tbody').empty()
                    $('.asset-table-final tbody').append("<tr><td colspan='5' style='text-align:center'>No Data Available</td></tr>")
                }

            }
        }
    })


    $.ajax({
        url: "../clsController/physicalcount.php",
        type: "POST",
        contentType: "application/x-www-form-urlencoded",
        data: `phc_code=${$('#phc_code').val()}&action=getAllData`,
        error: (error) => {
            console.log(error)
        },
        success: (data) => {
            data = JSON.parse(data)
            $('#dte').val(data['date'])
            $('#countedby').val(data['countedBy'])
            $('#checkedBy').val(data['reviewedBy'])
            $('#location').val(data['loc_code'])
            $('#department').val(data['dept_code'])
            $('#remarks').val(data['remarks'])
        }
    })

    function getAssetTable() {
        let assets = ''
        document.querySelectorAll('#assetno').forEach(element => {
            if (assets != '') {
                assets += ',';
            }
            assets += `${element.innerText}`
        });
        destroyDatatable()
        let assetTable = $('.asset-table').DataTable({
            ordering: false,
            select: true,
            "ajax": {
                "url": "../clsController/physicalcount.php",
                "type": "POST",
                "data": {
                    "assets": `${assets}`,
                    "loc_code": `${$('#location').val()}`,
                    "dept_code": `${$('#department').val()}`,
                    "action": "availableAsset",
                },
                "error": (error) => {
                    $('.asset-table tbody').empty()
                    $('.asset-table tbody').append("<tr><td colspan='6' style='text-align:center'>No Data Available</td></tr>")
                },
                "success": (data) => {
                    if (data.length > 0) {
                        data.forEach((asset) => {
                            assetTable.row.add([
                                `<input type="checkbox" id="assetTableData" value="${asset['assetno']}">`,
                                `${asset['assetno']}`,
                                `${asset['description']}`,
                                `${asset['cat_code']}`,
                                `<p id="assetqty">${asset['qty']}</p>`,
                                `<input type="number" min="0" oninput="this.value = Math.abs(this.value)">`
                            ]).draw(false)
                        })
                    } else {
                        $('.asset-table tbody').empty()
                        $('.asset-table tbody').append("<tr><td colspan='6' style='text-align:center'>No Data Available</td></tr>")
                    }
                }
            }
        })
    }

    function destroyDatatable() {
        if ($('.asset-table').DataTable() instanceof $.fn.dataTable.Api) {
            $('.asset-table').DataTable().destroy()
        }
    }

    function importAsset() {
        let selectedAssets = document.querySelectorAll('#assetTableData')
        let status = 0;
        let importAssets = [];
        selectedAssets.forEach(element => {
            if (element.checked) {
                let rawAsset = [];
                let parentElem = element.parentElement.parentElement;
                let assetQty = parentElem.querySelector('#assetqty').innerText;
                let importQty = parentElem.querySelector('input[type="number"]')
                if (importQty.value > assetQty || importQty.value <= 0) {
                    importQty.style.border = "1px solid red"
                    alertify.warning("Import quantity invalid, Please try again")
                } else if (importQty.value == '') {
                    alertify.warning("Some asset quantity input missing")
                } else {
                    status++;
                    rawAsset['assetno'] = parentElem.children[1].innerText
                    rawAsset['description'] = parentElem.children[2].innerText
                    rawAsset['cat_code'] = parentElem.children[3].innerText
                    rawAsset['qty'] = importQty.value
                    importAssets.push(rawAsset)
                }
            }

        });

        if (status > 0) {
            let pendingAssets = "";
            importAssets.forEach(element => {
                pendingAssets += `<tr><td><input type="checkbox" id="tbldata" value="new"></td><td><p id="assetno">${element['assetno']}</p></td><td>${element['description']}</td><td>${element['cat_code']}</td><td>${element['qty']}</td></tr>`
            });
            if ($('.asset-table-final tbody tr td')[0].innerText == "No Data Available") {
                $('.asset-table-final tbody').empty()
            }
            $('.asset-table-final').append(pendingAssets)
            $('#btnCloseAssetModal').click()
        } else {
            alertify.error("No asset selected, Please try again")
            status++;
        }
    }

    function save() {
        let assets = document.querySelectorAll('.asset-table-final tbody tr input[type="checkbox"]')
        let phc_assets = '';
        let index = 0;
        assets.forEach(element => {
            if (element.value == "new") {
                let gElement = element.parentElement.parentElement
                let asset = [];
                asset['no'] = gElement.querySelector("#assetno").innerText;
                asset['qty'] = gElement.children[4].innerText;
                if (phc_assets != '') {
                    phc_assets += "&"
                }
                phc_assets += `data[${index}][no]=${asset['no']}&data[${index}][qty]=${asset['qty']}`;
            }
            index++;
        });

        $.ajax({
            url: "../clsController/physicalcount.php",
            type: "POST",
            data: phc_assets + `&phc_code=${$('#phc_code').val()}&action=saveAssets`,
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                if (!data) {
                    alertify.error("Unable to save, Please Retry")
                } else {
                    $('.asset-table-final').DataTable().ajax.reload()
                }
            }
        })
    }

    function deleteAsset() {
        let assets = document.querySelectorAll('.asset-table-final tbody tr input[type="checkbox"]')
        let phc_assets = '';
        let index = 0;
        assets.forEach(element => {
            if (element.checked) {
                if (element.value != "new") {
                    let gElement = element.parentElement.parentElement
                    let asset = [];
                    asset['no'] = gElement.querySelector("#assetno").innerText;
                    asset['qty'] = gElement.children[4].innerText;
                    asset['master_id'] = element.value
                    if (phc_assets != '') {
                        phc_assets += "&"
                    }
                    phc_assets += `data[${index}][master_id]=${asset['master_id']}&data[${index}][no]=${asset['no']}&data[${index}][qty]=${asset['qty']}`;
                }
                index++;
            }

        });
        $.ajax({
            url: "../clsController/physicalcount.php",
            type: "POST",
            data: phc_assets + `&phc_code=${$('#phc_code').val()}&action=deleteAssets`,
            error: (error) => {
                // console.log(error)
                alertify.error("Unable to delete, Please Retry")
            },
            success: (data) => {
                alertify.success("Data Deleted")
                $('.asset-table-final').DataTable().ajax.reload()
            }
        })

    }
</script>