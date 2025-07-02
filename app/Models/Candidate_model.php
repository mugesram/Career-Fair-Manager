<?php

namespace App\Models;

use CodeIgniter\Model;

class Candidate_model extends Model
{
    protected $table      = 'candidate';
    protected $primaryKey = 'index_no';
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

    function getCandidate($search_by, $key)
    {
        $builder = $this->db->table($this->table);
        $rows = $builder->where($search_by, $key)->get()->getResultArray();
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

    function candidateUpdate($condition, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($condition)->update($data);
        return true;
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
