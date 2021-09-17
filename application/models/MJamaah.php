<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MJamaah extends CI_Model
{

    public function getJamaahUmroh()
    {
        $this->db->select('*');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->order_by('PENDAFTARAN.CREATED_AT', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJamaahWisataHalal()
    {
        $this->db->select('*');
        $this->db->from('TRANSAKSI');
        $this->db->join('WISATA_HALAL', 'TRANSAKSI.IDWISATAHALAL = WISATA_HALAL.IDWISATAHALAL');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->order_by('PENDAFTARAN.CREATED_AT', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function updateJamaah()
    {
        $this->db->set('ISSEEN', 1);
        $this->db->where('ISSEEN', 0);
        $this->db->update('PENDAFTARAN');
    }

    public function verifPendaftaranJamaah($kodePendaftaran)
    {
        $this->db->set('STATUSPENDAFTARAN', 1);
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        return $this->db->update('PENDAFTARAN');
    }

    public function cabutPendaftaranJamaah($kodePendaftaran)
    {
        $this->db->set('STATUSPENDAFTARAN', 0);
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        return $this->db->update('PENDAFTARAN');
    }

    public function verifTransaksiJamaah($kodePendaftaran)
    {
        $this->db->set('STATUSTRANSAKSI', 1);
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        return $this->db->update('TRANSAKSI');
    }

    public function cabutTransaksiJamaah($kodePendaftaran)
    {
        $this->db->set('STATUSTRANSAKSI', 0);
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        return $this->db->update('TRANSAKSI');
    }

    public function deleteJamaah($kodePendaftaran)
    {
        // $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        // return $this->db->delete('TRANSAKSI');
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $this->db->delete('DATA_KELUARGA', array('KODEPENDAFTARAN' => $kodePendaftaran));
        $this->db->delete('PENDAFTARAN', array('KODEPENDAFTARAN' => $kodePendaftaran));
        $this->db->delete('TRANSAKSI', array('KODEPENDAFTARAN' => $kodePendaftaran));
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");
        
    }

    public function totalJamaah()
    {
        $this->db->from('TRANSAKSI');
        $this->db->select('IDTRANSAKSI');
        // $this->db->where('STATUS', 1);
        $query = $this->db->get('');

        return $query->num_rows();
    }

    public function totalChat()
    {
        // $this->db->from('CHAT_ROOM');
        // $this->db->select('ID_CHAT_ROOM');
        // $this->db->where('STATUS', 1);
        // $query = $this->db->get('');
        $query = $this->db->query("SELECT * FROM CHAT JOIN CHAT_ROOM ON CHAT_ROOM.ID_CHAT_ROOM = CHAT.ID_CHAT_ROOM JOIN USER_REGISTER ON USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER WHERE ID_CHAT IN (SELECT MAX(ID_CHAT) FROM CHAT GROUP BY CHAT.ID_CHAT_ROOM)");
        return $query->num_rows();
    }
}
