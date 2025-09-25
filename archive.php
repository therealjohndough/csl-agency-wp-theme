<?php get_header(); ?>

<main class="container content-wrapper">
  <h1 class="section-heading">Latest Posts</h1>

  <?php if (have_posts()) : ?>
    <div class="project-grid">
      <?php while (have_posts()) : the_post(); ?>
        <article class="project-card">
          <a href="<?php the_permalink(); ?>" class="card-link">
            <div class="card-image-wrapper">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php endif; ?>
            </div>
            <div class="card-content">
              <h2 class="card-title"><?php the_title(); ?></h2>
              <p class="card-excerpt"><?php echo get_the_excerpt(); ?></p>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p>No posts found.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
