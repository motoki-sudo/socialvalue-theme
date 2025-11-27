<?php
/**
 * Single: Work Result 詳細
 * - 実践カテゴリ（企業/財団・非営利）に属する投稿は、practicesレイアウトで表示
 * - それ以外は通常の workresult 詳細表示
 */
get_header();

$PRACTICES_TERMS = [
  [
    'slug' => 'companies-practices',
    'class'=> 'is-companies',
  ],
  [
    'slug' => 'foundations-npo-practices',
    'class'=> 'is-foundations',
  ],
];

$terms = get_the_terms( get_the_ID(), 'workresult_category' );
$term_slugs = $terms ? wp_list_pluck($terms, 'slug') : [];

$is_practices = false;
$header_class = 'is-default';
foreach ( $PRACTICES_TERMS as $pt ) {
  if ( $pt['slug'] && in_array($pt['slug'], $term_slugs, true) ) {
    $is_practices = true;
    $header_class = $pt['class'];
    break;
  }
}
?>
<main class="single-workresult <?php echo esc_attr($header_class); ?>">

<?php if ( $is_practices ) : ?>

  <!-- ▼ practices レイアウト -->
  <article class="workresult-detail">
    <header class="wr-header">
      <h1 class="ttl"><?php the_title(); ?></h1>
      <?php
      $genre  = function_exists('get_field') ? ( get_field('wr_genre') ?: get_field('pd_genre') ) : '';
      $client = function_exists('get_field') ? ( get_field('wr_client') ?: get_field('pd_client') ) : '';
      $year   = function_exists('get_field') ? ( get_field('wr_order_year') ?: get_field('pd_year') ) : '';
      if ( $genre || $client || $year ) : ?>
        <ul class="wr-meta">
          <?php if ( $genre ): ?><li><strong>ジャンル</strong><div><?php echo esc_html( $genre ); ?></div></li><?php endif; ?>
          <?php if ( $client ): ?><li><strong>発注者</strong><div><?php echo esc_html( $client ); ?></div></li><?php endif; ?>
          <?php if ( $year ): ?><li><strong>受注年度</strong><div><?php echo esc_html( $year ); ?></div></li><?php endif; ?>
        </ul>
      <?php endif; ?>
    </header>

    <div class="container">
      <?php if ( function_exists('get_field') && ($ov = ( get_field('wr_overview') ?: get_field('pd_overview') )) ): ?>
        <section id="wr-section-overview">
          <h2>事業概要</h2>
          <div class="rich"><?php echo wp_kses_post($ov); ?></div>
        </section>
      <?php endif; ?>

      <?php if ( function_exists('get_field') && ($obj = ( get_field('wr_evaluation_purpose') ?: get_field('pd_objective') )) ): ?>
        <section id="wr-section-purpose">
          <h2>評価目的</h2>
          <div class="rich"><?php echo wp_kses_post($obj); ?></div>
        </section>
      <?php endif; ?>

      <?php
      $method_period  = function_exists('get_field') ? get_field('wr_method_period')   : '';
      $method_target  = function_exists('get_field') ? get_field('wr_method_target')   : '';
      $method_app     = function_exists('get_field') ? get_field('wr_method_approach') : '';
      $method_domain  = function_exists('get_field') ? get_field('wr_method_domain')   : '';
      $has_new_method = $method_period || $method_target || $method_app || $method_domain;
      ?>
      <?php if ( $has_new_method ): ?>
        <section id="wr-section-methods">
          <h2>評価方法</h2>
          <ul>
            <?php if ( $method_period ): ?><li>実施期間：<?php echo esc_html( $method_period ); ?></li><?php endif; ?>
            <?php if ( $method_target ): ?><li>実施対象：<?php echo esc_html( $method_target ); ?></li><?php endif; ?>
            <?php if ( $method_app ): ?><li>実施方法：<?php echo esc_html( $method_app ); ?></li><?php endif; ?>
            <?php if ( $method_domain ): ?><li>評価領域：<?php echo esc_html( $method_domain ); ?></li><?php endif; ?>
          </ul>
        </section>
      <?php elseif ( function_exists('get_field') && ($methods = get_field('pd_methods')) ): ?>
        <section id="wr-section-methods">
          <h2>評価方法</h2>
          <ul><?php foreach ($methods as $r): ?><li><?php echo esc_html($r['text']); ?></li><?php endforeach; ?></ul>
        </section>
      <?php endif; ?>

      <?php
      $result_body  = function_exists('get_field') ? get_field('wr_result_body')  : '';
      $result_image = function_exists('get_field') ? get_field('wr_result_image') : '';
      ?>
      <?php if ( $result_body || $result_image ): ?>
        <section id="wr-section-results" class="wr-section-two-columns">
          <div class="wr-section-body">
            <h2>評価結果</h2>
            <?php if ( $result_body ): ?>
              <div class="rich"><?php echo wp_kses_post( $result_body ); ?></div>
            <?php endif; ?>
          </div>
          <div class="wr-section-image">
            <?php if ( $result_image && ! empty( $result_image['ID'] ) ): ?>
              <?php echo wp_get_attachment_image( $result_image['ID'], 'large' ); ?>
            <?php endif; ?>
          </div>
        </section>
      <?php elseif ( function_exists('get_field') && ($interims = get_field('pd_interim')) ): ?>
        <section id="wr-section-results" class="wr-section-two-columns">
          <div class="wr-section-body">
            <h2>評価結果</h2>
            <?php foreach ($interims as $r): ?>
              <div class="interim-row" style="margin:16px 0;">
                <?php if (!empty($r['subtitle'])): ?><h3><?php echo esc_html($r['subtitle']); ?></h3><?php endif; ?>
                <div class="rich"><?php echo wp_kses_post($r['text']); ?></div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="wr-section-image"></div>
        </section>
      <?php endif; ?>

      <?php
      $client_use_body  = function_exists('get_field') ? get_field('wr_client_use_body')  : '';
      $client_use_image = function_exists('get_field') ? get_field('wr_client_use_image') : '';
      ?>
      <?php if ( $client_use_body || $client_use_image ): ?>
        <section id="wr-section-client-use" class="wr-section-two-columns">
          <div class="wr-section-body">
            <h2>クライアントによる評価の活用</h2>
            <?php if ( $client_use_body ): ?>
              <div class="rich"><?php echo wp_kses_post( $client_use_body ); ?></div>
            <?php endif; ?>
          </div>
          <div class="wr-section-image">
            <?php if ( $client_use_image && ! empty( $client_use_image['ID'] ) ): ?>
              <?php echo wp_get_attachment_image( $client_use_image['ID'], 'large' ); ?>
            <?php endif; ?>
          </div>
        </section>
      <?php elseif ( function_exists('get_field') && ($util = get_field('pd_utilization')) ): ?>
        <section id="wr-section-client-use" class="wr-section-two-columns">
          <div class="wr-section-body">
            <h2>クライアントによる評価の活用</h2>
            <div class="rich"><?php echo wp_kses_post($util); ?></div>
          </div>
          <div class="wr-section-image"></div>
        </section>
      <?php endif; ?>
    </div>

    <?php
    // ▼ 関連する事業実績（wr_related_workresults 優先、なければ同カテゴリ3~5件）
    $related_posts = function_exists('get_field') ? get_field('wr_related_workresults') : [];
    if ( $related_posts ) {
      ?>
      <section id="wr-section-related" class="container related">
        <h2>関連する事業実績</h2>
        <ul class="cards" style="display:grid;gap:20px;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));">
          <?php foreach ( $related_posts as $post_obj ) : setup_postdata( $post_obj ); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <?php
              $desc_new = function_exists('get_field') ? get_field('wr_list_description') : '';
              $desc_old = function_exists('get_field') ? get_field('wr_short_desc') : '';
              $desc     = $desc_new ?: $desc_old;
              if ( $desc ) : ?>
                <p class="mini" style="margin:.3rem 0 0;color:#555;"><?php echo esc_html( $desc ); ?></p>
              <?php endif; ?>
            </li>
          <?php endforeach; wp_reset_postdata(); ?>
        </ul>
      </section>
      <?php
    } elseif ( $terms ) {
      $q = new WP_Query([
        'post_type'      => 'workresult',
        'posts_per_page' => 5,
        'post__not_in'   => [ get_the_ID() ],
        'tax_query'      => [[
          'taxonomy' => 'workresult_category',
          'field'    => 'term_id',
          'terms'    => wp_list_pluck($terms, 'term_id'),
        ]],
      ]);
      if ( $q->have_posts() ) : ?>
        <section id="wr-section-related" class="container related">
          <h2>関連する事業実績</h2>
          <ul class="cards" style="display:grid;gap:20px;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));">
            <?php while ( $q->have_posts() ) : $q->the_post(); ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php
                $desc_new = function_exists('get_field') ? get_field('wr_list_description') : '';
                $desc_old = function_exists('get_field') ? get_field('wr_short_desc') : '';
                $desc     = $desc_new ?: $desc_old;
                if ( $desc ) : ?>
                  <p class="mini" style="margin:.3rem 0 0;color:#555;"><?php echo esc_html($desc); ?></p>
                <?php endif; ?>
              </li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </section>
      <?php endif; }
    ?>
  </article>
  <!-- ▲ practices レイアウト -->

<?php else : ?>

  <!-- ▼ 通常の workresult 詳細（必要に応じて既存構造へ置換） -->
  <div class="heading"><h1>Work Result<div class="ja">事業実績</div></h1></div>
  <div class="container"><?php the_title('<h2>','</h2>'); the_content(); ?></div>
  <!-- ▲ 通常 -->

<?php endif; ?>
</main>

<?php get_footer(); ?>
