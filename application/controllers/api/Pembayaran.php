<?php

class Pembayaran extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library(array('upload'));
    }

    public function pembayaran(){
        $idTransaksi            = $this->input->get('idTransaksi');
        $totalPembayaran        = null;
        $sisaPembayaran         = null;
        $tanggalJatuhTempo      = null;
        $idDetailPembayaran     = null;
        $tanggalPembayaran      = $this->input->post('tanggalPembayaran');
        $jumlahPembayaran       = $this->input->post('jumlahPembayaran');
        $deskripsi              = $this->input->post('deskripsi');
        $buktiPembayaran        = null;

        //getCountPembayaran
        $countPembayaran    = $this->db->get('PEMBAYARAN')->num_rows();
        $idPembayaran       = $countPembayaran + 1;
        $pembayaranId       = str_pad($idPembayaran, 6, '0', STR_PAD_LEFT);
        $idPembayar         = 'BYR'.''.$pembayaranId.'';

        //getTotalPembayaran, tanggalJatuhTempo
        $dataTransaksi = $this->db->query('SELECT * FROM TRANSAKSI WHERE IDTRANSAKSI="'.$idTransaksi.'" AND STATUSTRANSAKSI = 1')->result();
        
        foreach($dataTransaksi as $data){
            $tanggalPemberangkatan  = $data->TANGGALKEBERANGKAT;
            $totalPembayaran        = $data->SHEETHARGA;
        }

        //tanggalJatuhTempo
        $tanggalJatuhTempo = $tanggalPemberangkatan;
        $tanggalJatuhTempo = strtotime($tanggalJatuhTempo);
        $tanggalJatuhTempo = strtotime("-7 day", $tanggalJatuhTempo);
        $tanggalJatuhTempo = date('Y-m-d', $tanggalJatuhTempo);

        $dataPembayaran = array(
            'IDPEMBAYARAN'      => $idPembayar,
            'IDTRANSAKSI'       => $idTransaksi,
            'TOTALPEMBAYARAN'   => $totalPembayaran,
            'SISAPEMBAYARAN'    => $totalPembayaran,
            'TANGGALPEMBAYARAN' => $tanggalPembayaran,
            'TANGGALJATUHTEMPO' => $tanggalJatuhTempo
        );

        $whereDataPembayaran = array(
            'IDTRANSAKSI'       => $idTransaksi,
            'TOTALPEMBAYARAN'   => $totalPembayaran,
            'TANGGALJATUHTEMPO' => $tanggalJatuhTempo
        );

        $this->db->select('*');
        $this->db->from('PEMBAYARAN');
        $this->db->where($whereDataPembayaran);
        $countDataPembayaran = $this->db->get()->num_rows();

        
        //insert data Pembayaran
        if($countDataPembayaran == 0){
            $this->db->insert('PEMBAYARAN', $dataPembayaran);
        }

        //getCountDetailPembayaran
        $countDetailPembayaran    = $this->db->get('DETAIL_PEMBAYARAN')->num_rows();
        $idDetailPembayaran       = $countDetailPembayaran + 1;
        $detailPembayaranId       = str_pad($idDetailPembayaran, 6, '0', STR_PAD_LEFT);
        $detailBayarId            = 'DBYR'.''.$detailPembayaranId.'';

        $this->db->select('*');
        $this->db->from('PEMBAYARAN');
        $this->db->where($whereDataPembayaran);
        $dataIdPembayaran = $this->db->get()->result();

        foreach($dataIdPembayaran as $data){
            $idPembayaran = $data->IDPEMBAYARAN;
        }

        $config = ['upload_path' => './images/pembayaran/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        if($this->upload->do_upload('buktiPembayaran')){
            $dataUpload         = $this->upload->data();
            $buktiPembayaran    = base_url('images/pembayaran/' . $dataUpload['file_name']);
        }

        
        $dataDetailPembayaran = array(
            'IDDETAILPEMBAYARAN'        => $detailBayarId,
            'IDPEMBAYARAN'              => $idPembayaran,
            'JUMLAHPEMBAYARAN'          => $jumlahPembayaran,
            'TANGGALPEMBAYARAN'         => $tanggalPembayaran,
            'DESKRIPSI'                 => $deskripsi,
            'BUKTIPEMBAYARAN'           => $buktiPembayaran
        );
        
        $this->db->insert('DETAIL_PEMBAYARAN', $dataDetailPembayaran);
        
        $dataPembayaran = $this->db->query('SELECT * FROM PEMBAYARAN WHERE IDPEMBAYARAN="'.$idPembayaran.'"')->result();
        
        if($this->db->affected_rows()>0){
            require APPPATH . 'views/vendor/autoload.php';
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'ee692ab95bb9aeaa1dcc',
                'b062506e42b3a8c66368',
                '1149993',
                $options
            );
    
            $response['statusBayar'] = 'Sukses Notif';
            $pusher->trigger('my-channel', 'my-event', $response);

            $response['error']    = false;
            $response['message'] = 'Sukses Bayar';
            $response['data'] = $dataPembayaran;
            $this->throw(200, $response);
            return;
        }
    }

    public function getPembayaran(){
        $idPembayaran = $this->input->get('idPembayaran');

        $data = $this->db->query('SELECT * FROM PEMBAYARAN WHERE IDPEMBAYARAN = "'.$idPembayaran.'"')->result();
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Pembayaran Kosong';
            $this->throw(200, $response);
            return;
        } 
    }

    public function getDetailPembayaran(){
        $idPembayaran = $this->input->get('idPembayaran');

        $data = $this->db->query('SELECT * FROM DETAIL_PEMBAYARAN WHERE IDPEMBAYARAN = "'.$idPembayaran.'"')->result();
        
        if(count($data) > 0){
            $response['error']    = false;
            $response['message'] = 'Sukses Tampil Data';
            $response['data']     = $data;
            $this->throw(200, $response);
            return;
        }else{
            $response['error']    = true;
            $response['message'] = 'Data Pembayaran Kosong';
            $this->throw(200, $response);
            return;
        } 
    }

    
    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

}
?>
