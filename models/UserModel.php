<?php
class UserModel extends Model {
    public function create($data) {
        $status = $this->db->table('users')->insert($data);
        $this->db->resetQuery();

        return $status;
    }

    public function getUserByUsername($username) {
        $data = $this->db->table('users')->where('username', '=', $username)->first();

        return $data;
    }

    public function getUserByEmail($email) {
        $data = $this->db->table('users')->where('email', '=', $email)->first();

        return $data;
    }

    public function getLastInsertId() {
        return $this->db->lastId();
    }

    public function updateUserById($id, $data) {
        $status = $this->db->table('users')->where('id', '=', $id)->update($data);
        $this->db->resetQuery();

        return $status;
    }
}