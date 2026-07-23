<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
    public function getAllProjects()
    {
        return $this->db->get('projects')->result();
    }
public function getProjects()
{
    return $this->db->select('id, project_name')
                    ->get('projects')
                    ->result();
}
    public function addProject($data)
    {
        return $this->db->insert('projects', $data);
    }
    public function getProjectById($id)
{
    return $this->db->get_where('projects', ['id' => $id])->row();
}
public function updateProject($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('projects', $data);
}
public function deleteProject($id)
{
    $this->db->where('id', $id);
    return $this->db->delete('projects');
}
public function countProjects()
{
    return $this->db->count_all('projects');
}
public function getRecentProjects($limit = 5)
{
    return $this->db
                ->order_by('created_at', 'DESC')
                ->limit($limit)
                ->get('projects')
                ->result();
}
public function hasTasks($projectId)
{
    return $this->db
                ->where('project_id', $projectId)
                ->count_all_results('tasks') > 0;
}
}