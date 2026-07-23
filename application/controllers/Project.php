<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user'))
        {
            redirect('welcome');
        }

        $this->load->model('Project_model');
    }

    public function index()
    {
        $data['projects'] = $this->Project_model->getAllProjects();

        $this->load->view('projects', $data);
    }
    public function add()
{
    $this->load->view('add_project');
}
public function save()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules(
        'project_name',
        'Project Name',
        'required'
    );

    $this->form_validation->set_rules(
        'description',
        'Description',
        'required'
    );


    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('add_project');
    }
    else
    {
        $data = array(
            'project_name' => $this->input->post('project_name'),
            'description'  => $this->input->post('description'),
            'created_by'   => $this->session->userdata('user')->id
        );

        $this->Project_model->addProject($data);

        $this->session->set_flashdata(
            'success',
            '✅ Project added successfully!'
        );

        redirect('project');
    }
}
public function edit($id)
{
    $data['project'] = $this->Project_model->getProjectById($id);

    $this->load->view('edit_project', $data);
}
public function update($id)
{
    $data = array(
        'project_name' => $this->input->post('project_name'),
        'description'  => $this->input->post('description')
    );

    $this->Project_model->updateProject($id, $data);

    $this->session->set_flashdata('success', '✏️ Project updated successfully!');

    redirect('project');
}
public function delete($id)
{
    if ($this->Project_model->hasTasks($id))
    {
        $this->session->set_flashdata(
            'error',
            '⚠️ Cannot delete this project because it has tasks assigned.'
        );

        redirect('project');
    }

    $this->Project_model->deleteProject($id);

    $this->session->set_flashdata(
        'success',
        '🗑 Project deleted successfully!'
    );

    redirect('project');
}
}