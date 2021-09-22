 <?php
$userid = $row['userid'];
if ($userid!="svarga") {
header("Location: ../backoffice/logout.php");
} 
?>
                    <br />
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Admin User</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-all-member-on.php"><i class="fa fa-angle-double-right"></i> Mitra</a></li>
                               <li><a href="admin-ticket.php"><i class="fa fa-angle-double-right"></i> Ticket</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Admin Record</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="../wallet/admin-all-member-balance.php"><i class="fa fa-angle-double-right"></i> Mitra Transaction</a></li>
                               <li><a href="../wallet/admin-all-member-balance2.php"><i class="fa fa-angle-double-right"></i> Mitra Balance</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Admin Transaction</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="../wallet/admin-history-plan.php"><i class="fa fa-angle-double-right"></i> Order PIN</a></li>
                               <li><a href="../wallet/admin-report-all.php"><i class="fa fa-angle-double-right"></i> Report All</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Bonus Record</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-bonus-sponsor.php"><i class="fa fa-angle-double-right"></i> Bonus Sponsor</a></li>
                               <li><a href="admin-bonus-pasangan.php"><i class="fa fa-angle-double-right"></i> Bonus Pasangan</a></li>
                               <li><a href="admin-bonus-leadership.php"><i class="fa fa-angle-double-right"></i> Bonus Leadership</a></li>
                            </ul>
                        </li>


                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>PIN Aktivasi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-pin.php"><i class="fa fa-angle-double-right"></i> PIN List</a></li>
                            </ul>
                        </li>


                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Repeat Order</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="admin-product-order-history.php"><i class="fa fa-angle-double-right"></i> RO On Process</a></li>
                               <li><a href="admin-product-order-history2.php"><i class="fa fa-angle-double-right"></i> RO Processed</a></li>
                               <li><a href="admin-product-order-history3.php"><i class="fa fa-angle-double-right"></i> RO New Order</a></li>
                               <li><a href="admin-product-list.php"><i class="fa fa-angle-double-right"></i> Product List</a></li>
                               <li><a href="admin-bonus-ro.php"><i class="fa fa-angle-double-right"></i> Bonus RO</a></li>
                            </ul>
                        </li>



                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Admin Deposit</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="../wallet/admin-all-deposit-new.php"><i class="fa fa-angle-double-right"></i> Deposit New</a></li>
                               <li><a href="../wallet/admin-all-deposit-processed.php"><i class="fa fa-angle-double-right"></i> Topup Deposit</a></li>
                               <li><a href="../wallet/admin-all-deposit-pending.php"><i class="fa fa-angle-double-right"></i> Deposit Pending</a></li>
                            </ul>
                        </li>


                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Admin Withdrawal</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="../wallet/admin-withdrawal-onprocess.php"><i class="fa fa-angle-double-right"></i> On Process</a></li>
                               <li><a href="../wallet/admin-withdrawal-processed.php"><i class="fa fa-angle-double-right"></i> Processed</a></li>
                            </ul>
                        </li>

                        <li class="logout">
                            <a href="../wallet/admin-setting.php">
                                <i class="fa fa-money"></i> <span>Admin Setting</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>


                    </ul>

                    <br />
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon fa fa-user"></i> <span>Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="profile.php"><i class="fa fa-angle-double-right"></i>Profile</a>
                                <li><a href="profile-edit.php"><i class="fa fa-angle-double-right"></i>Edit Profile</a>
                                <li><a href="profile-security.php"><i class="fa fa-angle-double-right"></i>Security</a>
                            </ul>
                        </li>

                        <li class="active">
                            <a href="direct-member.php">
                                <i class="glyphicon fa fa-users"></i> <span>Direct Mitra</span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon fa fa-sitemap"></i>
                                <span>Genealogy</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="g1.php"><i class="fa fa-angle-double-right"></i> Generasi 1</a></li>
                               <li><a href="g2.php"><i class="fa fa-angle-double-right"></i> Generasi 2</a></li>
                               <li><a href="g3.php"><i class="fa fa-angle-double-right"></i> Generasi 3</a></li>
                               <li><a href="g4.php"><i class="fa fa-angle-double-right"></i> Generasi 4</a></li>
                               <li><a href="g5.php"><i class="fa fa-angle-double-right"></i> Generasi 5</a></li>
                               <li><a href="g6.php"><i class="fa fa-angle-double-right"></i> Generasi 6</a></li>
                               <li><a href="g7.php"><i class="fa fa-angle-double-right"></i> Generasi 7</a></li>
                               <li><a href="g8.php"><i class="fa fa-angle-double-right"></i> Generasi 8</a></li>
                               <li><a href="g9.php"><i class="fa fa-angle-double-right"></i> Generasi 9</a></li>
                               <li><a href="g10.php"><i class="fa fa-angle-double-right"></i> Generasi 10</a></li>
                            </ul>
                        </li>

                        <li class="active">
                            <a href="binary-tree.php">
                                <i class="glyphicon fa fa-sitemap"></i> <span>Binary Tree </span>
                            </a>
                        </li>



                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Komisi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="bonus-sponsor.php"><i class="fa fa-angle-double-right"></i> Komisi Sponsor</a></li>
                               <li><a href="bonus-pasangan.php"><i class="fa fa-angle-double-right"></i> Komisi Pasangan</a></li>
                               <li><a href="bonus-level.php"><i class="fa fa-angle-double-right"></i> Komisi Level</a></li>
                               <li><a href="bonus-leadership.php"><i class="fa fa-angle-double-right"></i> Bonus Leaders Club</a></li>
                               <li><a href="#"><i class="fa fa-angle-double-right"></i> Komisi Repeat Order</a></li>
                               <li><a href="bonus-royalty-development.php"><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-right"></i> Komisi Development</a></li>
                               <li><a href="bonus-royalty-generasi.php"><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-right"></i> Komisi Generasi</a></li>
                            </ul>
                        </li>


                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Wallet</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="topup.php"><i class="fa fa-angle-double-right"></i> Topup</a></li>
                               <li><a href="topup-history.php"><i class="fa fa-angle-double-right"></i> History Topup</a></li>
                               <li><a href="exchange.php"><i class="fa fa-angle-double-right"></i> Exchange</a></li>
                            </ul>


                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Withdrawal</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="../wallet/withdrawal-request-1.php"><i class="fa fa-angle-double-right"></i> Withdrawal</a></li>
                               <li><a href="../wallet/withdrawal-onprocess.php"><i class="fa fa-angle-double-right"></i> On Process</a></li>
                               <li><a href="../wallet/withdrawal-processed.php"><i class="fa fa-angle-double-right"></i> Processed</a></li>
                            </ul>
                        </li>


                        <li class="active">
                            <a href="../wallet/wallet-report.php">
                                <i class="glyphicon fa fa-money"></i> <span>History Mutasi</span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-shopping-cart"></i></i>
                                <span>Repeat Order</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="product-order.php"><i class="fa fa-angle-double-right"></i> Order Product</a></li>
                               <li><a href="product-order-history.php"><i class="fa fa-angle-double-right"></i> History Order</a></li>
                               <li><a href="bonus-ro.php"><i class="fa fa-angle-double-right"></i> Bonus RO</a></li>
                            </ul>
                        </li>


                        <li class="logout">
                            <a href="logout.php">
                                <i class="glyphicon fa fa-key"></i> <span>Logout</span>
                                <i class=""></i>
                            </a>
                        </li>

                    </ul>