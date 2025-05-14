<?php
class User_model extends CI_Model {
    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
    
    public function update_login_info($user_id, $datetime, $ip)
    {
        $data = [
            'last_login' => $datetime,
            'last_ip' => $ip
        ];
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

}
