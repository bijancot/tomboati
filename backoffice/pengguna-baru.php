<?php
session_start();
include 'header.php';
?>


</div>
</div>
</div>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-credit-card bg-blue"></i>
                        <div class="d-inline">
                            <h5>Pengguna Baru</h5>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div> -->
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h3>Jamaah Baru</h3>
                        </div>
                        <div class="card-body p-0 table-border-style">
                            <div class="table-responsive">
                                <?php
                                $query1 = "select * from mebers where paket = 'USER' AND sponsor='$username' ORDER BY timer DESC";

                    //             if (isset($_POST['qcari'])) {
                    //                 $qcari = $_POST['qcari'];
                    //                 $query1 = "SELECT * FROM  bank 
	                // where nama_bank like '%$qcari%'
	                // or nasabah like '%$qcari%'  ";
                    //             }
                                $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
                                ?>

                                <table class="table table-hover " border="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>No. </center>
                                            </th>
                                            <th>
                                                <center>Tanggal </i></center>
                                            </th>
                                            <th>
                                                <center>Username </i></center>
                                            </th>
                                            <th>
                                                <center>KTP</center>
                                            </th>
                                            <th>
                                                <center>Email </i></center>
                                            </th>
                                            <th>
                                                <center>Alamat </i></center>
                                            </th>
                                            <th>
                                                <center>Sponsor </i></center>
                                            </th>
                                            <th>
                                                <center>No. HP </i></center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        $no++; ?>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <center><?php echo $no; ?>.</center>
                                                </td>
                                                <td>
                                                    <center><?php echo $data['timer']; ?></center>
                                                </td>
                                                <td>
                                                    <left>
                                                       <img src="<?php echo $data[photo]; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" width="50" height="50" /> <?php echo $data['userid']; ?>
                                                    </left>
                                                </td>
                                                <td>
                                                    <center><?php echo $data['ktp']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $data['email']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $data['address']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $data['sponsor']; ?></center>
                                                </td>
                                                <td>
                                                    <right><?php echo $data['hphone']; ?><br><?php echo $data['right']; ?></right>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                        ?>

                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <?php
                    include 'footer.php';
                    ?>