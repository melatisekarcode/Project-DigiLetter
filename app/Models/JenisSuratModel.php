<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSuratModel extends Model
{
    protected $table = 'jenis_surat';
    protected $primaryKey = 'id_jenis';

    protected $returnType = 'array';

    protected $allowedFields = [
        'nama_jenis'
    ];
}