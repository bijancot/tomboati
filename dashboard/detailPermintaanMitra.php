<style>
    .align-img {
        margin: 0 auto;
        padding: 1.5em;
        width: 80%;
        max-width: 350px;
        min-width: 250px;
        height: 50%;
        background: #FFFFFF;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        overflow: hidden;
    }
</style>
<?php
include('config.php');
include('fungsi.php');


if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    // mengambil data berdasarkan id
    $sql = "SELECT * FROM mebers WHERE id = $id";
    $result = $koneksi->query($sql);
    foreach ($result as $baris) { ?>
        <table class="table">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $baris['userid']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $baris['name']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $baris['email']; ?></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td><?php echo $baris['hphone']; ?></td>
            </tr>
            <tr>
                <td>Referral</td>
                <td>:</td>
                <td><?php echo $baris['sponsor']; ?></td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>:</td>
                <td><?php echo $baris['bank']; ?></td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>:</td>
                <td><?php echo $baris['cabang']; ?></td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>:</td>
                <td><?php echo $baris['atasnama']; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $baris['ktp']; ?></td>
            </tr>
            <tr>
                <td>Jalan</td>
                <td>:</td>
                <td><?php echo $baris['address']; ?></td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td><?php echo $baris['kecamatan']; ?></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:</td>
                <td><?php echo $baris['kota']; ?></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td><?php echo $baris['propinsi']; ?></td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td>:</td>
                <td><?php echo $baris['kode_pos']; ?></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td>:</td>
                <td><?php echo $baris['country']; ?></td>
            </tr>
            <tr>
                <td>Register Date</td>
                <td>:</td>
                <td><?php echo $baris['timer']; ?></td>
            </tr>
            <tr>
                <td>Bukti Bayar</td>
                <td>:</td>
                <td><?= "<img src='" . $baris['bukti_bayar'] . "'style='max-width:350px; min-width : 200px;'>" ?></td>
            </tr>
            <tr>
                <td>Foto Profil</td>
                <td>:</td>
                <td><?= "<img src='" . $baris['photo'] . "'style='max-width:350px; min-width : 200px;'>" ?></td>
            </tr>
            <tr>
                <td>Foto KTP</td>
                <td>:</td>
                <td><?= "<img src='" . $baris['fotoktp'] . "'style='max-width:350px; min-width : 200px;'>" ?></td>
            </tr>
        </table>
<?php

    }
}
