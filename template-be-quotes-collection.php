<?php
  /**
   * Template Name:     Biblioteca Enigmas - Page Quotes Collection
   * Theme URI:         https://github.com/gcamarenaprog/bibliotecaenigmas
   * Description Theme: Sahifa theme personalized for bibliotecaenigmas.com website!
   * Author:            Guillermo Camarena
   * Author URL:        http://gcamarenaprog.com
   * Path:              /
   * File name:         template-be-quotes-collection.php
   * Description:       This file shows quotes collection page.
   * Date:              01-12-2025
   */
?>

<?php get_header (); ?>
<?php tie_breadcrumbs (); ?>
<?php tie_setPostViews (); ?>

<?php $content = get_post (20110); ?>

  <!-- Title /-->
  <section>
    <div class="tb-head">
      <h1>= Colección de frases =</h1>
    </div>
  </section>

  <!-- Content /-->
  <section>
    <div class="tb-box">

      <!-- Image /-->
      <section>
        <div class="tb-tax-image">
          <img width="624"
               height="422"
               src="https://bibliotecaenigmas.com/wp-content/uploads/2025/10/frases.jpg"
               class="tie-appear">
        </div>
      </section>

      <hr>

      <!-- Content /-->
      <section>
        <div class="mt10 mb10">
          <p><?php echo $content->post_content; ?></p>
        </div>
      </section>

      <hr>
      
      <!-- Advice /-->
      <div class="tb-advice">
        <p>Las frases mostradas en esta sección, corresponden a las publicadas en el Widget "Frase del día".</p>
      </div>

    </div>
  </section>

  <!-- Table title /-->
  <section>
    <div class="tb-head">
      <h1>= Lista de frases =</h1>
    </div>
  </section>

  <!-- Table /-->
  <section>
    <div class="tb-box">
      <!-- Table /-->
      <?php get_template_part ('library/framework/blocks/quotes/search'); ?>
    </div>
  </section>

<?php get_footer (); ?>