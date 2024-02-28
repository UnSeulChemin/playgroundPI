<header>
    <h1>Header</h1>

    <nav>
        <ul>
            <?php if (!isset($_SESSION["user"])): ?>
                <li><a href="register">Register</a></li>
                <li><a href="login">Login</a></li>
            <?php else: ?>
                <li>Hi <?= $_SESSION["user"]["name"]; ?></li>
                <li><a href="logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>