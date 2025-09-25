<?php
/**
 * Template Name: Presentation
 *
 * A full-screen, slide-by-slide view.
 */

get_header(); ?>

<style>
  /* Minimal starting CSS – tweak later in style.css */
  .slide {
    display: none;
    min-height: 100vh;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    padding: 4rem;
  }
  .slide.active { display: flex; }
  .nav-dots {
    position: fixed;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: .5rem;
  }
  .nav-dots button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    background: rgba(255,255,255,.3);
    cursor: pointer;
  }
  .nav-dots .current { background: #fff; }
</style>

<main id="presentation">

  <?php if (have_rows('slides')): ?>
    <?php while (have_rows('slides')): the_row(); ?>
      <section class="slide">
        <?php
          $layout = get_row_layout();
          switch ($layout):
            case 'text_slide':
              echo '<h1>' . get_sub_field('headline') . '</h1>';
              echo '<p>' . get_sub_field('body') . '</p>';
              break;

            case 'image_slide':
              echo wp_get_attachment_image(get_sub_field('image'), 'full');
              break;

            case 'image_text':
              echo '<div class="split">';
              echo wp_get_attachment_image(get_sub_field('image'), 'large');
              echo '<div><h2>' . get_sub_field('headline') . '</h2>';
              echo '<p>' . get_sub_field('body') . '</p></div>';
              echo '</div>';
              break;

          endswitch;
        ?>
      </section>
    <?php endwhile; ?>

    <div class="nav-dots">
      <?php for ($i = 0; $i < count(get_field('slides')); $i++): ?>
        <button data-index="<?= $i ?>"></button>
      <?php endfor; ?>
    </div>

  <?php else: ?>
    <p style="text-align:center;padding:4rem;">Add some slides in the editor.</p>
  <?php endif; ?>

</main>

<script>
/* Tiny vanilla JS slide navigation */
(function(){
  const slides   = document.querySelectorAll('.slide');
  const dots     = document.querySelectorAll('.nav-dots button');
  let current    = 0;

  function go(index){
    slides.forEach(s => s.classList.remove('active'));
    dots.forEach(d => d.classList.remove('current'));
    slides[index].classList.add('active');
    dots[index]?.classList.add('current');
    current = index;
  }

  dots.forEach((dot, i) => dot.addEventListener('click', () => go(i)));
  document.addEventListener('keydown', e => {
    if (e.key === 'ArrowRight') go((current + 1) % slides.length);
    if (e.key === 'ArrowLeft')  go((current - 1 + slides.length) % slides.length);
  });
  go(0);
})();
</script>

<?php
get_footer();