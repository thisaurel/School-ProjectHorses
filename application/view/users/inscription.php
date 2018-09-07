<div class="container is-fullhd">
  <?php Session::displayFlash(); ?>
  <h1 class="title is-1">Page d'inscription</h1>
  <form action="<?php echo URL; ?>utilisateur/register" method="post">

    <div class="field">
      <label class="label">Prénom</label>
      <div class="control">
        <input name="fname" class="input" type="text" placeholder="Jean-Jacques" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Nom</label>
      <div class="control">
        <input name="lname" class="input" type="text" placeholder="Descordes" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Email</label>
      <div class="control">
        <input name="email" class="input" type="email" placeholder="prenomnom@domaine.com" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Mot de passe</label>
      <div class="control">
        <input name="cpassword" class="input" type="password" placeholder="" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Confirmation du mot de passe</label>
      <div class="control">
        <input name="password" class="input" type="password" placeholder="" required>
      </div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button class="button is-link">Inscription</button>
      </div>
    </div>
  </form>
<br /><br /><br />

  <hr>
  <br><br>
</div>
