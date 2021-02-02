<?php

class User extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library(array('upload'));
    }

    // register
    public function register_post(){ 
        $response = [];

        $config = ['upload_path' => './images/users/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);
        
        $noKTP          = $this->input->post('noKTP'); 
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $namaLengkap    = $this->input->post('namaLengkap');
        $nomorHP        = $this->input->post('nomorHP');
        $filenameKTP    = null;
        $filenameFoto   = null;

        if($noKTP != '' && $email != '' && $password != ''){ //check if kosong
            $checkKTPFound      = $this->db->where('NOMORKTP', $noKTP)->get('USER_REGISTER')->row();
            $checkEmailFound    = $this->db->where('EMAIL', $email)->get('USER_REGISTER')->row();

            if($checkKTPFound == null){ //check if no KTP duplikat
                if($checkEmailFound == null){ //check if Email duplikat

                    if($this->upload->do_upload('fileKTP')){ //check if fileKTP upload
                        $dataUpload     = $this->upload->data();
                        $filenameKTP    = base_url('images/users/' . $dataUpload['file_name']);
                    }
                    
                    if($this->upload->do_upload('foto')){ //check if foto upload
                        $dataUpload     = $this->upload->data();
                        $filenameFoto   = base_url('images/users/' . $dataUpload['file_name']);
                    }
    
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //check valid email
                        $data = array(
                            'NOMORKTP'      => $noKTP,
                            'EMAIL'         => $email,
                            'PASSWORD'      => $password,
                            'NAMALENGKAP'   => $namaLengkap,
                            'NOMORHP'       => $nomorHP,
                            'FILEKTP'       => $filenameKTP,
                            'FOTO'          => $filenameFoto
                        );

                        $dataChat = array(
                            'NOMORKTP'      => $noKTP
                        );
                
                        $this->db->insert('USER_REGISTER', $data);
                        $this->db->insert('CHAT_ROOM', $dataChat);

                        if($this->db->affected_rows()>0){
                            $response['error']    = false;
                            $response['message'] = 'Sukses Register';
                            $this->throw(200, $response);
                            return;
                        }
                    }else{
                        $response['error']    = true;
                        $response['message'] = 'Unvalid Email Format';
                        $this->throw(200, $response);
                        return;
                    }
                }else{
                    $response['error']    = true;
                    $response['message'] = 'Email Sudah Terdaftar';
                    $this->throw(200, $response);
                    return;    
                }
            }else{
                $response['error']    = true;
                $response['message'] = 'No KTP Sudah Terdaftar';
                $this->throw(200, $response);
                return;    
            }
        }else{
            $response['error']    = true;
            $response['message'] = 'Terdapat Data Kosong';
            $this->throw(200, $response);
            return;
        }
    }

    // login post
    public function login_post(){
        $response       = [];
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $user_token     = $this->input->post('token');
        
        $data = $this->db->query('SELECT * FROM USER_REGISTER JOIN CHAT_ROOM ON CHAT_ROOM.NOMORKTP = USER_REGISTER.NOMORKTP WHERE EMAIL="'.$email.'" AND PASSWORD="'.$password.'"')->result();

        $dataUpdate = $this->db->set('USERTOKEN', $user_token)->where('EMAIL', $email)->update('USER_REGISTER');

        if($data != null){
            if($this->db->affected_rows() >= 0){
                $response["error"]  = false;
                $response["message"] = "Sukses Login";
                $response["data"]   = $data;
                $this->throw(200, $response);
                return;
            }
        }

        $response["error"] = true;
        $response["message"] = "Email/Password are Incorrect!";
        $this->throw(200, $response);
    }

    public function logout_post(){
        $response       = [];
        $email          = $this->input->post('email');
        
        $this->db->set('USERTOKEN', null)->where('EMAIL', $email)->update('USER_REGISTER');

        if($this->db->affected_rows() >= 0){
            $response["error"]  = false;
            $response["message"] = "Sukses Logout";
            $this->throw(200, $response);
            return;
        }else{
            $response["error"]  = true;
            $response["message"] = "Gagal Logout";
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
