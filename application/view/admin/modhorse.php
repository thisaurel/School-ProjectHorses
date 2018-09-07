<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Modifier un cheval</h1>

    <?php
    var_dump($_GET);

    $id = htmlspecialchars($_GET['modhorse']);

    $req = $db->query('SELECT * FROM monture WHERE numMonture = '. $id)->fetchAll();

    ?>

    <form action="<?php echo URL; ?>administration/modhorse" method="post">

        <input name="iden" type="text" value="<?= $id ?>">

        <div class="field">
            <label class="label">Nom</label>
            <div class="control">
                <?php
                foreach ($req as $item) {
                    ?>
                    <input name="name" class="input" type="text" value="<?= $item->nomMonture ?>" required>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Sexe</label>
            <div class="control">

                <div class="select">
                    <select name="sexe" required>
                        <option value="M">Mâle</option>
                        <?php
                        foreach ($req as $item) {
                            if($item->sexe == "F"){
                                ?>
                                <option value="F" selected>Femelle</option>
                                <?php
                            } else {
                                ?>
                                <option value="F" >Femelle</option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Poids</label>
            <div class="control">
                <?php
                foreach ($req as $item) {
                    ?>
                    <input name="poids" class="input" type="number" value="<?= $item->poids ?>" required>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Taille</label>
            <div class="control">
                <?php
                foreach ($req as $item) {
                    ?>
                    <input name="taille" class="input" type="number" value="<?= $item->taille ?>" required>
                    <?php
                }
                ?>
            </div>
        </div>


        <div class="field">
            <label class="label">Photo</label>
            <div class="control">
                <?php
                foreach ($req as $item) {
                    ?>
                    <input name="photo" class="input" type="text" value="<?= $item->photoMonture ?>" required>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Race</label>
            <div class="control">
                <?php
                foreach ($req as $item) {
                    ?>
                    <input name="race" class="input" type="text" value="<?= $item->race ?>" required>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Robe</label>
            <div class="control">
                <?php
                foreach ($req as $item) {
                    ?>
                    <input name="fonction" class="input" type="text" value="<?= $item->robe ?>" required>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Type</label>
            <div class="control">

                <div class="select">
                    <select name="type" required>
                        <?php
                        foreach ($req as $item) {
                            if($item->codeTypeMonture == "C"){
                                ?>
                                <option value="C" selected>Cheval</option>
                                <option value="P" >Poney</option>
                                <?php
                            } else {
                                ?>
                                <option value="P" selected>Poney</option>
                                <option value="C" >Cheval</option>
                                <?php
                            }
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


    <br /><br /><br /><br /><br /><br />

    <hr>
    <br><br>
</div>
