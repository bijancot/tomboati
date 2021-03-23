<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKloter extends CI_Model
{

    // TAMPILAN AWAL DI KLOTER
    public function getKloterbyPaket()
    {
        $this->db->select('*, count(TRANSAKSI.IDPAKET) as jumlah');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->group_by('TRANSAKSI.IDPAKET');
        $query = $this->db->get();
        return $query->result();
    }

    // ini untuk menampilkan di atur kloter
    public function getSelectKloterbyPaket($IDPAKET){
       
        $this->db->select('*, count(TRANSAKSI.IDPAKET) as jumlah');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('TRANSAKSI.IDPAKET', $IDPAKET);
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->group_by('TRANSAKSI.IDPAKET');
        $query = $this->db->get();

        return $query->result_array();
    }

    // INI UNTUK PEMILIHAN KAROMAH
    public function getSelectKloterbyJamaah($IDPAKET){
       
        $this->db->select('*');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('TRANSAKSI.IDPAKET', $IDPAKET);
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->where('KLOTER !=', NULL);
        $query = $this->db->get();

        return $query->result_array();
    }

    // INI UNTUK JAMAAH YANG SUDAH MEMPUNYAI KLOTER
    public function getSelectKloterbyKloter($IDPAKET){
       
        $this->db->select('*');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('TRANSAKSI.IDPAKET', $IDPAKET);
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->where('KLOTER !=', NULL);
        $this->db->group_by('KLOTER');
        $query = $this->db->get();

        return $query->result_array();
    }


    public function addKloter($data)
    {
        $this->db->set('KLOTER', $data['KLOTER']);
        $this->db->where('IDPENDAFTARAN', $data['IDPENDAFTARAN']);
        $this->db->update('PENDAFTARAN');
    }

    public function addKaromah($data)
    {
        $this->db->set('ISKAROMAH', $data['KAROMAH']);
        $this->db->where('IDPENDAFTARAN', $data['IDPENDAFTARAN']);
        $this->db->update('PENDAFTARAN');
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
