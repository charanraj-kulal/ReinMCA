<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'User';

    public function verifyUser($email, $password)
    {
        $email = trim($email);
        $password = md5($password);

        $query = $this->db->table($this->table)
                          ->select('*')
                          ->where("(email = '$email' OR emp_no = '$email')")
                          ->where('password', $password)
                          ->limit(1)
                          ->get();

        return $query->getResult();
    }

    public function forgotPassword($email)
    {
        $query = $this->db->table($this->table)
                          ->select('*')
                          ->where('email', $email)
                          ->where('status', 1)
                          ->limit(1)
                          ->get();

        if ($query->getNumRows() == 1) {
            $row = $query->getRow();

            $newPassword = $this->generateRandomPassword();
            $hashedPassword = md5($newPassword);

            $updateData = [
                'password' => $hashedPassword
            ];

            $this->db->table($this->table)
                     ->where('user_id', $row->user_id)
                     ->update($updateData);

            // Sending email code goes here
            // $this->emailModel->emailForPasswordReset($row->email, $newPassword);

            return true;
        } else {
            return false;
        }
    }

    private function generateRandomPassword($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomPassword;
    }
}
