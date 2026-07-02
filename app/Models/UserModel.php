<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['nama', 'email', 'password', 'role', 'created_at'];

    protected $returnType = 'array';

    // Pastikan password tidak ter-hash ulang oleh model.
    protected $useSoftDeletes = false;
}

