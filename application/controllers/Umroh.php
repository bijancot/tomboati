<?php
class Umroh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('table');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
        
    }

    public function paket($tipe)
    {
        // untuk mengecek tipe dan dijadikan kondisi di model
        if($tipe == "Bisnis"){
            $idMasterPaket = "UMR-BSS";
        }else if($tipe == "Hemat"){
            $idMasterPaket = "UMR-HMT";
        }else if($tipe == "Plus"){
            $idMasterPaket = "UMR-PLS";
        }else if($tipe == "Promo"){
            $idMasterPaket = "UMR-PRM";
        }else if($tipe == "VIP"){
            $idMasterPaket = "UMR-VIP";
        }

        $dataPaket = $this->MUmroh->getPaket($idMasterPaket);
        // print_r($dataPaket);

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Paket Umroh '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'paket' => $dataPaket,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('umroh/VPaketUmroh', $data);
    }

    public function tambahPaket($tipe)
    {
        // untuk mengecek tipe dan dijadikan kondisi di model
        if($tipe == "Bisnis"){
            $idMasterPaket = "UMR-BSS";
        }else if($tipe == "Hemat"){
            $idMasterPaket = "UMR-HMT";
        }else if($tipe == "Plus"){
            $idMasterPaket = "UMR-PLS";
        }else if($tipe == "Promo"){
            $idMasterPaket = "UMR-PRM";
        }else if($tipe == "VIP"){
            $idMasterPaket = "UMR-VIP";
        }

        $dataMaskapai = $this->MUmroh->getMaskapai();
        
        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        //parse
        $data = array(
            'title' => 'Paket Umroh '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('umroh/VTambahPaket', $data);
    }

    public function aksiTambahPaket($tipe){

        // untuk mengecek tipe dan dijadikan kondisi di model
        if($tipe == "Bisnis"){
            $idMasterPaket = "UMR-BSS";
        }else if($tipe == "Hemat"){
            $idMasterPaket = "UMR-HMT";
        }else if($tipe == "Plus"){
            $idMasterPaket = "UMR-PLS";
        }else if($tipe == "Promo"){
            $idMasterPaket = "UMR-PRM";
        }else if($tipe == "VIP"){
            $idMasterPaket = "UMR-VIP";
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
        $imagePaket = $this->upload_image();

        $data = array(
               'IDMASKAPAI' => $this->input->post('maskapai'),
               'IDMASTERPAKET' => $idMasterPaket,
               'NAMAPAKET' => $this->input->post('namaPaket'),
               'DURASIPAKET' => $this->input->post('durasiPaket'),
               'RATINGHOTEL' => $this->input->post('ratingHotel'),
               'PENERBANGAN' => $this->input->post('penerbangan'),
               'TANGGALKEBERANGKATAN' => $this->input->post('tanggalKeberangkatan'),
               'NAMAHOTELA' => $this->input->post('namaHotelA'),
               'NAMAHOTELB' => $this->input->post('namaHotelB'),
               'TEMPATHOTELA' => $this->input->post('tempatHotelA'),
               'TEMPATHOTELB' => $this->input->post('tempatHotelB'),
               'DOUBLESHEET' => $this->input->post('doubleSheet'),
               'TRIPLESHEET' => $this->input->post('tripleSheet'),
               'QUADSHEET' => $this->input->post('quadSheet'),
               'BIAYASUDAHTERMASUK' => $this->input->post('biayaSudahTermasuk'),
               'BIAYABELUMTERMASUK' => $this->input->post('biayaBelumTermasuk'),
               'KUOTA' => $this->input->post('kuota'),
               'IMAGEPAKET' => $imagePaket,
               'ISSHOW' => $valIsShow,
               'CREATED_AT' => date("Y-m-d h:i:sa")
        );

        // print_r($data);
        $this->MUmroh->savePaket($data);

        //GET LAST SELECT ADD
        $dataPaket = $this->MUmroh->getSelectLastPaket();

        //DETAIL ITINERARY
        $detailKegiatan = $this->input->post('detailKegiatan');
        for ($x = 0; $x < sizeof($detailKegiatan); $x++) {
            $dataItinerary = [
                'IDPAKET' => $dataPaket[0]['IDPAKET'],
                'HARIKE' => $x+1,
                'TEMPAT' => $this->input->post('tempat')[$x],
                'DETAILKEGIATAN' => $this->input->post('detailKegiatan')[$x],
                'CREATED_AT' => date("Y-m-d h:i:sa")
            ];

            $this->MUmroh->saveItinerary($dataItinerary);
        }

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil ditambahkan! </div>');

        redirect('Umroh/paket/'.$tipe);
    }

    public function editPaket($idPaket)
    {
        $dataMaskapai = $this->MUmroh->getMaskapai();
        $dataPaket = $this->MUmroh->getSelectPaket($idPaket);
        $dataItinerary = $this->MUmroh->getSelectItinerary($idPaket);

        $tipe="";
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe = "Promo";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe = "VIP";
        }

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        //parse
        $data = array(
            'title' => 'Paket Umroh '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'itinerary' => $dataItinerary,
            'paket' => $dataPaket,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('umroh/VEditPaket', $data);
    }

    public function aksiEditPaket($idPaket){        
        //convert boolean to int 
        $valIsShow = "";
        $isShow = $this->input->post('isShow');

        if($isShow == "true" || $isShow == "TRUE"){
            $valIsShow = 1;
        }else{
            $valIsShow = 0;
        }

        //mendapatkan data yang diedit
        $dataPaket = $this->MUmroh->getSelectPaket($idPaket);

        //melakukan pengecekan file
        if (empty($_FILES['imagePaket']['name'])){
            $imagePaket = $dataPaket[0]['IMAGEPAKET'];
        }
        else{
             delete_files($dataPaket[0]['IMAGEPAKET']); 
            // unlink($dataPaket[0]['IMAGEPAKET']);die;     
             $imagePaket = $this->upload_image()  ;
        }

        $data = array(
            'IDPAKET' => $idPaket,
            'IDMASKAPAI' => $this->input->post('maskapai'),
            'IDMASTERPAKET' => $this->input->post('idMasterPaket'),
            'NAMAPAKET' => $this->input->post('namaPaket'),
            'DURASIPAKET' => $this->input->post('durasiPaket'),
            'RATINGHOTEL' => $this->input->post('ratingHotel'),
            'PENERBANGAN' => $this->input->post('penerbangan'),
            'TANGGALKEBERANGKATAN' => $this->input->post('tanggalKeberangkatan'),
            'NAMAHOTELA' => $this->input->post('namaHotelA'),
            'NAMAHOTELB' => $this->input->post('namaHotelB'),
            'TEMPATHOTELA' => $this->input->post('tempatHotelA'),
            'TEMPATHOTELB' => $this->input->post('tempatHotelB'),
            'DOUBLESHEET' => $this->input->post('doubleSheet'),
            'TRIPLESHEET' => $this->input->post('tripleSheet'),
            'QUADSHEET' => $this->input->post('quadSheet'),
            'BIAYASUDAHTERMASUK' => $this->input->post('biayaSudahTermasuk'),
            'BIAYABELUMTERMASUK' => $this->input->post('biayaBelumTermasuk'),
            'KUOTA' => $this->input->post('kuota'),
            'IMAGEPAKET' => $imagePaket,
            'ISSHOW' => $valIsShow
        );

        //dihapus dulu
        //delete itinerary
        $this->MUmroh->deleteIntenary($idPaket);

        //DETAIL ITINERARY
        $detailKegiatan = $this->input->post('detailKegiatan');
        for ($x = 0; $x < sizeof($detailKegiatan); $x++) {
            $dataItinerary = [
                'IDPAKET' => $dataPaket[0]['IDPAKET'],
                'HARIKE' => $x+1,
                'TEMPAT' => $this->input->post('tempat')[$x],
                'DETAILKEGIATAN' => $this->input->post('detailKegiatan')[$x],
               'CREATED_AT' => date("Y-m-d h:i:sa")
            ];

            $this->MUmroh->saveItinerary($dataItinerary);
        }

        // untuk mengecek tipe dan dijadikan kondisi di model
        $tipe = null;
         if($data['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($data['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($data['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($data['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe = "Promo";
        }else if($data['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe = "VIP";
        }

        // var_dump($data);

        $this->MUmroh->updatePaket($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil diperbarui! </div>');

        redirect('Umroh/paket/'.$tipe);
    }

    public function aksiHapusPaket($idPaket)
    {
        $dataPaket = $this->MUmroh->getSelectPaket($idPaket);
         
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe = "Promo";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe = "VIP";
        }

        //delete itinerary
        $this->MUmroh->deleteIntenary($idPaket);

        //delete
        $this->MUmroh->deletePaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil dihapus! </div>');

        redirect('Umroh/paket/'.$tipe);
    }

    public function aksiAktifPaket($idPaket)
    {
        $dataPaket = $this->MUmroh->getSelectPaket($idPaket);
         
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe = "Promo";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe = "VIP";
        }

        //delete
        $this->MUmroh->aktifPaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil diaktifkan! </div>');

        redirect('Umroh/paket/'.$tipe);
    }

    public function aksiNonAktifPaket($idPaket)
    {
        $dataPaket = $this->MUmroh->getSelectPaket($idPaket);
         
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe = "Promo";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe = "VIP";
        }

        //delete
        $this->MUmroh->nonAktifPaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil dinonaktifkan! </div>');

        redirect('Umroh/paket/'.$tipe);
    }

    function upload_image(){
        $config['upload_path'] = './images/paketUmroh/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['imagePaket']['name'])){
 
            if ($this->upload->do_upload('imagePaket')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./images/paketUmroh/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= true;
                // $config['quality']= '100%';
                $config['width']= 600;
                // $config['height']= 400;
                $config['new_image']= './images/paketUmroh/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];

                return base_url('images/paketUmroh/'.$gambar);
            }
                      
        }else{
            return base_url('images/paketUmroh/default.png');
        }         
    }

}