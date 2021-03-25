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

    // TAMPILAN AWAL DI KLOTER (COUNT)
    // public function countKloterbyPaket()
    // {

    //     $query = $this->db->query("SELECT count(TRANSAKSI.IDPAKET) as jumlah FROM `TRANSAKSI` JOIN `PAKET` ON `TRANSAKSI`.`IDPAKET` = `PAKET`.`IDPAKET` JOIN `PENDAFTARAN` ON `TRANSAKSI`.`KODEPENDAFTARAN` = `PENDAFTARAN`.`KODEPENDAFTARAN` WHERE `STATUSPENDAFTARAN` = 1 GROUP BY `TRANSAKSI`.IDPAKET");
    //     return $query->result_array();
    // }

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

    // ini untuk menampilkan di atur kloter (count)
    // public function countSelectKloterbyPaket($IDPAKET){
       
    //     $this->db->select('count(TRANSAKSI.IDPAKET) as jumlah');
    //     $this->db->from('TRANSAKSI');
    //     $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
    //     $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
    //     $this->db->where('TRANSAKSI.IDPAKET', $IDPAKET);
    //     $this->db->where('STATUSPENDAFTARAN', 1);
    //     $this->db->group_by('TRANSAKSI.IDPAKET');
    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

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

    // INI UNTUK JAMAAH YANG BELUM MEMPUNYAI KLOTER
    public function getSelectKloterbyUnknownKloter($IDPAKET){
       
        $this->db->select('*');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('TRANSAKSI.IDPAKET', $IDPAKET);
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->where('KLOTER', NULL);
        $query = $this->db->get();

        return $query->result_array();
    }

    // INI UNTUK JAMAAH YANG SUDAH MEMPUNYAI KLOTER
    public function getSelectKloter($IDPAKET, $KLOTER){
       
        $this->db->select('*');
        $this->db->from('TRANSAKSI');
        $this->db->join('PAKET', 'TRANSAKSI.IDPAKET = PAKET.IDPAKET');
        $this->db->join('PENDAFTARAN', 'TRANSAKSI.KODEPENDAFTARAN = PENDAFTARAN.KODEPENDAFTARAN');
        $this->db->where('TRANSAKSI.IDPAKET', $IDPAKET);
        $this->db->where('STATUSPENDAFTARAN', 1);
        $this->db->where('KLOTER', $KLOTER);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getEditKloter($IDPAKET, $KLOTER){
       
        $query = $this->db->query("SELECT * FROM `TRANSAKSI` JOIN `PAKET` ON `TRANSAKSI`.`IDPAKET` = `PAKET`.`IDPAKET` JOIN `PENDAFTARAN` ON `TRANSAKSI`.`KODEPENDAFTARAN` = `PENDAFTARAN`.`KODEPENDAFTARAN` WHERE `TRANSAKSI`.`IDPAKET` = '0020' AND `STATUSPENDAFTARAN` = 1 AND (`KLOTER` = '0020-UMR-VIP-A1' OR `KLOTER` IS NULL)");

        return $query->result_array();
    }

    public function addKloter($data)
    {
        $this->db->set('KLOTER', $data['KLOTER']);
        $this->db->where('KODEPENDAFTARAN', $data['KODEPENDAFTARAN']);
        $this->db->update('PENDAFTARAN');
    }

    public function deleteKloter($kloter)
    {
        $this->db->set('KLOTER', NULL);
        $this->db->where('KLOTER', $kloter);
        $this->db->update('PENDAFTARAN');
    }

    public function addKaromah($data)
    {
        $this->db->set('ISKAROMAH', 1);
        $this->db->where('KODEPENDAFTARAN', $data['KODEPENDAFTARAN']);
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
