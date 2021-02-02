<?php
class Umroh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->library('form_validation');
        
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

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Paket Umroh '.$tipe,
            'tipe' => $tipe,
            'paket' => $dataPaket
        );

        $this->template->load('template/template', 'umroh/VPaketUmroh', $data);
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

        //parse
        $data = array(
            'title' => 'Paket Umroh '.$tipe,
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai
        );

        //validasi
        // $this->form_validation->set_rules('namaPaket', 'Nama paket', 'required');
        // $this->form_validation->set_rules('kuota', 'Kuota', 'required');
        // $this->form_validation->set_rules('durasiPaket', 'Durasi paket', 'required');
        // $this->form_validation->set_rules('doubleSheet', 'Harga double sheet', 'required');
        // $this->form_validation->set_rules('tripleSheet', 'Harga triple sheet', 'required');
        // $this->form_validation->set_rules('quadSheet', 'Harga quad sheet', 'required');
            
        //pengecekan jika validasi berjalan dan hasilnya  salah, maka akan tetap di halaman ini
        // if ($this->form_validation->run()) {     
        // echo "TIDAK DISINI"; 
        //  $data = array(
        //        'IDMASKAPAI' => $this->input->post('idMaskapai'),
        //        'IDMASTERPAKET' => $idPaket,
        //        'NAMAPAKET' => $this->input->post('namaPaket'),
        //        'DURASIPAKET' => $this->input->post('durasiPaket'),
        //        'RATINGHOTEL' => $this->input->post('ratingHotel'),
        //        'PENERBANGAN' => $this->input->post('penerbangan'),
        //        'TANGGALKEBERANGKATAN' => $this->input->post('tanggalKeberangkatan'),
        //        'NAMAHOTELA' => $this->input->post('namaHotelA'),
        //        'NAMAHOTELB' => $this->input->post('namaHotelB'),
        //        'DOUBLESHEET' => $this->input->post('doubleSheet'),
        //        'TRIPLESHEET' => $this->input->post('tripleSheet'),
        //        'QUADSHEET' => $this->input->post('quadSheet'),
        //        'BIAYASUDAHTERMASUK' => $this->input->post('biayaSudahTermasuk'),
        //        'BIAYABELUMTERMASUK' => $this->input->post('biayaBelumTermasuk'),
        //        'KUOTA' => $this->input->post('kuota'),
        //        'ISSHOW' => TRUE
        // );

        // $this->MUmroh->savePaket($data);
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket telah ditambahkan! </div>');
        // redirect('Umroh/paket/'.$idPaket);
        // }

        $this->template->load('template/template', 'umroh/VTambahPaket', $data);
        
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
               'ISSHOW' => $valIsShow
        );

        $this->MUmroh->savePaket($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket telah ditambahkan! </div>');

        redirect('Umroh/paket/'.$tipe);
    }

    public function editPaket($idPaket)
    {
        $dataMaskapai = $this->MUmroh->getMaskapai();
        $dataPaket = $this->MUmroh->getSelectPaket($idPaket);

        // untuk mengecek idMasterPaket
        if($dataPaket[0]['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe == "Promo";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe == "VIP";
        }

        //parse
        $data = array(
            'title' => 'Paket Umroh '.$tipe,
            'tipe' => $tipe,
            'maskapai' => $dataMaskapai,
            'paket' => $dataPaket
        );

        $this->template->load('template/template', 'umroh/VEditPaket', $data);
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
            'ISSHOW' => $valIsShow
        );

        // untuk mengecek tipe dan dijadikan kondisi di model
         if($data['IDMASTERPAKET'] == "UMR-BSS"){
            $tipe = "Bisnis";
        }else if($data['IDMASTERPAKET'] == "UMR-HMT"){
            $tipe = "Hemat";
        }else if($data['IDMASTERPAKET'] == "UMR-PLS"){
            $tipe = "Plus";
        }else if($data['IDMASTERPAKET'] == "UMR-PRM"){
            $tipe == "Promo";
        }else if($data['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe == "VIP";
        }

        // var_dump($data);

        $this->MUmroh->updatePaket($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket telah diperbarui! </div>');

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
            $tipe == "Promo";
        }else if($dataPaket[0]['IDMASTERPAKET'] == "UMR-VIP"){
            $tipe == "VIP";
        }

        //delete
        $this->MUmroh->deletePaket($idPaket);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket telah dihapus! </div>');

        redirect('Umroh/paket/'.$tipe);
    }
}