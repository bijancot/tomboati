<?php

class User extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library(array('upload'));
        date_default_timezone_set('Asia/Jakarta');
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
        $user_token     = $this->input->post('token');
        $filenameKTP    = null;
        $filenameFoto   = null;
        $createdAt      = date('Y-m-d H:i:s');
        $idUserRegister = null;

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
                            'FOTO'          => $filenameFoto,
                            'USERTOKEN'     => $user_token,
                            'CREATED_AT'    => $createdAt
                        );

                        $this->db->insert('USER_REGISTER', $data);

                        $getID    = $this->db->where('NOMORKTP', $noKTP)->get('USER_REGISTER')->result();
                        // var_dump($getID);
                        foreach ($getID as $data) {
                            $idUserRegister = $data->IDUSERREGISTER;
                        }

                        $dataChat = array(
                            'IDUSERREGISTER'      => $idUserRegister
                        );
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
        
        $data = $this->db->query('SELECT * FROM USER_REGISTER JOIN CHAT_ROOM ON CHAT_ROOM.IDUSERREGISTER = USER_REGISTER.IDUSERREGISTER WHERE EMAIL="'.$email.'" AND PASSWORD="'.$password.'"')->result();

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

    // update profil
    public function updateProfil(){ 
        $response = [];

        $config = ['upload_path' => './images/users/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        $idUser         = $this->input->get('idUser');
        $noKTP          = $this->input->post('noKTP'); 
        $email          = $this->input->post('email');
        $namaLengkap    = $this->input->post('namaLengkap');
        $nomorHP        = $this->input->post('nomorHP');
        $filenameKTP    = null;
        $filenameFoto   = null;
        $noKTPSame      = null;
        $emailSame      = null;
        $updatedat      = date('Y-m-d H:i:s');

        if($noKTP != '' && $email != ''){ //check if kosong
            
            $checkKTPSame      = $this->db->where('IDUSERREGISTER', $idUser)->get('USER_REGISTER')->result();
            foreach($checkKTPSame as $data){ // if no KTP Same
                $noKTPSame = $data->NOMORKTP;
            }
            
            $checkEmailSame    = $this->db->where('IDUSERREGISTER', $idUser)->get('USER_REGISTER')->result();
            foreach($checkEmailSame as $data){ // if no Email Same
                $emailSame = $data->EMAIL;
            }

            if($noKTP == $noKTPSame && $email != $emailSame) {
                // echo "ktp sama, email beda";
                $checkEmailFound   = $this->db->where('EMAIL', $email)->get('USER_REGISTER')->row();

                if($checkEmailFound == null){ //check if Email duplikat
    
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //check valid email
                        $data = array(
                            'EMAIL'         => $email,
                            'NAMALENGKAP'   => $namaLengkap,
                            'NOMORHP'       => $nomorHP,
                            'STATUS'        => 0,
                            'UPDATED_AT'    => $updatedat
                        );

                        $where = array(
                            'IDUSERREGISTER' => $idUser
                        );
                        
                
                        $this->db->where($where);
                        $this->db->update('USER_REGISTER', $data);

                        if($this->db->affected_rows()>0){
                            $response['error']    = false;
                            $response['message'] = 'Sukses Edit Profil';
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
            } else if ($noKTP != $noKTPSame && $email == $emailSame) {
                // echo "ktp beda, email sama";
                $checkKTPFound     = $this->db->where('NOMORKTP', $noKTP)->get('USER_REGISTER')->row();

                if($checkKTPFound == null){ //check if no KTP duplikat
            
                    $data = array(
                        'NOMORKTP'      => $noKTP,
                        'NAMALENGKAP'   => $namaLengkap,
                        'NOMORHP'       => $nomorHP,
                        'STATUS'        => 0,
                        'UPDATED_AT'    => $updatedat
                    );

                    $where = array(
                        'IDUSERREGISTER' => $idUser
                    );
                    
            
                    $this->db->where($where);
                    $this->db->update('USER_REGISTER', $data);

                    if($this->db->affected_rows()>0){
                        $response['error']    = false;
                        $response['message'] = 'Sukses Edit Profil';
                        $this->throw(200, $response);
                        return;
                    }
                }else{
                    $response['error']    = true;
                    $response['message'] = 'No KTP Sudah Terdaftar';
                    $this->throw(200, $response);
                    return;    
                }
            } else if ($noKTP != $noKTPSame && $email != $emailSame) {
                $checkKTPFound     = $this->db->where('NOMORKTP', $noKTP)->get('USER_REGISTER')->row();
                $checkEmailFound   = $this->db->where('EMAIL', $email)->get('USER_REGISTER')->row();

                if($checkKTPFound == null){ //check if no KTP duplikat
                    if($checkEmailFound == null){ //check if Email duplikat
        
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //check valid email
                            $data = array(
                                'NOMORKTP'      => $noKTP,
                                'EMAIL'         => $email,
                                'NAMALENGKAP'   => $namaLengkap,
                                'NOMORHP'       => $nomorHP,
                                'STATUS'        => 0,
                                'UPDATED_AT'    => $updatedat
                            );

                            $where = array(
                                'IDUSERREGISTER' => $idUser
                            );
                            
                    
                            $this->db->where($where);
                            $this->db->update('USER_REGISTER', $data);

                            if($this->db->affected_rows()>0){
                                $response['error']    = false;
                                $response['message'] = 'Sukses Edit Profil';
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
                //echo "ktp sama, email sama";
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //check valid email
                    $data = array(
                        'NAMALENGKAP'   => $namaLengkap,
                        'NOMORHP'       => $nomorHP,
                        'STATUS'        => 0,
                        'UPDATED_AT'    => $updatedat
                    );

                    $where = array(
                        'IDUSERREGISTER' => $idUser
                    );
                    
                    $query = $this->db->where($where)->update('USER_REGISTER', $data);
                    // print_r($query);
                    if($this->db->affected_rows()>0){
                        $response['error']    = false;
                        $response['message'] = 'Sukses Edit Profil';
                        $this->throw(200, $response);
                        return;
                    }else{
                        echo "error";
                    }
                }else{
                    $response['error']    = true;
                    $response['message'] = 'Unvalid Email Format';
                    $this->throw(200, $response);
                    return;
                }
            }
        }else{
            $response['error']    = true;
            $response['message'] = 'Terdapat Data Kosong';
            $this->throw(200, $response);
            return;
        }
    }

    public function updateFileKTP(){
        $response = [];

        $idUser = $this->input->get('idUser');
        $filenameKTP = null;

        $config = ['upload_path' => './images/users/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        // var_dump($this->upload->do_upload('fileKTP'));

        if($this->upload->do_upload('fileKTP')){ //check if fileKTP upload
            $dataUpload     = $this->upload->data();
            $filenameKTP    = base_url('images/users/' . $dataUpload['file_name']);
            $data = array(
                'FILEKTP'       => $filenameKTP
            );
    
            $where = array(
                'IDUSERREGISTER' => $idUser
            );
        
            $this->db->where($where);
            $this->db->update('USER_REGISTER', $data);
    
            if($this->db->affected_rows()>0){
                $response['error']    = false;
                $response['message']  = 'Sukses Upload Foto KTP';
                $this->throw(200, $response);
                return;
            }
        }else{
            $error = ['error' => $this->upload->display_errors()];
            print_r($error);
        }
        
    }

    public function updateFoto(){
        $response = [];

        $idUser = $this->input->get('idUser');
        $filenameFoto = null;

        $config = ['upload_path' => './images/users/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        if($this->upload->do_upload('foto')){ //check if fileKTP upload
            $dataUpload     = $this->upload->data();
            $filenameFoto    = base_url('images/users/' . $dataUpload['file_name']);
            $data = array(
                'FOTO'       => $filenameFoto
            );
    
            $where = array(
                'IDUSERREGISTER' => $idUser
            );
        
            $this->db->where($where);
            $this->db->update('USER_REGISTER', $data);
    
            if($this->db->affected_rows()>0){
                $response['error']    = false;
                $response['message']  = 'Sukses Upload Foto';
                $this->throw(200, $response);
                return;
            }
        }else{
            $error = ['error' => $this->upload->display_errors()];
            print_r($error);
        }
        
        
    }

    public function gantiPassword(){
        $response       = [];
        $idUserRegister = $this->input->get('idUserRegister');
        $email          = null;
        $namaLengkap    = null;

        $getEmail       = $this->db->query('SELECT * FROM USER_REGISTER WHERE IDUSERREGISTER="'.$idUserRegister.'"')->result();

        foreach ($getEmail as $data) {
            $email          = $data->EMAIL;
            $namaLengkap    = $data->NAMALENGKAP;
        }

        $dataEmail = array(
            'IDUSERREGISTER'    => $idUserRegister,
            'NAMALENGKAP'       => $namaLengkap
        );

        $this->load->library('email');

		$config['useragent'] = 'Tombo Ati';
		$config['protocol'] = 'smtp';
		
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_user'] = 'adm.tomboati@gmail.com';
		$config['smtp_pass'] = 'TomboAti123';
		$config['smtp_port'] = 465; 
		$config['smtp_timeout'] = 15;
		$config['wordwrap'] = TRUE;
		$config['wrapchars'] = 76;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['validate'] = FALSE;
		$config['priority'] = 3;
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['bcc_batch_mode'] = FALSE;
		$config['bcc_batch_size'] = 200;

		$this->email->initialize($config);
		
		$this->email->from('adm.tomboati@gmail.com', 'Admin Tombo Ati'); 
		$this->email->to($email); 
		$this->email->subject('Reset Password');
		$msg =  $this->load->view('template/email',$dataEmail,true);
        $this->email->message($msg);
        
        if ($this->email->send()) {
            $response['error']      = false;
            $response['message']    = 'Link Pergantian Password Telah Dikirim ke Email Anda';
            $response['email']      = $email;
            $this->throw(200, $response);
            return;
        } else {
            $response['error']    = true;
            $response['message'] = 'Gagal Mengirim Email';
            $this->throw(200, $response);
            return;
        }
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
