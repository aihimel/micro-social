<?php 
namespace App\Models;
use CodeIgniter\Model;

class PostModel extends Model{
    protected $table      = 'posts';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['title', 'status'];

}