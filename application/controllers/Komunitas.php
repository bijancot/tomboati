<?php
class Komunitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->library('table');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }
    public function index()
    {
        $dataKomunitas = $this->MKomunitas->getKomunitas();
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Komunitas | Tombo Ati',
            'komunitas'   => $dataKomunitas,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
        $this->template->view('komunitas/VKomunitas', $data);
    }
    public function tambahKomunitas()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Tambah Komunitas | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('komunitas/VTambahKomunitas', $data);
    }

    public function aksiTambahKomunitas()
    {
        //upload Foto
        $foto   = $this->upload_foto();

        $data = array(
            // 'IDKOMUNITASINFO'    => $this->input->post('IDKOMUNITASINFO'),
            'JUDULNEWS'          => $this->input->post('judulNews'),
            // 'DESKRIPSINEWS'      => $this->input->post('deskripsiNews'),
            'CONTENTNEWS'        => $this->input->post('contentNews'),
            'FOTO'               => $foto
        );

        // print_r($data);
        $this->MKomunitas->saveKomunitas($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Komunitas berhasil ditambahkan! </div>');

        redirect('Komunitas');
    }

    public function editKomunitas($idKomunitas)
    {
        $dataKomunitas = $this->MKomunitas->getSelectKomunitas($idKomunitas);
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Edit Komunitas | Tombo Ati',
            'komunitas' => $dataKomunitas,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );


        $this->template->view('komunitas/VEditKomunitas', $data);
    }
    public function aksiEditKomunitas($idKomunitas)
    {

        //mendapatkan data yang diedit
        $dataKomunitas = $this->MKomunitas->getSelectKomunitas($idKomunitas);

        //melakukan pengecekan file foto
        if (empty($_FILES['foto']['name'])) {
            $foto = $dataKomunitas[0]['FOTO'];
        } else {
            // delete_files($dataPaket[0]['IMAGEPAKET']); 
            // unlink($dataPaket[0]['IMAGEPAKET']);die;     
            $foto = $this->upload_foto();
        }

        $data = array(
            'IDKOMUNITASINFO'    => $idKomunitas,
            'JUDULNEWS'          => $this->input->post('judulNews'),
            // 'DESKRIPSINEWS'      => $this->input->post('deskripsiNews'),
            'CONTENTNEWS'        => $this->input->post('contentNews'),
            'FOTO'               => $foto
        );

        $this->MKomunitas->updateKomunitas($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Komunitas berhasil diperbarui! </div>');

        redirect('Komunitas');
    }

    public function hapusKomunitas($idKomunitas)
    {
        //delete
        $this->MKomunitas->deleteKomunitas($idKomunitas);

        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Komunitas berhasil dihapus! </div>');

        redirect('Komunitas');
    }


    function upload_foto()
    {
        $config['upload_path'] = './images/komunitas/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/komunitas/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = true;
                // $config['quality']= '100%';
                $config['width'] = 600;
                // $config['height']= 400;
                $config['new_image'] = './images/komunitas/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                return base_url('images/komunitas/' . $gambar);
            }
        } else {
            return base_url('images/komunitas/default.jpg');
        }
    }
}
