<?php
class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->model('MChat');
        $this->load->model('MNotifikasi');
    }

    public function index()
    {
        $dataChat       = $this->MChat->getChat();
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title'     => 'Chat | Tombo Ati',
            'chat'      => $dataChat,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->load('template/template', 'chat/VChat', $data);
        $this->load->view("template/script.php");
    }

    public function detailChat($idChatRoom)
    {
        $detailDataChat = $this->MChat->getDetailChat($idChatRoom);
        $chatFrom       = $this->MChat->getChatFrom($idChatRoom);
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $isSeen      = 1;

        $data = array(
            'title'     => 'Detail Chat | Tombo Ati',
            'chat'      => $detailDataChat,
            'chatFrom'  => $chatFrom,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
        
        $where = array(
            'ISSEEN' => $isSeen
        );

        $this->MChat->updateSeen($where, $idChatRoom);
        $this->template->load('template/template', 'chat/DetailChat', $data);
        $this->load->view("template/script.php");
    }

    public function detailChatNotif($idChatRoom)
    {
        $detailDataChat = $this->MChat->getDetailChat($idChatRoom);
        $chatFrom       = $this->MChat->getChatFrom($idChatRoom);
        
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $seenAt      = date('Y-m-d H:i:s');
        $isSeen      = 1;
        
        $data = array(
            'title'     => 'Detail Chat | Tombo Ati',
            'chat'      => $detailDataChat,
            'chatFrom'  => $chatFrom,
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $where = array(
            'SEENAT' => $seenAt,
            'ISSEEN' => $isSeen
        );

        $this->MChat->updateSeen($where, $idChatRoom);

        $this->template->load('template/template', 'chat/DetailChat', $data);
        $this->load->view("template/script.php");
    }

    public function adminKirimPesan(){
        $idChatRoom     = $this->input->post('idChatRoom');
        $message        = $this->input->post('message');
        $token          = $this->input->post('userToken');
        $createdAt      = date('Y-m-d H:i:s');

        $data = array(
            'MESSAGE'       => $message,
            'CREATEDAT'     => $createdAt,
            'ID_CHAT_ROOM'  => $idChatRoom,
            'ISADMIN'       => 1
        );

        $dataKirim = array(
            'judul'     => 'Admin',
            'pesan'   => $message,
            'token'   => $token  
        );

        $this->MChat->adminKirimPesan($data);
        $this->load->view('notif', $dataKirim);
        // redirect('Chat/detailChat/'.$idChatRoom);
    }
}
