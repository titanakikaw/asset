<?php
require('../static_components/header.php');
?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> &nbsp; New Employees</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-pencil"></i> &nbsp; Edit Employee</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3" onclick="deleteData('tbldata')"><i class="fa-solid fa-trash"></i> &nbsp; Delete Employee</button>
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
                    <th>Employee No.</th>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Location</th>
                </tr>
            </thead>
            <div class="tbody">
                <tr>
                    <td><input type="checkbox"></td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEmployee">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Employee No :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[empno]">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Position :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[position]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Lastname :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[lname]">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Firstname :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[fname]">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">M.I :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data[MI]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Department :</span>
                                <select class="form-select" id="department" name="data[dept_code]">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3" style="flex-wrap: nowrap;">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Location :</span>
                                <select class="form-select" id="location" name="data[loc_code]">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Username :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Password :</span>
                            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="pass">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Confirm Pass :</span>
                            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div> -->
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
    let table = $('.asset-table').DataTable({
        searching: false,
        ordering: false,
        select: true,
        "ajax": {
            "url": "../clsController/employee.php",
            "type": "POST",
            "Content-type": 'application/json',
            "data": {
                "action": "table"
            },
            "success": (data) => {
                table.clear()
                data.forEach((loc) => {
                    table.row.add([
                        `<input type="checkbox" id="tbldata" value="${loc['empno']}">`,
                        `${loc['empno']}`,
                        `${loc['lname']} , ${loc['fname']} ${loc['mi']}`,
                        `${loc['position']}`,
                        `${loc['dept_code']}`,
                        `${loc['loc_code']}`,
                    ]).draw(false)
                })
            },
            "error": () => {
                $('.asset-table tbody').empty()
                $('.asset-table tbody').append("<tr><td colspan='6' style='text-align:center'>No Data Available</td></tr>")

            }
        }
    })


    function save() {
        let data = $('#formEmployee').serialize()

        let saveType = $('#btnSave')[0].innerText;
        if (saveType == "Save") {
            data = data + '&action=new'
        } else if (saveType == "Update") {
            data = data + '&action=update'
        }
        console.log(data)
        $.ajax({
            url: "../clsController/employee.php",
            type: "POST",

            data: data,
            error: (error) => {
                alertify.error('Error in saving. Please Try again').delay(1);
            },
            success: (data) => {
                $('.asset-table').DataTable().ajax.reload();
                $('#btnCloseModal').click()
                alertify.success('Success').delay(1);
            }
        })
    }



    function getLoc() {
        $('#location').empty()
        $.ajax({
            url: "../clsController/employee.php",
            type: "POST",
            contentType: 'application/x-www-form-urlencoded',
            data: 'table=location&action=getdata',
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                data = JSON.parse(data)
                if (data != '') {
                    data.forEach((dept) => {
                        $('#location').append(`<option value="${dept['loc_code']}"> ${dept['loc_code']} - ${dept['description']}</option>`)
                    })
                }

            }
        })
    }

    function getDept() {
        $('#department').empty()
        $.ajax({
            url: "../clsController/employee.php",
            type: "POST",
            contentType: 'application/x-www-form-urlencoded',
            data: 'table=department&action=getdata',
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                data = JSON.parse(data)
                if (data != '') {
                    data.forEach((dept) => {
                        $('#department').append(`<option value="${dept['dept_code']}"> ${dept['dept_code']} - ${dept['description']}</option>`)
                    })
                }

            }
        })
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
        console.log(tbldata)
        if (data.length != 0) {
            $.ajax({
                url: "../clsController/employee.php",
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


    getDept()
    getLoc()
</script>