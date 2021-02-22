<?php
class Haji extends CI_Controller
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
        if($tipe == "Reguler"){
            $idMasterPaket = "HAJ-REG";
        }else if($tipe == "Plus"){
            $idMasterPaket = "HAJ-PLS";
        }else if($tipe == "TanpaAntri"){
            $idMasterPaket = "HAJ-TPA";
        }else if($tipe == "Talangan"){
            $idMasterPaket = "HAJ-TLN";
        }else if($tipe == "Badal"){
            $idMasterPaket = "HAJ-BDL";
        }

        $dataPaket = $this->MPaket->getPaket($idMasterPaket);
        // print_r($dataPaket);

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Paket Haji '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'paket' => $dataPaket,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('haji/VPaketHaji', $data);
    }

    public function tambahPaket($tipe)
    {
        // untuk mengecek tipe dan dijadikan kondisi di model
        if($tipe == "Reguler"){
            $idMasterPaket = "HAJ-REG";
        }else if($tipe == "Plus"){
            $idMasterPaket = "HAJ-PLS";
        }else if($tipe == "TanpaAntri"){
            $idMasterPaket = "HAJ-TPA";
        }else if($tipe == "Talangan"){
            $idMasterPaket = "HAJ-TLN";
        }else if($tipe == "Badal"){
            $idMasterPaket = "HAJ-BDL";
        }

        $dataMaskapai = $this->MPaket->getMaskapai();
        
        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Paket Haji '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('haji/VTambahPaket', $data);
    }

    public function aksiTambahPaket($tipe){

        // untuk mengecek tipe dan dijadikan kondisi di model
        if($tipe == "Reguler"){
            $idMasterPaket = "HAJ-REG";
        }else if($tipe == "Plus"){
            $idMasterPaket = "HAJ-PLS";
        }else if($tipe == "TanpaAntri"){
            $idMasterPaket = "HAJ-TPA";
        }else if($tipe == "Talangan"){
            $idMasterPaket = "HAJ-TLN";
        }else if($tipe == "Badal"){
            $idMasterPaket = "HAJ-BDL";
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
        //menangkap kembalian berupa id
        $idPaket = $this->MPaket->savePaket($data);

        //DETAIL ITINERARY
        $detailKegiatan = $this->input->post('detailKegiatan');
        for ($x = 0; $x < sizeof($detailKegiatan); $x++) {
            $dataItinerary = [
                'IDPAKET' => $idPaket,
                'HARIKE' => $x+1,
                'TEMPAT' => $this->input->post('tempat')[$x],
                'DETAILKEGIATAN' => $this->input->post('detailKegiatan')[$x],
                'CREATED_AT' => date("Y-m-d h:i:sa")
            ];

            $this->MPaket->saveItinerary($dataItinerary);
        }

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil ditambahkan! </div>');

        redirect('Haji/paket/'.$tipe);
    }

    public function editPaket($idPaket)
    {
        $dataMaskapai = $this->MPaket->getMaskapai();
        $dataPaket = $this->MPaket->getSelectPaket($idPaket);
        $dataItinerary = $this->MPaket->getSelectItinerary($idPaket);

        $tipe="";
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-REG"){
            $tipe = "Reguler";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TLN"){
            $tipe = "TanpaAntri";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TPA"){
            $tipe = "Talangan";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-BDL"){
            $tipe = "Badal";
        }

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Paket Haji '.$tipe.' | Tombo Ati',
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'itinerary' => $dataItinerary,
            'paket' => $dataPaket,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('Haji/VEditPaket', $data);
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
        $dataPaket = $this->MPaket->getSelectPaket($idPaket);

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
        $this->MPaket->deleteIntenary($idPaket);

        //DETAIL ITINERARY
        $detailKegiatan = $this->input->post('detailKegiatan');
        for ($x = 0; $x < sizeof($detailKegiatan); $x++) {
            $dataItinerary = [
                'IDPAKET' => $idPaket,
                'HARIKE' => $x+1,
                'TEMPAT' => $this->input->post('tempat')[$x],
                'DETAILKEGIATAN' => $this->input->post('detailKegiatan')[$x],
                'CREATED_AT' => date("Y-m-d h:i:sa")
            ];

            $this->MPaket->saveItinerary($dataItinerary);
        }

        // untuk mengecek tipe dan dijadikan kondisi di model
        $tipe = null;
        if($data['IDMASTERPAKET'] == "HAJ-REG"){
            $tipe = "Bisnis";
        }else if($data['IDMASTERPAKET'] == "HAJ-PLS"){
            $tipe = "Hemat";
        }else if($data['IDMASTERPAKET'] == "HAJ-TLN"){
            $tipe = "Plus";
        }else if($data['IDMASTERPAKET'] == "HAJ-TPA"){
            $tipe = "Promo";
        }else if($data['IDMASTERPAKET'] == "HAJ-BDL"){
            $tipe = "VIP";
        }

        // var_dump($data);

        $this->MPaket->updatePaket($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil diperbarui! </div>');

        redirect('Haji/paket/'.$tipe);
    }

    public function aksiHapusPaket($idPaket)
    {
        $dataPaket = $this->MPaket->getSelectPaket($idPaket);
         
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-REG"){
            $tipe = "Reguler";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TLN"){
            $tipe = "TanpaAntri";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TPA"){
            $tipe = "Talangan";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-BDL"){
            $tipe = "Badal";
        }

        //delete itinerary
        $this->MPaket->deleteIntenary($idPaket);

        //delete
        $this->MPaket->deletePaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil dihapus! </div>');

        redirect('Haji/paket/'.$tipe);
    }

    public function aksiAktifPaket($idPaket)
    {
        $dataPaket = $this->MPaket->getSelectPaket($idPaket);
         
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-REG"){
            $tipe = "Reguler";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TLN"){
            $tipe = "TanpaAntri";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TPA"){
            $tipe = "Talangan";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-BDL"){
            $tipe = "Badal";
        }

        //delete
        $this->MPaket->aktifPaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil diaktifkan! </div>');

        redirect('Haji/paket/'.$tipe);
    }

    public function aksiNonAktifPaket($idPaket)
    {
        $dataPaket = $this->MPaket->getSelectPaket($idPaket);
         
        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-REG"){
            $tipe = "Reguler";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TLN"){
            $tipe = "TanpaAntri";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-TPA"){
            $tipe = "Talangan";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "HAJ-BDL"){
            $tipe = "Badal";
        }

        //delete
        $this->MPaket->nonAktifPaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket berhasil dinonaktifkan! </div>');

        redirect('Haji/paket/'.$tipe);
    }

    function upload_image(){
        $config['upload_path'] = './images/paketHaji/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['imagePaket']['name'])){
 
            if ($this->upload->do_upload('imagePaket')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./images/paketHaji/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= true;
                // $config['quality']= '100%';
                $config['width']= 600;
                // $config['height']= 400;
                $config['new_image']= './images/paketHaji/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];

                return base_url('images/paketHaji/'.$gambar);
            }
                      
        }else{
            return base_url('images/paketHaji/default.png');
        }         
    }

}