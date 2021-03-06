<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('table');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
        
    }

    public function index()
    {
        $dataUser = $this->MUser->getUser();

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Agen | Tombo Ati',
            'user' => $dataUser,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('user/VUser', $data);
    }

    public function tambahUser()
    {

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Agen | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('user/VTambahUser', $data);
    }

    public function tambahMitra()
    {

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Mitra | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('user/VTambahMitra', $data);
    }

    public function aksiTambahUser(){

        //upload KTP dan Foto
        $fileKTP = $this->upload_ktp();
        $foto = $this->upload_foto();

        //generate acak
        $kodeReferral = $this->generate_string(8);
        $data = array(
               'NOMORKTP' => $this->input->post('nomorKTP'),
               'EMAIL' => $this->input->post('email'),
               'PASSWORD' => $this->input->post('password'),
               'NAMALENGKAP' => $this->input->post('namaLengkap'),
               'KATEGORI' => $this->input->post('kategori'),
               'STATUS' => 0,
               'KODEREFERRALFROM' => $this->input->post('kodeReferralFrom'),
               'KODEREFERRAL' => $kodeReferral,
               'NOMORHP' => $this->input->post('nomorHP'),
               'FILEKTP' => $fileKTP,
               'FOTO' => $foto,
               'CREATED_AT' => date("Y-m-d h:i:sa")
        );

        // print_r($data);
        $this->MUser->saveUser($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User berhasil ditambahkan! </div>');

        redirect('user');
    }

    public function editUser($idUser)
    {
        $dataUser = $this->MUser->getSelectUser($idUser);

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Agen | Tombo Ati',
            'user' => $dataUser,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );
        $this->template->view('user/VEditUser', $data);
    }

    public function editMitra($idUser)
    {
        $dataUser = $this->MUser->getSelectUser($idUser);

        //notifikasi pesan
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //parse
        $data = array(
            'title' => 'Mitra | Tombo Ati',
            'user' => $dataUser,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );
        $this->template->view('user/VEditMitra', $data);
    }

    public function aksiEditUser($idUser){        

        //mendapatkan data yang diedit
        $dataUser = $this->MUser->getSelectUser($idUser);

        //melakukan pengecekan file
        if (empty($_FILES['fileKTP']['name'])){
            $fileKTP = $dataUser[0]['FILEKTP'];
        }
        else{
            // delete_files($dataPaket[0]['IMAGEPAKET']); 
            // unlink($dataPaket[0]['IMAGEPAKET']);die;     
             $fileKTP = $this->upload_ktp();
        }

        //melakukan pengecekan file foto
        if (empty($_FILES['foto']['name'])){
            $foto = $dataUser[0]['FOTO'];
        }
        else{
            // delete_files($dataPaket[0]['IMAGEPAKET']); 
            // unlink($dataPaket[0]['IMAGEPAKET']);die;     
             $foto = $this->upload_foto();
        }

        $data = array(
               'IDUSERREGISTER' => $idUser,
               'NOMORKTP' => $this->input->post('nomorKTP'),
               'EMAIL' => $this->input->post('email'),
               'PASSWORD' => $this->input->post('password'),
               'NAMALENGKAP' => $this->input->post('namaLengkap'),
               'KATEGORI' => $this->input->post('kategori'),
               'KODEREFERRALFROM' => $this->input->post('kodeReferralFrom'),
               'NOMORHP' => $this->input->post('nomorHP'),
               'FILEKTP' => $fileKTP,
               'FOTO' => $foto
        );
        // var_dump($data);
        $this->MUser->updateUser($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User berhasil diperbarui! </div>');

        redirect('user');
    }

    public function aksiHapusUser($idUser)
    {         
        //delete
        $this->MUser->deleteUser($idUser);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User berhasil dihapus! </div>');

        redirect('user');
    }

    function upload_ktp(){
        $config['upload_path'] = './images/users/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $new_name = $this->input->post('nomorKTP').'_KTP';
        $config['file_name'] = $new_name;
 
        $this->upload->initialize($config);
        if(!empty($_FILES['fileKTP']['name'])){
 
            if ($this->upload->do_upload('fileKTP')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./images/users/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= true;
                // $config['quality']= '100%';
                // $config['width']= 600;
                // $config['height']= 400;
                $config['new_image']= './images/users/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];

                return base_url('images/users/'.$gambar);
            }
                      
        }else{
            return base_url('images/users/default_ktp.png');
        }         
    }

    function upload_foto(){
        $config['upload_path'] = './images/users/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $new_name = $this->input->post('nomorKTP').'_FOTO';
        $config['file_name'] = $new_name;
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
 
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./images/users/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= true;
                // $config['quality']= '100%';
                $config['width']= 600;
                // $config['height']= 400;
                $config['new_image']= './images/users/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];

                return base_url('images/users/'.$gambar);
            }
                      
        }else{
            return base_url('images/users/default_foto.png');
        }         
    }
 
    function generate_string($strength = 16) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }

    function aksiVerifikasiUser($idUser){
        //verif
        $this->MUser->verifUser($idUser);
        
        // echo $this->db->last_query();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User berhasil diverifikasi! </div>');

        redirect('user');
    }

    function aksiCabutVerifikasiUser($idUser){
        //CABUT
        $this->MUser->cabutUser($idUser);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User berhasil dicabut verifikasi! </div>');

        redirect('user');
    }

    function gantiPassword(){
        $idUserRegister = $this->input->post('idUserRegister');
        $password       = $this->input->post('password');
        $confirmPassword = $this->input->post('confirmPassword');
        $strlenPassword = strlen($password);

        if ($strlenPassword >=6 && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)){
            if($confirmPassword != $password){
                $this->session->set_flashdata('message', 'Password Berbeda');
                $this->session->set_flashdata('gagal', 'Password Gagal Diubah');
                redirect('Admin/ChangePassword?idUserRegister='.$idUserRegister);
            }else{
                $data = $this->MUser->gantiPassword($idUserRegister, $password);
                if($data = true){
                    $this->session->set_flashdata('success', '<strong>Sukses Reset Password</strong>, Silahkan login kembali ke Aplikasi Tombo Ati');
                    redirect('Admin/ChangePassword?idUserRegister='.$idUserRegister);
                    $this->session->mark_as_temp('success', 300);
                }else{
                    $this->session->set_flashdata('gagal', 'Password Gagal Diubah');
                    redirect('Admin/ChangePassword?idUserRegister='.$idUserRegister);
                }
            }
        }else{
            $this->session->set_flashdata('mess', 'Min 6 Karakter, Karakter dan Numerik');
            $this->session->set_flashdata('gagal', 'Password Gagal Diubah');
            redirect('Admin/ChangePassword?idUserRegister='.$idUserRegister);
        }
    }

    public function mitra()
    {
        $dataUser = $this->MUser->getMitra();

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Mitra | Tombo Ati',
            'user' => $dataUser,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('user/VMitra', $data);
    }
}