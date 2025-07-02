<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Editor_model;

class Authentication extends Controller
{
    public function index()
    {

        return view('login');
    }

    public function loginAuth()
    {
        $session = session();
        $editorM = new Editor_model();
        $index = $this->request->getVar('index_no');
        $password = $this->request->getVar('pin');

        $data = $editorM->where('index_no', $index)->first();

        if ($data) {
            $pass = $data['pin'];
            $authenticatePassword = stripslashes(md5($password)) == $pass;
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['editor_id'],
                    'editor' => $data['editor'],
                    'index_no' => $data['index_no'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                return  $this->response->redirect('/');
            } else {
                $session->setFlashdata('msg', "Password is invalis ");
                return $this->response->redirect('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Index does not exist.');
            return $this->response->redirect('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return $this->response->redirect('/login');
    }
}
