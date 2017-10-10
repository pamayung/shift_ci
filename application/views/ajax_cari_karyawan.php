<?php
if (isset($detail_karyawan)) {
    foreach ($detail_karyawan as $data) {
        ?>
        <label class="radio-inline">
            <input type="radio" name="id_karyawan" value="<?= $data->id ?>"> <?= $data->nama ?>
        </label>
        <?php
    }
}
?>
