<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Candidate_model;
use App\Models\Company_model;
use App\Models\Editor_model;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Home extends BaseController
{

    private $table_data = [
        'candidate' => ['index_no', 'name', 'contact'],
        'editor' => ['editor', 'index_no', 'pin'],
        'company' => ['company'],
    ];
    function __construct()
    {
        //parent::__construct();

    }
    public function index(): string
    {

        $candidate = new Candidate_model();
        $data = ["candidates" => $candidate->getAll()];
        $data['view'] = 'index';
        return view('candidates', $data);
    }
    public function modify(): string
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            $candidate = new Candidate_model();
            $company = new Company_model();
            $editor = new Editor_model();
            $data = ["candidates" => $candidate->getAll(), "companies" => $company->getAll(), "editors" => $editor->getAll()];
            $data['view'] = 'modify';
            return view('modify', $data);
        } else {
            $this->response->redirect('/login');
        }
    }
    public function edit($index_no, $availability, $company)
    {
        $candidateM = new Candidate_model();
        $companyM = new Company_model();


        $companies = $companyM->where('company_id', $company)->get()->getResultArray();
        if ($companies) {
            $company = $companies[0]['company'];
        }

        $session = session();


        $editor = $session->get('editor') . " |" . $session->get('index_no');

        $selectedC = $candidateM->getCandidate('index_no', $index_no)[0];

        $is_error = false;
        $error_msgs = [];
        $warning_msgs = [];


        if ($editor != $selectedC[6] && $selectedC[4] == 'Busy') {
            $error_msgs[] = "Permission Denied.";
        }
        if (($selectedC[4] == 'None' || $selectedC[4] == 'Available') & $availability == 'Available') {
            $error_msgs[] = "Candidate Already Available";
        }
        if ($error_msgs) {
            $is_error = true;
        }


        if (!$is_error) {
            // $new_data = [
            //     'index_no' => $index_no,
            //     'name' => $selectedC[1],
            //     'contact' => $selectedC[5]
            // ];
            $new_data = [];

            if ($selectedC[4] == $availability) {
                $warning_msgs[] = "Availabilty Not Changed Others Updated. ";
                if ($selectedC[4] == 'Busy') {
                    $new_data['current_company'] = $company;
                }
            }

            if ($selectedC[4] != 'Busy' && $availability == 'Busy') {
                $new_data['current_company'] = $company;
                $new_data['availability'] = $availability;
                $new_data['modified_by'] = $editor;
            } else if ($selectedC[4] == 'Busy' && $availability == 'Available') {
                $new_data['last_company'] = $selectedC[3];
                $new_data['current_company'] = 'None';
                $new_data['availability'] = $availability;
                $new_data['modified_by'] = $selectedC[6];
            }

            if ($new_data) {
                $candidateM->candidateUpdate(['index_no' => $selectedC[0]], $new_data);
            } else {
                $warning_msgs[] = 'No Changes Made';
            }
        }

        $data = [
            'is_ok' => !$is_error,
            'error_messages' => $error_msgs,
            'warning_messages' => $warning_msgs
        ];

        return $this->response->setJSON($data);
    }

    public function search($search_by, $key)
    {
        // return ['is_ok' => true];
        $candidate = new Candidate_model();
        $data = ["candidates" => $candidate->getCandidate($search_by, $key)];

        $table_html = view('partials/candidateTable', $data);
        $json = ['is_ok' => true, 'data' => $table_html];


        return $this->response->setJSON($json);;
    }
    public function loadAll()
    {
        // return ['is_ok' => true];
        $candidate = new Candidate_model();
        $data = ["candidates" => $candidate->getAll()];
        $table_html = view('partials/candidateTable', $data);
        $json = ['is_ok' => true, 'data' => $table_html];


        return $this->response->setJSON($json);
    }

    public function extract_data($sheet_data, $col_to_exract)
    {

        // change the sheet to list for by collecting only needed type,name,label data
        $sheetList             = [];
        $col_order = [];
        foreach ($sheet_data as $key => $val) {
            if ($key != 0) {
                $new_data = [];
                foreach ($col_order as $name => $index) {
                    if ($index !== false) {
                        $new_data[$name] = $val[$index];
                    }
                }
                $sheetList[] = $new_data;
            } else {


                foreach ($col_to_exract as $name) {
                    $col_order[$name] = array_search($name, $val);
                }
            }
        }
        return $sheetList;
    }

    public function check_error($table, $new_data)
    {

        $error_msgs = [];
        $is_error = false;
        $tables = array_keys($this->table_data);
        // check data exist
        if (!($new_data && $new_data[0])) {
            $error_msgs[] = "Please use valid column names and table structure";
        } elseif ($table == $tables[0]) {
            // validate candidate table for unique index, not null fields
            $indexs = [];
            foreach ($new_data as $row) {
                foreach ($row as $name => $data) {
                    if (! $data) {
                        $error_msgs[] = "Blank data in " . "table" . $table . "column" . $name;
                    } elseif ($name == 'index_no') {
                        if (in_array($data, $indexs)) {
                            $error_msgs[] = $name . " have to be unique found duplicate for" . "table" . $table . "column" . $name . $data;
                        } else {
                            $indexs[] = $data;
                        }
                    }
                }
            }
        } elseif ($table == $tables[1]) {
            // validate candidate table for unique index, not null fields
            $indexs = [];
            $pins = [];
            foreach ($new_data as $row) {
                foreach ($row as $name => $data) {
                    if (! $data) {
                        $error_msgs[] = "Blank data in " . "table" . $table . "column" . $name;
                    } elseif ($name == 'index_no') {
                        if (in_array($data, $indexs)) {
                            $error_msgs[] = $name . " have to be unique, found duplicate for" . "table" . $table . "column" . $name . $data;
                        } else {
                            $indexs[] = $data;
                        }
                    } elseif ($name == 'pin') {
                        if (in_array($data, $pins)) {
                            $error_msgs[] = $name . " have to be unique ,found duplicate for" . "table" . $table . "column" . $name . $data;
                        } else {
                            $indexs[] = $data;
                        }
                    }
                }
            }
        } elseif ($table == $tables[2]) {
            // validate candidate table for unique index, not null fields
            foreach ($new_data as $row) {
                foreach ($row as $name => $data) {
                    if (! $data) {
                        $error_msgs[] = "Blank data in " . "table" . $table . "column" . $name;
                    }
                }
            }
        }
        $error_msgs = array_unique($error_msgs);
        if ($error_msgs) {
            $is_error = true;
        }

        return [
            'is_ok' => !$is_error,
            'error_messages' => $error_msgs
        ];
    }

    public function admin()
    {
        $session = session();
        if ($session->get('isLoggedIn') && $session->get('index_no') == 'admin') {
            $data['view'] = 'admin';
            return view('admin', $data);
        } else {
            $session->setFlashdata('msg', "Login as admin ");
            $this->response->redirect('/login');
        }
    }

    public function admin_update()

    {

        $file = $_FILES;
        $fileTmpPath = $file['file']['tmp_name'];
        $fileName = $file['file']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        // Save the uploaded file temporarily
        $targetPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $fileName;
        move_uploaded_file($fileTmpPath, $targetPath);

        $pin = $this->request->getPost('modifier_pin');


        $models = [
            'candidate' => new Candidate_model(),
            'company' => new Company_model(),
            'editor' => new Editor_model()
        ];
        $original_pin = $models['editor']->getEditor('editor', 'admin')[0][3];
        if (stripslashes(md5($pin)) == $original_pin) {

            $reader = IOFactory::createReader(ucfirst($fileExtension));
            $spreadsheet = $reader->load($targetPath);
            $sheetNames = $spreadsheet->getSheetNames();

            $success_msgs = [];
            foreach ($this->table_data as $table => $cols) {
                if (in_array($table, $sheetNames)) {
                    $sheet_data     = $spreadsheet->getSheetByName($table)->toArray();
                    $new_data = $this->extract_data($sheet_data, $cols);

                    $check_result = $this->check_error($table, $new_data);
                    if ($check_result['is_ok']) {

                        $model = $models[$table];
                        $model->updateAll($new_data);
                        $success_msgs[] = $table . " Successfully updated";
                    } else {
                        return $this->response->setJSON([
                            'is_ok' => false,
                            'error_messages' => $check_result['error_messages'],
                        ]);
                    }
                }
            }

            if ($success_msgs) {
                return $this->response->setJSON([
                    'is_ok' => true,
                    'success_messages' => $success_msgs,
                    'warning_messages' => [],
                ]);
            } else {
                return $this->response->setJSON([
                    'is_ok' => true,
                    'warning_messages' => ["Nothing updated, No relevant tables found"],
                    'success_messages' => [],
                ]);
            }
        } else {
            return $this->response->setJSON([
                'is_ok' => false,
                'error_messages' => ["Incorrect Password"],
            ]);
        }
    }
}
