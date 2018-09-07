<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Le Grand Galop :: <?= $_SESSION['meta_title'] ?></title>
  <meta name="description" content="<?= $_SESSION['meta_desc'] ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="<?= URL; ?>css/style.css" rel="stylesheet">
  <link href="<?= URL; ?>css/animate.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= URL; ?>rsc/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>
<body>
  <nav class="navbar is-dark">
    <div id="navbarExampleTransparentExample" class="navbar-menu">
      <div style="z-index: 99999999;" class="navbar-end">
        <div class="navbar-item">
          <?php if(isset($_SESSION['auth']) AND !empty($_SESSION['auth'])): ?>
            <div class="field is-grouped">
                <p class="control">
                    <a href="<?= URL; ?>utilisateur/compte" class="button is-link">
                        <span><i class="fa fa-user" aria-hidden="true"></i> Mon compte</span>
                    </a>
                </p>
              <p class="control">
                <a href="<?= URL; ?>utilisateur/deconnexion" class="button is-white">
                  <span><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</span>
                </a>
              </p>
            </div>
          <?php else: ?>
          <div class="field is-grouped">
            <p class="control">
              <a href="<?= URL; ?>utilisateur/connexion" class="button is-link">
                <span><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</span>
              </a>
            </p>
            <p class="control">
              <a href="<?= URL; ?>utilisateur/inscription" class="button is-white">
                <span><i class="fa fa-sign-in" aria-hidden="true"></i> Inscription</span>
              </a>
            </p>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>


  <section class="hero horse-header">
    <div id="snow"></div>
    <div class="hero-body">
      <p class="title">

        Le grand galop !
      </p>
      <p class="subtitle">
        A vos chevaux ! Retrouvez ici toute nos meilleures bêtes d'élevage !
      </p>
    </div>
  </section>
