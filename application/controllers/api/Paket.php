<?php

class Paket extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
    }

    // paket get
    public function paket_get(){
        $response       = [];
        $idMasterPaket  = null;

        $tipe           = $this->input->get('tipe');
        $bulan          = $this->input->get('bulan');
        $hari           = date('Y-m-d');
        
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

        // echo $hari;

        if(isset($bulan)){
            if($bulan>0 && $bulan<12 ){
                $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && MONTH(TANGGALKEBERANGKATAN) = "'.$bulan.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
            }else{
                $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
            }
        }else{
            $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
        }
        
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

    // paket haji
    public function paketHaji(){
        $response       = [];
        $idMasterPaket  = null;

        $tipe           = $this->input->get('tipe');
        $bulan          = $this->input->get('bulan');
        $hari           = date('Y-m-d');
        
        if($tipe == "Plus"){
            $idMasterPaket = "HAJ-PLS";
        } else if($tipe == "Reguler"){
            $idMasterPaket = "HAJ-REG";
        } else if($tipe == "TanpaAntri"){
            $idMasterPaket = "HAJ-TPA";
        } else if($tipe == "Talangan"){
            $idMasterPaket = "HAJ-TLN";
        } else if($tipe == "Badal"){
            $idMasterPaket = "HAJ-BDL";
        }

        // echo $hari;
        
        if($tipe == "Reguler" || $tipe == "Talangan" || $tipe == "Badal"){
            $data = $this->db->query('SELECT * FROM PAKET WHERE IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1')->result();
        }else{
            if(isset($bulan)){
                if($bulan>0 && $bulan<12 ){
                    $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && MONTH(TANGGALKEBERANGKATAN) = "'.$bulan.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
                }else{
                    $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
                }
            }else{
                $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
            }
        }

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

    // getPaketLimit
    public function getPaketLimit(){
        $response       = [];
        
        $data = $this->db->query('SELECT * FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE ISSHOW = 1 ORDER BY PAKET.CREATED_AT DESC LIMIT 3')->result();
        
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

        $data = $this->db->query('SELECT DETAIL_ITINERARY.*, PAKET.IDPAKET FROM DETAIL_ITINERARY JOIN PAKET ON PAKET.IDPAKET = DETAIL_ITINERARY.IDPAKET WHERE DETAIL_ITINERARY.IDPAKET = "'.$idPaket.'"')->result();
        // $data = $this->db->query('SELECT DETAIL_ITINERARY.*, PAKET.IDPAKET FROM DETAIL_ITINERARY JOIN PAKET ON PAKET.IDPAKET = DETAIL_ITINERARY.IDPAKET JOIN WISATA_HALAL ON WISATA_HALAL.IDWISATAHALAL = DETAIL_ITINERARY.IDWISATAHALAL WHERE DETAIL_ITINERARY.IDPAKET = "'.$idPaket.'"')->result();

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
        $bulan          = date('Y-m-d');

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
        $data = $this->db->query('SELECT TANGGALKEBERANGKATAN FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$bulan.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 GROUP BY MONTH(TANGGALKEBERANGKATAN) ORDER BY TANGGALKEBERANGKATAN ASC')->result();
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

    public function getPaketHajiMonth(){
        $response       = [];
        $idMasterPaket  = null;
        
        $tipe           = $this->input->get('tipe');
        $bulan          = date('Y-m-d');

        if($tipe == "Plus"){
            $idMasterPaket = "HAJ-PLS";
        } else if($tipe == "TanpaAntri"){
            $idMasterPaket = "HAJ-TPA";
        } 

        $namaBulan      = "";
        $data = $this->db->query('SELECT TANGGALKEBERANGKATAN FROM PAKET JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$bulan.'" && IDMASTERPAKET = "'.$idMasterPaket.'" && ISSHOW = 1 GROUP BY MONTH(TANGGALKEBERANGKATAN) ORDER BY TANGGALKEBERANGKATAN ASC')->result();
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
