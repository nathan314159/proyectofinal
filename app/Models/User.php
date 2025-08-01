<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'usu_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['usu_nombre', 'usu_apellido', 'usu_email', 'usu_password', 'usu_estado'];

    protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    public function showUser()
    {
        $builder = $this->db->table($this->table);
        $builder->select('usu_id, usu_nombre, usu_apellido, usu_email, usu_estado');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function register($data)
    {
        return $this->insert($data);
    }
}
