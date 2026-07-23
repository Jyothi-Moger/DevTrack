<?php $this->load->view('layout/header'); ?>

<div class="card shadow">

    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h2 class="mb-0">📁 Projects</h2>

        <a href="<?php echo site_url('project/add'); ?>" class="btn btn-light">
            + Add Project
        </a>

    </div>

    <div class="card-body">

    <?php if($this->session->flashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <?php echo $this->session->flashdata('success'); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <?php echo $this->session->flashdata('error'); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    <?php endif; ?>

    <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            <?php if(!empty($projects)): ?>

                <?php foreach($projects as $project): ?>

                <tr>

                    <td><?php echo $project->id; ?></td>

                    <td><?php echo $project->project_name; ?></td>

                    <td><?php echo $project->description; ?></td>

                    <td><?php echo $project->created_at; ?></td>

                    <td>

                        <a href="<?php echo site_url('project/edit/'.$project->id); ?>" class="btn btn-warning btn-sm">
                            ✏ Edit
                        </a>

                        <a href="<?php echo site_url('project/delete/'.$project->id); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this project?');">
                            🗑 Delete
                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5" class="text-center">
                        No projects found.
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $this->load->view('layout/footer'); ?>