<?php

namespace App\Models;

use CodeIgniter\Model;

class model_users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'username', 'password', 'nama'];
}
