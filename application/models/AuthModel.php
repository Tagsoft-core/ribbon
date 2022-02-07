<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{
	public function checkUser($data)
	{
		$this->db->select('*');
		$this->db->where($data);
		$result = $this->db->get('users');
		return $result->row();
	}
}
