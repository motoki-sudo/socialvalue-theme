<?php
/* Template Name: Practices Archive (by workresult)
 * 指定の固定ページURL（companies / foundations）で
 * workresult をカテゴリ絞り込み表示するためのテンプレート
 */
get_header();

/**
 * ▼ マッピング設定（必要に応じて編集）
 * - 固定ページのスラッグ => 紐づける workresult_category（slug ベース）
 */
$PRACTICES_PAGE_MAP = [
  'practices-of-companies' => [
    'header_class' => 'is-companies',
    'term_slug'    => 'companies-practices',
    'heading'      => '企業における実践',
  ],
  'practices-of-foundations-and-non-profit-organizations' => [
    'header_class' => 'is-foundations',
    'term_slug'    => 'foundations-npo-practices',
    'heading'      => '財団・非営利組織における実践',
  ],
];

$slug = get_post_field('post_name', get_the_ID());
$conf = $PRACTICES_PAGE_MAP[$slug] ?? [
  'header_class' => 'is-default',
  'term_slug'    => '',
  'heading'      => get_the_title(),
];

// term を取得（slug ベース）
$term = null;
if ( ! empty($conf['term_slug']) ) {
  $term = get_term_by('slug', $conf['term_slug'], 'workresult_category');
}

// クエリ
$paged = max(1, get_query_var('paged'));
$args = [
  'post_type'      => 'workresult',
  'posts_per_page' => 12,
  'paged'          => $paged,
];
if ( $term ) {
  $args['tax_query'] = [[
    'taxonomy' => 'workresult_category',
    'field'    => 'term_id',
    'terms'    => $term->term_id,
  ]];
}
$q = new WP_Query($args);
?>
<main class="practices-archive <?php echo esc_attr($conf['header_class']); ?>">
  <div class="heading">
    <h1>
      <?php echo esc_html($conf['heading']); ?>
      <div class="ja">実践一覧</div>
    </h1>
  </div>

  <div class="breadcrumb">
    <ul>
      <li><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
      <li><?php echo esc_html($conf['heading']); ?></li>
    </ul>
  </div>

  <section class="container list">
    <?php if ( $q->have_posts() ) : ?>
      <ul class="result_list">
        <?php while ( $q->have_posts() ) : $q->the_post(); ?>
          <?php
            // リンク判定（archive-workresult.php と同様のロジック）
            $url  = function_exists('get_field') ? get_field('wr_link_url')   : '';
            $type = function_exists('get_field') ? get_field('wr_link_type') : '';
            $desc = function_exists('get_field') ? get_field('wr_list_description') : '';
            if ( function_exists('get_field') && ! $desc ) {
              $desc = get_field('wr_short_desc');
            }
            $type = $type ? $type : 'internal';
            $use_link = true;
            if ( $type === 'none' ) {
              $use_link = false;
              $url = '';
            } else {
              if ( empty( $url ) ) {
                $url  = get_permalink();
                $type = 'internal';
              }
            }
            // アイコン
            $icon_html = '';
            if ( $type === 'external' ) {
              $icon_html = '<span class="wr-link-icon wr-link-icon--external"></span>';
            } elseif ( $type === 'internal' ) {
              $icon_html = '<span class="wr-link-icon wr-link-icon--internal" aria-hidden="true"></span>';
            }
            $terms = get_the_terms( get_the_ID(), 'workresult_category' );
            $cat_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
          ?>
          <li class="wr-archive-item">
            <div class="data">
              <div class="date"><?php echo esc_html( get_the_date( 'Y.n.j' ) ); ?></div>
              <?php if ( $cat_name ) : ?>
                <div class="category"><?php echo esc_html( $cat_name ); ?></div>
              <?php endif; ?>
            </div>
            <div class="title">
              <?php if ( $use_link && $url ) : ?>
                <a href="<?php echo esc_url( $url ); ?>" <?php echo ($type === 'external') ? 'target="_blank" rel="noopener"' : ''; ?>>
                  <?php echo esc_html( get_the_title() ); ?>
                  <?php echo $icon_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </a>
              <?php else : ?>
                <?php echo esc_html( get_the_title() ); ?>
              <?php endif; ?>
            </div>
            <?php if ( ! empty( $desc ) ) : ?>
              <p class="wr-desc"><?php echo esc_html( $desc ); ?></p>
            <?php endif; ?>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>

      <div class="pager">
        <?php if ( function_exists('wp_pagenavi') ) { wp_pagenavi(['query' => $q]); } ?>
      </div>
    <?php else : ?>
      <p>現在、掲載準備中です。</p>
    <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
