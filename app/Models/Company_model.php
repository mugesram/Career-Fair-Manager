<?php

namespace App\Models;

use CodeIgniter\Model;

class Company_model extends Model
{
    protected $table      = 'company';
    protected $primaryKey = 'company_id';
    protected $db;
    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    function getAll()
    {
        $builder = $this->db->table($this->table);
        $rows = $builder->get()->getResultArray();
        $data = [];
        foreach ($rows as $row) {
            $new_row = [];
            foreach (array_keys($row) as $key) {
                $new_row[] = $row[$key];
            }
            $data[] = $new_row;
        }
        return $data;
    }

    function updateAll($data)
    {
        $builder = $this->db->table($this->table);
        // delete all data
        $builder->truncate();
        // insert new data
        $builder->insertBatch($data);
    }
}
