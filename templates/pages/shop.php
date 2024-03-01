<?php $title = "Shop"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Shop</h2>
   
    <section class="display-card">
        <?php foreach($shops as $shop): ?>
            <div class="card">
                <figure class="figure-card">
                    <img src="<?= isset($_GET['id']) ? '../' : null; ?>public/images/shop/<?= $shop['name']; ?>.jpg">
                </figure>
                <div class="card-border">
                    <p><?= $shop['description']; ?></p>
                </div>
                <div class="card-border">
                    <p><?= date('d/m/Y', strtotime($shop['created_at'])); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <nav>
        <?php for ($count = 1; $count <= $countPage; $count++): ?>
        
            <?php if (!isset($getId)):
                $getId = 1;
            endif; ?>

            <?php if ($getId != $count):
                if (isset($_GET['id']) && !empty($_GET['id'])): ?>
                    <a href="../shop/<?php echo $count; ?>"><?php echo $count; ?></a>               
                <?php else: ?>
                    <a href="shop/<?php echo $count; ?>"><?php echo $count; ?></a>
                <?php endif; ?>
            <?php else: ?>
                <a class="active"><?php echo $count; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </nav>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>