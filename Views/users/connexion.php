<<<<<<< HEAD
<div class="container">
    <?php if ($messageErreur) : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?= $messageErreur ?></strong>
        </div>
    <?php endif ?>
    <form action="" method="post">
        <div class="row justify-content-around my-2">
            <div class="col-12 col-md-4">
                <label for="login">Votre Email</label>
                <input type="email" name="login" id="email" placeholder="Votre email" class="form-control">
            </div>
            <div class="col-12 col-md-4">
                <label for="password">Votre mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w100 m-5 p-2">Connexion</button>
        </div>
    </form>
    <div class="text-center">Pas encore de compte ? <a href="/inscription">S'inscrire</a></div>
=======
<div class="form-group">
    <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
    <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>

<div class="text-center m-2">
    <button type="submit" class="btn btn-primary">
        Valider
    </button>
>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
</div>