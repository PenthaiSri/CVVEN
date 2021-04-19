<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    
    public const ROLE_CLIENT = 'CLIENT';
    public const ROLE_ADMIN = 'ADMIN';
    
    protected $table = 'users';
    protected $allowedFields = ['user_id','user_name','user_email','user_password','role','user_created_at'];
    
    public function listerClients(){
        return $this->where("role='CLIENT'")->orderBy('user_name')->orderBy('user_email')->findAll();
    }
}