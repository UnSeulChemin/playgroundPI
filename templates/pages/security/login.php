<?php $title = "Login"; ?>
<?php ob_start(); ?>

<section class="section-default">

    <h2>Login</h2>

    <?php if (isset($message)): ?>
        <div class="warning-flash">
            <p><?= $message; unset($message); ?></p>
        </div>
    <?php endif; ?>

    <form method="post">
        <div>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="link-form" type="submit">Login</button>
    </form>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>