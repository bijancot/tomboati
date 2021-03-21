<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKloter extends CI_Model
{

    public function getKloterbyPaket()
    {
        $this->db->select('*, count(*) as jumlah');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->group_by('PAKET.IDMASTERPAKET');
        $query = $this->db->get();
        return $query->result();
    }

    public function getSelectKloterbyPaket($IDMASTERPAKET){
       
        $this->db->select('*, count(*) as jumlah');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('IDMASTERPAKET', $IDMASTERPAKET);
        $query = $this->db->get();

        return $query->result_array();
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
}
