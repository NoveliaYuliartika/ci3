<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prsmodel extends CI_Model {
	public function getInformation(){	
		$data = array(
			'name' => array('firstname' => "Fahmiko Purnama",'lastname'=> "Putra"),
			'address' => "Jl Sundan Rt 03 Rw 10 Plaosan Wonosari Malang",
			'email' => "pp.fahmiko@gmail.com",
			'about' => "Pengalaman saya dalam belajar bahasa pemrograman ialah dengan memahami konsep dari bahasa pemrograman itu sendiri, untuk pemrograman saya lebih fokus terhadap bahasa pemrograman berbasis website, dikarenakan website mudah dibuat walaupun hanya memakai bahasa HTML, dan untuk membuat website saat ini dimudahkan dengan adanya framework untuk HTML maupun PHP"
		);
		return $data;
	}
	
}

/* End of file person-model.php */
/* Location: ./application/models/person-model.php */