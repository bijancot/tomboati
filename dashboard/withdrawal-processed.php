<?php
include 'header.php';
?>
<head>
  <title> Withdrawal Processed | Tombo Ati</title>
</head>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Withdrawal Processed
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Withdrawal</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                    <?php
                    $query1="select * from hm2_history where user_id='$row[id]' and type='internal_transaction_spend' ";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Amount </i></center></th>
                        <th><center>Description </center></th>
                        <th><center>Date </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td align="right"><?php echo number_format(ltrim($data['amount'],'-'),0,",",".");?></td>
                    <td><left><?php echo $data['description'];?></center></td>
                    <td><left><?php echo $data['date']; ?></center></td>
                    </tr>
</div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>