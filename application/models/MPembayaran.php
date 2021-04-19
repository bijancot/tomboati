<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPembayaran extends CI_Model
{
    public function getPembayaran()
    {
        return $this->db->query("SELECT * FROM PEMBAYARAN ORDER BY IDPEMBAYARAN DESC")->result();

    }

    public function getDetailPembayaran($idPembayaran)
    {
        return $this->db->query("SELECT * FROM DETAIL_PEMBAYARAN WHERE IDPEMBAYARAN='".$idPembayaran."' ORDER BY IDDETAILPEMBAYARAN ASC")->result();

    }

    public function updatePembayaran()
    {
        $this->db->set('ISSEEN', 1);
        $this->db->where('ISSEEN', 0);
        $this->db->update('DETAIL_PEMBAYARAN');
    }

    public function verifDetailPembayaran($idDetailPembayaran){
        $this->db->set('STATUSPEMBAYARAN', 1);
        $this->db->where('IDDETAILPEMBAYARAN', $idDetailPembayaran);
        return $this->db->update('DETAIL_PEMBAYARAN');
    }

    public function cabutVerifDetailPembayaran($idDetailPembayaran){
        $this->db->set('STATUSPEMBAYARAN', 0);
        $this->db->where('IDDETAILPEMBAYARAN', $idDetailPembayaran);
        return $this->db->update('DETAIL_PEMBAYARAN');
    }

    public function updateSisaPembayaran($sisa, $idPembayaran){
        $this->db->set('SISAPEMBAYARAN', $sisa);
        $this->db->where('IDPEMBAYARAN', $idPembayaran);
        return $this->db->update('PEMBAYARAN');
    }

    public function updatePembayaranTransaksi($idPembayaran){
        $this->db->set('STATUSPEMBAYARAN', 1);
        $this->db->where('IDPEMBAYARAN', $idPembayaran);
        return $this->db->update('PEMBAYARAN');
    }
    
}
