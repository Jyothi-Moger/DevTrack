<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user'))
        {
            redirect('welcome');
        }

        $this->load->model('Task_model');
    }

   public function index()
{
    $keyword = $this->input->get('search');
    $status = $this->input->get('status');

    if (!empty($keyword) || !empty($status))
    {
        $data['tasks'] = $this->Task_model->filterTasks($keyword, $status);
    }
    else
    {
        $data['tasks'] = $this->Task_model->getAllTasks();
    }

    $this->load->view('tasks', $data);
}
   public function add()
{
    $this->load->model('Project_model');

    $data['projects'] = $this->Project_model->getProjects();

    $this->load->view('add_task', $data);
}

public function save()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules(
        'project_id',
        'Project',
        'required'
    );

    $this->form_validation->set_rules(
        'task_title',
        'Task Title',
        'required'
    );

    $this->form_validation->set_rules(
        'description',
        'Description',
        'required'
    );

    $this->form_validation->set_rules(
        'deadline',
        'Deadline',
        'required'
    );


    if ($this->form_validation->run() == FALSE)
    {
        $this->load->model('Project_model');

        $data['projects'] = $this->Project_model->getProjects();

        $this->load->view('add_task', $data);
    }
    else
    {
        $data = array(
            'project_id' => $this->input->post('project_id'),
            'assigned_to' => $this->session->userdata('user')->id,
            'task_title' => $this->input->post('task_title'),
            'description' => $this->input->post('description'),
            'deadline' => $this->input->post('deadline')
        );

        $this->Task_model->addTask($data);

        $this->session->set_flashdata(
            'success',
            '✅ Task added successfully!'
        );

        redirect('task');
    }
}
public function edit($id)
{
    $this->load->model('Project_model');

    $data['task'] = $this->Task_model->getTaskById($id);
    $data['projects'] = $this->Project_model->getProjects();

    $this->load->view('edit_task', $data);
}
public function update($id)
{
    $data = array(
        'project_id' => $this->input->post('project_id'),
        'task_title' => $this->input->post('task_title'),
        'description' => $this->input->post('description'),
        'deadline' => $this->input->post('deadline'),
        'status' => $this->input->post('status')
    );

    $this->Task_model->updateTask($id, $data);

    $this->session->set_flashdata('success', '✏️ Task updated successfully!');

    redirect('task');
}
public function delete($id)
{
    $this->Task_model->deleteTask($id);

    $this->session->set_flashdata('success', '🗑 Task deleted successfully!');

    redirect('task');
}
}