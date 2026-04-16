<?php

/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/common/
 * File name:          blockquote-day.php
 * Description:        This file shows 1 of the last 10 phrases in the blockquote day section on the home page.
 * Date:               15-03-2026
 */
?>

<?php
global $wpdb;

$postId = get_the_ID();

# Get the last 10 quotes
$listQuotes = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}befrases ORDER BY befrases_id DESC LIMIT 10", ARRAY_A);
$author = '';
$quote = '';

# Get length array
$length = count($listQuotes);

# Get author and quote with randomize number
if ($length == 0) { // If there are no quotes.
  echo '<p class="text-center">No hay frases para mostrar.</p>';
} elseif ($length == 1) { // If there is a quote.
  foreach ($listQuotes as $key => $value) {
    $quote = $value['befrases_quote'];
    $author = $value['befrases_author'];
    $authorExtra = $value['befrases_author_extra'];
    $nameOfAuthor = getWriterNameWithWriterId($author);
    foreach ($nameOfAuthor as $key => $value) {
      $author = $value['befrases_aut_name'];
    }
  }
} else { // If there is one or more quotes
  $randomNumber = rand(0, $length - 1);
  foreach ($listQuotes as $key => $value) {
    if ($key == $randomNumber) {
      $quote = $value['befrases_quote'];
      $author = $value['befrases_author'];
      $authorExtra = $value['befrases_author_extra'];
      $nameOfAuthor = getWriterNameWithWriterId($author);
      foreach ($nameOfAuthor as $key => $value) {
        $author = $value['befrases_aut_name'];
      }
    }
  }
}

# Prepare author extra information
if ($authorExtra == 'Sin información.') {
  $authorExtra = '';
} else {
  $authorExtra = ', ' . $authorExtra;
}

# Remove the character "\" from the strings
$quote = stripslashes($quote);
$author = stripslashes($author);
$authorExtra = stripslashes($authorExtra);

echo $postId;
?>

<!-- Title /-->
<section>
  <div class="tb-head">
    <h2>= Frase del día =</h2>
  </div><!--/.tb-head-->
</section>

<!-- Content /-->
<section>
  <div class="tb-box">

    <!-- Blockquote /-->
    <section>
      <blockquote>
        <p> "<?php echo $quote; ?>" <br><b>— <?php echo $author; ?><?php echo $authorExtra; ?> </b></p>
      </blockquote>
    </section>

    <?php if ($postId == 812): // Only home page ?>

      <!-- Button /-->
      <section>
        <div class="text-center">
          <a title="Ir a colección de frases" href="https://bibliotecaenigmas.com/coleccion-de-frases/"
             class="tb-button">Ir a la sección</a>
        </div>
      </section>

    <?php endif; ?>

  </div>
</section>