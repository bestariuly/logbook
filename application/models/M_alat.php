<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_alat extends CI_Model{
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
	function tambahKategoriAlat($input){
		return $this->db->insert('kategori', $input);
	}
	function hapusKategoriAlat($id){
		$query = $this->db->query("DELETE FROM alat WHERE id_kategori = '$id'");
		$query = $this->db->query("DELETE FROM kategori WHERE id_kategori = '$id'");
	}
	function hapusAlat($id){
		$query = $this->db->query("DELETE FROM alat WHERE id_alat = '$id'");
	}
    
    //untuk update
	function getWhere($table, $where){//where pake array
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }
    function tambahAlat($input){
		return $this->db->insert('alat', $input);
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
	
    public function getLaporan(){
		$data = $query = $this->db->query("SELECT * FROM laporan ORDER BY tanggal DESC");
		return $data->result();
	}
    
    //input harian dan mingguan
	function inputHarian($table, $input){
		$this->db->insert($table, $input);
	}
	function inputMingguan($table, $input){
		$this->db->insert($table, $input);
	}
	
	//cek harian
	function cekToday(){ 
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM operasi WHERE tanggal = '$date'");  
		return $query->num_rows();
	}
	function cekmingguan(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM kondisi WHERE tanggal = '$date'");
		return $query->num_rows();
	}
	// JOIN table OPERASI DAN ALAT UNTUK CEK HARIAN
	function operasiJoin(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT o.id_operasi, o.operasi, o.id_alat, a.id_kategori, o.tanggal, o.keterangan, a.nama_alat FROM operasi o INNER JOIN alat a ON o.id_alat = a.id_alat WHERE o.tanggal = '$date'"); 
		return $query->result();
	}
	// join harian berdasarkan tanggal
	function operasiJoinByDate($date){
		$query = $this->db->query("SELECT DISTINCT o.id_operasi, o.operasi, o.id_alat, a.id_kategori, o.tanggal, o.keterangan AS keterangan_operasi, a.nama_alat FROM operasi o INNER JOIN alat a ON o.id_alat = a.id_alat WHERE o.tanggal='$date' GROUP BY a.id_alat"); 
			return $query->result();
	}
	// join alat dengan operasi untuk nyimpan data
	function operasiJoin2(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT o.id_operasi, o.operasi, o.id_alat, a.id_kategori, o.tanggal, o.keterangan, a.nama_alat FROM operasi o INNER JOIN alat a ON o.id_alat = a.id_alat"); 
		return $query->result();
	}	
	// join kondisi dan alat untuk cek data mingguan
	function operasiJoin3(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT k.id_kondisi, k .kondisi, k.id_alat, a.id_kategori, k.tanggal, k.keterangan AS keterangan_kondisi , a.nama_alat FROM kondisi k INNER JOIN alat a ON k.id_alat = a.id_alat WHERE k.tanggal='$date' GROUP BY a.id_alat"); 
		return $query->result();
	}
	// join kondisi dan alat untuk view data mingguan	
	function operasiJoin4($date){	
		$query = $this->db->query("SELECT k.id_kondisi, k .kondisi, k.id_alat, a.id_kategori, k.tanggal, k.keterangan AS keterangan_kondisi , a.nama_alat FROM kondisi k INNER JOIN alat a ON k.id_alat = a.id_alat WHERE k.tanggal='$date' GROUP BY a.id_alat"); 
		return $query->result();
    }	
    // pemanggilan tanggal harian
	function grup_tanggal(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT COUNT(tanggal), tanggal FROM operasi GROUP BY tanggal ORDER BY tanggal DESC "); 
		return $query->result();
    }
    //pemanggilan tanggal mingguan
	function grup_tanggal2(){
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT COUNT(tanggal), tanggal FROM kondisi GROUP BY tanggal ORDER BY tanggal DESC"); 
		return $query->result();
	}
	
}
?>
