<?php

class Dosen extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Dosen_model', 'm');
    }

    function index() {
        $dosen = $this->m->get();
        $this->load->view('template', ['content' => $this->load->view('dosen_list', ['dosen' => $dosen
                    ], true)
        ]);
    }

    function form() {
        $this->load->view('template', ['content' => $this->load->view('dosen_form', '', true)
        ]);
    }

    function save() {
        $this->m->save($this->input->post());
        redirect('dosen');
    }
    
    function del($nidn){
        $this->m->del($nidn);
        redirect('dosen');
    }
    function edit($nidn){
        $this->load->view('template', ['content' => $this->load->view('dosen_form', [
         'data' =>  $this->m->find($nidn) 
        ], true)
        ]);
    }
    function update(){
        $nidn = $this->input->post('nidn');
        $data = $this->input->post();
        $this->m->update($nidn,$data);
        redirect('dosen');
    }

}
