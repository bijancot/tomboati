<?php
//
include("dbconn.php");
$site_row=mysqli_fetch_array(mysqli_query($dbconn,"SELECT *  FROM setsite")) or die (mysqli_error());
$bonus_row=mysqli_fetch_array(mysqli_query($dbconn,"SELECT *  FROM set_bonus")) or die (mysqli_error());
//Configuration administrator code

    $diradmin="user";  //Nama directory admin.
    $mydir=getcwd();
    $conf['upload']=$site_row['upload']; //Nama directory file products.
    $conf['reseller'] = "1";
    $conf['show_testimony'] = $site_row['show_testimony'];
    $conf['tpldir'] = $site_row['tpldir'];
    $conf['first_page'] = $site_row['first_page'];
    $conf['gallery_marquee'] = $site_row['gallery_marquee'];
    $conf['kolom_artikel'] = $site_row['kolom_artikel'];
    $conf['tot_iklan'] = $site_row['tot_iklan'];
    $conf['img_header'] = $site_row['img_header'];
    $conf['tinggi_header'] = $site_row['tinggi_header'];
    $conf['program_name'] = $site_row['program_name'];
    $conf['header1'] = $site_row['header1'];
    $conf['marque'] = $site_row['marque'];
    $conf['launch_date'] = $site_row['launch_date'];
    $conf['webemail'] = $site_row['webemail'];
    $conf['web_title'] = $site_row['web_title'];
    $conf['keywords'] = $site_row['keywords'];
    $conf['web_description'] = $site_row['web_description'];
    $conf['web_phone'] = $site_row['web_phone'];
    $conf['web_address'] = $site_row['web_address'];
    $conf['webmanager']=$site_row['webmanager'];
    $conf['webkota']=$site_row['webkota'];
    $conf['file_size'] = $site_row['file_size'];
    $conf['program_url'] = $site_row['program_url'];
    $conf['powered'] = $site_row['powered'];
    $conf['counter'] = $site_row['counter'];
    $conf['mytime'] = $site_row['mytime'];
    $conf['randomizer'] = $site_row['randomizer'];
    $conf['sponsor'] = $site_row['sponsor'];
    $portal_url=$site_row['program_url'];

    $conf['bea_join']=$bonus_row['bea_join'];
    $conf['bonus_sponsor']=$bonus_row['bonus_sponsor'];
    $conf['bonus_pasangan']=$bonus_row['bonus_pasangan'];
    $conf['bonus_titik']=$bonus_row['bonus_titik'];
    $conf['level_titik']=$bonus_row['level_titik'];
    $conf['bonus_prestasi1']=$bonus_row['bonus_prestasi1'];
    $conf['bonus_prestasi2']=$bonus_row['bonus_prestasi2'];
    $conf['bonus_prestasi3']=$bonus_row['bonus_prestasi3'];
    $conf['bonus_prestasi4']=$bonus_row['bonus_prestasi4'];
    $conf['bonus_prestasi5']=$bonus_row['bonus_prestasi5'];
    $conf['bonus_prestasi6']=$bonus_row['bonus_prestasi6'];
    $conf['bonus_prestasi7']=$bonus_row['bonus_prestasi7'];
    $conf['syarat_prestasi1_kiri']=$bonus_row['syarat_prestasi1_kiri'];
    $conf['syarat_prestasi2_kiri']=$bonus_row['syarat_prestasi2_kiri'];
    $conf['syarat_prestasi3_kiri']=$bonus_row['syarat_prestasi3_kiri'];
    $conf['syarat_prestasi4_kiri']=$bonus_row['syarat_prestasi4_kiri'];
    $conf['syarat_prestasi5_kiri']=$bonus_row['syarat_prestasi5_kiri'];
    $conf['syarat_prestasi6_kiri']=$bonus_row['syarat_prestasi6_kiri'];
    $conf['syarat_prestasi7_kiri']=$bonus_row['syarat_prestasi7_kiri'];
    $conf['syarat_prestasi1_kanan']=$bonus_row['syarat_prestasi1_kanan'];
    $conf['syarat_prestasi2_kanan']=$bonus_row['syarat_prestasi2_kanan'];
    $conf['syarat_prestasi3_kanan']=$bonus_row['syarat_prestasi3_kanan'];
    $conf['syarat_prestasi4_kanan']=$bonus_row['syarat_prestasi4_kanan'];
    $conf['syarat_prestasi5_kanan']=$bonus_row['syarat_prestasi5_kanan'];
    $conf['syarat_prestasi6_kanan']=$bonus_row['syarat_prestasi6_kanan'];
    $conf['syarat_prestasi7_kanan']=$bonus_row['syarat_prestasi7_kanan'];
    $conf['title_prestasi1']=$bonus_row['title_prestasi1'];
    $conf['title_prestasi2']=$bonus_row['title_prestasi2'];
    $conf['title_prestasi3']=$bonus_row['title_prestasi3'];
    $conf['title_prestasi4']=$bonus_row['title_prestasi4'];
    $conf['title_prestasi5']=$bonus_row['title_prestasi5'];
    $conf['title_prestasi6']=$bonus_row['title_prestasi6'];
    $conf['title_prestasi7']=$bonus_row['title_prestasi7'];
    $conf['flush_out']=$bonus_row['flush_out'];
    $bonus_sponsor=$conf['bonus_sponsor'];
    $bonus_pasangan=$conf['bonus_pasangan'];
    $bonus_prestasi1=$conf['bonus_prestasi1'];
    $bonus_prestasi2=$conf['bonus_prestasi2'];
    $bonus_prestasi3=$conf['bonus_prestasi3'];
    $bonus_prestasi4=$conf['bonus_prestasi4'];
    $bonus_prestasi5=$conf['bonus_prestasi5'];
    $bonus_prestasi6=$conf['bonus_prestasi6'];
    $bonus_prestasi7=$conf['bonus_prestasi7'];
    $syarat_prestasi1_kiri=$conf['syarat_prestasi1_kiri'];
    $syarat_prestasi2_kiri=$conf['syarat_prestasi2_kiri'];
    $syarat_prestasi3_kiri=$conf['syarat_prestasi3_kiri'];
    $syarat_prestasi4_kiri=$conf['syarat_prestasi4_kiri'];
    $syarat_prestasi5_kiri=$conf['syarat_prestasi5_kiri'];
    $syarat_prestasi6_kiri=$conf['syarat_prestasi6_kiri'];
    $syarat_prestasi7_kiri=$conf['syarat_prestasi7_kiri'];
    $syarat_prestasi1_kanan=$conf['syarat_prestasi1_kanan'];
    $syarat_prestasi2_kanan=$conf['syarat_prestasi2_kanan'];
    $syarat_prestasi3_kanan=$conf['syarat_prestasi3_kanan'];
    $syarat_prestasi4_kanan=$conf['syarat_prestasi4_kanan'];
    $syarat_prestasi5_kanan=$conf['syarat_prestasi5_kanan'];
    $syarat_prestasi6_kanan=$conf['syarat_prestasi6_kanan'];
    $syarat_prestasi7_kanan=$conf['syarat_prestasi7_kanan'];
    $title_prestasi1=$conf['title_prestasi1'];
    $title_prestasi2=$conf['title_prestasi2'];
    $title_prestasi3=$conf['title_prestasi3'];
    $title_prestasi4=$conf['title_prestasi4'];
    $title_prestasi5=$conf['title_prestasi5'];
    $title_prestasi6=$conf['title_prestasi6'];
    $title_prestasi7=$conf['title_prestasi7'];

?>