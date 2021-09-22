<?php
include('config.php');
include('fungsi.php');

//Timer setting
        $timer=gmdate("Y-m-d H:i:s", gmmktime(gmdate("H")+$conf['mytime']));
        $today=gmdate("Y-m-d", gmmktime(gmdate("H")+$conf['mytime']));
        $tgl_bln_thn=gmdate("d-m-Y", gmmktime(gmdate("H")+$conf['mytime']));
        $yearmd=gmdate("Y-m-d", gmmktime(gmdate("H")+$conf['mytime']));
        $tanggal=gmdate("d", gmmktime(gmdate("H")+$conf['mytime']));
        $bulan=gmdate("m", gmmktime(gmdate("H")+$conf['mytime']));
        $tahun=gmdate("Y", gmmktime(gmdate("H")+$conf['mytime']));
        $jam=gmdate("H", gmmktime(gmdate("H")+$conf['mytime']));
        $menit=gmdate("i", gmmktime(gmdate("H")+$conf['mytime']));
        // $prevnn = mktime(0, 0, 0, date("m") - 1, date("d"), date("Y"));
        $prevm = gmmktime(0, 0, 0, gmdate("m", gmmktime(gmdate("H")+$conf['mytime']))-1, gmdate("d", gmmktime(gmdate("H")+$conf['mytime'])), gmdate("Y", gmmktime(gmdate("H")+$conf['mytime'])));
        $prevmonth=gmdate("m", $prevm); 
        $prevyear=gmdate("Y", $prevm);

session_start();

if(cek_login($mysqli) == false){ // Jika user tidak login
	header('location: login.php'); // Alihkan ke halaman login (login.php)
	exit();	
}

$stmt = $mysqli->prepare("SELECT userid FROM mebers WHERE id = ?");
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);
$stmt->fetch();

$sql = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id = '$_SESSION[id]' ");
$row = mysqli_fetch_assoc($sql);

include 'header.php';
?>
<head>
  <title>Marketing Plan | Tombo Ati</title>
</head>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Marketing Plan
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM testimonials WHERE userid='$row[userid]'");
            $data  = mysqli_fetch_array($query);
            ?>



<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> System</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
GoodLife menggunakan system Binary "Bina Kiri Bina Kanan", system yang terbukti lebih menguntungkan bagi member. System Binary memudahkan mitra untuk membangun dua team kuat (Kiri dan Kanan). Keunggulan dari system binary GoodLife adalah Anda tidak akan kehilangan komisi sponsor dan komisi generasi meskipun Anda melakukan spillover di kedalaman berapapun.<br><br>

                      </tr>
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>

</section>





<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Membership</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
<b>Biaya Membership :</b><br>
1 HU (Satu Hak Usaha) Rp.5.000.000<br>
3 HU (Tiga Hak Usaha)  Rp.15.000.000<br>
7 HU (Tujuh Hak Usaha)  Rp.35.000.000<br>
<br>
                      </tr>
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>

</section>




<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Bonus Sponsor</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
Bonus sponsor jika mensponsori paket SILVER, GOLD, atau PLATINUM Rp.1.000.000<br><br>
Bonus sponsor dibayarkan harian (hari ini posting, besok dilakukan proses pembayaran).
                      </tr>
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>

</section>




<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Bonus Pairing</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
Bonus Pairing Rp. 500.000 /pasang<br>
Maksimal 12 pasang per hari atau Rp. 6.000.000<br><br>
Bonus Pairing dibayarkan harian (hari ini posting, besok dilakukan proses pembayaran).
                      </tr>
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>

</section>





<!-- col-lg-12--> 



<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Reward</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
<b>Reward Fase Satu #1</b><br>
500 Kiri - 500 Kanan <br><br>
<img src="images/xpander.png" width="60%"><br><br>
Mitsubishi Expander Senilai Rp. 250.000.000 (Dua Ratus Limapuluh Juta Rupiah)<br><br>
<b>Reward Fase Dua #2</b><br>
1.000 Kiri - 1.000 Kanan<br><br>
<img src="images/pajero.png" width="70%"><br><br>
Mitsubishi Pajero Senilai Rp. 500.000.000 (Lima Ratus Juta Rupiah)<br><br>
                      </tr>
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>

</section>





<!-- col-lg-12--> 
<section class="col-lg-12 connectedSortable">                            




                            <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Posting</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
											 <br>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
Posting membership 24 Hours menggunakan pin aktivasi.
Posting bisa dilakukan kapan saja, tanpa batasan waktu.
                      </tr>
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>

</section>






          		</div>

<?php include 'footer.php'; ?>