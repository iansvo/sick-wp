<?php
  get_header(); 
?>
<main>
  <div class="l-container">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" class="<?php post_class('c-loop-post'); ?>" aria-labelledby=">
        <header>
          <h2 id="post-<?php the_ID(); ?>-title" class="c-loop-post_title">
            <?php the_title(); ?>
          </h2>
        </header>
        <div class="c-loop-post_excerpt">
          <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="c-loop-post_button">
          View Post
        </a>
      </article>    
    <?php endwhile; endif; ?>
  </div>
</main>