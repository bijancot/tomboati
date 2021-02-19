<?php

class Komunitas extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
    }

    // Komunitas get
    public function komunitas_get(){
        $response       = [];

        $bulan          = $this->input->get('bulan');
        $hari           = date('Y-m-d');

        // echo $hari;

        if(isset($bulan)){
            if($bulan>0 && $bulan<12 ){
                $data = $this->db->query('SELECT * FROM KOMUNITAS_INFO WHERE TANGGALNEWS > "'.$hari.'" && MONTH(TANGGALNEWS) = "'.$bulan.'"  ORDER BY TANGGALNEWS ASC')->result();
            }else{
                $data = $this->db->query('SELECT * FROM KOMUNITAS_INFO WHERE TANGGALNEWS > "'.$hari.'" ORDER BY TANGGALNEWS ASC')->result();
            }
        }else{
            $data = $this->db->query('SELECT * FROM KOMUNITAS_INFO WHERE TANGGALNEWS > "'.$hari.'" ORDER BY TANGGALNEWS ASC')->result();
        }
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Komunitas Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }

    // getKomunitaslimit
    public function getKomunitasLimit(){
        $response       = [];
        
        $data = $this->db->query('SELECT * FROM KOMUNITAS_INFO ORDER BY KOMUNITAS_INFO.TANGGALNEWS DESC LIMIT 1')->result();
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Komunitas Kosong';
            $this->throw(200, $response);
            return;
        }
        
    }
    // detailKomunitas
    public function detailKomunitas(){
        $response       = [];
        
        $idKomunitas      = $this->input->get('idKomunitas');

        $data = $this->db->query('SELECT * FROM KOMUNITAS_INFO WHERE IDKOMUNITASINFO = "'.$idKomunitas.'"')->result();

        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Komunitas Kosong';
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
