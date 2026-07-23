<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($email, $password)
    {
        return $this->db
            ->where('email', $email)
            ->where('password', $password)
            ->get('users')
            ->row();
    }

    public function countUsers()
    {
        return $this->db->count_all('users');
    }
}