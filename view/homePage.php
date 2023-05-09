<?php $title = "Le menu vertical" ?>

<?php ob_start(); ?>

<div class="grid_container">

  <!--------------------Main --------------------- -->
  <main class="main">
    <h3>Construisez votre menu animé </h3>
    <form method="post">
      <div class="main__items">
        <?php for ($i = 0; $i < 12; $i++) { ?>
          <div class="main__items__item">
            <label for="item<?= $i + 1 ?>">Item <?= $i + 1 ?> : </label>
            <input type="text" id="item<?= $i + 1 ?> pattern=" ^[\wÀ-ÿ.-]+( [\wÀ-ÿ.-]+)*$" name="item<?= $i + 1 ?>" <?= $i === 0 || $i === 1 ? 'required' : null; ?>>
          </div>
        <?php } ?>
      </div>
      <fieldset class="main__textAlign">
        <div>
          <legend>Texte aligné à :</legend>
        </div>
        <div class="main__textAlign__radios">
          <div>
            <input type="radio" id="left" name="textAlign" value="left" required>
            <label for="left">Gauche</label>
          </div>
          <div>
            <input type="radio" id="center" name="textAlign" value="center">
            <label for="center">Centré</label>
          </div>
          <div>
            <input type="radio" id="right" name="textAlign" value="right">
            <label for="right">Droite</label>
          </div>
        </div>
      </fieldset>
      <div class="main__layoutText">
        <div class="main__layoutText__sizeText">
          <label for="sizeText">Taille de texte :</label>
          <input id="sizeText" type="text" inputmode="numeric" maxlength="3" name="sizeText" required>
        </div>
        <div class="main__layoutText__colorText">
          <label for="colorText">Couleur du texte :</label>
          <input type="color" id="colorText" name="colorText" value="#000" resuired >
        </div>
      </div>
      <div class="main__submit">
        <input type="submit" value="valider">
      </div>
    </form>
  </main>

  <!--------------------Nav --------------------- -->

  <?php if (isset($_POST)) { ?>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        updateStyleForClass(stylesheet, '.nav__wrapper_animations', 'text-align', '<?= $_POST['textAlign'] ?>');
        updateStyleForClass(stylesheet, ".nav__wrapper_animations a", "font-size", `${<?= $_POST['sizeText'] ?> * 0.1}rem`)
        updateStyleForClass(stylesheet, ".nav__wrapper_animations a", "color", '<?= $_POST['colorText'] ?>');
      })
    </script>
  <?php } ?>
  <nav class="nav">
    <div class="nav__wrapper">
      <ul class="nav__wrapper_animations">
        <?php foreach ($_POST as $key => $value) { ?>
          <?php $value = trim($value); ?>
          <?php if ($value != "" && str_contains($key, 'item')) { ?>
            <li><a href="#"><?= $value ?></a></li>
          <?php } ?>
        <?php } ?>
      </ul>
      <div class="nav__wrapper__return">
        <button id="return">Retour</button>
      </div>
    </div>
  </nav>


</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>