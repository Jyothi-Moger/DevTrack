<!DOCTYPE html>
<html>
<head>
    <title>Edit Project - DevTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h3>✏ Edit Project</h3>

        </div>

        <div class="card-body">

            <form method="post" action="<?php echo site_url('project/update/'.$project->id); ?>">

                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input
                        type="text"
                        name="project_name"
                        class="form-control"
                        value="<?php echo $project->project_name; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"><?php echo $project->description; ?></textarea>
                </div>

                <button class="btn btn-primary">
                    Update Project
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