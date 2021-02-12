<?php
defined('BASEPATH') or exit('No direct script access allowed');

<<<<<<< Updated upstream
class MNews extends CI_Model
{

    public function getNews()
    {
        $query = $this->db->get('NEWS_INFO');
=======
class MKatamutiara extends CI_Model
{

    public function getKatamutiara()
    {
        $query = $this->db->get('KATA_MUTIARA');
>>>>>>> Stashed changes

        return $query->result();
    }

<<<<<<< Updated upstream
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
=======
    public function saveKatamutiara($data)
    {
        $this->db->set('WAKTU', 'NOW()', FALSE);
        $this->db->insert('KATA_MUTIARA', $data);
    }

    public function getSelectKatamutiara($idKatamutiara)
    {
        $this->db->select('*');
        $this->db->from('KATA_MUTIARA');
        $this->db->where('KATA_MUTIARA.IDKATAMUTIARA', $idKatamutiara);
>>>>>>> Stashed changes
        $query = $this->db->get();

        return $query->result_array();
    }

<<<<<<< Updated upstream
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
=======
    public function updateKatamutiara($data)
    {
        $this->db->where('IDKATAMUTIARA', $data['IDKATAMUTIARA']);
        $this->db->update('KATA_MUTIARA', $data);
        //return $this->db->update('KATA_MUTIARA', $data, ['IDKATAMUTIARA' => $data['IDKATAMUTIARA']]);
    }

    public function deleteKatamutiara($idKatamutiara)
    {
        $this->db->where('IDKATAMUTIARA', $idKatamutiara);
        return $this->db->delete('KATA_MUTIARA');
>>>>>>> Stashed changes
    }
}
