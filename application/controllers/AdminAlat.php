<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAlat extends CI_Controller {
	public function __construct(){
		parent::__construct();	
        $this->load->model('m_alat');
        $this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata('status')!='login'){
			redirect(base_url('login'));
		}
	}
	public function index(){
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function view($data){
		$kategori = "kategori";
		$alat = "alat";
		$data1['kategori'] = $this->m_alat->get($kategori);
		$data1['alat'] = $this->m_alat->get($alat);
		$data1['kategorialat'] = $this->m_alat->getKategoriAlat();
		$data1['laporan'] = $this->m_alat->getLaporan();
		$data1['data'] = $this->m_alat->operasijoin2();
		$data1['tanggal'] = $this->m_alat->grup_tanggal();
		$data1['tanggal2'] = $this->m_alat->grup_tanggal2();
		$data1['user'] = $this->m_alat->getuser();
		
//harian Alat dan radar
		if($this->input->get('tanggal')){
			$tgl = $this->input->get('tanggal');
			$data1['harianalat'] = $this->m_alat->operasiJoinByDate($tgl);
			$data1['mingguanalatview'] = $this->m_alat->operasiJoin4($tgl);
			$data1['laporan2']= $this->m_alat->getWhere('laporan', array('id' => $tgl));
			$data1['mingguanalat'] = $this->m_alat->operasiJoin3($tgl);
			$data1['tgl'] = $tgl;
		}
		if($this->input->get('edit')){
			$tgl = $this->input->get('edit');
			$data1['editharianalat'] = $this->m_alat->operasiJoinByDate($tgl);
			$data1['editmingguanalat'] = $this->m_alat->operasiJoin4($tgl);
			$data1['mingguanalat'] = $this->m_alat->operasiJoin3($tgl);
			$data1['tgl'] = $tgl;
		}

		if ($data=='save-harian' || $data=='save-mingguan' || $data=='save-laporan') {
			$this->load->view('admin/view/'.$data, $data1);
		}else{
		$this->load->view('admin/header');
		$this->load->view('admin/view/'.$data, $data1);
		$this->load->view('admin/footer');		
		}		
	}

	// ALAT
	public function cek($data){
		$data1['halo'] = $this->m_alat->cekToday();
		if ($data1['halo'] == 0) {
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Peringatan!</strong> Anda Belum Mengisi Data PERALATAN AGROKLIMAT hari ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Anda sudah Mengisi Data Peralatan Agroklimat Hari Ini, jika ada kesalahakan input silahkan klik <strong>Update</strong>.
				</div>');
		}
		$data1['halo1'] = $this->m_alat->cekmingguan();
		if($data1['halo1'] == 0){
			$this->session->set_flashdata('message_mingguan', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Peringatan!</strong> Anda Belum Mengisi Data PERALATAN AGROKLIMAT hari ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Anda sudah Mengisi Data Peralatan Agroklimat Hari Ini, jika ada kesalahakan input langsung ubah dan klik <strong>Update</strong> di bagian bawah.
				</div>');
		}

		$alat = "alat";
		$kategori = "kategori";
		$data1['kategori'] = $this->m_alat->get($kategori);
		$data1['operasi'] = $this->m_alat->getWhere('operasi', array('tanggal' => date('Y-m-d')));
		$data1['operasijoin'] = $this->m_alat->operasiJoin();
		$data1['operasijoin3'] = $this->m_alat->operasijoin3();
		$data1['alat'] = $this->m_alat->get($alat);
		$data1['kategorialat'] = $this->m_alat->getKategoriAlat();
		
		$this->load->view('admin/header');
		$this->load->view('admin/cek/'.$data, $data1);
		$this->load->view('admin/footer');
	}
	public function cekharian(){
		$data = $this->m_alat->get('alat');
		$date = date('Y-m-d');
		foreach ($data as $alat) {
			$var = "operasi".$id = $alat->id_alat;
			$var1 = "keterangan".$alat->id_alat;
			$operasi = $this->input->post($var);
			$keterangan = $this->input->post($var1);
			if(empty($keterangan)){
				$keterangan = "-";
			}
			$data = array(
				'id_alat' => $id,
				'tanggal' => $date,
				'operasi' => $operasi,
				'keterangan' => $keterangan
			);
			$table='operasi';			
			$this->m_alat->inputHarian($table, $data);
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Input.
				</div>');
			header('location: view/dataharian');
		}
	}
	public function updateharian(){
		$data = $this->m_alat->get('alat');
		$date = date('Y-m-d');
		foreach ($data as $alat) {
			$var = "operasi".$id = $alat->id_alat;
			$var1 = "keterangan".$alat->id_alat;
			$var2 = "id_operasi".$alat->id_alat;
			$operasi = $this->input->post($var);
			$keterangan = $this->input->post($var1);
			$id_operasi = $this->input->post($var2);
			if(empty($keterangan)){
				$keterangan = "-";
			}
			$where = array(
				'id_operasi' => $id_operasi
			);
			$data = array(
				'operasi' => $operasi,
				'keterangan' => $keterangan
			);
			
			$this->m_alat->update_data($where,$data,'operasi');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');
			header('location: view/dataharian');
		}
	}
	public function updateharianByTanggal(){
		$data = $this->m_alat->get('alat');
		$date = date('Y-m-d');
		foreach ($data as $alat) {
			$var = "operasi".$id = $alat->id_alat;
			$var1 = "keterangan".$alat->id_alat;
			$var2 = "id_operasi".$alat->id_alat;
			$var3 = "tanggal".$alat->id_alat;
			$operasi = $this->input->post($var);
			$keterangan = $this->input->post($var1);
			$tanggal = $this->input->post($var3);
			$id_operasi = $this->input->post($var2);
			if(empty($keterangan)){
				$keterangan = "-";
			}
			$where = array(
				'id_operasi' => $id_operasi
			);
			$data = array(
				'operasi' => $operasi,
				'keterangan' => $keterangan
			);
			
			$this->m_alat->update_data($where,$data,'operasi');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');
			header('location: view/dataharian');
		}
	}
	public function updatemingguanByTanggal(){
		$data = $this->m_alat->get('alat');
		$date = date('Y-m-d');
		foreach ($data as $alat) {
			$var = "kondisi".$id = $alat->id_alat;
			$var1 = "keterangan".$alat->id_alat;
			$var2 = "id_kondisi".$alat->id_alat;
			$var3 = "tanggal".$alat->id_alat;
			$kondisi = $this->input->post($var);
			$keterangan = $this->input->post($var1);
			$tanggal = $this->input->post($var3);
			$id_kondisi = $this->input->post($var2);
		
			if(empty($keterangan)){
				$keterangan = "-";
			}
			$where = array(
				'id_kondisi' => $id_kondisi
			);
			$data = array(
				'kondisi' => $kondisi,
				'keterangan' => $keterangan
			);
			
			$this->m_alat->update_data($where,$data,'kondisi');
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');
			header('location: view/mingguan');
		}
	}
	function tambah_alat_agroklimat(){
		$nama_kategori=$this->input->post('kategori');
		$input = array
		(
	      'nama_kategori' => $nama_kategori
	    );
		$this->m_alat->tambahKategoriAlat($input);
		header("location: view/agroklimat");
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Kategori Alat Baru Agroklimat ditambahkan.
  			</div>');
	}
	function cekmingguan(){
		$data = $this->m_alat->get('alat');
		$date = date('Y-m-d');
		foreach ($data as $alat) {
			$var = "kondisi".$id = $alat->id_alat;
			$var1 = "keterangan".$alat->id_alat;
			$kondisi = $this->input->post($var);
			$keterangan = $this->input->post($var1);
			if(empty($keterangan)){
				$keterangan = "-";
			}
			$data = array(
				'id_alat' => $id,
				'tanggal' => $date,
				'kondisi' => $kondisi,
				'keterangan' => $keterangan
			);
			$table='kondisi';			
			$this->m_alat->inputMingguan($table, $data);
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Mingguan Berhasil di Input.
				</div>');
			header('location: cek/mingguan');
		}
	}
	public function updatemingguan(){
		$data = $this->m_alat->get('alat');
		$date = date('Y-m-d');
		foreach ($data as $alat) {
			$var = "kondisi".$id = $alat->id_alat;
			$var1 = "keterangan".$alat->id_alat;
			$var2 = "id_kondisi".$alat->id_alat;
			$kondisi = $this->input->post($var);
			$keterangan = $this->input->post($var1);
			$id_kondisi = $this->input->post($var2);

			if(empty($keterangan)){
				$keterangan = "-";
			}
			$where = array(
				'id_kondisi' => $id_kondisi
			);
			$data = array(
				'kondisi' => $kondisi,
				'keterangan' => $keterangan
			);
			
			$this->m_alat->update_data($where,$data,'kondisi');
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');		
			}
			header('location: cek/mingguan');
	}

	public function updatekategori(){
		$id_kategori = $this->input->post('idkategori');
		$nama_kategori = $this->input->post('namakategori');
		$where = array(
			'id_kategori' => $id_kategori
		);
		$data = array(
			'nama_kategori' => $nama_kategori
		);
		if(empty($nama_kategori)){
			header('location: view/agroklimat');
		}else{
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>!</strong> Update Data Kategori Alat.
  			</div>');
			$this->m_alat->update_data($where,$data,'kategori');
			header('location: view/agroklimat');
		}
	}
	public function tambah_alat(){
		$nama_alat = $this->input->post('nama_alat');
		$id = $this->input->post('id_kategori_alat');
		$data = array
			(
			'id_kategori' => $id,
			'nama_alat'=> $nama_alat,
			'keterangan' => $nama_alat
			 );
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Alat Baru Ditambahkan.
  			</div>');
		$this->m_alat->tambahAlat($data);
		header('location:view/agroklimat');
		}
	public function updatealat(){
		$id_alat = $this->input->post('id_alat');
		$nama_alat = $this->input->post('nama_alat');
		$where = array(
			'id_alat' => $id_alat
		);
		$data = array(
			'nama_alat' => $nama_alat
		);
		if(empty($nama_alat)){
			header('location: view/agroklimat');
		}else{
			$this->m_alat->update_data($where,$data,'alat');
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Success!</strong> Update Data Alat.
  				</div>');
				header('location: view/agroklimat');
		}
	}
	public function hapusKategoriAlat($data){
		$this->m_alat->hapusKategoriAlat($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Hapus Kategori Alat.
  			</div>');
		header('location: ../view/agroklimat');
	}
	public function hapusAlat($data){
		$this->m_alat->hapusAlat($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Hapus Alat.
  			</div>');
		header('location: ../view/agroklimat');
	}

	// LAPORAN
	public function buat_laporan(){
		 $jenis = $this->input->post('jenis_laporan');
		 $jenis_alat = $this->input->post('jenis_alat');
		 $nama_alat = $this->input->post('nama');
		 $lokasi = $this->input->post('lokasi');
		 $permasalahan = $this->input->post('permasalahan');
		 $tindakan = $this->input->post('tindakan');
		 $hasil = $this->input->post('hasil');
		 $mengetahui = $this->input->post('mengetahui');
		 $nama_lengkap = $this->input->post('nama_lengkap');
		 $nip = $this->input->post('nip');
		 $nama_teknisi = $this->input->post('nama_teknisi'); 
		$data = array
			(
			'tanggal' => date('Y-m-d'),
			'jenis_laporan' => $jenis,
			'jenis_alat' => $jenis_alat,
			'nama_alat'=> $nama_alat,
			'lokasi' => $lokasi,
			'permasalahan' => $permasalahan,
			'tindakan' => $tindakan,
			'hasil' => $hasil,
			'mengetahui' => $mengetahui,
			'nama_lengkap' => $nama_lengkap,
			'nip' => $nip,
			'nama_teknisi' => $nama_teknisi
			 );
		$this->m_alat->buat_laporan($data);
		header('location:view/laporan');
	}
	public function hapuslaporan($data){
		$this->m_alat->hapuslaporan($data);
		$this->session->set_flashdata('message_laporan', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Laporan berhasil di Hapus .
			</div>');
		header('location: ../view/laporan');	
	}
	public function updatelaporan(){
		$id = $this->input->post('id');
		$jenis_laporan = $this->input->post('jenis_laporan');
		$jenis_alat = $this->input->post('jenis_alat');
		$nama_alat = $this->input->post('nama_alat');
		$lokasi = $this->input->post('lokasi');
		$permasalahan = $this->input->post('permasalahan');
		$tindakan = $this->input->post('tindakan');
		$hasil = $this->input->post('hasil');
		$mengetahui = $this->input->post('mengetahui');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nip = $this->input->post('nip');
		$nama_teknisi = $this->input->post('nama_teknisi'); 
		$where = array(
			'id' => $id
		);
		$data = array(
			'jenis_laporan' => $jenis_laporan,
			'jenis_alat' => $jenis_alat,
			'nama_alat'=> $nama_alat,
			'lokasi' => $lokasi,
			'permasalahan' => $permasalahan,
			'tindakan' => $tindakan,
			'hasil' => $hasil,
			'mengetahui' => $mengetahui,
			'nama_lengkap' => $nama_lengkap,
			'nip' => $nip,
			'nama_teknisi' => $nama_teknisi
		);
		if(empty($jenis_laporan)){
			header('location: view/laporan');
		}else{
			$this->m_alat->update_data($where,$data, 'laporan');
			$this->session->set_flashdata('message_laporan', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Laporan berhasil di Update.
  			</div>');
			header('location: view/laporan');
		}
	}

}

