<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MNotifikasi extends CI_Model
{

    public function countMessage()
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->where('SEENAT', null);  
        $this->db->where('ISSEEN', 0);  
        $this->db->where('ISADMIN', 0);  
        $this->db->order_by('CREATEDAT', 'ASC');
        $this->db->group_by('CHAT.ID_CHAT_ROOM');
        
        $query = $this->db->get();

        return $query->num_rows();
    }    

    public function dataNotifChat()
    {
        $this->db->select('*');
        $this->db->from('CHAT');
        $this->db->join('CHAT_ROOM', 'CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER');  
        $this->db->where('SEENAT', null);  
        $this->db->where('ISSEEN', 0);  
        $this->db->where('ISADMIN', 0);  
        $this->db->order_by('CREATEDAT', 'ASC');
        $this->db->group_by('CHAT.ID_CHAT_ROOM');
        
        $query = $this->db->get();

        return $query->result();
    }

    public function countJamaahDaftar()
    {
        $this->db->select('*');
        $this->db->from('PENDAFTARAN');
        $this->db->where('ISSEEN', 0);   
        
        $query = $this->db->get();

        return $query->num_rows();
    }   
    
    public function countJamaahBayar()
    {
        $this->db->select('*');
        $this->db->from('DETAIL_PEMBAYARAN');
        $this->db->where('ISSEEN', 0);   
        
        $query = $this->db->get();

        return $query->num_rows();
    }   

    public function dataJamaahDaftar()
    {
        $this->db->select('*');
        $this->db->from('PENDAFTARAN');
        $this->db->join('USER_REGISTER', 'USER_REGISTER.IDUSERREGISTER = PENDAFTARAN.IDUSERREGISTER'); 
        $this->db->where('ISSEEN', 0);  
        
        $query = $this->db->get();

        return $query->result();
    }
}
