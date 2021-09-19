<?php
class WisataHalal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->helper('rupiah_helper');
        $this->load->helper('tanggal_helper');
        $this->load->library('table');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
        
    }

    public function paket($tipe)
    {
        // untuk mengecek tipe dan dijadikan kondisi di model
        if($tipe == "Internasional"){
            $kodeTipe = "1";
        }else if($tipe == "Nasional"){
            $kodeTipe = "2";
        }else if($tipe == "ZiarahWali"){
            $kodeTipe = "3";
        }

        $dataWisata = $this->MWisataHalal->getWisataHalal($kodeTipe);

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Wisata Halal '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'wisata' => $dataWisata,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('wisatahalal/VWisataHalal', $data);
    }

    public function tambah($tipe)
    {

        $dataMaskapai = $this->MWisataHalal->getMaskapai();
        
        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Wisata Halal '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('wisatahalal/VTambahWisataHalal', $data);
    }

    public function aksiTambah($tipe){
        
        if($tipe == "Internasional"){
            $kodeTipe = "1";
        }else if($tipe == "Nasional"){
            $kodeTipe = "2";
        }else if($tipe == "ZiarahWali"){
            $kodeTipe = "3";
        }

        //convert boolean to int 
        $valIsShow = "";
        $isShow = $this->input->post('isShow');

        if($isShow == "true" || $isShow == "TRUE"){
            $valIsShow = 1;
        }else{
            $valIsShow = 0;
        }

        //upload foto
        // $new_name = 'IMG'.trim($this->input->post('namaPaket'));
        $imageWisata = $this->upload_image();

        $data = array(
               'TIPEWISATA' => $kodeTipe,
               'IDMASKAPAI' => $this->input->post('maskapai'),
               'NAMAWISATA' => $this->input->post('namaWisata'),
               'DURASIWISATA' => $this->input->post('durasiWisata'),
               'RATINGHOTEL' => $this->input->post('ratingHotel'),
               'PENERBANGAN' => $this->input->post('penerbangan'),
               'TANGGALKEBERANGKATAN' => $this->input->post('tanggalKeberangkatan'),
               'NAMAHOTELA' => $this->input->post('namaHotelA'),
               'NAMAHOTELB' => $this->input->post('namaHotelB'),
               'TEMPATHOTELA' => $this->input->post('tempatHotelA'),
               'TEMPATHOTELB' => $this->input->post('tempatHotelB'),
               'DOUBLESHEET' => str_replace('.', '',$this->input->post('doubleSheet')),
               'TRIPLESHEET' => str_replace('.', '',$this->input->post('tripleSheet')),
               'QUADSHEET' => str_replace('.', '',$this->input->post('quadSheet')),
               'BIAYASUDAHTERMASUK' => $this->input->post('biayaSudahTermasuk'),
               'BIAYABELUMTERMASUK' => $this->input->post('biayaBelumTermasuk'),
               'KUOTA' => $this->input->post('kuota'),
               'IMAGEWISATA' => $imageWisata,
               'ISSHOW' => $valIsShow,
               'CREATED_AT' => date("Y-m-d h:i:sa")
        );

        // print_r($data);
        $idWisata = $this->MWisataHalal->saveWisataHalal($data);

        //DETAIL ITINERARY
        $detailKegiatan = $this->input->post('detailKegiatan');
        for ($x = 0; $x < sizeof($detailKegiatan); $x++) {
            $dataItinerary = [
                'IDWISATAHALAL' => $idWisata,
                'HARIKE' => $x+1,
                'TEMPAT' => $this->input->post('tempat')[$x],
                'DETAILKEGIATAN' => $this->input->post('detailKegiatan')[$x],
                'CREATED_AT' => date("Y-m-d h:i:sa")
            ];

            $this->MWisataHalal->saveItinerary($dataItinerary);
        }

        $query = $this->db->query('SELECT USERTOKEN FROM USER_REGISTER WHERE USERTOKEN IS NOT NULL')->result();

        $dataPaketNotif = array(
            'namaPaket' => $this->input->post('namaWisata'),
            'dataToken' => $query
        );
        
        $this->load->view('notif/wisatahalal', $dataPaketNotif);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Wisata Halal berhasil ditambahkan! </div>');

        redirect('WisataHalal/paket/'.$tipe);
    }

    public function edit($idWisata)
    {
        $dataMaskapai = $this->MWisataHalal->getMaskapai();
        $dataWisata = $this->MWisataHalal->getSelectWisataHalal($idWisata);
        $dataItinerary = $this->MWisataHalal->getSelectItinerary($idWisata);

         // untuk mengecek
        if($dataWisata[0]['TIPEWISATA'] == "1"){
            $tipe = "Internasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "2"){
            $tipe = "Nasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "3"){
            $tipe = "ZiarahWali";
        }

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Wisata Halal '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'wisata' => $dataWisata,
            'itinerary' => $dataItinerary,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('wisatahalal/VEditWisataHalal', $data);
    }

    public function aksiEdit($idWisata){        
        //convert boolean to int 
        $valIsShow = "";
        $isShow = $this->input->post('isShow');

        if($isShow == "true" || $isShow == "TRUE"){
            $valIsShow = 1;
        }else{
            $valIsShow = 0;
        }

        //mendapatkan data yang diedit
        $dataWisata = $this->MWisataHalal->getSelectWisataHalal($idWisata);

        //melakukan pengecekan file
        if (empty($_FILES['imageWisata']['name'])){
            $imageWisata = $dataWisata[0]['IMAGEWISATA'];
        }
        else{
             delete_files($dataWisata[0]['IMAGEWISATA']);  
             $imageWisata = $this->upload_image()  ;
        }

        $kodeTipe = $this->input->post('tipeWisata');
        $data = array(
               'IDWISATAHALAL' => $idWisata,
               'TIPEWISATA' => $kodeTipe,
               'IDMASKAPAI' => $this->input->post('maskapai'),
               'NAMAWISATA' => $this->input->post('namaWisata'),
               'DURASIWISATA' => $this->input->post('durasiWisata'),
               'RATINGHOTEL' => $this->input->post('ratingHotel'),
               'PENERBANGAN' => $this->input->post('penerbangan'),
               'TANGGALKEBERANGKATAN' => $this->input->post('tanggalKeberangkatan'),
               'NAMAHOTELA' => $this->input->post('namaHotelA'),
               'NAMAHOTELB' => $this->input->post('namaHotelB'),
               'TEMPATHOTELA' => $this->input->post('tempatHotelA'),
               'TEMPATHOTELB' => $this->input->post('tempatHotelB'),
               'DOUBLESHEET' => str_replace('.', '',$this->input->post('doubleSheet')),
               'TRIPLESHEET' => str_replace('.', '',$this->input->post('tripleSheet')),
               'QUADSHEET' => str_replace('.', '',$this->input->post('quadSheet')),
               'BIAYASUDAHTERMASUK' => $this->input->post('biayaSudahTermasuk'),
               'BIAYABELUMTERMASUK' => $this->input->post('biayaBelumTermasuk'),
               'KUOTA' => $this->input->post('kuota'),
               'IMAGEWISATA' => $imageWisata,
               'ISSHOW' => $valIsShow,
        );

        //dihapus dulu
        //delete itinerary
        $this->MWisataHalal->deleteIntenary($idWisata);

        //DETAIL ITINERARY
        $detailKegiatan = $this->input->post('detailKegiatan');
        for ($x = 0; $x < sizeof($detailKegiatan); $x++) {
            $dataItinerary = [
                'IDWISATAHALAL' => $idWisata,
                'HARIKE' => $x+1,
                'TEMPAT' => $this->input->post('tempat')[$x],
                'DETAILKEGIATAN' => $this->input->post('detailKegiatan')[$x],
                'CREATED_AT' => date("Y-m-d h:i:sa")
            ];

            $this->MWisataHalal->saveItinerary($dataItinerary);
        }

        // untuk mengecek tipe dan dijadikan di redirect
        $tipe = null;
        if($kodeTipe == "1"){
            $tipe = "Internasional";
        }else if($kodeTipe == "2"){
            $tipe = "Nasional";
        }else if($kodeTipe == "3"){
            $tipe = "ZiarahWali";
        }

        // var_dump($data);

        $this->MWisataHalal->updateWisataHalal($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Wisata Halal berhasil diperbarui! </div>');
        
        redirect('WisataHalal/paket/'.$tipe);
    }

    public function aksiHapusPaket($idWisata)
    {
        $dataWisata = $this->MWisataHalal->getSelectWisataHalal($idWisata);
         
        // untuk mengecek
        if($dataWisata[0]['TIPEWISATA'] == "1"){
            $tipe = "Internasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "2"){
            $tipe = "Nasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "3"){
            $tipe = "ZiarahWali";
        }

        //delete itinerary
        $this->MWisataHalal->deleteIntenary($idWisata);

        //delete
        $this->MWisataHalal->deleteWisataHalal($idWisata);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Wisata Halal berhasil dihapus! </div>');

        redirect('WisataHalal/paket/'.$tipe);
    }

    public function aksiAktifPaket($idWisata)
    {
        $dataWisata = $this->MWisataHalal->getSelectWisataHalal($idWisata);
         
        // untuk mengecek tipewisata
        if($dataWisata[0]['TIPEWISATA'] == "1"){
            $tipe = "Internasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "2"){
            $tipe = "Nasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "3"){
            $tipe = "ZiarahWali";
        }

        //delete
        $this->MWisataHalal->aktifWisataHalal($idWisata);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Wisata Halal berhasil diaktifkan! </div>');

        redirect('WisataHalal/paket/'.$tipe);
    }

    public function aksiNonAktifPaket($idWisata)
    {
        $dataWisata = $this->MWisataHalal->getSelectWisataHalal($idWisata);
         
        // untuk mengecek tipewisata
        if($dataWisata[0]['TIPEWISATA'] == "1"){
            $tipe = "Internasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "2"){
            $tipe = "Nasional";
        }else if($dataWisata[0]['TIPEWISATA'] == "3"){
            $tipe = "ZiarahWali";
        }

        //delete
        $this->MWisataHalal->nonAktifWisataHalal($idWisata);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Wisata Halal berhasil dinonaktifkan! </div>');

        redirect('WisataHalal/paket/'.$tipe);
    }

    function upload_image(){
        $config['upload_path'] = './images/wisataHalal/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['imageWisata']['name'])){
 
            if ($this->upload->do_upload('imageWisata')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./images/wisataHalal/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= true;
                // $config['quality']= '100%';
                $config['width']= 600;
                // $config['height']= 400;
                $config['new_image']= './images/wisataHalal/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];

                return base_url('images/wisataHalal/'.$gambar);
            }
                      
        }else{
            return base_url('images/wisataHalal/default.png');
        }         
    }

}