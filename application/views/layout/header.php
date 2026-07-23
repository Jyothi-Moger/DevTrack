<!DOCTYPE html>
<html>
<head>

    <title>DevTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold" href="<?php echo site_url('welcome/dashboard'); ?>">
            🚀 DevTrack
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="<?php echo site_url('welcome/dashboard'); ?>">
                Dashboard
            </a>

            <a class="nav-link" href="<?php echo site_url('project'); ?>">
                Projects
            </a>

            <a class="nav-link" href="<?php echo site_url('task'); ?>">
                Tasks
            </a>

            <a class="nav-link text-danger" href="<?php echo site_url('welcome/logout'); ?>">
                Logout
            </a>

        </div>

    </div>

</nav>

<div class="container mt-4">