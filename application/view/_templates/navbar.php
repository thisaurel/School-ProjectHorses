<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        if ($navbarBurgers.length > 0) {
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>

<nav class="navbar is-dark">
    <div class="navbar-brand">
        <div class="navbar-burger burger" data-target="navbarBurger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarBurger" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="<?= URL; ?>">
                Accueil
            </a>
            <?php if (isset($_SESSION['auth']) AND ($_SESSION['auth']->role == 1) || ($_SESSION['auth']->role == 2)) { ?>
            <a class="navbar-item" href="<?= URL; ?>gest">
                Gestion des cavaliers
            </a>
            <?php } ?>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#chevaux">
                    Nos chevaux et poneys
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="<?= URL; ?>horse">
                        Nos chevaux
                    </a>
                    <a class="navbar-item" href="<?= URL; ?>horse/poneys">
                        Nos poneys
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#chevaux">
                    Planning des cours
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="<?= URL; ?>cours">
                        Chevaux
                    </a>
                    <a class="navbar-item" href="<?= URL; ?>cours/poneys">
                        Poneys
                    </a>
                </div>
            </div>

            <?php if (isset($_SESSION['auth']) and $_SESSION['auth']->role == 2) { ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#chevaux">
                        Gestion des reprises moniteur
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item" href="<?= URL; ?>moniteur/">
                            Gérer
                        </a>
                        <a class="navbar-item" href="<?= URL; ?>moniteur/consulter_reprise">
                            Consulter
                        </a>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>

</nav>
<br>
