<?php
class News extends CI_Controller
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
        $dataNews = $this->MNews->getNews();
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'News | Tombo Ati',
            'news' => $dataNews,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('news/VNews', $data);
    }

    public function tambahNews()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Tambah News | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('news/VTambahNews', $data);
    }
    public function aksiTambahNews()
    {
        //upload Foto
        $foto   = $this->upload_foto($this->input->post('IDNEWSINFO'));

        $data = array(
            'IDNEWSINFO'    => $this->input->post('IDNEWSINFO'),
            'JUDULNEWS'     => $this->input->post('judulNews'),
            'DESKRIPSINEWS' => $this->input->post('deskripsiNews'),
            'CONTENTNEWS'   => $this->input->post('contentNews'),
            'FOTO'          => $foto
        );

        // print_r($data);
        $this->MNews->saveNews($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> News berhasil ditambahkan! </div>');

        redirect('news');
    }

    public function editNews($idNews)
    {
        $dataNews = $this->MNews->getSelectNews($idNews);
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Edit News | Tombo Ati',
            'news' => $dataNews,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('news/VEditNews', $data);
    }
    public function aksiEditNews($idNews)
    {

        //mendapatkan data yang diedit
        $dataNews = $this->MNews->getSelectNews($idNews);

        //melakukan pengecekan file foto
        if (empty($_FILES['foto']['name'])) {
            $foto = $dataNews[0]['FOTO'];
        } else {
            // delete_files($dataPaket[0]['IMAGEPAKET']); 
            // unlink($dataPaket[0]['IMAGEPAKET']);die;     
            $foto = $this->upload_foto();
        }

        $data = array(
            'IDNEWSINFO'    => $this->input->post('IDNEWSINFO'),
            'JUDULNEWS'     => $this->input->post('judulNews'),
            'DESKRIPSINEWS' => $this->input->post('deskripsiNews'),
            'CONTENTNEWS'   => $this->input->post('contentNews'),
            'FOTO'          => $foto
        );

        $this->MNews->updateNews($data);

        //alert ketika sudah tersimpan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> News berhasil diperbarui! </div>');

        redirect('news');
    }

    public function hapusNews($idNews)
    {
        //delete
        $this->MNews->deleteNews($idNews);

        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> News berhasil dihapus! </div>');

        redirect('news');
    }

    function upload_foto()
    {
        $config['upload_path'] = './images/news/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/news/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = true;
                // $config['quality']= '100%';
                $config['width'] = 600;
                // $config['height']= 400;
                $config['new_image'] = './images/news/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                return base_url('images/news/' . $gambar);
            }
        } else {
            return base_url('images/news/default.jpg');
        }
    }
}
