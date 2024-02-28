<?php ob_start(); ?>

<h1>Login</h1>

<?php if (isset($message)): ?>
    <p><?= $message; unset($message); ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="pass">Mot de passe</label>
        <input type="password" id="pass" name="password">
    </div>
    <button type="submit">Me connecter</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>