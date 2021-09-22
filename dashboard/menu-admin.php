 <?php
$userid = $row['userid'];
if ($userid!="company") {
header("Location: ../dashboard/logout.php");
} 
?>
                    <br />
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>User</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="VPenggunaBaru.php"><i class="fa fa-angle-double-right"></i> Pengguna Baru</a></li>
                            <li><a href="VPermintaanMitra.php"><i class="fa fa-angle-double-right"></i> Permintaan Mitra</a></li>
                            <li><a href="admin-all-member-on.php"><i class="fa fa-angle-double-right"></i> Mitra</a></li>
                            </ul>
                        </li>



                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Bonus Record</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-bonus-sponsor.php"><i class="fa fa-angle-double-right"></i> Fee Awal</a></li>
                               <li><a href="admin-bonus-akhir.php"><i class="fa fa-angle-double-right"></i> Fee Akhir</a></li>
                               <li><a href="admin-bonus-upline.php"><i class="fa fa-angle-double-right"></i> Hadiah Poin</a></li>
                            </ul>
                        </li>




                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Topup</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-all-deposit-new.php"><i class="fa fa-angle-double-right"></i> Topup New</a></li>
                               <li><a href="admin-all-deposit-processed.php"><i class="fa fa-angle-double-right"></i> Topup Processed</a></li>
                            </ul>
                        </li>


                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Hak Register</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-all-point-new.php"><i class="fa fa-angle-double-right"></i> HR New</a></li>
                               <li><a href="admin-all-point-processed.php"><i class="fa fa-angle-double-right"></i> HR Processed</a></li>
                            </ul>
                        </li>

                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Withdrawal</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-withdrawal-onprocess.php"><i class="fa fa-angle-double-right"></i> WD New</a></li>
                               <li><a href="admin-withdrawal-processed.php"><i class="fa fa-angle-double-right"></i> WD Processed</a></li>
                            </ul>
                        </li>


                        <li class="logout">
                            <a href="logout.php">
                                <i class="fa fa-money"></i> <span>Logout</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>


                    </ul>