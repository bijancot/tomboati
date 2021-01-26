<?php

class Paket extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // paket get
    public function paket_get(){
        $response = [];

        $month          = date('m');
        $monthFilter    = $this->input->post('monthFilter');

        if($monthFilter !=null){
            $data = $this->db->query('SELECT * FROM PAKET WHERE MONTH(TANGGALKEBERANGKATAN) = "'.$monthFilter.'"')->result();
    
            $response['error']    = false;
            $response['messages'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $data = $this->db->query('SELECT * FROM PAKET WHERE MONTH(TANGGALKEBERANGKATAN) = "'.$month.'"')->result();
    
            $response['error']    = false;
            $response['messages'] = 'Sukses Tampil Data';
            $response['data']     = $data;
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
