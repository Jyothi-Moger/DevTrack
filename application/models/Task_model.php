<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model
{
    public function getAllTasks()
    {
        return $this->db->get('tasks')->result();
    }

    public function addTask($data)
    {
        return $this->db->insert('tasks', $data);
    }
    public function getTaskById($id)
{
    return $this->db->get_where('tasks', ['id' => $id])->row();
}

public function updateTask($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('tasks', $data);
}
public function deleteTask($id)
{
    $this->db->where('id', $id);
    return $this->db->delete('tasks');
}
public function countTasks()
{
    return $this->db->count_all('tasks');
}
public function getRecentTasks($limit = 5)
{
    return $this->db
                ->order_by('id', 'DESC')
                ->limit($limit)
                ->get('tasks')
                ->result();
}
public function searchTasks($keyword)
{
    $this->db->like('task_title', $keyword);
    return $this->db->get('tasks')->result();
}
public function filterTasks($keyword = '', $status = '')
{
    if (!empty($keyword))
    {
        $this->db->like('task_title', $keyword);
    }

    if (!empty($status))
    {
        $this->db->where('status', $status);
    }

    return $this->db->get('tasks')->result();
}
public function countPendingTasks()
{
    return $this->db->where('status', 'Pending')
                    ->count_all_results('tasks');
}

public function countInProgressTasks()
{
    return $this->db->where('status', 'In Progress')
                    ->count_all_results('tasks');
}

public function countCompletedTasks()
{
    return $this->db->where('status', 'Completed')
                    ->count_all_results('tasks');
}
}