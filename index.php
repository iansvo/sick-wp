<?php
  get_header(); 
?>
<main class="py-12">
  <div class="container grid gap-8 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-8 lg:space-y-12">
      <?php if( have_posts() ) : ?> 
        <?php while( have_posts() ) : the_post(); ?>
          <article 
            id="post-<?php the_ID(); ?>" 
            <?php post_class('c-loop-post shadow border border-solid border-gray-200 p-8 rounded'); ?> 
            aria-labelledby="post-<?php the_ID(); ?>-title"
          >
            <?php the_post_thumbnail('large', ['class' => '-mx-8 object-cover block']); ?>
            <header class="mb-2">
              <h2 
                id="post-<?php the_ID(); ?>-title"
                class="c-loop-post_title text-3xl sm:text-4xl lg:text-5xl font-semibold"
              >
                <?php the_title(); ?>
              </h2>
            </header>
            <div class="c-loop-post_excerpt mb-6 prose">
              <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="c-loop-post_button c-button">
              View Post
            </a>
          </article>    
        <?php endwhile; ?>
      <?php else : ?> 
        Content Not Found
      <?php endif; ?>
    </div>
    <div class="col-span-1">
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>