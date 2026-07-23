<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('User_model');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->login($email, $password);

        if ($user)
        {
            $this->session->set_userdata('user', $user);

            redirect('welcome/dashboard');
        }
        else
        {
            echo "Invalid Email or Password!";
        }
    }

    public function dashboard()
{
    $user = $this->session->userdata('user');

    if (!$user)
    {
        redirect('welcome');
    }

    $this->load->model('User_model');
    $this->load->model('Project_model');
    $this->load->model('Task_model');

    $data['user'] = $user;
   $data['totalUsers'] = $this->User_model->countUsers();
$data['totalProjects'] = $this->Project_model->countProjects();
$data['totalTasks'] = $this->Task_model->countTasks();

$data['pendingTasks'] = $this->Task_model->countPendingTasks();
$data['inProgressTasks'] = $this->Task_model->countInProgressTasks();
$data['completedTasks'] = $this->Task_model->countCompletedTasks();

$data['recentProjects'] = $this->Project_model->getRecentProjects();
$data['recentTasks'] = $this->Task_model->getRecentTasks();

    $this->load->view('dashboard', $data);
}
    public function logout()
{
    $this->session->unset_userdata('user');
    $this->session->sess_destroy();

    redirect('welcome');
}
}