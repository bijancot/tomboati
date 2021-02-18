<?php

class WisataHalal extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
    }

    // WISATA_HALAL get
    public function wisatahalal_get(){
        $response       = [];
        $tipeWisata     = null;

        $tipe           = $this->input->get('tipe');
        $bulan          = $this->input->get('bulan');
        $hari           = date('Y-m-d');
        
        if($tipe == "Internasional"){
            $tipeWisata = "1";
        } else if($tipe == "Nasional"){
            $tipeWisata = "2";
        } else if($tipe == "ZiarahWali"){
            $tipeWisata = "3";
        }

        // echo $hari;

        if(isset($bulan)){
            if($bulan>0 && $bulan<12 ){
                $data = $this->db->query('SELECT * FROM WISATA_HALAL JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && MONTH(TANGGALKEBERANGKATAN) = "'.$bulan.'" && TIPEWISATA = "'.$tipeWisata.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
            }else{
                $data = $this->db->query('SELECT * FROM WISATA_HALAL JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && TIPEWISATA = "'.$tipeWisata.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
            }
        }else{
            $data = $this->db->query('SELECT * FROM WISATA_HALAL JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$hari.'" && TIPEWISATA = "'.$tipeWisata.'" && ISSHOW = 1 ORDER BY TANGGALKEBERANGKATAN ASC')->result();
        }
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Wisata Halal Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    // getWisataHalalLimit
    public function getWisataHalalLimit(){
        $response       = [];
        
        $data = $this->db->query('SELECT * FROM WISATA_HALAL JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI WHERE ISSHOW = 1 ORDER BY WISATA_HALAL.CREATED_AT DESC LIMIT 3')->result();
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Wisata Halal Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }
    // detailWISATA_HALAL
    public function detailWisataHalal(){
        $response       = [];
        
        $idWisataHalal      = $this->input->get('idWisataHalal');

        $data = $this->db->query('SELECT * FROM WISATA_HALAL JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI WHERE IDWISATAHALAL = "'.$idWisataHalal.'" && ISSHOW = 1')->result();

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Wisata Halal Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    //detail itinerary
    public function detailItinerary(){
        $response       = [];
        
        $idWisataHalal        = $this->input->get('idWisataHalal');

        $data = $this->db->query('SELECT DETAIL_ITINERARY.*, WISATA_HALAL.IDWISATAHALAL FROM DETAIL_ITINERARY JOIN WISATA_HALAL ON WISATA_HALAL.IDWISATAHALAL = DETAIL_ITINERARY.IDWISATAHALAL WHERE DETAIL_ITINERARY.IDWISATAHALAL = "'.$idWisataHalal.'"')->result();

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

    public function getWisataHalalMonth(){
        $response       = [];
        $tipeWisata  = null;
        
        $tipe           = $this->input->get('tipe');
        $bulan          = date('Y-m-d');
        
        if($tipe == "Internasional"){
            $tipeWisata = "1";
        } else if($tipe == "Nasional"){
            $tipeWisata = "2";
        } else if($tipe == "ZiarahWali"){
            $tipeWisata = "3";
        }

        $namaBulan      = "";
        $data = $this->db->query('SELECT TANGGALKEBERANGKATAN FROM WISATA_HALAL JOIN MASKAPAI ON MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI WHERE TANGGALKEBERANGKATAN > "'.$bulan.'" && TIPEWISATA = "'.$tipeWisata.'" && ISSHOW = 1 GROUP BY MONTH(TANGGALKEBERANGKATAN) ORDER BY TANGGALKEBERANGKATAN ASC')->result();
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
            $response['message'] = 'Data Wisata Halal Kosong';
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
