<?php

if(isset($_SESSION['auth']) AND !empty($_SESSION['auth'])){
  $user = $db->query('SELECT * FROM users WHERE id = ?', [$_SESSION['auth']->id])->fetch();
}


?><div class="container is-fullhd">
  <?php Session::displayFlash(); ?>
  <?php

  if($user->role == 1){
    echo '<article class="message is-info">
  <div class="message-body">
     '.$_SESSION['auth']->fname.', vous vous êtes connecté au compte administrateur. Pour accéder au panel, veuillez <a href="'.URL.'administration">cliquer ici</a>
  </div>
</article>';
  }

  ?>
  <h1 class="title is-1">Bienvenue sur votre compte <?= $_SESSION['auth']->fname; ?> !</h1>
  <hr>
<div class="columns is-gapless is-multiline is-mobile">
  <aside class="menu">
  <p class="menu-label">
  Mon Compte
  </p>
  <ul class="menu-list">
  <li>
   <a>Gérer mon compte</a>
   <ul>
     <li><a <?php if(isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "edit"): echo "class='is-active'"; else: echo ""; endif;  ?> href="?p=edit">Editer</a></li>
     <li><a <?php if(isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "delete"): echo "class='is-active' style='background-color: #DC3232;'"; else: echo ""; endif;  ?> href="?p=delete">Supprimer mon compte</a></li>
   </ul>
  </li>
  </ul>
  </aside>

  <div class="column">

     <?php
     if(isset($_GET['p']) && !empty($_GET['p'])):
       if ($_GET['p'] == "edit"): ?>

         <h4 class="title is-4">Modifier mes informations</h4>

         <form action="<?php echo URL; ?>utilisateur/modify" method="post">

           <div class="field">
             <label class="label">Prénom</label>
             <div class="control">
               <input name="fname" class="input" type="text" value="<?= $_SESSION['auth']->fname ?>" required>
             </div>
           </div>

           <div class="field">
             <label class="label">Nom</label>
             <div class="control">
               <input name="lname" class="input" type="text" value="<?= $_SESSION['auth']->lname ?>" required>
             </div>
           </div>

           <div class="field">
             <label class="label">Email</label>
             <div class="control">
               <input name="email" class="input" type="email" value="<?= $_SESSION['auth']->email ?>" required>
             </div>
           </div>

           <div class="field">
             <label class="label">Nouveau mot de passe</label>
             <div class="control">
               <input name="password" class="input" type="password" placeholder="">
             </div>
           </div>

           <div class="field">
             <label class="label">Confirmation du nouveau mot de passe</label>
             <div class="control">
               <input name="cpassword" class="input" type="password" placeholder="">
             </div>
           </div>

           <div class="field">
             <label class="label">Mot de passe actuel</label>
             <div class="control">
               <input name="apassword" class="input" type="password" placeholder="" required>
             </div>
           </div>

           <div class="field is-grouped">
             <div class="control">
               <button class="button is-link">Modifier mes informations</button>
             </div>
           </div>
         </form>


       <?php elseif ($_GET['p'] == "delete"): ?>

         <h4 class="title is-4">Supprimer mon compte</h4>
          <p>La suppression de votre compte est définitive et vous ne pourrez pas récupérer vos informations.</p><br>
          <a href="<?= URL ?>utilisateur/delete" class="button is-danger is-outlined">Supprimer mon compte</a>

       <?php else: ?>

         <h4 class="title is-4">Ce menu n'existe pas...</h4>

       <?php endif; ?>



     <?php else: ?>
       <h4 class="title is-4">Veuillez sélectionner un menu</h4>
     <?php endif; ?>

  </div

</div>
</div>
<br><br><br><br><br>
</div>
