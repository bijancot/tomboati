<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MNews extends CI_Model
{

    public function getNews()
    {
        $query = $this->db->get('NEWS_INFO');

        return $query->result();
    }

    public function saveNews($data)
    {
        $this->db->set('TANGGALNEWS', 'NOW()', FALSE);
        $this->db->insert('NEWS_INFO', $data);
    }

    public function getSelectNews($idNews)
    {
        $this->db->select('*');
        $this->db->from('NEWS_INFO');
        $this->db->where('NEWS_INFO.IDNEWSINFO', $idNews);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateNews($data)
    {
        //$this->db->where('IDNEWSINFO', $data['IDNEWSINFO']);
        //$this->db->update('NEWS_INFO', $data);
        return $this->db->update('NEWS_INFO', $data, ['IDNEWSINFO' => $data['IDNEWSINFO']]);
    }

    public function deleteNews($idNews)
    {
        $this->db->where('IDNEWSINFO', $idNews);
        return $this->db->delete('NEWS_INFO');
    }
}
