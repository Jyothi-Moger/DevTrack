<?php $this->load->view('layout/header'); ?>

<div class="card shadow">

    <div class="card-header bg-warning">
        <h3>✏ Edit Task</h3>
    </div>

    <div class="card-body">

        <form method="post" action="<?php echo site_url('task/update/'.$task->id); ?>">

            <div class="mb-3">
                <label class="form-label">Project</label>

                <select name="project_id" class="form-select" required>

                    <?php foreach($projects as $project): ?>

                        <option value="<?php echo $project->id; ?>"
                            <?php if($project->id == $task->project_id) echo 'selected'; ?>>

                            <?php echo $project->project_name; ?>

                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Task Title</label>

                <input
                    type="text"
                    name="task_title"
                    class="form-control"
                    value="<?php echo $task->task_title; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>

                <textarea
                    name="description"
                    class="form-control"><?php echo $task->description; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Deadline</label>

                <input
                    type="date"
                    name="deadline"
                    class="form-control"
                    value="<?php echo $task->deadline; ?>">
            </div>

            <div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select">

        <option value="Pending"
            <?php if($task->status == 'Pending') echo 'selected'; ?>>
            Pending
        </option>

        <option value="In Progress"
            <?php if($task->status == 'In Progress') echo 'selected'; ?>>
            In Progress
        </option>

        <option value="Completed"
            <?php if($task->status == 'Completed') echo 'selected'; ?>>
            Completed
        </option>

    </select>
</div>

            <button class="btn btn-success">
                💾 Update Task
            </button>

            <a href="<?php echo site_url('task'); ?>" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

<?php $this->load->view('layout/footer'); ?>