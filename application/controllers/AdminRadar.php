<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRadar extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('m_radar');
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
		$jumlahradar= $this->m_radar->getJumlahRadar();
	}
	public function view($data){
		//radar
		$radar = "radar";
		$kategoriradar = "kategoriradar";
		$getIdRadar = $this->m_radar->getIdRadar();
		$data1['getIdRadar'] = $getIdRadar;
		foreach ($getIdRadar as $getIdRadar) {
			$id = $getIdRadar->id_radar;
			$x= 'chart'.$id;
			$data1[$x] = $this->m_radar->pembacaanChartz($id);
		}
		$data1['chart'] = $this->m_radar->pembacaanChart();
		$data1['kategoriradar'] = $this->m_radar->get($kategoriradar);
		$data1['radar'] = $this->m_radar->get($radar);
		$data1['kategori_radar'] = $this->m_radar->getKategoriRadar();
		$data1['tanggal_radar'] = $this->m_radar->grup_tanggal_radar();
		$data1['tanggal_radar2'] = $this->m_radar->grup_tanggal_radar2();
		

//harian Alat dan radar
		if($this->input->get('tanggal')){
			$tgl = $this->input->get('tanggal');
			$data1['harianradar'] = $this->m_radar->pembacaanJoinByDate($tgl);
			$data1['mingguanradar'] = $this->m_radar->getChecklistRadarMingguanTanggal($tgl);
			$data1['tgl'] = $tgl;
		}
		if($this->input->get('edit')){
			$tgl = $this->input->get('edit');
			$data1['editharianradar'] = $this->m_radar->pembacaanJoinByDate($tgl);
			$data1['editmingguanradar'] = $this->m_radar->getChecklistRadarMingguanTanggal($tgl);
			$data1['tgl'] = $tgl;
		}


		
		if ($data=='cetak_data_radar' || $data=='cetak_data_radar_mingguan') {
			$this->load->view('admin/view/'.$data, $data1);
		}else{
		$this->load->view('admin/header');
		$this->load->view('admin/view/'.$data, $data1);
		$this->load->view('admin/footer');		
		}
		
		
		
	}

	// ALAT
	public function cek($data){
		//CEK RADAR
		$data1['haloradar'] = $this->m_radar->cekTodayRadar();
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
		//cek radar mingguan
		$data1['halomingguan'] = $this->m_radar->cekTodayRadarMingguan();
		if($data1['halomingguan'] == 0){
			$this->session->set_flashdata('message_mingguan_radar', '
				<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Peringatan!</strong> Anda Belum Mengisi Data Radar Minggu ini!
				</div>');
		}else{
			$this->session->set_flashdata('message_mingguan_radar_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Terima Kasih</strong> Data Radar minggu ini telah diinput, jika ada kesalahakan input langsung ubah dan klik <strong>Update</strong> di bagian bawah.
				</div>');
		}
		$kategoriradar = "kategoriradar";
		$radar = "radar";
		$data1['pembacaan'] = $this->m_radar->getWhere('pembacaan', array('tanggal' => date('Y-m-d')));
		$data1['radarmingguan'] = $this->m_radar->getWhere('radar_mingguan', array('tanggal' => date('Y-m-d')));
		$data1['radar'] = $this->m_radar->get($radar);
		$data1['pembacaanjoin'] = $this->m_radar->pembacaanJoin();
		$data1['kategoriradar'] = $this->m_radar->get($kategoriradar);
		$data1['kategoriradar'] = $this->m_radar->getKategoriRadar();
	
		$this->load->view('admin/header');
		$this->load->view('admin/cek/'.$data, $data1);
		$this->load->view('admin/footer');
	}

	//RADAR
	public function tambah_kategori_radar(){
		$namakategoriradar = $this->input->post('namakategoriradar');
		$input = array(
			'nama_kategori' => $namakategoriradar
		);
		$this->m_radar->tambahKategoriRadar($input);
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
			$this->m_radar->update_data($where,$data,'kategoriradar');
			header('location: view/radar');
		}
	}
	public function hapusKategoriRadar($data){
		$this->m_radar->hapusKategoriRadar($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Kategori Radar Berhasil di Hapus.
			</div>');
		header('location: ../view/radar');
	}
	public function tambah_checklist_radar(){
		$radarpemeliharaan = $this->input->post('radarpemeliharaan');
		$radarkebersihan = $this->input->post('radarkebersihan');
		$radarswitch = $this->input->post('radarswitch');
		$gensetpemanasan = $this->input->post('gensetpemanasan');
		$gensetair = $this->input->post('gensetair');
		$gensetsolar = $this->input->post('gensetsolar');
		$gensetpemeliharaan = $this->input->post('gensetpemeliharaan');
		$gensetkebersihan = $this->input->post('gensetkebersihan');
		$catatan = $this->input->post('catatan');
		$date = date('Y-m-d');
		$input = array(
			'pemeliharaan_radar' => $radarpemeliharaan,
			'kebersihan_radar' => $radarkebersihan,
			'tanggal' => $date,
			'switch_ac' => $radarswitch,
			'pemanasan_genset' => $gensetpemanasan,
			'pengecekanair_genset' => $gensetair,
			'pengecekansolar_genset' => $gensetsolar,
			'pemeliharaan_genset' => $gensetpemeliharaan,
			'kebersihan_genset' => $gensetkebersihan,
			'catatan' => $catatan


		);
		$this->m_radar->tambahChecklistRadarMingguan($input);
		header('location: cek/cek_radar_mingguan');
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Ceklist Radar Mingguan berhasil ditambahkan.
			</div>');
	}
	
	public function update_checklist_radar()
	{	
		$var = $this->input->post('id');
		$data = $this->m_radar->get('radar_mingguan');
		$radarpemeliharaan = $this->input->post('radarpemeliharaan');
		$radarkebersihan = $this->input->post('radarkebersihan');
		$radarswitch = $this->input->post('radarswitch');
		$gensetpemanasan = $this->input->post('gensetpemanasan');
		$gensetair = $this->input->post('gensetair');
		$gensetsolar = $this->input->post('gensetsolar');
		$gensetpemeliharaan = $this->input->post('gensetpemeliharaan');
		$gensetkebersihan = $this->input->post('gensetkebersihan');
		$catatan = $this->input->post('catatan');
		$date = date('Y-m-d');
		$where = array(
				'id' => $var, 
				'tanggal' => $date

			);
			$data = array(
				'pemeliharaan_radar' => $radarpemeliharaan,
				'kebersihan_radar' => $radarkebersihan,
				'tanggal' => $date,
				'switch_ac' => $radarswitch,
				'pemanasan_genset' => $gensetpemanasan,
				'pengecekanair_genset' => $gensetair,
				'pengecekansolar_genset' => $gensetsolar,
				'pemeliharaan_genset' => $gensetpemeliharaan,
				'kebersihan_genset' => $gensetkebersihan,
				'catatan' => $catatan
			);
			$this->m_radar->update_data($where,$data,'radar_mingguan');
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Update.
				</div>');
			header('location: cek/cek_radar_mingguan');
		}
	public function update_checklist_radar_tanggal(){
			$data = $this->m_radar->get('radar_mingguan');
			$date = date('Y-m-d');
			$var = $this->input->post('id');
			$radarpemeliharaan = $this->input->post('radarpemeliharaan');
			$radarkebersihan = $this->input->post('radarkebersihan');
			$radarswitch = $this->input->post('radarswitch');
			$gensetpemanasan = $this->input->post('gensetpemanasan');
			$gensetair = $this->input->post('gensetair');
			$gensetsolar = $this->input->post('gensetsolar');
			$gensetpemeliharaan = $this->input->post('gensetpemeliharaan');
			$gensetkebersihan = $this->input->post('gensetkebersihan');
			$catatan = $this->input->post('catatan');
			$date = date('Y-m-d');
			$where = array(
				'id' => $var

			);
			$data = array(
				'pemeliharaan_radar' => $radarpemeliharaan,
				'kebersihan_radar' => $radarkebersihan,
				'switch_ac' => $radarswitch,
				'pemanasan_genset' => $gensetpemanasan,
				'pengecekanair_genset' => $gensetair,
				'pengecekansolar_genset' => $gensetsolar,
				'pemeliharaan_genset' => $gensetpemeliharaan,
				'kebersihan_genset' => $gensetkebersihan,
				'catatan' => $catatan
			);
			$this->m_radar->update_data($where,$data,'radar_mingguan');
			$this->session->set_flashdata('message_mingguan_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Update.
				</div>');
			header('location: view/tampil_data_radar_mingguan');
		
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
		$this->m_radar->tambahRadar($data);
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
			$this->m_radar->update_data($where,$data,'radar');
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong>  Data Radar Berhasil di update.
				</div>');
			header('location: view/radar');
		}
	}
	
	public function hapusRadar($data){
		$this->m_radar->hapusRadar($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Data Radar berhasil di Hapus .
			</div>');
		header('location: ../view/radar');
	}
	public function cekharianradar()
	{
		
		$data = $this->m_radar->get('radar');
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
			$this->m_radar->inputHarian($table, $data);
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
		$data = $this->m_radar->get('radar');
		$date = date('Y-m-d');
		foreach ($data as $radar) {
			$var = "pembacaan".$id = $radar->id_radar;
			$var1 = "id_pembacaan".$radar->id_radar;
			$pembacaan = $this->input->post($var);
			$id_pembacaan = $this->input->post($var1);
			if(empty($pembacaan)){
				$pembacaan = "-";
			}
			//echo $id_pembacaan."-".$pembacaan."<br>";
			$where = array(
				'id_pembacaan' => $id_pembacaan, 
				'tanggal' => $date
			);
			$data = array(
				'pembacaan' => $pembacaan
			);
			$this->m_radar->update_data($where,$data,'pembacaan');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Update.
				</div>');
			header('location: cek/cek_radar');
		}
	}
	public function updateharianradarByTanggal(){
			$data = $this->m_radar->get('radar');
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
			
			$this->m_radar->update_data($where,$data,'pembacaan');
			$this->session->set_flashdata('message_harian_sukses', '
				<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Data Radar Agroklimat Berhasil di Update.
				</div>');
			header('location: view/tampil_data_radar');
		}
	}

}

