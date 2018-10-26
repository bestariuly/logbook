<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_logbook extends CI_Model{
		private $table = "data_log";
		public function __construct()
		{
		    parent::__construct();
		    $this->load->database();
		}
		function get($table){
			$query = $this->db->get($table);
			return $query->result();
		}
		function getKategori(){
			$query = $this->db->query("SELECT * FROM kategori");
			return $query->result();
		}
		function getAlat(){
			$query = $this->db->query("SELECT * FROM alat");
			return $query->result();
		}
		function getKategoriAlat(){
			$query = $this->db->query("SELECT alat.*, kategori.nama_kategori FROM alat INNER JOIN kategori ON alat.id_kategori = kategori.id_kategori");
			return $query->result();
		}
		public function tambahKategoriAlat($input)
		{
			return $this->db->insert('kategori', $input);
		}
		function hapusKategoriAlat($id){
			$query = $this->db->query("DELETE FROM alat WHERE id_kategori = '$id'");
			$query = $this->db->query("DELETE FROM kategori WHERE id_kategori = '$id'");
			
		}
		function hapusAlat($id){
			$query = $this->db->query("DELETE FROM alat WHERE id_alat = '$id'");
			
		}
		function tambahAlat($input){
			return $this->db->insert('alat', $input);
		}
		function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		

		// RADAR
		function getKategoriRadar(){
			$query = $this->db->query("SELECT * FROM kategoriradar");
			return $query->result();
		}
		
		function tambahKategoriRadar($input){
			return $this->db->insert('kategoriradar', $input);
		}
		function hapusKategoriRadar($id){
			$query = $this->db->query("DELETE FROM radar WHERE id_kategoriradar = '$id'");
			$query = $this->db->query("DELETE FROM kategoriradar WHERE id_kategori = '$id'");
		
		}
		function hapusRadar($id){
			$query = $this->db->query("DELETE FROM radar WHERE id_radar = '$id'");
		
		}
			function tambahRadar($input){
			return $this->db->insert('radar', $input);
		}
		function update_dataradar($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		// LAPORAN
		function buat_laporan($input){
			return $this->db->insert('laporan', $input);
		}
		function hapuslaporan($id){
			$query = $this->db->query("DELETE FROM laporan WHERE id = '$id'");
		}
		function updatelaporan($where,$data,$table)
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}


		function getWhere($table, $where){//where pake array
			$query = $this->db->get_where($table, $where);
			return $query->result();
		}
		function inputHarian($table, $input){
			$this->db->insert($table, $input);
		}
		function inputMingguan($table, $input){
			$this->db->insert($table, $input);
		}
		function inputHarianRadar($input){
			$this->db->insert('pembacaan', $input);
		}
		function cekToday(){ //cek harian
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM operasi WHERE tanggal = '$date'");  
			return $query->num_rows();
		}
		function cekmingguan(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM kondisi WHERE tanggal = '$date'");
			return $query->num_rows();
		}
		function operasiJoin(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT o.id_operasi, o.operasi, o.id_alat, a.id_kategori, o.tanggal, o.keterangan, a.nama_alat FROM operasi o INNER JOIN alat a ON o.id_alat = a.id_alat WHERE o.tanggal = '$date'"); 
			return $query->result();
		}
		function operasiJoin2(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT o.id_operasi, o.operasi, o.id_alat, a.id_kategori, o.tanggal, o.keterangan, a.nama_alat FROM operasi o INNER JOIN alat a ON o.id_alat = a.id_alat"); 
			return $query->result();
		}	
		function operasiJoin3(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT k.id_kondisi, k.kondisi, k.id_alat, a.id_kategori, k.tanggal, k.keterangan, a.nama_alat FROM kondisi k INNER JOIN alat a ON k.id_alat = a.id_alat"); 
			return $query->result();
		}	
		function joinradar(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT r.*, k.nama_kategori FROM radar r INNER JOIN kategoriradar k ON r.id_kategoriradar = k.id_kategori"); 
			return $query->result();
		}
		function grup_tanggal(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT COUNT(tanggal), tanggal FROM operasi GROUP BY tanggal"); 
			return $query->result();
		}
		function cekTodayRadar(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM pembacaan WHERE tanggal = '$date'");  
			return $query->num_rows();
		}
		function pembacaanJoin(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT p.id_pembacaan, p.pembacaan, p.id_radar, r.id_kategoriradar, p.tanggal,r.nama_radar,r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar WHERE p.tanggal = '$date'"); 
			return $query->result();
		}
		function pembacaanJoin2(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT p.id_pembacaan, p.pembacaan, p.id_radar, r.id_kategoriradar, p.tanggal, r.nama_radar,r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar"); 
			return $query->result();
		}	
		

		
}
?>