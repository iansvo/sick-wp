<?php if( is_active_sidebar('primary') ) : ?>
  <aside id="sidebar" class="c-sidebar border border-solid border-gray-200 shadow rounded p-8">
    <?php dynamic_sidebar('primary'); ?>
  </aside>
<?php endif; ?>