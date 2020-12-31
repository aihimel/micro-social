<?php 
namespace App\Models;
use CodeIgniter\Model;

class PostModel extends Model{
    protected $table      = 'posts';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['title', 'status', 'location_id', 'user_id', 'private'];

    protected $useTimestamps = true;
    protected $createdField  = 'insertion_datetime';
    protected $updatedField  = 'updated';

    protected $validationRules = [
        'title' => 'required',
        'status' => 'required',
    ];

}