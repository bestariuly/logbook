<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('m_logbook');
        $this->load->helper('url');
        $this->load->library('session');
    }
	public function index(){
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function view($data){
		$kategori = "kategori";
		$alat = "alat";
		$radar = "radar";
		$kategoriradar = "kategoriradar";
		$data1['kategori'] = $this->m_logbook->get($kategori);
		$data1['alat'] = $this->m_logbook->get($alat);
		$data1['kategorialat'] = $this->m_logbook->getKategoriAlat();
		$data1['kategoriradar'] = $this->m_logbook->get($kategoriradar);
		$data1['radar'] = $this->m_logbook->get($radar);
		$data1['kategori_radar'] = $this->m_logbook->getKategoriRadar();
		$data1['laporan'] = $this->m_logbook->get('laporan');
		$data1['data'] = $this->m_logbook->operasijoin2();
		$data1['tanggal'] = $this->m_logbook->grup_tanggal();
		$this->load->view('admin/header');
		$this->load->view('admin/view/'.$data, $data1);
		$this->load->view('admin/footer');
	}

	// ALAT
	public function cek($data){
		$data1['halo'] = $this->m_logbook->cekToday();
		if ($data1['halo'] == 0) {
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Peringatan!</strong> Anda Belum Mengisi data hari ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Hari Ini sudah Input Data Hari Ini, jika ada kesalahakan input langsung ubah dan klik <strong>Update</strong> di bagian bawah.
				</div>');
		}
		$data1['haloradar'] = $this->m_logbook->cekTodayRadar();
		if($data1['haloradar'] == 0){
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Peringatan!</strong> Anda Belum Mengisi data hari ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Hari Ini sudah Input Data Hari Ini, jika ada kesalahakan input langsung ubah dan klik <strong>Update</strong> di bagian bawah.
				</div>');
		}		
		$kategori = "kategori";
		$kategoriradar = "kategoriradar";
		$alat = "alat";
		$radar = "radar";
		$data1['pembacaan'] = $this->m_logbook->getWhere('pembacaan', array('tanggal' => date('Y-m-d')));
		$data1['radar'] = $this->m_logbook->get($radar);
		$data1['pembacaanjoin'] = $this->m_logbook->pembacaanJoin();
		$data1['kategori'] = $this->m_logbook->get($kategori);
		$data1['operasi'] = $this->m_logbook->getWhere('operasi', array('tanggal' => date('Y-m-d')));
		$data1['operasijoin'] = $this->m_logbook->operasiJoin();
		$data1['operasijoin3'] = $this->m_logbook->operasijoin3();
		$data1['joinradar'] = $this->m_logbook->joinradar();
		$data1['alat'] = $this->m_logbook->get($alat);
		$data1['kategoriradar'] = $this->m_logbook->get($kategoriradar);
		$data1['kategoriradar'] = $this->m_logbook->getKategoriRadar();
		$data1['radar'] = $this->m_logbook->get('radar');
		$data1['kategorialat'] = $this->m_logbook->getKategoriAlat();
		$this->load->view('admin/header');
		$this->load->view('admin/cek/'.$data, $data1);
		$this->load->view('admin/footer');
	}
	public function cekharian(){
		$data = $this->m_logbook->get('alat');
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
			$this->m_logbook->inputHarian($table, $data);
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Berhasil di Input.
				</div>');
			header('location: cek/harian');
		}
	}
	public function updateharian(){
		$data = $this->m_logbook->get('alat');
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
			
			$this->m_logbook->update_data($where,$data,'operasi');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Berhasil di Update.
				</div>');
			header('location: cek/harian');
		}
	}
	function tambah_alat_agroklimat(){
		$nama_kategori=$this->input->post('kategori');
		$input = array
		(
	      'nama_kategori' => $nama_kategori
	    );
		$this->m_logbook->tambahKategoriAlat($input);
		header("location: view/agroklimat");
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Kategori Alat Baru ditambahkan.
  			</div>');
	}
	function cekmingguan(){
		$data = $this->m_logbook->get('alat');
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
			$this->m_logbook->inputMingguan($table, $data);
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Berhasil di Input.
				</div>');
			header('location: cek/mingguan');
		}
	}
	public function updatemingguan(){
		$data = $this->m_logbook->get('alat');
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
			
			$this->m_logbook->update_data($where,$data,'kondisi');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Berhasil di Update.
				</div>');
			header('location: cek/mingguan');
		}
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
    		<strong>Success!</strong> Update Data Kategori Alat.
  			</div>');
			$this->m_logbook->update_data($where,$data,'kategori');
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
		$this->m_logbook->tambahAlat($data);
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
			$this->m_logbook->update_data($where,$data,'alat');
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Success!</strong> Update Data Alat.
  				</div>');
				header('location: view/agroklimat');
		}
	}
	public function hapusKategoriAlat($data){
		$this->m_logbook->hapusKategoriAlat($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Hapus Kategori Alat.
  			</div>');
		header('location: ../view/agroklimat');
	}
	public function hapusAlat($data){
		$this->m_logbook->hapusAlat($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Hapus Alat.
  			</div>');
		header('location: ../view/agroklimat');
	}

	//DATA TAMPIL ALAT 
	public function showAlat(){
		$tampil['data'] = $this->m_logbook->operasijoin2();
		$this->load->view('show_alat', $tampil);
	}




	//RADAR
	public function tambah_kategori_radar(){
		$namakategoriradar = $this->input->post('namakategoriradar');
		$input = array(
			'nama_kategori' => $namakategoriradar
		);
		$this->m_logbook->tambahKategoriRadar($input);
		header('location: view/radar');
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Kategori Alat Baru ditambahkan.
			</div>');
	}
	public function updatekategoriradar(){
		$id_kategoriradar = $this->input->post('idkategoriradar');
		$nama_kategoriradar = $this->input->post('namakategoriradar');
		$where = array(
			'id_kategori' => $id_kategoriradar
		);
		$data = array(
			'nama_kategori' => $nama_kategoriradar
		);
		if(empty($nama_kategoriradar)){
			header('location: view/radar');
		}else{
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Update Data Kategori Alat.
				</div>');
			$this->m_logbook->update_data($where,$data,'kategoriradar');
			header('location: view/radar');
		}
	}
	public function tambahradar(){
		$id = $this->input->post('id_kategori_radar');
		$namaradar = $this->input->post('nama_radar');
		$standar = $this->input->post('standar');
		$data = array(
			'id_kategoriradar' => $id,
			'nama_radar' => $namaradar,
			'standar' => $standar
		);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Alat Baru Ditambahkan.
			</div>');
		$this->m_logbook->tambahRadar($data);
		header('location: view/radar');
	}
	public function updateRadar(){
		$id_radar = $this->input->post('id_radar');
		$nama_radar = $this->input->post('nama_radar');
		$standar = $this->input->post('standar');
		$where = array(
			'id_radar' => $id_radar
			
		);
		$data = array(
			'nama_radar' => $nama_radar,
			'standar' => $standar
		);
		if(empty($nama_radar)){
			header('location: view/radar');
		}else{
			$this->m_logbook->update_data($where,$data,'radar');
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Update Data Alat.
				</div>');
			header('location: view/radar');
		}
	}
	public function hapusKategoriRadar($data){
		$this->m_logbook->hapusKategoriRadar($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Hapus Kategori Alat.
			</div>');
		header('location: ../view/radar');
	}
	public function hapusRadar($data){
		$this->m_logbook->hapusRadar($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Hapus Alat.
			</div>');
		header('location: ../view/radar');
	}
	public function cekharianradar()
	{
		$data = $this->m_logbook->get('radar');
		$date = date('Y-m-d');
		foreach ($data as $radar) {
			$var = "pembacaan".$id = $radar->id_radar;
			$pembacaan = $this->input->post($var);
			echo $var." - ".$pembacaan;
			// $data = array(
			// 	'id_radar' => $id,
			// 	'tanggal' => $date,
			// 	'pembacaan' => $pembacaan
			// );
			
			// $this->m_logbook->inputHarianRadar($data);
			// $this->session->set_flashdata('message_harian_sukses', '
			// 	<div class="alert alert-success alert-dismissible">
			// 	<div class="alert alert-success alert-dismissible">
			// 	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			// 	<strong>Success!</strong> Data Berhasil di Input.
			// 	</div>');
			// header('location: cek/cek_radar');
			
		}
	}
	public function updateharianradar()
	{
		$data = $this->m_logbook->get('radar');
		$date = date('Y-m-d');
		foreach ($data as $radar) {
			$var = "pembacaan".$id = $radar->id_radar;
			$var1 = "id_pembacaan".$radar->id_radar;
			$pembacaan = $this->input->post($var);
			$id_pembacaan = $this->input->post($var1);
			$where = array(
				'id_pembacaan' => $id_pembacaan
			);
			$data = array(
				'pembacaan' => $pembacaan
			);
			
			$this->m_logbook->update_data($where,$data,'pembacaan');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Berhasil di Update.
				</div>');
			header('location: cek/cek_radar');
			
		}
	}



	// LAPORAN
	public function buat_laporan(){
		 $jenis = $this->input->post('jenis_laporan');
		 $nama_alat = $this->input->post('nama');
		 $lokasi = $this->input->post('lokasi');
		 $permasalahan = $this->input->post('permasalahan');
		 $tindakan = $this->input->post('tindakan');
		 $hasil = $this->input->post('hasil');
		$data = array
			(
			'tanggal' => date('Y-m-d'),
			'jenis_laporan' => $jenis,
			'nama_alat'=> $nama_alat,
			'lokasi' => $lokasi,
			'permasalahan' => $permasalahan,
			'tindakan' => $tindakan,
			'hasil' => $hasil
			 );
		$this->m_logbook->buat_laporan($data);
		header('location:view/laporan');
	}
	public function hapuslaporan($data){
		$this->m_logbook->hapuslaporan($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Hapus Alat.
			</div>');
		header('location: ../view/laporan');	
	}
	public function updatelaporan(){
		$id = $this->input->post('id');
		$jenis_laporan = $this->input->post('jenis_laporan');
		$nama_alat = $this->input->post('nama');
		$lokasi = $this->input->post('lokasi');
		$permasalahan = $this->input->post('permasalahan');
		$tindakan = $this->input->post('tindakan');
		$hasil = $this->input->post('hasil');
		$where = array(
			'id' => $id
		);
		$data = array(
			'jenis_laporan' => $jenis_laporan,
			'nama_alat'=> $nama_alat,
			'lokasi' => $lokasi,
			'permasalahan' => $permasalahan,
			'tindakan' => $tindakan,
			'hasil' => $hasil
		);
		if(empty($jenis_laporan)){
			header('location: view/laporan');
		}else{
			$this->m_logbook->update_data($where,$data, 'laporan');
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Update Data Alat.
  			</div>');
			header('location: view/laporan');
		}
	}
}


