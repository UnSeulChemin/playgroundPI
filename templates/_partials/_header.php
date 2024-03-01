<header>
    <nav class="flex-between">
        <div>
            <?php if (isset($_GET['id'])): ?>
                <a class="link-menu" href=".././">Home</a>
            <?php else: ?>
                <a class="link-menu" href="./">Home</a>
            <?php endif; ?>
        </div>

        <div>

        <ul class="flex">
            <?php if (!isset($_SESSION["user"])): ?>

                <?php if (isset($_GET['id'])): ?>
                    <li class="margin-right-li"><a class="link-menu" href="../register">Register</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu" href="register">Register</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a class="link-menu" href="../login">Login</a></li>
                <?php else: ?>
                    <li><a class="link-menu" href="login">Login</a></li>
                <?php endif; ?>

            <?php else: ?>

                <?php if ($_SESSION["user"]["roles"] == '["ROLE_ADMIN"]'): ?>
                    <?php if (isset($_GET['id'])): ?>
                        <li class="margin-right-li"><a class="link-menu" href="../admin">Admin</a></li>
                    <?php else: ?>
                        <li class="margin-right-li"><a class="link-menu" href="admin">Admin</a></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li class="margin-right-li"><a class="link-menu" href="../shop">Shop</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu" href="shop">Shop</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li class="margin-right-li"><a class="link-menu" href="../contact">Contact</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu" href="contact">Contact</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li class="margin-right-li"><a class="link-menu" href="../upload">Upload</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu" href="upload">Upload</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li class="margin-right-li"><a class="link-menu" href="../profile">Profile</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu" href="profile">Profile</a></li>
                <?php endif; ?>

                <?php if (isset($_GET['id'])): ?>
                    <li><a class="link-menu" href="../logout">Logout</a></li>
                <?php else: ?>
                    <li><a class="link-menu" href="logout">Logout</a></li>
                <?php endif; ?>

            <?php endif; ?>
        </ul>
        </div>
    </nav>
</header>