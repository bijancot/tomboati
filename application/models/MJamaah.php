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

    public function deleteJamaah($kodePendaftaran){
        $tables = array('DATA_KELUARGA', 'TRANSAKSI','PENDAFTARAN');
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        $this->db->delete($tables);
    }
}
