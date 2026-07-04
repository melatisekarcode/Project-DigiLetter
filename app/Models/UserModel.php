<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama', 'email', 'password', 'role', 'created_at'];
}

