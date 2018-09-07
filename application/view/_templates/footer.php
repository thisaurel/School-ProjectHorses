

<footer class="footer" style="background-color: #f9f9f9;border-top: 3px solid #ececec;">
  <div class="container">
    <div class="content has-text-left">
      <p>
        &copy Copyright Aurélien RICHE, Tous droits réservés.
      </p>
      <div class="field is-grouped is-grouped-multiline">
        <div class="control">
          <div class="tags has-addons">
            <span class="tag is-dark">PHP</span>
            <span class="tag is-info"><?= phpversion(); ?></span>
          </div>
        </div>

        <div class="control">
          <div class="tags has-addons">
            <span class="tag is-dark">MySQL</span>
            <span class="tag is-warning">5.7.17</span>
          </div>
        </div>

        <div class="control">
          <div class="tags has-addons">
            <span class="tag is-dark">Apache</span>
            <span class="tag is-danger">2.4.25</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="<?= URL ?>js/turbolinks.js"></script>

</body>
</html>
<?php unset($_SESSION['flash']); ?>
