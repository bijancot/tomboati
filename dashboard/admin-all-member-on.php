<?php
session_start();
include 'header.php';
?>

<head>
  <title>Mitra | Tombo Ati</title>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="modalstyle.css">
</head>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">

    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user mr-3"></i>Mitra [<a href="excel/export_excel_members.php">Export to Excel</a>]</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">

              <?php
              if (isset($_GET['username-src'])) {
                $username_src = $_GET['src1'];
              }

              //index awal data yang ingin ditampilkan
              $default_index = 0;

              //batasan menampilkan data
              $default_batas = 20;

              //jika terdapat nilai batas di URL, gunakan untuk mengganti nilai default $default_batas
              if (isset($_GET['batas'])) {
                $default_batas = $_GET['batas'];
              }

              //jika terdapat nilai halaman di URL, gunakan untuk mengganti nilai dafault dari $default_index
              if (isset($_GET['halaman'])) {
                $default_index = ($_GET['halaman'] - 1) * $default_batas;
              }

              $query1 = "SELECT * FROM mebers WHERE paket IN('MiTRA') ORDER BY timer DESC limit $default_index, $default_batas";
              $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
              $total_baris = mysqli_num_rows($tampil);


              ?>
              <form action="admin-all-member-search.php" method="get">
                <label></label>
                <input type="text" name="cari">
                <input type="submit" value="Search">
              </form>

              <table id="example" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>
                      <center>No. </center>
                    </th>
                    <th>
                      <center>Username </i></center>
                    </th>
                    <th>
                      <center>Nama </i></center>
                    </th>
                    <th>
                      <center>Password </i></center>
                    </th>
                    <th>
                      <center>Referral </i></center>
                    </th>
                    <th>
                      <center>ID Link </i></center>
                    </th>
                    <th>
                      <center>Contact </center>
                    </th>
                    <th>
                      <center>Register Date </center>
                    </th>
                    <th width=18%>
                      <center>Aksi</center>
                    </th>
                  </tr>
                </thead>
                <?php
                $no = 0;
                while ($data = mysqli_fetch_array($tampil)) {
                  $no++;

                  $sqlsponsor = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid = '$data[sponsor]' ");
                  $rowsponsor = mysqli_fetch_assoc($sqlsponsor);
                  $sqlupline = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid = '$data[upline]' ");
                  $rowupline = mysqli_fetch_assoc($sqlupline);
                ?>
                  <tbody>
                    <tr>
                      <td>
                        <left><?php echo $no; ?>.</center>
                      </td>
                      <td>
                        <left>
                          <font color="blue"><b><?php echo $data['userid']; ?></font>
                          </center>
                      </td>
                      <td>
                        <left>
                          <font color="blue"><b><?php echo $data['name']; ?></font>
                      </td>
                      <td>
                        <left>
                          <font color="blue"><b><?php echo $data['passw']; ?></font>
                          </center>
                      </td>
                      <td>
                        <left>
                          <font color="blue"><b><?php echo $data['sponsor']; ?></font><br><?php echo $rowsponsor['name']; ?></center>
                      </td>
                      <td>
                        <left>
                          <font color="blue"><b><?php echo $data['upline']; ?></font><br><?php echo $rowupline['name']; ?></center>
                      </td>
                      <td>
                        <left><?php echo $data['hphone']; ?><br><?php echo $data['email']; ?><br><?php echo $data['kota']; ?></center>
                      </td>
                      <td>
                        <left>
                          <center>
                            <font color="blue"><b><?php echo $data['timer']; ?></b></font>
                          </center>
                      </td>
                      <td>
                        <left><a href="admin-profile-edit.php?userid=<?php echo $data['userid']; ?>" class="btn btn-sm btn-warning m-l-5 m-t-5"><i class="fa fa-arrow-circle-right mr-3"></i>Edit</a></left>
                        <right><?php echo "<a href='#myModal' class='btn btn-info btn-sm m-l-5 m-t-5' id='myBtn' data-toggle='modal' data-id=" . $data['id'] . "><i class='fa fa-eye mr-3 '></i>Detail</a>"; ?></right>
                      </td>
                    </tr>
            </div>

          <?php
                  $html_paging = "<li><a href='?halaman=" . $nomor_paging . "&batas=" . $default_batas . "'>" . $nomor_paging . "</a></li>";
                }


          ?>
          </tbody>
          </table>

          <form method="get">
            <div class="form-group row">
              <div class="col-sm-3">
                <input class="form-control" name="batas" value='<?php echo $default_batas ?>' />
              </div>
              <div class="col-md-3">
                <button class="btn btn-default btn-block" type="submit">BARIS</button>
              </div>
            </div>
          </form>
          <center>

            <!-- modal detail -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModal">Detail Mitra</h4>
                  </div>
                  <div class="modal-body">
                    <div class="fetched-data"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary mb-4" data-dismiss="modal"><i class="fa fa-times mr-3"></i>Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->


            <?php

            $halaman = @$_GET['halaman'];
            if (empty($halaman)) {
              $posisi  = 0;
              $halaman = 1;
            } else {
              $posisi  = ($halaman - 1) * $default_batas;
            }



            $query2 = mysqli_query($koneksi, "select * from mebers WHERE paket='MITRA'");
            $jmldata = mysqli_num_rows($query2);
            $jmlhalaman = ceil($jmldata / $default_batas);
            $hal1 = $_GET['halaman'] - 1;
            $hal2 = $_GET['halaman'] + 1;
            if ($batas != '') {
              $batas2 = $_GET['batas'];
            } else {
              $batas2 = $default_batas;
            }
            echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-member-on.php?halaman=$hal1&batas=$batas2\">Previous</a></li>
</ul>";

            for ($i = 1; $i <= $jmlhalaman; $i++)


              if ($i != $halaman) {

                echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-member-on.php?halaman=$i&batas=$batas2\">$i</a></li>
</ul>";
              } else {
                echo " <ul class=\"pagination\"><li class=\"page-item active\"><a href=\"admin-all-member-on.php?halaman=$i&batas=$batas2\">$i</a></li></ul>";
              }
            echo " 
<ul class=\"pagination\">
<li class=\"page-item\"><a href=\"admin-all-member-on.php?halaman=$hal2&batas=$batas2\">Next</a></li>
</ul>";

            echo "<p>Total Record : <b>$jmldata</b> Mitra</p>";

            ?>
            <!-- </div>-->
          </div>
        </div>
      </div><!-- col-lg-12-->
      
      <?php include 'footer.php'; ?>

      <script type="text/javascript">
        function closeModal() {
          $('.modal-backdrop').hide();
          $('body').removeClass('modal-open');
          $('#myModal').modal('hide');
          $('#<%=hfImg.ClientID%>').val("");
        }
        $(function() {
          $(document.body).on('show.bs.modal', function() {
            $(window.document).find('html').addClass('modal-open');
          });
          $(document.body).on('hide.bs.modal', function() {
            $(window.document).find('html').removeClass('modal-open');
          });
        });
        $(document).ready(function() {
          $('#myModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type: 'post',
              url: 'detailMitra.php',
              data: 'rowid=' + rowid,
              success: function(data) {
                $('.fetched-data').html(data); //menampilkan data ke dalam modal
              }
            });
          });
        });
      </script>
