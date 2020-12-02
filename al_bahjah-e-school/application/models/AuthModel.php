<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    public function getDataByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
}
