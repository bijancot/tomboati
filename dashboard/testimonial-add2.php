<?php
include('config.php');
include('fungsi.php');

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


if(isset($_POST['testimonials-add'])){


$id = $_POST['id'];
$userid = $_POST['userid'];
$content = $_POST['content'];
$tanggal = $timer;

$insert = mysqli_query($koneksi, "INSERT INTO testimonials (userid, content, tanggal) VALUES('$userid','$content', '$tanggal')") or die(mysqli_error());

}
header('location:testimonial.php');	
?>