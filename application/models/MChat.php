<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MChat extends CI_Model
{

    public function getChat()
    {
        return $this->db->query("SELECT * FROM CHAT JOIN CHAT_ROOM ON CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM JOIN USER_REGISTER ON USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER WHERE ID_CHAT IN (SELECT MAX(ID_CHAT) FROM CHAT GROUP BY CHAT.ID_CHAT_ROOM)")->result();

    }

    public function getMessageNotSeen(){
        $this->db->select('*, COUNT(MESSAGE) as BANYAK');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER');  
        $this->db->where('SEENAT', null);  
        $this->db->where('ISSEEN', 0);  
        $this->db->where('ISADMIN', 0);  
        $this->db->order_by('CREATEDAT', 'DESC');
        $this->db->group_by('CHAT.ID_CHAT_ROOM');
        
        $query = $this->db->get();

        return $query->result();
    }

    public function getDetailChat($where)
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER');  
        $this->db->where('CHAT.ID_CHAT_ROOM', $where);
        $this->db->order_by('CREATEDAT', 'ASC');
        
        $query = $this->db->get();

        return $query->result();
    }

    public function getDetailChatRows($where)
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER');  
        $this->db->where('CHAT.ID_CHAT_ROOM', $where);
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getChatFrom($idChatRoom)
    {
        $this->db->select('*');
        $this->db->from('USER_REGISTER');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.IDUSERREGISTER = USER_REGISTER.IDUSERREGISTER');
        $this->db->where('CHAT_ROOM.ID_CHAT_ROOM', $idChatRoom);
        
        $query = $this->db->get();

        return $query->result();
    }

    public function updateSeen($data, $idChatRoom){
        $this->db->where('ISADMIN', 0);
        $this->db->where('ID_CHAT_ROOM', $idChatRoom);
        $this->db->update('CHAT', $data);
    }

    public function adminKirimPesan($data){
        $this->db->insert('CHAT', $data);
    }
}
