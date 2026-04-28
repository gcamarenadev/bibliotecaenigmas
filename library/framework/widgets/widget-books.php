<?php
  /**
   * Template Name:      Biblioteca Enigmas
   * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
   * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
   * Author:             Guillermo Camarena
   * Author URL:         http://gcamarenaprog.com
   * Path:               /library/framework/widgets/
   * File name:          widget-books.php
   * Description:        This file contains the code for the book list widget.
   * Date:               27-04-2026
   */
  
  // Widget initialization and register
  add_action ('widgets_init', 'tie_books_list_widget');
  
  /**
   * Widget register
   *
   * @return void
   */
  function tie_books_list_widget ()
  {
    register_widget ('tie_books_list');
  }
  
  /**
   * Book widget class
   */
  class tie_books_list extends WP_Widget
  {
    
    /**
     * Main construct
     */
    public function __construct ()
    {
      $widgetOptions = array(
        'classname' => 'books_list'
      );
      $controlOptions = array(
        'width' => 250,
        'height' => 350,
        'id_base' => 'books_list-widget'
      );
      parent::__construct ('books_list-widget', THEME_SUBNAME . ' - ' . __ ('List of books', 'tie'), $widgetOptions, $controlOptions);
    }
    
    
    /**
     * Echoes the widget content.
     *
     * @param $arguments
     * @param $instance
     * @return void
     */
    public function widget ($arguments, $instance)
    {
      extract ($arguments);
      
      $title = apply_filters ('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
      $numberOfPosts = $instance['no_of_posts'];
      $postsOrder = $instance['posts_order'];
      $thumb = !empty($instance['thumb']) ? $instance['thumb'] : false;
      
      $date = !empty($instance['date']) ? $instance['date'] : false;
      $views = !empty($instance['views']) ? $instance['views'] : false;
      
      echo $before_widget;
      echo $before_title;
      echo $title;
      echo $after_title;
      ?>

      <ul>
        <?php
          widgetListOfBooks ($numberOfPosts, $thumb, $date, $views, $postsOrder);
        ?>
      </ul>
      <div class="clear"></div>
      
      <?php
      echo $after_widget;
    }
    
    /**
     * Updates the instance of the widget.
     *
     * @param $new_instance
     * @param $old_instance
     * @return mixed
     */
    public function update ($new_instance, $old_instance)
    {
      $instance = $old_instance;
      $instance['title'] = !empty($new_instance['title']) ? $new_instance['title'] : false;
      $instance['no_of_posts'] = !empty($new_instance['no_of_posts']) ? $new_instance['no_of_posts'] : false;
      $instance['posts_order'] = !empty($new_instance['posts_order']) ? $new_instance['posts_order'] : false;
      $instance['thumb'] = !empty($new_instance['thumb']) ? $new_instance['thumb'] : false;
      $instance['date'] = !empty($new_instance['date']) ? $new_instance['date'] : false;
      $instance['views'] = !empty($new_instance['views']) ? $new_instance['views'] : false;
      return $instance;
    }
    
    
    /**
     * Outputs the settings update form.
     *
     * @param $instance
     * @return void
     */
    public function form ($instance)
    {
      $defaults = array('title' => __ ('Recent Posts', 'tie'), 'no_of_posts' => '5', 'posts_order' => 'latest', 'thumb' => 'true', 'date' => 'true', 'views' => 'true');
      $instance = wp_parse_args ((array)$instance, $defaults); ?>

      <p>
        <label for="<?php echo $this->get_field_id ('title'); ?>"><?php _e ('Title:', 'tie') ?></label>
        <input id="<?php echo $this->get_field_id ('title'); ?>" name="<?php echo $this->get_field_name ('title'); ?>"
               value="<?php if (!empty($instance['posts_order']))
                 echo $instance['title']; ?>" class="widefat" type="text"/>
      </p>

      <p>
        <label
            for="<?php echo $this->get_field_id ('no_of_posts'); ?>"><?php _e ('Number of books to display:', 'tie') ?></label>
        <input id="<?php echo $this->get_field_id ('no_of_posts'); ?>"
               name="<?php echo $this->get_field_name ('no_of_posts'); ?>"
               value="<?php if (!empty($instance['no_of_posts']))
                 echo $instance['no_of_posts']; ?>" type="text" size="3"/>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id ('posts_order'); ?>"><?php _e ('Type of list', 'tie') ?></label>
        <select id="<?php echo $this->get_field_id ('posts_order'); ?>"
                name="<?php echo $this->get_field_name ('posts_order'); ?>">
          <option value="recent" <?php if (!empty($instance['posts_order']) && $instance['posts_order'] == 'recent')
            echo "selected=\"selected\"";
          else echo ""; ?>>
            <?php _e ('More recent', 'tie') ?>
          </option>

          <option value="random" <?php if (!empty($instance['posts_order']) && $instance['posts_order'] == 'random')
            echo "selected=\"selected\"";
          else echo ""; ?>>
            <?php _e ('Random', 'tie') ?>
          </option>
          
          <?php if (tie_get_option ('post_views')) { ?>

            <option value="popular" <?php if (!empty($instance['posts_order']) && $instance['posts_order'] == 'popular')
              echo "selected=\"selected\"";
            else echo ""; ?>>
              <?php _e ('Popular', 'tie') ?>
            </option>
          <?php } ?>

        </select>

      </p>
      <p>
        <label for="<?php echo $this->get_field_id ('thumb'); ?>"><?php _e ('Show thumbnail:', 'tie') ?></label>
        <input id="<?php echo $this->get_field_id ('thumb'); ?>" name="<?php echo $this->get_field_name ('thumb'); ?>"
               value="true" <?php if (!empty($instance['thumb']))
          echo 'checked="checked"'; ?> type="checkbox"/>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id ('date'); ?>"><?php _e ('Show date:', 'tie') ?></label>
        <input id="<?php echo $this->get_field_id ('date'); ?>" name="<?php echo $this->get_field_name ('date'); ?>"
               value="true" <?php if (!empty($instance['date']))
          echo 'checked="checked"'; ?> type="checkbox"/>

        <label for="<?php echo $this->get_field_id ('views'); ?>"><?php _e ('Show views:', 'tie') ?></label>
        <input id="<?php echo $this->get_field_id ('views'); ?>" name="<?php echo $this->get_field_name ('views'); ?>"
               value="true" <?php if (!empty($instance['views']))
          echo 'checked="checked"'; ?> type="checkbox"/>

      </p>
      
      <?php
    }
  }
