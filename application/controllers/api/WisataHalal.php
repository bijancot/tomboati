<?php

class WisataHalal extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
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

    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
}
?>
