<?php $this->load->view('layout/header'); ?>

<div class="card shadow">

    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h2 class="mb-0">📝 Tasks</h2>

        <a href="<?php echo site_url('task/add'); ?>" class="btn btn-light">
            + Add Task
        </a>

    </div>

    <div class="card-body">
        <?php if($this->session->flashdata('success')): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <?php echo $this->session->flashdata('success'); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

<?php endif; ?>
        <div class="row mb-3">

    <div class="col-md-8">

<form method="get" action="<?php echo site_url('task'); ?>" class="d-flex">

    <input
        type="text"
        name="search"
        class="form-control me-2"
        placeholder="🔍 Search tasks..."
        value="<?php echo $this->input->get('search'); ?>">


    <select name="status" class="form-select me-2">

        <option value="">
            All Status
        </option>

        <option value="Pending"
        <?php echo ($this->input->get('status') == 'Pending') ? 'selected' : ''; ?>>
            Pending
        </option>


        <option value="In Progress"
        <?php echo ($this->input->get('status') == 'In Progress') ? 'selected' : ''; ?>>
            In Progress
        </option>


        <option value="Completed"
        <?php echo ($this->input->get('status') == 'Completed') ? 'selected' : ''; ?>>
            Completed
        </option>


    </select>


    <button type="submit" class="btn btn-primary">
        Filter
    </button>

</form>

</div>

</div>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            <?php if(!empty($tasks)): ?>

                <?php foreach($tasks as $task): ?>

                <tr>

                    <td><?php echo $task->id; ?></td>

                    <td><?php echo $task->task_title; ?></td>

                    <td>

<?php if($task->status == 'Pending'): ?>

    <span class="badge bg-warning text-dark">🟡 Pending</span>

<?php elseif($task->status == 'In Progress'): ?>

    <span class="badge bg-primary">🔵 In Progress</span>

<?php elseif($task->status == 'Completed'): ?>

    <span class="badge bg-success">🟢 Completed</span>

<?php else: ?>

    <span class="badge bg-secondary">
        <?php echo $task->status; ?>
    </span>

<?php endif; ?>

</td>

                    <td><?php echo $task->deadline; ?></td>

                    <td>

                        <a href="<?php echo site_url('task/edit/'.$task->id); ?>" class="btn btn-warning btn-sm">
    ✏ Edit
</a>

<a href="<?php echo site_url('task/delete/'.$task->id); ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this task?');">
    🗑 Delete
</a>

                    </td>

                </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5" class="text-center">
                        No tasks found.
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $this->load->view('layout/footer'); ?>