<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MChat extends CI_Model
{

    public function getChat()
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.NOMORKTP = CHAT_ROOM.NOMORKTP');  
        $this->db->order_by('CREATEDAT', 'ASC');
        $this->db->group_by('CHAT.ID_CHAT_ROOM');
        
        $query = $this->db->get();

        return $query->result();
    }

    public function getDetailChat($idChatRoom)
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.NOMORKTP = CHAT_ROOM.NOMORKTP');  
        $this->db->where('CHAT.ID_CHAT_ROOM', $idChatRoom);
        $this->db->order_by('CREATEDAT', 'ASC');
        
        $query = $this->db->get();

        return $query->result();
    }

    public function getChatFrom($idChatRoom)
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.NOMORKTP = CHAT_ROOM.NOMORKTP');  
        $this->db->where('CHAT.ID_CHAT_ROOM', $idChatRoom);
        $this->db->order_by('CREATEDAT', 'ASC');
        $this->db->group_by('CHAT.ID_CHAT_ROOM');
        
        $query = $this->db->get();

        return $query->result();
    }
}
