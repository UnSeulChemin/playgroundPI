<header>
    <nav class="flex-between">
        <div>
            <?php if (isset($_GET["id"])): ?>
                <a class="link-menu<?=($_GET["page"] == "") ? " active" : null; ?>" href=".././">Home</a>
            <?php else: ?>
                <a class="link-menu<?=($_GET["page"] == "") ? " active" : null; ?>" href="./">Home</a>
            <?php endif; ?>
        </div>

        <ul class="flex">
            <?php if (!isset($_SESSION["user"])): ?>

                <?php if (isset($_GET["id"])): ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "register") ? " active" : null; ?>" href="../register">Register</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "register") ? " active" : null; ?>" href="register">Register</a></li>
                <?php endif; ?>

                <?php if (isset($_GET["id"])): ?>
                    <li><a class="link-menu<?=($_GET["page"] == "login") ? " active" : null; ?>" href="../login">Login</a></li>
                <?php else: ?>
                    <li><a class="link-menu<?=($_GET["page"] == "login") ? " active" : null; ?>" href="login">Login</a></li>
                <?php endif; ?>

            <?php else: ?>

                <?php if ($_SESSION["user"]["roles"] === '["ROLE_ADMIN"]'): ?>
                    <?php if (isset($_GET["id"])): ?>
                        <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "admin" || $_GET["page"] == "contacts" || $_GET["page"] == "mcontacts" || $_GET["page"] == "tools") ? " active" : null; ?>" href="../admin">Admin</a></li>
                    <?php else: ?>
                        <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "admin" || $_GET["page"] == "contacts" || $_GET["page"] == "mcontacts" || $_GET["page"] == "tools") ? " active" : null; ?>" href="admin">Admin</a></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (isset($_GET["id"])): ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "shop") ? " active" : null; ?>" href="../shop">Shop</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "shop") ? " active" : null; ?>" href="shop">Shop</a></li>
                <?php endif; ?>

                <?php if (isset($_GET["id"])): ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "contact") ? " active" : null; ?>" href="../contact">Contact</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "contact") ? " active" : null; ?>" href="contact">Contact</a></li>
                <?php endif; ?>

                <?php if (isset($_GET["id"])): ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "upload") ? " active" : null; ?>" href="../upload">Upload</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "upload") ? " active" : null; ?>" href="upload">Upload</a></li>
                <?php endif; ?>

                <?php if (isset($_GET["id"])): ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "profile") ? " active" : null; ?>" href="../profile">Profile</a></li>
                <?php else: ?>
                    <li class="margin-right-li"><a class="link-menu<?=($_GET["page"] == "profile") ? " active" : null; ?>" href="profile">Profile</a></li>
                <?php endif; ?>

                <?php if (isset($_GET["id"])): ?>
                    <li><a class="link-menu" href="../logout">Logout</a></li>
                <?php else: ?>
                    <li><a class="link-menu" href="logout">Logout</a></li>
                <?php endif; ?>

            <?php endif; ?>
        </ul>
    </nav>
</header>