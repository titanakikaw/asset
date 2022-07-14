<?php

require('../static_components/header.php');
if ($settings['loc_auto'] == 1) {
    $loc_auto = "AUTO GENERATED";
    $disabled = 'disabled';
} else {
    $loc_auto = '';
    $disabled = '';
}
?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button data-bs-toggle="modal" id="btnNew" data-bs-target="#exampleModal" class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> &nbsp; New Location</button>
                <button class="btn" type="button" id="btnEdit" style="border-radius: 2px; background-color:#f3f3f3" onclick="edit(), enableInputs($('#formLocation input'))"><i class="fa-solid fa-pencil"></i> &nbsp; Edit Location</button>
                <button class="btn" type="button" id="btnView" style="border-radius: 2px; background-color:#f3f3f3" onclick="view()"><i class="fa-solid fa-pencil"></i> &nbsp; View Location</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3" onclick="deleteData('tbldata')"><i class="fa-solid fa-trash"></i> &nbsp; Delete Location</button>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <table class="table asset-table" style="background-color: white;">
            <thead style="background: #f3f3f3;">
                <tr>
                    <th><input type="checkbox" onclick="checkAll('tbldata', this)"></th>
                    <th>Location Code</th>
                    <th>Description</th>
                </tr>
            </thead>
            <div class="tbody">

            </div>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formLocation">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Location Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Location Code :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" id="loc_code" name="data[loc_code]" aria-describedby="inputGroup-sizing-sm" value="<?php echo $loc_auto; ?>" <?php echo $disabled ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Description :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" id="description" name="data[description]" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>

<?php
require('../static_components/footer.php');
?>
<script>
    let myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
    $(document).ready(() => {
        $('#btnNew').click(() => {
            $('#btnSave')[0].innerText = "Save";
            // enableInputs($('#formLocation input'))
        })
    })


    let table = $('.asset-table').DataTable({
        searching: false,
        ordering: false,
        select: true,
        "ajax": {
            "url": "../clsController/location.php",
            "type": "POST",
            "Content-type": 'application/json',
            "data": {
                "action": "table"
            },
            "success": (data) => {
                table.clear()
                data.forEach((loc) => {
                    table.row.add([
                        `<input type="checkbox" id="tbldata" value="${loc['loc_code']}">`,
                        `${loc['loc_code']}`,
                        `${loc['description']}`,
                    ]).draw(false)
                })

            },
            "error": () => {
                $('.asset-table tbody').empty()
                $('.asset-table tbody').append("<tr><td colspan='3' style='text-align:center'>No Data Available</td></tr>")

            }
        }


    })

    function disabledInputs(form) {
        let length = form.length;
        for (let index = 0; index < length; index++) {
            const element = form[index];
            element.setAttribute("disabled", true)
        }
    }

    function enableInputs(form) {
        let length = form.length;
        for (let index = 0; index < length; index++) {
            const element = form[index];
            element.removeAttribute("disabled")
        }
        $('#btnSave')[0].removeAttribute('disabled')
    }

    function save() {
        let data = $('#formLocation').serialize()
        let saveType = $('#btnSave')[0].innerText;
        if (saveType == "Save") {
            data = data + '&action=new'
        } else if (saveType == "Update") {
            data = data + '&action=update'
        }
        $.ajax({
            url: "../clsController/location.php",
            type: "POST",
            data: data,
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                $('.asset-table').DataTable().ajax.reload();
                $('#btnCloseModal').click()
                alertify.success('Success').delay(1);
            }
        })
    }

    function edit() {
        if (checkboxData('tbldata')) {
            myModal.show();
            getItem()
            $('#btnSave')[0].innerText = "Update";
        } else {}
    }

    function getItem() {
        const tbldata = document.querySelectorAll(`#tbldata:checked`)[0].parentElement.parentElement
        const locationCode = tbldata.children[1].innerText
        const description = tbldata.children[2].innerText
        $('#loc_code').val(locationCode)
        $('#description').val(description)
    }

    function view() {
        disabledInputs($('#formLocation input'))
        $('#btnSave')[0].setAttribute("disabled", true)
        edit()
    }

    function checkboxData(datacheckboxes) {
        const tbldata = document.querySelectorAll(`#${datacheckboxes}`)
        let count = 0;
        for (let index = 0; index < tbldata.length; index++) {
            const element = tbldata[index];
            if (element.checked) {
                count += 1;
            }
        }
        if (count == 1) {
            return true
        } else if (count > 1) {
            alertify.error('Select 1 data only !').delay(2);
            return false
        } else {
            alertify.error('Please select a data.').delay(2);
            return false
        }
    }

    function checkAll(datacheckboxes, btn) {
        let statusCheck = false;
        if (btn.checked) {
            statusCheck = true
        }
        const tbldata = document.querySelectorAll(`#${datacheckboxes}`)
        for (let index = 0; index < tbldata.length; index++) {
            const element = tbldata[index];
            element.checked = statusCheck
        }
    }

    async function deleteData(datacheckboxes) {
        const tbldata = document.querySelectorAll(`#${datacheckboxes}`)
        let data = '';
        tbldata.forEach((input) => {
            if (input.checked) {
                if (data != '') {
                    data += ',';
                }
                data += input.value

            }
        })

        if (data.length != 0) {
            $.ajax({
                url: "../clsController/location.php",
                type: "POST",
                data: 'data=' + data + '&action=delete',
                error: (error) => {
                    console.log(error)
                },
                success: (data) => {

                    alertify.success('Success').delay(1);
                    $('.asset-table').DataTable().ajax.reload();
                }
            })
        }
    }
</script>