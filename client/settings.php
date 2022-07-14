<?php
require('../static_components/header.php');


if ($settings['asset_auto'] != 0) {
    $asset_auto = 'checked';
} else {
    $asset_auto = '';
}
if ($settings['dept_auto'] != 0) {
    $dept_auto = 'checked';
} else {
    $dept_auto = '';
}
if ($settings['cat_auto'] != 0) {
    $cat_auto = 'checked';
} else {
    $cat_auto = '';
}
if ($settings['loc_auto'] != 0) {
    $loc_auto = 'checked';
} else {
    $loc_auto = '';
}
if ($settings['phc_auto'] != 0) {
    $phc_auto = 'checked';
} else {
    $phc_auto = '';
}
if ($settings['emp_auto'] != 0) {
    $emp_auto = 'checked';
} else {
    $emp_auto = '';
}
if ($settings['stat_auto'] != 0) {
    $stat_auto = 'checked';
}





?>
<div class="container" style="margin-top:1rem; padding: 5px;">
    <h4>Settings</h4>
    <hr>
    <p style="font-size: 12px;font-weight:bold;text-transform:uppercase">Auto Generate</p>
    <div class="row">
        <div class="col-2">
            <ul style="padding-left: 0px;display:flex;flex-direction:column;height:150px; justify-content:space-between">
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Asset Code :</p><input type="checkbox" name="data[asset_auto]" <?php echo $asset_auto ?>>
                </li>
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Department Code :</p><input type="checkbox" name="data[dept_auto]" <?php echo $dept_auto ?>>
                </li>
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Category Code :</p><input type="checkbox" name="data[cat_auto]" <?php echo $cat_auto ?>>
                </li>
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Location Code :</p><input type="checkbox" name="data[loc_auto]" <?php echo $loc_auto ?>>
                </li>
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Physical Count Code :</p><input type="checkbox" name="data[phc_auto]" <?php echo $phc_auto ?>>
                </li>
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Employee No. :</p><input type="checkbox" name="data[emp_auto]" <?php echo $emp_auto ?>>
                </li>
                <li style="display: flex; align-items:center; justify-content:space-between">
                    <p style="margin: 0; padding:0;">Status Code :</p><input type="checkbox" name="data[stat_auto]" <?php echo $stat_auto ?>>
                </li>
            </ul>
            <input type="button" class="btn btn-primary" value="Save" onclick="updateSettings()" style="width: 100%;border-radius:2px;font-size:11px">
        </div>
    </div>
</div>


<?php
require('../static_components/footer.php');
?>
<script>
    function updateSettings() {
        let checkboxes = document.querySelectorAll('input[type=checkbox]')
        let data = '';

        checkboxes.forEach(item => {
            if (data != '') {
                data += '&'
            }
            data += item.name;
            if (item.checked) {
                data += "=1";
            } else {
                data += "=0";
            }

        });
        $.ajax({
            url: "../clsController/settings.php",
            type: "POST",
            contentType: "application/x-www-form-urlencoded",
            data: data += "&action=update",
            error: (error) => {
                console.log(error)
            },
            success: (data) => {
                alertify.success("UPDATED SETTINGS")
            }
        })

    }
</script>