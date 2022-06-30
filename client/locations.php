<?php
require('../static_components/header.php');
?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> &nbsp; New Location</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-pencil"></i> &nbsp; Edit Location</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> &nbsp; Delete Location</button>
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
                    <th>Location Code</th>
                    <th>Description</th>
                </tr>
            </thead>
            <div class="tbody">
                <tr>
                    <td><input type="checkbox"></td>
                    <td>test</td>
                    <td>test</td>
                </tr>
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
                            <input type="text" class="form-control" aria-label="Sizing example input" name="data[loc_code]" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Description :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" name="data[description]" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
  
    let table =  $('.asset-table').DataTable({
        searching: false,
        ordering: false,
        select: true,
        "ajax": {
            "url" : "../clsController/location.php",
            "type" : "POST",
            "Content-type" : 'application/json',
            "data": { "action" : "table"},
            "success" : (data) => {
                table.clear()
                    data.forEach((loc) => {
                        table.row.add([
                            `<input type="checkbox" value="${loc['loc_code']}">`,
                            `${loc['loc_code']}`,
                            `${loc['description']}`,
                        ]).draw(false)
                    })
               
            },
            "error" : () => {
                $('.asset-table tbody').empty()
                $('.asset-table tbody').append("<tr><td colspan='3' style='text-align:center'>No Data Available</td></tr>")
             
            }
        }
        

    })


    function save(){
        let data = $('#formLocation').serialize()
        let saveType = $('#btnSave')[0].innerText;
        if(saveType == "Save"){
            data = data + '&action=new'
        }else if(saveType == "Update"){
            data =  data + '&action=update'
        }
        console.log(data)
        $.ajax({
            url : "../clsController/location.php",
            type : "POST",
            data : data,
            error : (error) => {
                console.log(error)
            },
            success : (data) => {
                $('.asset-table').DataTable().ajax.reload();
            }
        })
    }
</script>