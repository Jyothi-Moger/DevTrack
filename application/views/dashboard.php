<?php $this->load->view('layout/header'); ?>

<div class="card shadow">

    <div class="card-header bg-success text-white">
        <h2>🚀 DevTrack Dashboard</h2>
    </div>

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="mb-0">
                Welcome, <?php echo ucfirst($user->name); ?> 👋
            </h4>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-4 mb-3">
    <div class="card bg-primary text-white shadow">
        <div class="card-body text-center">
            <h5>👥 Total Users</h5>
            <h1><?php echo $totalUsers; ?></h1>
            <small>Registered Users</small>
        </div>
    </div>
</div>

            <div class="col-md-4 mb-3">
    <div class="card bg-success text-white shadow">
        <div class="card-body text-center">
            <h5>📁 Projects</h5>
            <h1><?php echo $totalProjects; ?></h1>
            <small>Total Projects</small>
        </div>
    </div>
</div>

            <div class="col-md-4 mb-3">
    <div class="card bg-warning text-dark shadow">
        <div class="card-body text-center">
            <h5>📝 Tasks</h5>
            <h1><?php echo $totalTasks; ?></h1>
            <small>Total Tasks</small>
        </div>
    </div>
</div>

        </div>

        <hr class="my-4">

        <div class="row">

            <div class="col-md-6">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">📁 Recent Projects</h5>
                    </div>

                    <div class="card-body">

                        <?php if(!empty($recentProjects)): ?>

                            <ul class="list-group">

                                <?php foreach($recentProjects as $project): ?>

                                    <li class="list-group-item">
                                        <strong><?php echo $project->project_name; ?></strong><br>
                                        <small><?php echo $project->description; ?></small>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        <?php else: ?>

                            <p>No projects available.</p>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card shadow-sm">

                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">📝 Recent Tasks</h5>
                    </div>

                    <div class="card-body">

                        <?php if(!empty($recentTasks)): ?>

                            <ul class="list-group">

                                <?php foreach($recentTasks as $task): ?>

                                    <li class="list-group-item">
                                        <strong><?php echo $task->task_title; ?></strong><br>
                                        <small>Status: <?php echo $task->status; ?></small>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        <?php else: ?>

                            <p>No tasks available.</p>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

   </div>

<hr class="my-4">

<div class="card shadow-sm">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">📊 Task Summary</h5>
    </div>

    <div class="card-body">

        <div class="row text-center">

            <div class="col-md-4">
                <h3 class="text-warning">🟡 <?php echo $pendingTasks; ?></h3>
                <p>Pending</p>
            </div>

            <div class="col-md-4">
                <h3 class="text-primary">🔵 <?php echo $inProgressTasks; ?></h3>
                <p>In Progress</p>
            </div>

            <div class="col-md-4">
                <h3 class="text-success">🟢 <?php echo $completedTasks; ?></h3>
                <p>Completed</p>
            </div>

        </div>

    </div>

</div>

</div>

<?php $this->load->view('layout/footer'); ?>