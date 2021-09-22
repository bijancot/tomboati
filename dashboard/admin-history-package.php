<?php
session_start();
include 'header.php';
?>
<head>
  <title>History Package | Tombo Ati</title>
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Cloud Package</h3> 
                        </div>
                        <div class="panel-body">

                       <div class="table-responsive">
                    <?php
                    $query1="select * from hm2_plans";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No. </center></th>
                        <th><center>Package </i></center></th>
                        <th><center>Amount </i></center></th>
                        <th><center>ROI </center></th>
                        <th><center>Setting </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

if ($idplan=='1'){
$planname='BRONZE';
$min='1500000';
$max='1500000';
} 
else if ($idplan=='2'){
$planname='SILVER';
$min='5000000';
$max='5000000';
} 
else if ($idplan=='3'){
$planname='GOLD';
$min='10000000';
$max='10000000';
} 
else if ($idplan=='4'){
$planname='PLATINUM';
$min='50000000';
$max='50000000';
} 
else if ($idplan=='5'){
$planname='TITANIUM';
$min='100000000';
$max='100000000';
}
else if ($idplan=='6'){
$planname='PREMIUM';
$min='150000000';
$max='150000000';
}

?>
                    <tbody>
                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data['name'];?></center></td>
                    <td><left><?php echo number_format($data['min_deposit'],0,",",".");?></center></td>
                    <td align="right"><left><?php echo $data['percent']; ?> %</center></td>
                    <td><center><a href="update-package-1.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit <i class="fa fa-arrow-circle-right"></i></a>

</center></td>
                    </tr>
</div>
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
</section>
<!-- col-lg-12--> 
<?php include 'footer.php'; ?>