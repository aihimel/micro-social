<?php $this->extend('layout'); ?>

<?php $this->section('title'); ?>
Login
<?php $this->endSection(); ?>

<?php $this->section('content') ?>
    <h1>Login</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/login/auth" method="post">
        <div class="mb-3">
            <label for="email_id" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email_id" value="" required>
        </div>
        <div class="mb-3">
            <label for="password_id" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="<?php echo $auth_url?>">Google Login</a>
        or <a href="/register">Register</a>
    </form>
    </div>
<?php $this->endSection() ?>
