<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MWisataHalal extends CI_Model
{

    public function getWisataHalal($kodeTipe)
    {
        $this->db->select('WISATA_HALAL.*, MASKAPAI.NAMAMASKAPAI, MASKAPAI.IMAGEMASKAPAI');
        $this->db->from('WISATA_HALAL');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI');
        $this->db->where('WISATA_HALAL.TIPEWISATA', $kodeTipe);
        $query = $this->db->get();

        return $query->result();
    }

    public function getMaskapai(){
        $this->db->select('*');
        $this->db->from('MASKAPAI');
        $query = $this->db->get();

        return $query->result();  
    }

    public function saveWisataHalal($data){
        $this->db->insert('WISATA_HALAL', $data);
        return $this->db->insert_id();
    }

    public function getSelectWisataHalal($idWisata){
        $this->db->select('WISATA_HALAL.*, MASKAPAI.NAMAMASKAPAI, MASKAPAI.IMAGEMASKAPAI');
        $this->db->from('WISATA_HALAL');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = WISATA_HALAL.IDMASKAPAI');
        $this->db->where('WISATA_HALAL.IDWISATAHALAL', $idWisata);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSelectItinerary($idWisata){
        $this->db->from('DETAIL_ITINERARY');
        $this->db->join('WISATA_HALAL', 'WISATA_HALAL.IDWISATAHALAL = DETAIL_ITINERARY.IDWISATAHALAL');
        $this->db->where('DETAIL_ITINERARY.IDWISATAHALAL', $idWisata);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateWisataHalal($data){
        $this->db->where('IDWISATAHALAL', $data['IDWISATAHALAL']);
        return $this->db->update('WISATA_HALAL', $data);
    }

    public function deleteWisataHalal($idWisata){
        $this->db->where('IDWISATAHALAL', $idWisata);
        return $this->db->delete('WISATA_HALAL');
    }

    public function deleteIntenary($idWisata){
        $this->db->where('IDWISATAHALAL', $idWisata);
        return $this->db->delete('DETAIL_ITINERARY');
    }

    public function aktifWisataHalal($idWisata){
        $this->db->set('ISSHOW', 1);
        $this->db->where('IDWISATAHALAL', $idWisata);
        return $this->db->update('WISATA_HALAL');
    }

    public function nonAktifWisataHalal($idWisata){
        $this->db->set('ISSHOW', 0);
        $this->db->where('IDWISATAHALAL', $idWisata);
        return $this->db->update('WISATA_HALAL');
    }
    
    public function saveItinerary($data){
        return $this->db->insert('DETAIL_ITINERARY', $data);
    }
}
