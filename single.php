<?php get_header(); ?>

<main class="container content-wrapper">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="glass-panel-float">
      <header>
        <h1 class="mb-2"><?php the_title(); ?></h1>
        <p class="text-right text-muted mb-3">Posted on <?php echo get_the_date(); ?></p>
      </header>
<div class="post-content blog-post">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>