<?php

class TestApi extends CI_Controller{

  // constructor
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function index_get(){

    // testing response
    $response['status']=200;
    $response['error']=false;
    $response['message']='Hai from response';

    // tampilkan response
    $this->response($response);

  }

  public function user_get(){
    $response=[];
    // testing response
    $response['status']=200;
    $response['error']=false;
    $response['user']['username']='erthru';
    $response['user']['email']='ersaka96@gmail.com';
    $response['user']['detail']['full_name']='Suprianto D';
    $response['user']['detail']['position']='Developer';
    $response['user']['detail']['specialize']='Android,IOS,WEB,Desktop';

    //tampilkan response
    
    $this->throw(200, $response);
    return;
  }

  public function add_news(){ 
    $response = [];
    
    $id_news_info = $this->input->post('id_news_info'); 
    $judul_news   = $this->input->post('judul_news');
    $deskripsi    = $this->input->post('deskripsi');
    $konten       = $this->input->post('konten');
    $tanggal      = date('Y-m-d H:i:s');

    $data = array(
      'IDNEWSINFO'      => $id_news_info,
      'JUDULNEWS'       => $judul_news,
      'DESKRIPSINEWS'   => $deskripsi,
      'CONTENTNEWS'      => $konten,
      'TANGGALNEWS'     => $tanggal  
    );

    $this->db->insert('NEWS_INFO', $data);
    if($this->db->affected_rows()>0){
      $response['error']    = false;
      $response['messages'] = 'Berhasil input';
      $this->throw(200, $response);
      return;
    }
    $response['error']    = true;
    $response['messages'] = 'GAgal input';
    $this->throw(200, $response);
    return;
  }

  public function get_news(){
    $response = [];

    $data = $this->db->get('NEWS_INFO')->result();

    $response['error']    = false;
    $response['messages'] = 'Berhasil input';
    $response['data']     = $data;
    $this->throw(200, $response);
    return;
  }

  private function throw($statusCode, $response){
    $this->output->set_status_header($statusCode)
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}

}

?>
