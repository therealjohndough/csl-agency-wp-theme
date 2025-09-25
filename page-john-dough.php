<?php
/**
 * Template Name: John Dough Author Page
 * Description: Custom author profile page for John Dough D’Angelo.
 */

get_header();
?>

<main id="main-content" class="container author-profile">

  <section class="author-hero">
    <div class="hero-content anim-reveal">
      <h1 class="headline">John Dough D’Angelo</h1>
      <p class="hero-intro">Marketing Director, Chief Strategist, and Head of Digital.</p>
    </div>
  </section>

  <section class="author-bio glass-panel anim-reveal">
    <h2>About John</h2>
    <p>John D’Angelo, better known as Dough, is a seasoned voice in New York’s cannabis industry and the founder and chief strategist of Case Study Labs.  With a background that bridges brand strategy, digital marketing, and cultural storytelling, he has built a reputation for being both honest and direct in his perspective. His work spans from global platforms like StockX to launching cannabis brands across the USA, giving him a unique vantage point on how culture, commerce, and cannabis intersect. When John is not in the lab, he can be found serving as marketing chair for Buffalo Cannabis Network or at <em>The Other Magazine</em> where he heads up their digital strategy.</p>


  </section>

  <section class="author-links glass-panel anim-reveal">
    <h2>Find Me Online</h2>
    <ul>
      <li><a href="https://www.linkedin.com/in/therealjohndough/" target="_blank">LinkedIn</a></li>
      <li><a href="https://instagram.com/case_study_labs" target="_blank">Instagram</a></li>
      <li><a href="https://casestudy-labs.com" target="_blank">Case Study Labs</a></li>
      <li><a href="https://johndoughstudios.com" target="_blank">John Dough Studios</a></li>
      <li><a href="https://theothermagazines.com" target="_blank">The Other Magazine</a></li>
    </ul>
  </section>

 
<section class="author-posts container anim-reveal">
  <h2>Articles by John</h2>
  <div class="post-grid">
    <?php
      // Curated external articles (URLs you provided)
      $articles = [
        [
          'url'   => 'https://theothermagazines.com/cannabis/5-essential-tips-for-making-connections-at-nycs-premier-cannabis-trade-event/',
          'title' => '5 Essential Tips for Making Connections at NYC’s Premier Cannabis Trade Event',
          'excerpt'=> 'Networking strategies that land real outcomes at Revelry NYC.'
        ],
        [
          'url'   => 'https://theothermagazines.com/cannabis/cannabis-events/from-carmelo-anthony-to-social-equity-three-brands-making-moves-at-revelry/',
          'title' => 'From Carmelo Anthony to Social Equity: Three Brands Making Moves at Revelry',
          'excerpt'=> 'Three NY brands worth watching—and why their plays matter.'
        ],
        [
          'url'   => 'https://theothermagazines.com/art/nyc-weed-bags-streetadelics-cultural-time-capsule/',
          'title' => 'NYC Weed Bags: Streetadelic’s Cultural Time Capsule',
          'excerpt'=> 'The underground art that documented a city’s cannabis era.'
        ],
        [
          'url'   => 'https://theothermagazines.com/cannabis/cannabis-events/new-york-cannabis-industry-reaches-coming-of-age-moment-at-revelry-buyers-club/',
          'title' => 'New York Cannabis Industry Reaches Coming-of-Age Moment at Revelry Buyers’ Club',
          'excerpt'=> 'Why this year’s Buyers’ Club feels like a real turning point.'
        ],
        [
          'url'   => 'https://theothermagazines.com/cannabis/cannabis-events/revelry-buyers-club-2025-blazing-new-trails/',
          'title' => 'Revelry Buyers’ Club 2025: Blazing New Trails',
          'excerpt'=> 'A sold-out crowd, mayoral support, and a new playbook.'
        ],
      ];

      foreach ( $articles as $a ):
        $img = csl_fetch_og_image( $a['url'] );
    ?>
      <a href="<?php echo esc_url( $a['url'] ); ?>" class="post-card glass-medium" target="_blank" rel="noopener nofollow sponsored">
        <div class="card-image">
          <?php if ( $img ): ?>
            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $a['title'] ); ?>" loading="lazy" decoding="async">
          <?php else: ?>
            <div style="width:100%;height:200px;background:linear-gradient(135deg,#222 0%,#111 100%);"></div>
          <?php endif; ?>
        </div>
        <div class="card-content">
          <h3><?php echo esc_html( $a['title'] ); ?></h3>
          <p><?php echo esc_html( $a['excerpt'] ); ?></p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>


  <!-- JSON-LD Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "@id": "https://casestudy-labs.com/about/john-dough-dangelo",
    "name": "John Dough D'Angelo",
    "alternateName": ["John Dough", "John D’Angelo"],
    "jobTitle": "Marketing Director, Chief Strategist, Head of Digital",
    "url": "https://casestudy-labs.com/about/john-dough-dangelo",
    "sameAs": [
      "https://www.linkedin.com/in/john-dough-dangelo/",
      "https://instagram.com/case_study_labs",
      "https://casestudy-labs.com",
      "https://johndoughstudios.com",
      "https://theothermagazines.com"
    ],
    "worksFor": {
      "@type": "Organization",
      "name": "Case Study Labs",
      "url": "https://casestudy-labs.com"
    },
    "description": "Marketing Director at BCN, Chief Strategist at Case Study Labs, and Head of Digital at The Other Magazine.",
    "knowsAbout": [
      "Cannabis Branding",
      "Digital Strategy",
      "Community Outreach"
    ]
  }
  </script>

</main>

<?php get_footer(); ?>
