<?php
namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
    protected $table = 'records';
    protected $allowedFields = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'phone',
        'mobile',
        'email',
        'created_at',
    ];
}
