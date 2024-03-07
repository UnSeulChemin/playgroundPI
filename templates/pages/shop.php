<?php $title = "Shop"; ?>
<?php ob_start(); ?>

<section class="section-content">

    <h2>Shop</h2>
   
    <section class="section-card">
        <?php foreach($shops as $shop): ?>
            <div class="div-card">
                <figure class="figure-card">
                    <img src="<?= isset($_GET['id']) ? '../' : null; ?>public/images/shop/<?= $shop['name'].".".$shop['extension']; ?>">
                </figure>
                <div class="div-card-content">
                    <p class="margin-none"><?= $shop['description']; ?></p>
                </div>
                <div class="div-card-content">
                    <p class="margin-none"><?= date('d/m/Y', strtotime($shop['created_at'])); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <nav class="flex-center margin-top">
        <?php for ($count = 1; $count <= $countPage; $count++): ?>
        
            <?php if (!isset($getId)):
                $getId = 1;
            endif; ?>

            <?php if ($getId != $count):
                if (isset($_GET['id']) && !empty($_GET['id'])): ?>
                    <a class="link-paginate" href="../shop/<?php echo $count; ?>"><?php echo $count; ?></a>               
                <?php else: ?>
                    <a class="link-paginate" href="shop/<?php echo $count; ?>"><?php echo $count; ?></a>
                <?php endif; ?>
            <?php else: ?>
                <a class="link-paginate active"><?php echo $count; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </nav>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/base.php') ?>