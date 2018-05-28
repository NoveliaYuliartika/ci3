<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

	public function get_all_artikel( $limit = FALSE, $offset = FALSE ) 
    {
        // Jika variable $limit ada pada parameter maka kita limit query-nya
        if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
    	// Query Manual
    	// $query = $this->db->query('
    	// 		SELECT * FROM blogs
    	// 	');

        // Memakai Query Builder
        // Urutkan berdasar tanggal
        // $this->db->order_by('codeigniter.post_date', 'DESC');
        $this->db->order_by('blogs.post_date', 'DESC');

        // Inner Join dengan table Categories
        $this->db->join('categories', 'categories.cat_id = blogs.fk_cat_id');
        
        // $query = $this->db->get('codeigniter');
        $query = $this->db->get('blogs');

    	// Return dalam bentuk object
    	return $query->result();
    }

    public function get_total() 
    {
        // Dapatkan jumlah total artikel
        // return $this->db->count_all("codeigniter");
        return $this->db->count_all("blogs");
    }

    public function get_artikel_by_id($id)
    {
         // Inner Join dengan table Categories
        $this->db->select ( '
            codeigniter.*, 
            kategori.cat_id as category_id, 
            kategori.cat_name,
            kategori.cat_description,
        ' );
        $this->db->join('kategori', 'kategori.cat_id = codeigniter.fk_cat_id');

    	$query = $this->db->get_where('codeigniter', array('codeigniter.post_id' => $id));
    	            
		return $query->row();
    }

    public function get_artikel_by_slug($slug)
    {

         // Inner Join dengan table Categories
        $this->db->select ( '
            codeigniter.*, 
            kategori.cat_id as category_id, 
            kategori.cat_name,
            kategori.cat_description,
        ' );
        $this->db->join('kategori', 'kategori.cat_id = codeigniter.fk_cat_id');
        
        $query = $this->db->get_where('codeigniter', array('post_slug' => $slug));

        // Karena datanya cuma 1, kita return cukup via row() saja
        return $query->row();
    }

    public function create_artikel($data)
    {
        return $this->db->insert('codeigniter', $data);
    }

    public function update_artikel($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'codeigniter', $data, array('post_id'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete_artikel($id)
    {
    	if ( !empty($id) ){
	    	$delete = $this->db->delete('codeigniter', array('post_id'=>$id) );
	        return $delete ? true : false;
    	} else {
    		return false;
    	}
    }

    public function get_artikel_by_category($category_id)
    {

        $this->db->order_by('codeigniter.post_id', 'DESC');

        $this->db->join('categories', 'categories.cat_id = codeigniter.fk_cat_id');
        $query = $this->db->get_where('codeigniter', array('cat_id' => $category_id));
  
        return $query->result();
    }
}