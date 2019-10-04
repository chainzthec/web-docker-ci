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

<?php if (isset($models['error'])): ?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erreur!</strong> <?= $models['error'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <form action="/login" method="post">
        <div class="form-group">
            <label for="input-email">Email address</label>
            <input type="email" class="form-control" name="email" id="input-email" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="input-password">Password</label>
            <input type="password" class="form-control" name="password" id="input-password" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>