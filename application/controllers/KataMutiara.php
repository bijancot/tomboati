<?php
class KataMutiara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }
    public function index()
    {
        $dataKamu = $this->MKatamutiara->getKatamutiara();

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        $data = array(
            'title'         => 'Kata Mutiara | Tombo Ati',
            'kataMutiara'   => $dataKamu,
            'countMessage'  => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('katamutiara/VKataMutiara', $data);
    }

    public function tambahKataMutiara()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        $data = array(
            'title' => 'Tambah Kata Mutiara | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('katamutiara/VTambahKataMutiara', $data);
    }
    public function aksiTambahKataMutiara()
    {
        $data = array(
            'IDKATAMUTIARA'     => $this->input->post('IDKATAMUTIARA'),
            'TEKSKATAMUTIARA'   => $this->input->post('isiKatamutiara')
        );

        // print_r($data);
        $this->MKatamutiara->saveKatamutiara($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kata Mutiara berhasil ditambahkan! </div>');

        redirect('KataMutiara');
    }
    public function editKataMutiara($idKatamutiara)
    {
        $dataKamu = $this->MKatamutiara->getSelectKatamutiara($idKatamutiara);
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        $data = array(
            'title'         => 'Edit Kata Mutiara | Tombo Ati',
            'kataMutiara'   => $dataKamu,
            'countMessage'  => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('katamutiara/VEditKataMutiara', $data);
    }

    public function aksiEditKatamutiara($idKatamutiara)
    {

        //mendapatkan data yang diedit
        $dataKamu = $this->MKatamutiara->getSelectKatamutiara($idKatamutiara);

        $data = array(
            'IDKATAMUTIARA'     => $idKatamutiara,
            'TEKSKATAMUTIARA'   => $this->input->post('isiKatamutiara')
        );

        $this->MKatamutiara->updateKatamutiara($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kata Mutiara berhasil diperbarui! </div>');

        redirect('KataMutiara');
    }
    public function hapusKataMutiara($idKatamutiara)
    {
        //delete
        $this->MKatamutiara->deleteKatamutiara($idKatamutiara);

        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kata Mutiara berhasil dihapus! </div>');

        redirect('KataMutiara');
    }
}
