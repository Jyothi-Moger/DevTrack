<!DOCTYPE html>
<html>
<head>
    <title>Add Project - DevTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>📁 Add New Project</h3>

        </div>

        <div class="card-body">
            <?php if(validation_errors()): ?>

    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>

<?php endif; ?>

            <form method="post" action="<?php echo site_url('project/save'); ?>">

                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="project_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    💾 Save Project
                </button>

                <a href="<?php echo site_url('project'); ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>