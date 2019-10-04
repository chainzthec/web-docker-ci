<?php /** @noinspection ALL */ ?>

<?php if (isset($models['alert'])): ?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Action réussie!</strong> <?= $models['alert'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($models['articles'] as $m): ?>
                <div class="post-preview">
                    <a>
                        <h2 class="post-title">
                            <?= $m['name'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= $m['content'] ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#"><?= $m['first_name'] . " " . $m['last_name'] ?></a></p>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>
</div>
