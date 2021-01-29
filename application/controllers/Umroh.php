<?php
class Umroh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        
    }
    public function paket()
    {
        //mengambil parameter ke 3 untuk tipe paketnya nya
        $tipe = $this->uri->segment(3);

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
            'paket' => $dataPaket);

        $this->template->load('template/template', 'umroh/VPaketUmroh', $data);
    }

    public function tambahPaket()
    {
        $data = array('title' => 'News');
        $this->template->load('template/template', 'paketUmroh/VTambahBerita', $data);
    }

    public function editPaket()
    {
        $data = array('title' => 'News');
        $this->template->load('template/template', 'paketUmroh/VTambahBerita', $data);
    }

    public function hapusPaket()
    {
        $data = array('title' => 'News');
        $this->template->load('template/template', 'paketUmroh/VTambahBerita', $data);
    }
}