<?php
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

include 'header.php';
?>
<head>
  <title>Add Testimonial | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Testimonial
                        <small>Add Testimonial</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Testimonial</a></li>
                        <li class="active">Add Testimonial</li>
                    </ol>
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



                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-book"></i> Add Testimonial</h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="testimonial-add2.php" method="post" name="form1" id="form1">
                                  <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id'];?>" readonly="readonly" autofocus="on" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                  <input name="userid" type="text" id="bank" class="form-control" value="<?php echo $row['userid'];?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Testimonials</label>
                              <div class="col-sm-10">

<textarea class="form-control" cols="100%" rows="3" name="content" value="" required />Content Tersimonial..</textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-10">
                                  <input name="tangggal" class="form-control" id="atas_nama" type="text" value="<?php echo $timer;?>" readonly />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="testimonials-add" value="Simpan Testimonials"  class="btn btn-sm btn-primary"/>&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>







          		</div>

<?php include 'footer.php'; ?>