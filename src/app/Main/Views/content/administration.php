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

    <div class="card">
        <div class="card-header">
            Liste des articles
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Contenu</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($models['articles'] as $article): ?>
                    <tr>
                        <td><?= $article['name'] ?></td>
                        <td><?= substr($article['content'], 0, 100) . "..." ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Créer un article
        </div>
        <div class="card-body">
            <form action="/administration" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Nom de l'article</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nom de l'article" name="article_name">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contenu de l'article</span>
                    </div>
                    <textarea class="form-control" name="article_content" aria-label="Contenu de l'article"></textarea>
                </div>
                <button class="mt-3 btn btn-success" name="create_article">Créer l'article :)</button>
            </form>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Modifier un article
        </div>
        <div class="card-body">
            <select name="" id="modify_a_select">
                <?php foreach ($models['articles'] as $article): ?>
                    <option id="modify_a" value="<?= $article['id'] ?>"><?= $article['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php foreach ($models['articles'] as $article): ?>
                <form class="mt-3 form-modify" id="form-<?= $article['id'] ?>" action="/administration" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nom de l'article</span>
                        </div>
                        <input type="text" name="article_name" class="form-control" value="<?= $article['name'] ?>"
                               placeholder="">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Contenu de l'article</span>
                        </div>
                        <textarea name="article_content" class="form-control"><?= $article['content'] ?></textarea>
                    </div>
                    <input type="hidden" name="article_identifier" value="<?= $article['id'] ?>">
                    <button class="mt-3 btn btn-warning" name="modify_article">Modifier l'article :|</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container mt-3 mb-3">
    <div class="card">
        <div class="card-header">
            Supprimer un article
        </div>
        <div class="card-body">
            <form action="/administration" method="post">
                <div class="form-group">
                    <select name="article_identifier" class="custom-select">
                        <?php foreach ($models['articles'] as $article): ?>
                            <option value="<?= $article['id'] ?>"><?= $article['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="mt-3 btn btn-danger" name="delete_article">Supprimer l'article :(</button>
                </div>
            </form>
        </div>
    </div>
</div>


