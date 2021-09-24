<?php
session_start();
include 'header.php';
?>

<head>
  <title>Deposit | Tombo Ati </title>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="modalstyle.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
            <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Deposit History</h3>
          </div>
          <div class="panel-body">

            <div class="table-responsive">
              <?php
              $query_deposit = "select * from hm2_pending_deposits ORDER BY date DESC";
              $tampil_deposit = mysqli_query($koneksi, $query_deposit) or die(mysqli_error());
              ?>
              <table id="example" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>
                      <center>No. </center>
                    </th>
                    <th>
                      <center>Username</i></center>
                    </th>
                    <th>
                      <center>Amount</i></center>
                    </th>
                    <th>
                      <center>Gateway</i></center>
                    </th>
                    <th>
                      <center>Code</i></center>
                    </th>
                    <th>
                      <center>Date</i></center>
                    </th>
                    <th>
                      <center>Bukti Bayar</i></center>
                    </th>
                    <th>
                      <center>Status </center>
                    </th>
                  </tr>
                </thead>
                <?php
                $no = 0;
                while ($data_deposit = mysqli_fetch_array($tampil_deposit)) {
                  $no++;

                  $statusproses = $data_deposit['status'];
                  if ($statusproses == 'new') {
                    $statusprosesxx = '
<a href="update-deposit-1.php?id=<?php echo $data_deposit[id]; ?>" class="btn btn-sm btn-warning"><?php echo $statusprosesxx; ?><i class="fa fa-arrow-circle-right"> PROCESS</i></a>
';
                  } else {
                    $statusprosesxx = '';
                  }

                ?>
                  <tbody>
                    <tr>

                      <td>
                        <center><?php echo $no; ?>.</center>
                      </td>
                      <?php
                      $tampil_user_id = $data_deposit['user_id'];
                      $sqlTampilx = mysqli_query($koneksi, "SELECT * FROM hm2_users WHERE id='$tampil_user_id' ");
                      $dataTampilx = mysqli_fetch_assoc($sqlTampilx);
                      ?>

                      <td>
                        <center><?php echo $dataTampilx['username']; ?></center>
                      </td>
                      <td align="right">
                        <center><?php echo number_format($data_deposit['amount'], 3, ",", "."); ?></center>
                      </td>
                      <td>
                        <center><?php echo $data_deposit['gateway']; ?></center>
                      </td>
                      <td>
                        <center><?php echo $data_deposit['code']; ?></center>
                      </td>
                      <td>
                        <center><?php echo $data_deposit['date']; ?></center>
                      </td>
                      <td>
                        <center>
                          <a data-target='#modalBukti<?= $data_deposit['id'] ?>' class="btn btn-sm btn-light ml-1" type="button" data-toggle="modal"><i class="far fa-file-invoice-dollar fa-2x"></i></a>
                        </center>
                      </td>
                      <td>
                        <center><?php echo $data_deposit['status']; ?></center>
                      </td>

                      </center>
                      </td>
                    </tr>
            </div>
             <!-- modal detail -->
             <div class="modal fade" id="modalBukti<?= $data_deposit['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModal">Bukti Bayar</h4>
                  </div>
                  <div class="modal-body">
                    <center>
                      <img src="https://tomboatitour.biz/backoffice/<?php echo $data_deposit['photo']; ?>" width="400px" height="400px">
                    </center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary mb-4" data-dismiss="modal"><i class="fa fa-times mr-3"></i>Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->
          <?php
                }
          ?>
          </tbody>
          </table>
          </div>
          <div class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </section>
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
      </script>
  <?php include 'footer.php'; ?>