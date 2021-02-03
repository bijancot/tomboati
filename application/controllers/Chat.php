<?php
class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->model('MChat');
    }

    public function index()
    {
        $dataChat = $this->MChat->getChat();

        $data = array(
            'title'     => 'Chat | Tombo Ati',
            'chat'      => $dataChat
        );

        $this->template->load('template/template', 'chat/VChat', $data);
        $this->load->view("template/script.php");
    }

    public function detailChat($idChatRoom)
    {
        $detailDataChat = $this->MChat->getDetailChat($idChatRoom);
        $chatFrom       = $this->MChat->getChatFrom($idChatRoom);

        $data = array(
            'title'     => 'Detail Chat | Tombo Ati',
            'chat'      => $detailDataChat,
            'chatFrom'  => $chatFrom
        );

        $this->template->load('template/template', 'chat/DetailChat', $data);
        $this->load->view("template/script.php");
    }
}
