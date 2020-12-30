<?php $this->extend('layout'); ?>

<?php $this->section('title'); ?>
Register
<?php $this->endSection(); ?>

<?php $this->section('content') ?>
    <h1>Register</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/register/save" method="post">
        <div class="mb-3">
            <label for="full_name_id" class="form-label">Name</label>
            <input type="text" name="full_name" class="form-control" id="full_name_id" value="" required>
        </div>
        <div class="mb-3">
            <label for="location_id" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location_id" value="">
        </div>
        <div class="mb-3">
            <label for="email_id" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email_id" value="" required>
        </div>
        <div class="mb-3">
            <label for="password_id" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        or <a href="/login">Login</a>
    </form>
    </div>
<?php $this->endSection() ?>
