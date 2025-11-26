<?php
/* Template Name: Practices Detail */
get_header();

// カテゴリによってヘッダー切替：ページのスラッグで分岐 or ACFの選択項目で分岐
$slug = get_post_field('post_name', get_the_ID());
$header_class = ($slug === 'practices-of-companies') ? 'is-companies' : 'is-foundations';
?>
<main id="main" class="practices <?php echo esc_attr($header_class); ?>">
  <section class="hero">
    <h1 class="ttl"><?php the_title(); ?></h1>
    <!-- 必要ならサブコピーや背景画像も ACF で -->
  </section>

  <section class="meta container">
    <ul class="grid md:grid-cols-2 gap-4">
      <li><strong>ジャンル</strong><div><?php echo esc_html(get_field('pd_genre')); ?></div></li>
      <li><strong>発注者</strong><div><?php echo esc_html(get_field('pd_client')); ?></div></li>
      <li><strong>受注年度</strong><div><?php echo esc_html(get_field('pd_year')); ?></div></li>
    </ul>
  </section>

  <section class="body container">
    <?php if ($ov = get_field('pd_overview')): ?>
      <h2>事業概要</h2>
      <div class="rich"><?php echo wp_kses_post($ov); ?></div>
    <?php endif; ?>

    <?php if ($obj = get_field('pd_objective')): ?>
      <h2>評価目的</h2>
      <div class="rich"><?php echo wp_kses_post($obj); ?></div>
    <?php endif; ?>

    <?php if ($methods = get_field('pd_methods')): ?>
      <h2>評価方法</h2>
      <ul>
        <?php foreach ($methods as $row): ?>
          <li><?php echo esc_html($row['text']); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <?php if ($interims = get_field('pd_interim')): ?>
      <h2>中間評価の結果</h2>
      <?php foreach ($interims as $row): ?>
        <div class="grid md:grid-cols-2 gap-6 interim-row">
          <div>
            <?php if (!empty($row['subtitle'])): ?>
              <h3><?php echo esc_html($row['subtitle']); ?></h3>
            <?php endif; ?>
            <div class="rich"><?php echo wp_kses_post($row['text']); ?></div>
          </div>
          <div class="img"><?php echo wp_get_attachment_image($row['image'], 'large'); ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($util = get_field('pd_utilization')): ?>
      <h2>クライアントによる評価の活用</h2>
      <div class="rich"><?php echo wp_kses_post($util); ?></div>
    <?php endif; ?>
  </section>

  <?php
  // 関連事業実績（同カテゴリ3~5件）
  $cat = get_field('pd_related_category'); // タクソノミー: workresult_category
  if ($cat) {
    $q = new WP_Query([
      'post_type' => 'workresult',
      'posts_per_page' => 5,
      'tax_query' => [[
        'taxonomy' => 'workresult_category',
        'field'    => 'term_id',
        'terms'    => $cat,
      ]],
    ]);
    if ($q->have_posts()): ?>
      <section class="container related">
        <h2>関連する事業実績</h2>
        <ul class="cards">
          <?php while ($q->have_posts()): $q->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <?php if ($d = get_field('wr_short_desc')): ?>
                <p class="mini"><?php echo esc_html($d); ?></p>
              <?php endif; ?>
            </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </section>
    <?php endif;
  }
  ?>
</main>
<?php get_footer(); ?>
