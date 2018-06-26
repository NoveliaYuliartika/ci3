<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Model {

    public function __construct()
     {
          $this->load->database();
     } 
     
     public function get_article(){
          $query = $this->db->get('personal_blog');
          return $query;
     }

     public function get_article_by_id($id){
          $query = $this->db->get_where('personal_blog', array('id' => $id));
          return $query->row_array();
     }

     public function get_join(){
          $query = $this->db->select('*')
                    ->from('personal_blog')
                    ->join('kategori','personal_blog.id_kategori = kategori.id_kategori')
                    ->get();
          return $query;
     }

     public function set_article($id = 0, $data){
          $this->load->helper('url');
          //Membedakan untuk query create dan update
          if($id == 0){
               $this->db->insert('personal_blog', $data);
          }else{
               $this->db->where('id',$id);
               return $this->db->update('personal_blog', $data);
          }
     }

     public function delete_article($id){
               $this->db->where('id', $id);
               return $this->db->delete('personal_blog');
     }
}
/* End of file database_test.php */
/* Location: ./application/models/database_test.php */
?>