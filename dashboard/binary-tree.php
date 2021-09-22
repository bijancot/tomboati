<?php
session_start();
include 'header.php';
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Binary Tree
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
                        <h3 class="panel-title"><i class="fa fa-tree"></i> Binary Tree</h3> 
                        </div>
                        <div class="panel-body">
                       <div class="table-responsive">
                    <?php
$urutan = $_GET['urutan'];
                    $query1="select * from bonus_sponsor where userid='$row[userid]' order by id $urutan ";
                    $tampil1=mysqli_query($koneksi, "select * from bonus_sponsor where userid='$row[userid]' ");
                    $dept2=mysqli_num_rows($tampil1);
                    $dept_sponsor=$dept2*120000;
                   
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered" width="100%">
                  <thead>
 <!-- <iframe src="../member/binary-tree.php?useridx=<? echo $row[userid]; ?>" height="80%" width="100%" frameborder="0" Scrollbars="yes"></iframe>  -->
 <iframe src="binary-tree.php?useridx=<? echo $row['userid']; ?>" height="80%" width="100%" frameborder="0" Scrollbars="yes"></iframe> 
                  </thead>
                   </table>
                  </div>
              </div> 
              </div>
            </div><!-- col-lg-12--> 
<?php include 'footer.php'; ?>