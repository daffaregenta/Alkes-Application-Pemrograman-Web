<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mhome extends CI_Model {
    
    public function get($username){
        $this->db->where('username', $username);
        $result = $this->db->get('tbl_user')->row(); 

        return $result;
    }

	public function hapus_produk($nip)
	{
		return $this->db->delete('tbl_produk', ['id_produk' => $nip]);
	}
	public function edit_produk($nip,$data)
	{
		$this->db->where('id_produk', $nip);
		$this->db->update('tbl_produk', $data);
	    return;
	}
	public function tambah_produk($data)
	{
		return $this->db->insert('tbl_produk', $data);
	}
	public function check_username($username){
		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function insert_new_profle($data){
		$this->db->insert('tbl_user', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function get_produk_all()
	{
		$query = $this->db->get('tbl_produk');
		return $query->result_array();
	}
	
	public function get_produk_kategori($kategori)
	{
		if($kategori>0)
			{
				$this->db->where('kategori',$kategori);
			}
		$query = $this->db->get('tbl_produk');
		return $query->result_array();
	}
	
	public function get_kategori_all()
	{
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}
	
	public  function get_produk_id($id)
	{
		$this->db->select('tbl_produk.*,nama_kategori');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_kategori', 'kategori=tbl_kategori.id','left');
   		$this->db->where('id_produk',$id);
        return $this->db->get();
    }	
	
	public function tambah_pelanggan($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function tambah_order($data)
	{
		$this->db->insert('tbl_order', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function tambah_detail_order($data)
	{
		$this->db->insert('tbl_detail_order', $data);
	}
}
