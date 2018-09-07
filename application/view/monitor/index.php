<div class="container is-fullhd">
    <?php Session::displayFlash(); ?>
    <h1 class="title is-1">Gestion des reprises</h1>

    <form action="<?= URL ?>moniteur/vue_reprise" method="post">
        <div class="field">
            <label class="label">Date de la reprise</label>
            <div class="control">
                <input class="input" type="date" name="date">
            </div>
        </div>

        <div class="field">
            <label class="label">Cours</label>
            <div class="control">
                <label class="checkbox-inline"><input type="radio" value="C" name="optradio">Cheval</label>
                <label class="checkbox-inline"><input type="radio" value="P" name="optradio">Poney</label>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Voir reprise</button>
            </div>
        </div>
    </form>
    <hr>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
