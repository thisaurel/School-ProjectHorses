<div class="container is-fullhd">
  <?php Session::displayFlash(); ?>
  <h1 class="title is-1">Page de connexion</h1>
  <form action="<?php echo URL; ?>utilisateur/login" method="post">
    <div class="field">
      <label class="label">Email</label>
      <div class="control">
        <input name="email" class="input" type="email" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Mot de passe</label>
      <div class="control">
        <input name="password" class="input" type="password" required>
      </div>
    </div>
    <div class="field is-grouped">
      <div class="control">
        <button class="button is-link">Connexion</button>
      </div>
    </div>
  </form>
<br /><br /><br /><br /><br /><br />

  <hr>
  <br><br>
</div>
