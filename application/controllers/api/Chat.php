<?php

class Chat extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library(array('upload'));
    }

    // chat_post
    public function chat_post(){ 
        date_default_timezone_set('Asia/Jakarta');

        $config = ['upload_path' => './images/chats/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        $response = [];
        
        $message        = $this->input->post('message');
        $createdAt      = date('Y-m-d H:i:s');
        $idChatRoom     = $this->input->post('idChatRoom');
        $filenameChat   = null;

        if($this->upload->do_upload('img')){ //check if fileKTP upload
            $dataUpload     = $this->upload->data();
            $filenameChat    = base_url('images/chats/' . $dataUpload['file_name']);
        }
    
        $data = array(
            'ID_CHAT_ROOM'  => $idChatRoom,
            'MESSAGE'       => $message,
            'IMG'           => $filenameChat,
            'CREATEDAT'     => $createdAt,
            'ISSEEN'        => false,
            'ISADMIN'       => false
        );
    
        
        $this->db->insert('CHAT', $data);
        
        if($this->db->affected_rows()>0){
            require APPPATH . 'views/vendor/autoload.php';
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'ee692ab95bb9aeaa1dcc',
                'b062506e42b3a8c66368',
                '1149993',
                $options
            );
    
            $data['notif'] = 'chat';
            $pusher->trigger('my-channel', 'my-event', $data);

            $response['error']    = false;
            $response['message'] = 'Terkirim';
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Terkirim';
            $this->throw(200, $response);
            return;
        }
    }

    // chat_get
    public function chat_get(){ 
        $response = [];
        $idChatRoom     = $this->input->post('idChatRoom'); 
        
        $data = $this->db->order_by('CREATEDAT', 'ASC')->get_where('CHAT', array('ID_CHAT_ROOM' => $idChatRoom))->result();
        if($data != null){
            if($this->db->affected_rows()>0){
                $response['error']    = false;
                $response['message'] = 'Berhasil Tampil Data';
                $response["data"]   = $data;
                $this->throw(200, $response);
                return;
            }
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Tampil Data';
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
