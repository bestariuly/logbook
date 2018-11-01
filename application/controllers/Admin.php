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
		$data1['tanggal_radar'] = $this->m_logbook->grup_tanggal_radar();

//harian Alat dan radar
		if($this->input->get('tanggal')){
			$tgl = $this->input->get('tanggal');
			$data1['harianradar'] = $this->m_logbook->pembacaanJoinByDate($tgl);
			$data1['harianalat'] = $this->m_logbook->operasiJoinByDate($tgl);
			$data1['tgl'] = $tgl;
		}
		if($this->input->get('edit')){
			$tgl = $this->input->get('edit');
			$data1['editharianradar'] = $this->m_logbook->pembacaanJoinByDate($tgl);
			$data1['editharianalat'] = $this->m_logbook->operasiJoinByDate($tgl);
			$data1['tgl'] = $tgl;
		}
//mingguan Alat
		if($this->input->get('tanggal')){
			$tgl = $this->input->get('tanggal');
			$data1['mingguanalat'] = $this->m_logbook->operasiJoinByDate($tgl);
			$data1['tgl'] = $tgl;
		}
		if($this->input->get('edit')){
			$tgl = $this->input->get('edit');
			$data1['editmingguanalat'] = $this->m_logbook->operasiJoinByDate($tgl);
			$data1['tgl'] = $tgl;
		}
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
				<strong>Peringatan!</strong> Anda Belum Mengisi Data PERALATAN AGROKLIMAT hari ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_harian', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Anda sudah Mengisi Data Peralatan Agroklimat Hari Ini, jika ada kesalahakan input langsung ubah dan klik <strong>Update</strong> di bagian bawah.
				</div>');
		}
		$data1['haloradar'] = $this->m_logbook->cekTodayRadar();
		if($data1['haloradar'] == 0){
			$this->session->set_flashdata('message_harian_radar', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Peringatan!</strong> Anda Belum Mengisi Data Radar hari ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_harian_radar', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Hari Ini sudah Input Data Radar Hari Ini, jika ada kesalahakan input langsung ubah dan klik <strong>Update</strong> di bagian bawah.
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
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Input.
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
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');
			header('location: cek/harian');
		}
	}
	public function updateharianByTanggal(){
		$data = $this->m_logbook->get('alat');
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
			
			$this->m_logbook->update_data($where,$data,'operasi');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');
			header('location: view/harian');
		}
	}
	public function updatemingguanByTanggal(){
		$data = $this->m_logbook->get('alat');
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
			
			$this->m_logbook->update_data($where,$data,'kondisi');
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
		$this->m_logbook->tambahKategoriAlat($input);
		header("location: view/agroklimat");
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Kategori Alat Baru Agroklimat ditambahkan.
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
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Mingguan Berhasil di Input.
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
			
			$update = $this->m_logbook->update_data($where,$data,'kondisi');
			if($update){
				$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Peralatan Agroklimat Berhasil di Update.
				</div>');
			}else{
				$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Tidak Terupdate.
				</div>');
			}
			
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
    		<strong>!</strong> Update Data Kategori Alat.
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
			<strong>Success!</strong> Kategori Radar Baru ditambahkan.
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
				<strong>Success!</strong> Update Data Radar Kategori Alat.
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
			<strong>Success!</strong> Radar Baru Ditambahkan.
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
				<strong>Success!</strong>  Data Radar Berhasil di update.
				</div>');
			header('location: view/radar');
		}
	}
	public function hapusKategoriRadar($data){
		$this->m_logbook->hapusKategoriRadar($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Kategori Radar Berhasil di Hapus.
			</div>');
		header('location: ../view/radar');
	}
	public function hapusRadar($data){
		$this->m_logbook->hapusRadar($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Data Radar berhasil di Hapus .
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
			if(empty($pembacaan)){
				$pembacaan = "-";
			}
			$data = array(
				'id_radar' => $id,
				'tanggal' => $date,
				'pembacaan' => $pembacaan
			);
			$table='pembacaan';			
			$this->m_logbook->inputHarian($table, $data);
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Input.
				</div>');
			header('location: cek/cek_radar');
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
			//echo $id_pembacaan."-".$pembacaan."<br>";
			$where = array(
				'id_pembacaan' => $id_pembacaan, 
				'tanggal' => $date
			);
			$data = array(
				'pembacaan' => $pembacaan
			);
			$this->m_logbook->update_data($where,$data,'pembacaan');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Update.
				</div>');
			header('location: cek/cek_radar');
		}
	}
	public function updateharianradarByTanggal(){
			$data = $this->m_logbook->get('radar');
			$date = date('Y-m-d');
			foreach ($data as $radar) {
				$var = "pembacaan".$id = $radar->id_radar;
				$var1 = "id_pembacaan".$radar->id_radar;
				$var2 = "tanggal".$radar->id_radar;
				$pembacaan = $this->input->post($var);
				$id_pembacaan = $this->input->post($var1);
				$tanggal = $this->input->post($var2);
			if(empty($pembacaan)){
				$pembacaan = "-";
			}
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
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Update.
				</div>');
			header('location: view/tampil_data_radar');
		}
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
		$this->m_logbook->buat_laporan($data);
		header('location:view/laporan');
	}
	public function hapuslaporan($data){
		$this->m_logbook->hapuslaporan($data);
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
		$nama_alat = $this->input->post('nama');
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
			$this->m_logbook->update_data($where,$data, 'laporan');
			$this->session->set_flashdata('message_laporan', '
			<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Success!</strong> Laporan berhasil di Update.
  			</div>');
			header('location: view/laporan');
		}
	}
	function lihat_data_alat(){

	}
}


