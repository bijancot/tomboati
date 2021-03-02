<?php

class Pendaftaran extends CI_Controller{

    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library(array('upload'));
    }

    // pendaftaran_post
    public function pendaftaran_post(){ 
        date_default_timezone_set('Asia/Jakarta');

        $config = ['upload_path' => './images/pendaftaran/', 'allowed_types' => 'jpg|png|jpeg|pdf', 'max_size' => 1024];            
        $this->upload->initialize($config);

        $response = [];
        
        $idUserRegister             = $this->input->post('idUserRegister');
        $email                      = $this->input->post('email');
        $fileKTP                    = null;
        $fileKK                     = null;
        $namaLengkap                = $this->input->post('namaLengkap');
        $nomorPaspor                = $this->input->post('nomorPaspor');
        $filePaspor                 = null;
        $tempatDikeluarkan          = $this->input->post('tempatDikeluarkan');
        $tanggalPenerbitanPaspor    = $this->input->post('tanggalPenerbitanPaspor');
        $tanggalBerakhirPaspor      = $this->input->post('tanggalBerakhirPaspor');
        $tempatLahir                = $this->input->post('tempatLahir');
        $tanggalLahir               = $this->input->post('tanggalLahir');
        $jenisKelamin               = $this->input->post('jenisKelamin');
        $statusPerkawinan           = $this->input->post('statusPerkawinan');
        $kewarganegaraan            = $this->input->post('kewarganegaraan');
        $alamat                     = $this->input->post('alamat');
        $kelurahan                  = $this->input->post('kelurahan');
        $kecamatan                  = $this->input->post('kecamatan');
        $kotakabupaten              = $this->input->post('kotaKabupaten');
        $provinsi                   = $this->input->post('provinsi');
        $kodePOS                    = $this->input->post('kodePOS');
        $nomorHP                    = $this->input->post('nomorHP');
        $fileBukuNikah              = null;
        $fileAkteKelahiran          = null;
        $pekerjaan                  = $this->input->post('pekerjaan');
        $riwayatPenyakit            = $this->input->post('riwayatPenyakit');
        $statusPendaftaran          = 0;
        $isJamaahBerangkat          = 0;
        $ttdPendaftar               = null;
        $fcKTPAlmarhum              = null;
        $fcKKAlmarhum               = null;
        $fcFotoAlmarhum             = null;
        $kodePendaftaran            = null;
        $idPaket                    = $this->input->post('idPaket');
        $tanggalBerangkat           = $this->input->post('tanggalBerangkat');
        $sheet                      = $this->input->post('sheet');
        $sheetHarga                 = $this->input->post('sheetHarga');
        $waktu                      = $this->input->post('waktu');
        $namaLengkapKeluarga        = $this->input->post('namaLengkapKeluarga');
        $alamatKeluarga             = $this->input->post('alamatKeluarga');
        $kelurahanKeluarga          = $this->input->post('kelurahanKeluarga');
        $kecamatanKeluarga          = $this->input->post('kecamatanKeluarga');
        $kotakabupatenKeluarga      = $this->input->post('kotakabupatenKeluarga');
        $provinsiKeluarga           = $this->input->post('provinsiKeluarga');
        $kodePOSKeluarga            = $this->input->post('kodePOSKeluarga');
        $nomorHPKeluarga            = $this->input->post('nomorHPKeluarga');


        if($this->upload->do_upload('fileKTP')){ //check if fileKTP upload
            $dataUpload = $this->upload->data();
            $fileKTP    = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Upload KTP';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('fileKK')){ //check if fileKK upload
            $dataUpload = $this->upload->data();
            $fileKK     = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Upload File KK';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('filePaspor')){ //check if filePaspor upload
            $dataUpload = $this->upload->data();
            $filePaspor = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Upload File Paspor';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('fileBukuNikah')){ //check if fileBukuNikah upload
            $dataUpload     = $this->upload->data();
            $fileBukuNikah  = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Upload File Buku Nikah';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('fileAkteKelahiran')){ //check if fileAkteKelahiran upload
            $dataUpload         = $this->upload->data();
            $fileAkteKelahiran  = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Upload Akte Kelahiran';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('ttdPendaftar')){ //check if ttdPendaftar upload
            $dataUpload         = $this->upload->data();
            $ttdPendaftar       = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']   = true;
            $response['message'] = 'Gagal Upload TTD Pendaftar';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('fcKTPAlmarhum')){ //check if file FC KTP Almarhum upload
            $dataUpload         = $this->upload->data();
            $fcKTPAlmarhum      = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']      = true;
            $response['message']    = 'Gagal Upload FC KTP Almarhum';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('fcKKAlmarhum')){ //check if file FC KK Almarhum upload
            $dataUpload         = $this->upload->data();
            $fcKKAlmarhum       = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']      = true;
            $response['message']    = 'Gagal Upload FC KK Almarhum';
            $this->throw(200, $response);
            return; 
        }

        if($this->upload->do_upload('fcFotoAlmarhum')){ //check if file FC Foto Almarhum upload
            $dataUpload         = $this->upload->data();
            $fcFotoAlmarhum     = base_url('images/pendaftaran/' . $dataUpload['file_name']);
        }else{
            $response['error']    = true;
            $response['message'] = 'Gagal Upload FC Foto Almarhum';
            $this->throw(200, $response);
            return; 
        }

        $data = array(
            'IDUSERREGISTER'            => $idUserRegister,
            'EMAIL'                     => $email,
            'FILEKTP'                   => $fileKTP,
            'FILEKK'                    => $fileKK,
            'NAMALENGKAP'               => $namaLengkap,
            'NOMORPASPOR'               => $nomorPaspor,
            'FILEPASPOR'                => $filePaspor,
            'TEMPATDIKELUARKAN'         => $tempatDikeluarkan,
            'TANGGALPENERBITANPASPOR'   => $tanggalPenerbitanPaspor,
            'TANGGALBERAKHIRPASPOR'     => $tanggalBerakhirPaspor,
            'TEMPATLAHIR'               => $tempatLahir,
            'TANGGALLAHIR'              => $tanggalLahir,
            'JENISKELAMIN'              => $jenisKelamin,
            'STATUSPERKAWINAN'          => $statusPerkawinan,
            'KEWARGANEGARAAN'           => $kewarganegaraan,
            'ALAMAT'                    => $alamat,
            'KELURAHAN'                 => $kelurahan,
            'KECAMATAN'                 => $kecamatan,
            'KOTAKABUPATEN'             => $kotakabupaten,
            'PROVINSI'                  => $provinsi,
            'KODEPOS'                   => $kodePOS,
            'NOMORHP'                   => $nomorHP,
            'FILEBUKUNIKAH'             => $fileBukuNikah,
            'FILEAKTEKELAHIRAN'         => $fileAkteKelahiran,
            'PEKERJAAN'                 => $pekerjaan,
            'RIWAYATPENYAKIT'           => $riwayatPenyakit,
            'STATUSPENDAFTARAN'         => $statusPendaftaran,
            'ISJAMAAHBERANGKAT'         => $isJamaahBerangkat,
            'TTDPENDAFTAR'              => $ttdPendaftar,
            'FCKTPALMARHUM'             => $fcKTPAlmarhum,
            'FCKKALMARHUM'              => $fcKKAlmarhum,
            'FCFOTOALMARHUM'            => $fcFotoAlmarhum
        );

        //check if inputan kosong
        if($idUserRegister != "" && $email != "" && $fileKTP != null && $fileKK != null && $namaLengkap != "" && $nomorPaspor != "" && $filePaspor != null && $tempatDikeluarkan != "" && $tanggalPenerbitanPaspor != "" && $tanggalBerakhirPaspor != "" && $tempatLahir != "" && $tanggalLahir != "" && $jenisKelamin != "" && $statusPerkawinan != "" && $kewarganegaraan != "" && $alamat != "" && $kelurahan != "" && $kecamatan != "" && $kotakabupaten != "" && $provinsi != "" && $kodePOS != "" && $nomorHP != "" && $fileAkteKelahiran != null && $pekerjaan != "" && $riwayatPenyakit != "" ){
            $this->db->insert('PENDAFTARAN', $data);

            //getKodePendaftaran
            $dataKodePendaftaran = $this->db->get_where('PENDAFTARAN', $data)->result();
            foreach($dataKodePendaftaran as $dKodePendaftaran){
                $kodePendaftaran = $dKodePendaftaran->KODEPENDAFTARAN;
            }

            //getCountTransaksi
            $countTransaksi = $this->db->get('TRANSAKSI')->num_rows();
            $idTransaksi    = $countTransaksi + 1;
            $transId        = str_pad($idTransaksi, 6, '0', STR_PAD_LEFT);
            $idTrans        = 'TR'.''.$transId.'';

            //dataKeluarga
            $dataKeluarga = array(
                'NAMALENGKAP'               => $namaLengkapKeluarga,
                'ALAMAT'                    => $alamatKeluarga,
                'KELURAHAN'                 => $kelurahanKeluarga,
                'KECAMATAN'                 => $kecamatanKeluarga,
                'KOTAKABUPATEN'             => $kotakabupatenKeluarga,
                'PROVINSI'                  => $provinsiKeluarga,
                'KODEPOS'                   => $kodePOSKeluarga,
                'NOMORHP'                   => $nomorHPKeluarga,
                'KODEPENDAFTARAN'           => $kodePendaftaran
            );

            //insert data keluarga
            $this->db->insert('DATA_KELUARGA', $dataKeluarga);

            //dataTransaksi
            $dataTransaksi = array(
                'IDTRANSAKSI'           => $idTrans,
                'IDPAKET'               => $idPaket,
                'STATUSTRANSAKSI'       => 0,
                'TANGGALKEBERANGKAT'    => $tanggalBerangkat,
                'SHEET'                 => $sheet,
                'SHEETHARGA'            => $sheetHarga,
                'WAKTU'                 => $waktu,
                'KODEPENDAFTARAN'       => $kodePendaftaran
            );

            //insert data transaksi
            $this->db->insert('TRANSAKSI', $dataTransaksi);
        
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
        
                $response['statusDaftar'] = 'Sukses Notif';
                $pusher->trigger('my-channel', 'my-event', $response);
    
                $response['error']    = false;
                $response['message'] = 'Sukses Daftar';
                $this->throw(200, $response);
                return;
            }
        }else{
            $response['error']    = true;
            $response['message'] = 'Terdapat Data Kosong';
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
