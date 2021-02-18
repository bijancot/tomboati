<?php

class KataMutiara extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
    }

    // Komunitas get
    public function kataMutiara_get(){
        $response       = [];

        $bulan          = $this->input->get('bulan');
        $hari           = date('Y-m-d');

        // echo $hari;

        if(isset($bulan)){
            if($bulan>0 && $bulan<12 ){
                $data = $this->db->query('SELECT * FROM KATA_MUTIARA WHERE WAKTU > "'.$hari.'" && MONTH(WAKTU) = "'.$bulan.'"  ORDER BY WAKTU ASC')->result();
            }else{
                $data = $this->db->query('SELECT * FROM KATA_MUTIARA WHERE WAKTU > "'.$hari.'" ORDER BY WAKTU ASC')->result();
            }
        }else{
            $data = $this->db->query('SELECT * FROM KATA_MUTIARA WHERE WAKTU > "'.$hari.'" ORDER BY WAKTU ASC')->result();
        }
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Kata Mutiara Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    // getKataMutiaraLimit
    public function getKataMutiaraLimit(){
        $response       = [];
        
        $data = $this->db->query('SELECT * FROM KATA_MUTIARA ORDER BY KATA_MUTIARA.WAKTU DESC LIMIT 3')->result();
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Kata Mutiara Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }
    // detailKataMutiara
    public function detailKataMutiara(){
        $response       = [];
        
        $idKataMutiara      = $this->input->get('idKataMutiara');

        $data = $this->db->query('SELECT * FROM KATA_MUTIARA WHERE IDKATAMUTIARA = "'.$idKataMutiara.'"')->result();

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Kata Mutiara Kosong';
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
