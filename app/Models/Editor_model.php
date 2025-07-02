<?php

namespace App\Models;

use CodeIgniter\Model;

class Editor_model extends Model
{
    protected $table      = 'editor';
    protected $primaryKey = 'editor_id';
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
    function getEditor($search_by, $key)
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

    function updateAll($data)
    {
        $builder = $this->db->table($this->table);
        // delete all data
        $builder->truncate();
        // insert new data
        $new_data = [];
        foreach ($data as $editor) {
            if (in_array('pin', array_keys($editor))) {
                $editor['pin'] = stripslashes(md5($editor['pin']));
                $new_data[] = $editor;
            }
        }

        $builder->insertBatch($new_data);
    }
}
