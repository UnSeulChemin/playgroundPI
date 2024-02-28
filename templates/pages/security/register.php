<?php ob_start(); ?>
<?= $title = "Register"; ?>

<h1>Register</h1>
<?php var_dump($message); ?>
<?php if (isset($message)): ?>
    <p><?= $message; unset($message); ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>
    <button type="submit">Register</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>