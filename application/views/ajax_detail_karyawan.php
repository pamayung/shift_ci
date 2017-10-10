<?php
if (isset($detail_karyawan)) {
    foreach ($detail_karyawan as $data) {
        ?>
        <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox1" name="id_karyawan" value="<?= $data->id ?>"> <?= $data->nama ?>
        </label>
        <?php
    }
}
?>
