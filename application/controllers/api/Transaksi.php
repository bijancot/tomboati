<?php

class Transaksi extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // pesanan
    public function pesananUmrohHaji(){ 
        $idUserRegister        = $this->input->get('idUserRegister');
        
        $data = $this->db->query('SELECT TRANSAKSI.*, PAKET.NAMAPAKET FROM PENDAFTARAN JOIN TRANSAKSI ON TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN 
        JOIN PAKET ON PAKET.IDPAKET = TRANSAKSI.IDPAKET
        JOIN PEMBAYARAN ON PEMBAYARAN.IDTRANSAKSI = TRANSAKSI.IDTRANSAKSI
        WHERE IDUSERREGISTER = "'.$idUserRegister.'" AND STATUSTRANSAKSI = 1')->result();

        if($this->db->affected_rows()>0){
            $response['error']      = false;
            $response['message']    = 'Berhasil Tampil Data';
            $response["data"]       = $data;
            $this->throw(200, $response);
            return;
        }
    }

    // pesanan
    public function pesananWisataHalal(){ 
        $idUserRegister        = $this->input->get('idUserRegister');
        
        $data = $this->db->query('SELECT TRANSAKSI.*, WISATA_HALAL.NAMAWISATA FROM PENDAFTARAN JOIN TRANSAKSI ON TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN 
        JOIN WISATA_HALAL ON WISATA_HALAL.IDWISATAHALAL = TRANSAKSI.IDWISATAHALAL
        WHERE IDUSERREGISTER = "'.$idUserRegister.'" AND STATUSTRANSAKSI = 1')->result();

        if($this->db->affected_rows()>0){
            $response['error']      = false;
            $response['message']    = 'Berhasil Tampil Data';
            $response["data"]       = $data;
            $this->throw(200, $response);
            return;
        }
    }

    //riwayat transaksi umroh haji
    public function riwayatUmrohHaji(){ 
        $idUserRegister        = $this->input->get('idUserRegister');
        
        $data = $this->db->query('SELECT TRANSAKSI.*, PAKET.NAMAPAKET FROM PENDAFTARAN JOIN TRANSAKSI ON TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN 
        JOIN PAKET ON PAKET.IDPAKET = TRANSAKSI.IDPAKET
        JOIN PEMBAYARAN ON PEMBAYARAN.IDTRANSAKSI = TRANSAKSI.IDTRANSAKSI
        WHERE IDUSERREGISTER = "'.$idUserRegister.'" AND STATUSTRANSAKSI = 1')->result();

        if($this->db->affected_rows()>0){
            $response['error']      = false;
            $response['message']    = 'Berhasil Tampil Data';
            $response["data"]       = $data;
            $this->throw(200, $response);
            return;
        }
    }

    //riwayat transaksi umroh haji
    public function riwayatWisataHalal(){ 
        $idUserRegister        = $this->input->get('idUserRegister');
        
        $data = $this->db->query('SELECT TRANSAKSI.*, PAKET.NAMAPAKET FROM PENDAFTARAN JOIN TRANSAKSI ON TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN 
        JOIN PAKET ON PAKET.IDPAKET = TRANSAKSI.IDPAKET
        JOIN PEMBAYARAN ON PEMBAYARAN.IDTRANSAKSI = TRANSAKSI.IDTRANSAKSI
        WHERE IDUSERREGISTER = "'.$idUserRegister.'" AND STATUSTRANSAKSI = 1')->result();

        if($this->db->affected_rows()>0){
            $response['error']      = false;
            $response['message']    = 'Berhasil Tampil Data';
            $response["data"]       = $data;
            $this->throw(200, $response);
            return;
        }
    }

    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

}
?>
