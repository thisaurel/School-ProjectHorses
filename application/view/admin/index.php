<?php

if (isset($_SESSION['auth']) AND !empty($_SESSION['auth'])) {
    $user = $db->query('SELECT * FROM users WHERE id = ?', [$_SESSION['auth']->id])->fetch();
}

?>
<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Panel administrateur</h1>
    <hr>
    <div class="columns is-gapless is-multiline is-mobile">
        <div class="column is-one-quarter">
            <aside class="menu">
                <p class="menu-label">
                    Administration
                </p>
                <ul class="menu-list">
                    <li>
                        <a>Gérer les membres</a>
                        <ul>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "list"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=list">Liste</a></li>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "add"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=add">Ajouter un membre</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="menu-list">
                    <li>
                        <a>Chevaux</a>
                        <ul>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "addhorse"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=addhorse">Ajouter un cheval</a></li>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "delhorse"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=delhorse">Supprimer un cheval</a></li>
                            <li>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "modhorse"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=modhorse">Modifier un cheval</a></li>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "addcavalier"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=addcavalier">Ajouter un cavalier</a></li>
                            <li>
                                <a <?php if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] == "horsecaval"): echo "class='is-active'"; else: echo ""; endif; ?>
                                        href="?p=horsecaval">Attribuer un cheval à un cavalier</a></li>
                        </ul>
                    </li>
                </ul>


            </aside>
        </div>
        <div class="column">

            <?php
            if (isset($_GET['p']) && !empty($_GET['p'])):
                if ($_GET['p'] == "list"):
                    $show_u = $db->query('SELECT * FROM users ORDER BY id DESC')->fetchAll();
                    $count_u = $db->query('SELECT id FROM users')->rowCount();
                    ?>

                    <h4 class="title is-4">Liste des membres (<?= $count_u ?>)</h4>

                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                        <tbody>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                        </tr>
                        <?php foreach ($show_u as $u) {
                            echo '<tr><th>' . $u->lname . '</th>';
                            echo '<th>' . $u->fname . '</th>';
                            echo '<th>' . $u->email . '</th>';
                            echo '<th>' . $u->date_register . '</th></tr>';
                        } ?>
                        </tbody>
                    </table>

                <?php elseif ($_GET['p'] == "add"): ?>

                    <h4 class="title is-4">Ajouter un membre</h4>

                    <form action="<?php echo URL; ?>administration/add" method="post">

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
                                <input name="email" class="input" type="email" placeholder="prenomnom@domaine.com"
                                       required>
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
                                <button class="button is-link">Ajouter le membre</button>
                            </div>
                        </div>
                    </form>

                <?php elseif ($_GET['p'] == "addhorse"): ?>

                    <h4 class="title is-4">Ajouter un cheval</h4>

                    <form action="<?php echo URL; ?>administration/addhorse" method="post">

                        <div class="field">
                            <label class="label">Nom</label>
                            <div class="control">
                                <input name="name" class="input" type="text" placeholder="Jean-Jacques" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Sexe</label>
                            <div class="control">
                                <div class="select">
                                    <select name="sexe" required>
                                        <option value="M">Mâle</option>
                                        <option value="F">Femelle</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Poids</label>
                            <div class="control">
                                <input name="poids" class="input" type="number" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Taille</label>
                            <div class="control">
                                <input name="taille" class="input" type="number" required>
                            </div>
                        </div>


                        <div class="field">
                            <label class="label">Photo</label>
                            <div class="control">
                                <input name="photo" class="input" type="text" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Race</label>
                            <div class="control">
                                <input name="race" class="input" type="text" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Robe</label>
                            <div class="control">
                                <input name="fonction" class="input" type="text" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Type</label>
                            <div class="control">
                                <div class="select">
                                    <select name="type" required>
                                        <option value="C">Cheval</option>
                                        <option value="P">Poney</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Ajouter le cheval</button>
                            </div>
                        </div>
                    </form>

                <?php elseif ($_GET['p'] == "addcavalier"): ?>

                    <h4 class="title is-4">Ajouter un cavalier</h4>

                    <form action="<?php echo URL; ?>administration/addcaval" method="post">

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
                            <label class="label">Option reprise</label>
                            <div class="control">
                                <div class="select">
                                    <select name="reprise">
                                        <option value="">Sans</option>
                                        <option value="Forfait">Forfait</option>
                                        <option value="Ticket">Ticket</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Nombre de ticket</label>
                            <div class="control">
                                <input name="ticket" class="input" value="0" type="number" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Type de monture</label>
                            <div class="control">
                                <div class="select">
                                    <select name="type" required>
                                        <option value="C">Cheval</option>
                                        <option value="P">Poney</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Ajouter le cavalier</button>
                            </div>
                        </div>

                    </form>


                <?php elseif ($_GET['p'] == "horsecaval"): ?>

                    <h4 class="title is-4">Attribuer un cheval à un cavalier</h4>
                    <form action="<?php echo URL; ?>administration/attcaval" method="post">

                        <div class="field">
                            <label class="label">Le cheval/poney</label>
                            <div class="control">
                                <div class="select">
                                    <select name="horse" required>
                                        <?php
                                        $def = $db->query('SELECT * FROM monture WHERE numCavalier IS NULL')->fetchAll();
                                        foreach ($def as $k) {
                                            $txt = "Poney";
                                            if ($k->codeTypeMonture == "C") {
                                                $txt = "Cheval";
                                            }
                                            echo '<option value="' . $k->numMonture . '">' . $k->nomMonture . ' qui est un ' . $txt . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Choisir un cavalier</label>
                            <div class="control">
                                <div class="select">
                                    <select name="cavalier">
                                        <?php
                                        $fed = $db->query('SELECT * FROM cavalier')->fetchAll();
                                        foreach ($fed as $a) {
                                            $tt = "Poney";
                                            if ($a->codeTypeMonture == "C") {
                                                $tt = "Cheval";
                                            }
                                            echo '<option value="' . $a->numCavalier . '">' . $a->nomCavalier . ' ' . $a->prenomCavalier . ' et n\'a le droit de prendre qu\'un ' . $tt . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Attribuer le cavalier</button>
                            </div>
                        </div>

                    </form>

                <?php elseif ($_GET['p'] == "delhorse"): ?>

                    <h4 class="title is-4">Supprimer un cheval</h4>
                    <form action="<?php echo URL; ?>administration/delhorse" method="post">

                        <div class="field">
                            <label class="label">Le cheval/poney</label>
                            <div class="control">
                                <div class="select">
                                    <select name="delhorse" required>
                                        <?php
                                        $def = $db->query('SELECT * FROM monture')->fetchAll();
                                        foreach ($def as $k) {
                                            $txt = "Poney";
                                            if ($k->codeTypeMonture == "C") {
                                                $txt = "Cheval";
                                            }
                                            echo '<option value="' . $k->numMonture . '">' . $k->nomMonture . ' qui est un ' . $txt . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Supprimer le cheval</button>
                            </div>
                        </div>

                    </form>

                <?php elseif ($_GET['p'] == "modhorse"): ?>

                    <h4 class="title is-4">Modifier un cheval</h4>
                    <form action="<?php echo URL; ?>administration/modifier" method="get">

                        <div class="field">
                            <label class="label">Le cheval/poney</label>
                            <div class="control">
                                <div class="select">
                                    <select name="modhorse" required>
                                        <?php
                                        $def = $db->query('SELECT * FROM monture')->fetchAll();
                                        foreach ($def as $k) {
                                            $txt = "Poney";
                                            if ($k->codeTypeMonture == "C") {
                                                $txt = "Cheval";
                                            }
                                            echo '<option value="' . $k->numMonture . '">' . $k->nomMonture . ' qui est un ' . $txt . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Modifier le cheval</button>
                            </div>
                        </div>

                    </form>

                <?php else: ?>

                    <h4 class="title is-4">Ce menu n'existe pas...</h4>

                <?php endif; ?>


            <?php else: ?>
                <h4 class="title is-4">Veuillez sélectionner un menu</h4>
            <?php endif; ?>

        </div>
    </div>

</div>
<br/><br/><br/><br/><br/>
