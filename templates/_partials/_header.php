<header>
    <h1>Header</h1>

    <nav>
        <ul>
            <?php if (isset($_GET['id'])): ?>
                <li><a href=".././">Home</a></li>
            <?php else: ?>
                <li><a href="./">Home</a></li>
            <?php endif; ?>

            <?php if (!isset($_SESSION["user"])): ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a href="../register">Register</a></li>
                <?php else: ?>
                    <li><a href="register">Register</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a href="../login">Login</a></li>
                <?php else: ?>
                    <li><a href="login">Login</a></li>
                <?php endif; ?>

            <?php else: ?>

                <li>Hi <?= $_SESSION["user"]["name"]; ?></li>

                <?php if (isset($_GET['id'])): ?>
                    <li><a href="../upload">Upload</a></li>
                <?php else: ?>
                    <li><a href="upload">Upload</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a href="../profile">Profile</a></li>
                <?php else: ?>
                    <li><a href="profile">Profile</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a href="../contact">Contact</a></li>
                <?php else: ?>
                    <li><a href="contact">Contact</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a href="../logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="logout">Logout</a></li>
                <?php endif; ?>

            <?php endif; ?>
        </ul>
    </nav>
</header>