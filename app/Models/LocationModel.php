<?php 
namespace App\Models;
use CodeIgniter\Model;

class LocationModel extends Model{
    protected $table      = 'locations';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['location'];

}