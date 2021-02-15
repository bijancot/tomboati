<?php

class Paket extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // paket get
    public function paket_get(){
        $response       = [];
        $idMasterPaket  = null;

        $tipe           = $this->input->get('tipe');
    
        if($tipe == "Bisnis"){
            $idMasterPaket = "UMR-BSS";
        } else if($tipe == "Hemat"){
            $idMasterPaket = "UMR-HMT";
        } else if($tipe == "Plus"){
            $idMasterPaket = "UMR-PLS";
        } else if($tipe == "Promo"){
            $idMasterPaket = "UMR-PRM";
        } else if($tipe == "VIP"){
            $idMasterPaket = "UMR-VIP";
        }

        $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1')->result();

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Promo Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    // detailPaket
    public function detailPaket(){
        $response       = [];
        $idMasterPaket  = null;
        
        $idPaket        = $this->input->get('idPaket');

        $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE IDPAKET = "'.$idPaket.'" && ISSHOW = 1')->result();

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Promo Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    //detail itinerary
    public function detailItinerary(){
        $response       = [];
        $idMasterPaket  = null;
        
        $idPaket        = $this->input->get('idPaket');

        $data = $this->db->query('SELECT *, PAKET.IDPAKET FROM DETAIL_ITINERARY JOIN PAKET ON PAKET.IDPAKET = DETAIL_ITINERARY.IDPAKET JOIN WISATA_HALAL ON WISATA_HALAL.IDWISATAHALAL = DETAIL_ITINERARY.IDWISATAHALAL WHERE DETAIL_ITINERARY.IDPAKET = "'.$idPaket.'"')->result();

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Promo Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    public function getPaketMonth(){
        $response       = [];
        $idMasterPaket  = null;
        
        $tipe           = $this->input->get('tipe');
    
        if($tipe == "Bisnis"){
            $idMasterPaket = "UMR-BSS";
        } else if($tipe == "Hemat"){
            $idMasterPaket = "UMR-HMT";
        } else if($tipe == "Plus"){
            $idMasterPaket = "UMR-PLS";
        } else if($tipe == "Promo"){
            $idMasterPaket = "UMR-PRM";
        } else if($tipe == "VIP"){
            $idMasterPaket = "UMR-VIP";
        }

        $namaBulan      = "";
        $data = $this->db->query('SELECT TANGGALKEBERANGKATAN FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 GROUP BY MONTH(TANGGALKEBERANGKATAN)')->result();
        $arr = array();

        foreach($data as $d){
            $dataMonth = $d->TANGGALKEBERANGKATAN;
            $newDate = date("m", strtotime($dataMonth));  
            $arr[] = $newDate;
        }

        $excludes = implode(',', $arr);
        $explode = explode(',', $excludes);

        $dataBulan = array(
            'bulan' => $explode
        );

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $dataBulan;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Promo Kosong';
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
