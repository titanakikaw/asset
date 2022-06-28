<?php
require('../static_components/header.php');
?>
<div class="container" style="margin-top: 1rem;background-color:#f3f3f3; padding:1rem;">
    <div class="row">
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">PHC Code :</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>

        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Date :</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Location:</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Department:</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
        <div class="col-4">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Checked By:</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"> Remarks :</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Save</button>
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-ban"></i> &nbsp; Back</button>
            </div>
        </div>

    </div>
</div>
<div class="container" style=" padding: 5px;">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start table-actions">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-plus"></i> &nbsp; Add Asset</button>
                <button class="btn" type="button" style="border-radius: 2px; background-color:#f3f3f3"><i class="fa-solid fa-trash"></i> &nbsp; Delete</button>
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
                <tr>
                    <td><input type="checkbox"></td>
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
                                <th>Type</th>
                                <th>QTY</th>
                                <th>Export QTy</th>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add asset</button>
            </div>
        </div>
    </div>
</div>




<?php
require('../static_components/footer.php');
?>
<script>
    $('.asset-table-final').DataTable({
        searching: false,
        ordering: false,
        select: true
    })
    $('.asset-table').DataTable({
        // searching: false,
        ordering: false,
        select: true
    })
</script>