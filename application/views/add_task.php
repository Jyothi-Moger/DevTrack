<!DOCTYPE html>
<html>
<head>
    <title>Add Task - DevTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>📝 Add New Task</h3>
        </div>

        <div class="card-body">
            <?php if(validation_errors()): ?>

    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>

<?php endif; ?>

            <form method="post" action="<?php echo site_url('task/save'); ?>">

                <div class="mb-3">
    <label class="form-label">Project</label>

    <select name="project_id" class="form-select">

        <option value="">-- Select Project --</option>

        <?php foreach($projects as $project): ?>

            <option value="<?php echo $project->id; ?>">
                <?php echo $project->project_name; ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>

                <div class="mb-3">
                    <label class="form-label">Task Title</label>
                    <input type="text" name="task_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deadline</label>
                    <input type="date" name="deadline" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    💾 Save Task
                </button>

                <a href="<?php echo site_url('task'); ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>