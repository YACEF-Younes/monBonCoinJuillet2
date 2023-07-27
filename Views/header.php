<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Mon Bon Coin | <?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
<<<<<<< HEAD
                            <a class="nav-link" href="/products">Tous les produits</a>
                        </li>
                    </ul>
                    <?php if(isset($_SESSION['user'])) : ?>
                        <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/deconnexion">Déconnexion</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="btn btn-info" href="/profil">Profil</a>
                        </li>
                    </ul>
                        <?php else : ?>
=======
                            <a class="nav-link active" href="/products">Tous les produits</a>
                        </li>
                    </ul>
>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-5">
                            <a class="btn btn-info" href="/connexion">Connexion</a>
                        </li>
                    </ul>
<<<<<<< HEAD
                    <?php endif ?>
=======
>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="search" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
<<<<<<< HEAD
=======

>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
            </div>
        </nav>
    </header>
    <main>