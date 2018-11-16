<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_radar extends CI_Model{
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

	function getWhere($table, $where){//where pake array
		$query = $this->db->get_where($table, $where);
		return $query->result();
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

	function getChecklistRadarMingguan(){
		$query = $this->db->query("SELECT * FROM radar_mingguan");
		return $query->result();
	}
		
	function tambahChecklistRadarMingguan($input){
	 	return $this->db->insert('radar_mingguan', $input);
	}

	//tanggal
	function getChecklistRadarMingguanTanggal($date){ 	
		$query = $this->db->query("SELECT * FROM radar_mingguan WHERE tanggal = '$date'");
		return $query->result();
	}

	function hapusRadar($id){
		$query = $this->db->query("DELETE FROM radar WHERE id_radar = '$id'");	
	}

	function tambahRadar($input){
		return $this->db->insert('radar', $input);
	}
	function getJumlahRadar(){
		$query = $this->db->query("SELECT COUNT(id_radar) FROM radar");
		return $query->result();
	}

	function inputHarianRadar($input){
		$this->db->insert('pembacaan', $input);
	}

	function pembacaanJoinByDate($date){
		$query = $this->db->query("SELECT p.id_pembacaan, p.pembacaan, p.id_radar, r.id_kategoriradar, p.tanggal, r.nama_radar, r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar WHERE p.tanggal = '$date'"); 			
	return $query->result();
	}

	//harian
	function grup_tanggal_radar(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT COUNT(tanggal), tanggal FROM pembacaan GROUP BY tanggal ORDER BY tanggal DESC"); 
		return $query->result();
	}
	//mingguan
	function grup_tanggal_radar2(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT COUNT(tanggal), tanggal FROM radar_mingguan GROUP BY tanggal ORDER BY tanggal DESC"); 
		return $query->result();
	}
	function cekTodayRadar(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM pembacaan WHERE tanggal = '$date'");  
		return $query->num_rows();
		}
	function cekTodayRadarMingguan(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM radar_mingguan WHERE tanggal = '$date'");  
		return $query->num_rows();
	}
	function pembacaanJoin(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT p.id_pembacaan, p.pembacaan, p.id_radar, r.id_kategoriradar, p.tanggal,r.nama_radar,r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar WHERE p.tanggal = '$date'"); 
		return $query->result();
	}
	function pembacaanChart(){
		$query = $this->db->query("SELECT p.id_pembacaan, p.pembacaan, p.id_radar, r.id_kategoriradar, p.tanggal, r.nama_radar, r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar WHERE P.pembacaan != ('MENYALA' || 'MATI' || 'ENABLE' || 'DISABLE' || 'MENYALA HIJAU' || 'MENYALA MERAH' || 'BERKEDIP' || 'HIJAU' || 'PUTIH' || 'HIJAU MENYALA' || 'HIJAU TUA' || 'CONNECT' || 'DISCONNECT' || 'CONTROL' || 'CTRL YOGFROG')");
			return $query->result();
	}
	function getIdRadar(){
		$query = $this->db->query("SELECT COUNT(p.id_radar), p.id_radar, r.id_kategoriradar, p.tanggal, r.nama_radar, r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar WHERE P.pembacaan != ('MENYALA' || 'MATI' || 'ENABLE' || 'DISABLE' || 'MENYALA HIJAU' || 'MENYALA MERAH' || 'BERKEDIP' || 'HIJAU' || 'PUTIH' || 'HIJAU MENYALA' || 'HIJAU TUA' || 'CONNECT' || 'DISCONNECT' || 'CONTROL' || 'CTRL YOGFROG') GROUP BY p.id_radar");
			return $query->result();
	}

	function pembacaanChartz($data){
		$query = $this->db->query("SELECT p.id_pembacaan, p.pembacaan, p.id_radar, r.id_kategoriradar, p.tanggal, r.nama_radar, r.standar FROM pembacaan p INNER JOIN radar r ON p.id_radar = r.id_radar WHERE p.id_radar = '$data' LIMIT 30");
			return $query->result();
	}


}