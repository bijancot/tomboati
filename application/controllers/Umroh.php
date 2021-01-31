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
            $idPaket = "UMR-BSS";
        }else if($tipe == "Hemat"){
            $idPaket = "UMR-HMT";
        }else if($tipe == "Plus"){
            $idPaket = "UMR-PLS";
        }else if($tipe == "Promo"){
            $idPaket = "UMR-PRM";
        }else if($tipe == "VIP"){
            $idPaket = "UMR-VIP";
        }

        $dataPaket = $this->MUmroh->getPaket($idPaket);

        // echo $this->db->last_query();
        //parse parameter
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
            $idPaket = "UMR-BSS";
        }else if($tipe == "Hemat"){
            $idPaket = "UMR-HMT";
        }else if($tipe == "Plus"){
            $idPaket = "UMR-PLS";
        }else if($tipe == "Promo"){
            $idPaket = "UMR-PRM";
        }else if($tipe == "VIP"){
            $idPaket = "UMR-VIP";
        }

        $dataMaskapai = $this->MUmroh->getMaskapai();

        //parse parameter
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
            $idPaket = "UMR-BSS";
        }else if($tipe == "Hemat"){
            $idPaket = "UMR-HMT";
        }else if($tipe == "Plus"){
            $idPaket = "UMR-PLS";
        }else if($tipe == "Promo"){
            $idPaket = "UMR-PRM";
        }else if($tipe == "VIP"){
            $idPaket = "UMR-VIP";
        }

        $data = array(
               'IDMASKAPAI' => $this->input->post('maskapai'),
               'IDMASTERPAKET' => $idPaket,
               'NAMAPAKET' => $this->input->post('namaPaket'),
               'DURASIPAKET' => $this->input->post('durasiPaket'),
               'RATINGHOTEL' => $this->input->post('ratingHotel'),
               'PENERBANGAN' => $this->input->post('penerbangan'),
               'TANGGALKEBERANGKATAN' => $this->input->post('tanggalKeberangkatan'),
               'NAMAHOTELA' => $this->input->post('namaHotelA'),
               'NAMAHOTELB' => $this->input->post('namaHotelB'),
               'DOUBLESHEET' => $this->input->post('doubleSheet'),
               'TRIPLESHEET' => $this->input->post('tripleSheet'),
               'QUADSHEET' => $this->input->post('quadSheet'),
               'BIAYASUDAHTERMASUK' => $this->input->post('biayaSudahTermasuk'),
               'BIAYABELUMTERMASUK' => $this->input->post('biayaBelumTermasuk'),
               'KUOTA' => $this->input->post('kuota'),
               'ISSHOW' => TRUE
        );

        $this->MUmroh->savePaket($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Paket telah ditambahkan! </div>');
        redirect('Umroh/paket/'.$tipe);
    }

    public function editPaket()
    {
        $data = array('title' => 'News');
        $this->template->load('template/template', 'umroh/VTambahBerita', $data);
    }

    public function hapusPaket()
    {
        $data = array('title' => 'News');
        $this->template->load('template/template', 'umroh/VTambahBerita', $data);
    }
}