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
                                            <h5>Wallet</h5>
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
                                        <h3>History</h3>
                                    </div>
                                    <div class="card-body p-0 table-border-style">
                                        <div class="table-responsive">
<?
if(isset($_GET['username-src']))
{
    $username_src = $_GET['src1'];
}

//index awal data yang ingin ditampilkan
$default_index = 0;

//batasan menampilkan data
$default_batas = 20;

//jika terdapat nilai batas di URL, gunakan untuk mengganti nilai default $default_batas
if(isset($_GET['batas']))
{
    $default_batas = $_GET['batas'];
}

//jika terdapat nilai halaman di URL, gunakan untuk mengganti nilai dafault dari $default_index
if(isset($_GET['halaman']))
{
    $default_index = ($_GET['halaman']-1) * $default_batas;
}

    $query1 = "SELECT * FROM hm2_history WHERE user_id='$row[id]' ORDER BY id DESC limit $default_index, $default_batas";
    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
    $total_baris = mysqli_num_rows($tampil);


?>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                        <th><center>No. </center></th>
                        <th><center>Name </i></center></th>
                        <th><center>Out </i></center></th>
                        <th><center>In </i></center></th>
                        <th><center>Description </center></th>
                        <th><center>Date </center></th>
                                                    </tr>
                                                </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; 

            $query_user = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id='$data[user_id]'");
            $data_user  = mysqli_fetch_array($query_user);

IF ($data['amount']>0){$amount_view=$data['amount'];} else {$amount_view='';}
IF ($data['amount']<0){$amount_view2=ltrim($data['amount'],'-');} else {$amount_view2='';}
IF ($data['type']=='deposit'){$type='investing';} else {$type=$data['type'];}
?>

                                                <tbody>
                                                    <tr>
                    <td><left><?php echo $no; ?>.</center></td>
                    <td><left><?php echo $data_user['name']; ?></center></td>
                    <td align="right"><?php echo number_format($amount_view2, 0, ', ', '.');?></td>
                    <td align="right"><?php echo number_format($amount_view, 0, ', ', '.');?></td>
                    <td><left><?php echo $data['description'];?></center></td>
                    <td><left><?php echo $data['date']; ?></center></td>
                                                    </tr>
                 <?php   
    $html_paging = "<li><a href='?halaman=".$nomor_paging."&batas=".$default_batas."'>".$nomor_paging."</a></li>";

              } 

  
              ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
<?php
include 'footer.php';
?>