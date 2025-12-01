<?php
/**
 * Single: Work Result 詳細
 * - 実践カテゴリ（企業/財団・非営利）に属する投稿は、practicesレイアウトで表示
 * - それ以外は通常の workresult 詳細表示
 */
get_header();

$category_name    = '事業実績';
$category_name_en = 'Work Result';
$category_slug    = 'workresult';

$terms = get_the_terms( get_the_ID(), 'workresult_category' );
if ( is_wp_error( $terms ) || empty( $terms ) ) {
  $terms = [];
} else {
  $primary_term = reset( $terms );
  if ( $primary_term instanceof WP_Term ) {
    $category_name    = $primary_term->name ?: $category_name;
    $category_name_en = $primary_term->description ?: $category_name_en;
    $category_slug    = $primary_term->slug ?: $category_slug;
  }
}

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
  <div class="heading">
      <h1>
        <?=$category_name_en?>
        <div class="ja"><?=$category_name?></div>
      </h1>
  </div>
  <div class="breadcrumb">
      <ul>
          <li><a href="<?=home_url()?>">Home</a></li><!--
          --><li><a href="<?=home_url()?>/workresult/category/<?=$category_slug?>"><?=$category_name?></a></li><!--
          --><li><?=get_the_title()?></li>
      </ul>
  </div>
  <article class="workresult-detail">
    <div class="wr-header">
      <h1 class="ttl"><?php the_title(); ?></h1>
      <?php
      $genre  = function_exists('get_field') ? get_field('wr_genre')       : '';
      $client = function_exists('get_field') ? get_field('wr_client')      : '';
      $year   = function_exists('get_field') ? get_field('wr_order_year')  : '';
      $list_summary = function_exists('get_field') ? get_field('wr_list_description') : '';
      if ( function_exists('get_field') && ! $list_summary ) {
        $list_summary = get_field('wr_short_desc');
      }
      if ( $genre || $client || $year ) : ?>
        <ul class="wr-meta">
          <?php if ( $genre ): ?>
            <li>
              <strong>ジャンル</strong>
              <span><?php echo esc_html( $genre ); ?></span>
            </li>
          <?php endif; ?>
          <?php if ( $client ): ?>
            <li>
              <strong>発注者</strong>
              <span><?php echo esc_html( $client ); ?></span>
            </li>
          <?php endif; ?>
          <?php if ( $year ): ?>
            <li>
              <strong>受注年度</strong>
              <span><?php echo esc_html( $year ); ?></span>
            </li>
          <?php endif; ?>
        </ul>
      <?php endif; ?>
      <?php if ( $list_summary ) : ?>
        <p class="wr-list-summary"><?php echo esc_html( $list_summary ); ?></p>
      <?php endif; ?>
    </div>

    <div class="container">
      <?php
      $overview = function_exists('get_field') ? get_field('wr_overview') : '';
      $purpose  = function_exists('get_field') ? get_field('wr_evaluation_purpose') : '';
      $method_period  = function_exists('get_field') ? get_field('wr_method_period')   : '';
      $method_target  = function_exists('get_field') ? get_field('wr_method_target')   : '';
      $method_app     = function_exists('get_field') ? get_field('wr_method_approach') : '';
      $method_domain  = function_exists('get_field') ? get_field('wr_method_domain')   : '';
      $result_body  = function_exists('get_field') ? get_field('wr_result_body')  : '';
      $result_image = function_exists('get_field') ? get_field('wr_result_image') : '';
      $client_use_body  = function_exists('get_field') ? get_field('wr_client_use_body')  : '';
      $client_use_image = function_exists('get_field') ? get_field('wr_client_use_image') : '';
      $has_overview   = ! empty( $overview );
      $has_purpose    = ! empty( $purpose );
      $has_methods    = $method_period || $method_target || $method_app || $method_domain;
      $has_results    = $result_body || $result_image;
      $has_client_use = $client_use_body || $client_use_image;

      $toc_items = [];
      if ( $has_overview ) {
        $toc_items[] = [ 'id' => 'wr-section-overview', 'label' => '事業概要' ];
      }
      if ( $has_purpose ) {
        $toc_items[] = [ 'id' => 'wr-section-purpose', 'label' => '評価目的' ];
      }
      if ( $has_methods ) {
        $toc_items[] = [ 'id' => 'wr-section-methods', 'label' => '評価方法' ];
      }
      if ( $has_results ) {
        $toc_items[] = [ 'id' => 'wr-section-results', 'label' => '評価結果' ];
      }
      if ( $has_client_use ) {
        $toc_items[] = [ 'id' => 'wr-section-client-use', 'label' => 'クライアントによる評価の活用' ];
      }
      ?>

      <?php if ( $toc_items ) : ?>
        <nav class="wr-toc">
          <h2 class="wr-toc__title">目次</h2>
          <ul class="wr-toc__list">
            <?php foreach ( $toc_items as $item ) : ?>
              <li><a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </nav>
      <?php endif; ?>

      <?php if ( $has_overview ): ?>
        <section id="wr-section-overview" class="wr-section">
          <h2>事業概要</h2>
          <div class="rich"><?php echo wp_kses_post($overview); ?></div>
        </section>
      <?php endif; ?>

      <?php if ( $has_purpose ): ?>
        <section id="wr-section-purpose" class="wr-section">
          <h2>評価目的</h2>
          <div class="rich"><?php echo wp_kses_post($purpose); ?></div>
        </section>
      <?php endif; ?>

      <?php if ( $has_methods ): ?>
        <section id="wr-section-methods" class="wr-section">
          <h2>評価方法</h2>
          <ul class="wr-method-list">
            <?php if ( $method_period ) : ?>
              <li>
                <span class="wr-method-label">実施期間：</span>
                <span class="wr-method-value"><?php echo esc_html( $method_period ); ?></span>
              </li>
            <?php endif; ?>
            <?php if ( $method_target ) : ?>
              <li>
                <span class="wr-method-label">実施対象：</span>
                <span class="wr-method-value"><?php echo esc_html( $method_target ); ?></span>
              </li>
            <?php endif; ?>
            <?php if ( $method_app ) : ?>
              <li>
                <span class="wr-method-label">実施方法：</span>
                <span class="wr-method-value"><?php echo esc_html( $method_app ); ?></span>
              </li>
            <?php endif; ?>
            <?php if ( $method_domain ) : ?>
              <li>
                <span class="wr-method-label">評価領域：</span>
                <span class="wr-method-value"><?php echo esc_html( $method_domain ); ?></span>
              </li>
            <?php endif; ?>
          </ul>
        </section>
      <?php endif; ?>

      <?php if ( $has_results ): ?>
        <section id="wr-section-results" class="wr-section wr-section--two-columns">
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
      <?php endif; ?>

      <?php if ( $has_client_use ): ?>
        <section id="wr-section-client-use" class="wr-section wr-section--two-columns">
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
      <?php endif; ?>
    </div>

    <?php
    // ▼ 関連する事業実績（wr_related_workresults 優先、なければ同カテゴリ3~5件）
    $related_posts = function_exists('get_field') ? get_field('wr_related_workresults') : [];
    if ( $related_posts ) {
      ?>
      <section id="wr-section-related" class="container related wr-section wr-section--related">
        <h2>関連する事業実績</h2>
        <ul class="cards wr-related__list" style="display:grid;gap:20px;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));">
          <?php foreach ( $related_posts as $post_obj ) : setup_postdata( $post_obj ); ?>
            <li class="wr-related__item">
              <a href="<?php the_permalink(); ?>" class="wr-related__link"><?php the_title(); ?></a>
              <?php
              $desc_new = function_exists('get_field') ? get_field('wr_list_description') : '';
              $desc_old = function_exists('get_field') ? get_field('wr_short_desc') : '';
              $desc     = $desc_new ?: $desc_old;
              if ( $desc ) : ?>
                <p class="mini wr-related__desc" style="margin:.3rem 0 0;color:#555;"><?php echo esc_html( $desc ); ?></p>
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
        <section id="wr-section-related" class="container related wr-section wr-section--related">
          <h2>関連する事業実績</h2>
          <ul class="cards wr-related__list" style="display:grid;gap:20px;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));">
            <?php while ( $q->have_posts() ) : $q->the_post(); ?>
              <li class="wr-related__item">
                <a href="<?php the_permalink(); ?>" class="wr-related__link"><?php the_title(); ?></a>
                <?php
                $desc_new = function_exists('get_field') ? get_field('wr_list_description') : '';
                $desc_old = function_exists('get_field') ? get_field('wr_short_desc') : '';
                $desc     = $desc_new ?: $desc_old;
                if ( $desc ) : ?>
                  <p class="mini wr-related__desc" style="margin:.3rem 0 0;color:#555;"><?php echo esc_html($desc); ?></p>
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
  <div class="heading">
      <h1>
        <?=$category_name_en?>
        <div class="ja"><?=$category_name?></div>
      </h1>
  </div>
  <div class="breadcrumb">
      <ul>
          <li><a href="<?=home_url()?>">Home</a></li><!--
          --><li><a href="<?=home_url()?>/workresult/category/<?=$category_slug?>"><?=$category_name?></a></li><!--
          --><li><?=get_the_title()?></li>
      </ul>
  </div>
  <div class="container"><?php the_title('<h2>','</h2>'); the_content(); ?></div>
  <!-- ▲ 通常 -->

<?php endif; ?>
</main>

<?php get_footer(); ?>
