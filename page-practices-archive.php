<?php
/* Template Name: Practices Archive (by workresult)
 * 指定の固定ページURL（companies / foundations）で
 * workresult をカテゴリ絞り込み表示するためのテンプレート
 */
get_header();

/**
 * ▼ マッピング設定（必要に応じて編集）
 * - 固定ページのスラッグ => 紐づける workresult_category （slug と name を両方用意）
 *   ※ まず slug を優先し、見つからなければ name で検索します。
 */
$PRACTICES_PAGE_MAP = [
  'practices-of-companies' => [
    'header_class' => 'is-companies',
    'term_slug'    => '',                   // 例: 'companies-practices'（未定なら空でOK）
    'term_name'    => '企業における実践',     // 実際のカテゴリ名に合わせて
    'heading'      => '企業における実践',
  ],
  'practices-of-foundations-and-non-profit-organizations' => [
    'header_class' => 'is-foundations',
    'term_slug'    => '',                          // 例: 'foundations-npo-practices'
    'term_name'    => '財団・非営利組織における実践',
    'heading'      => '財団・非営利組織における実践',
  ],
];

$slug = get_post_field('post_name', get_the_ID());
$conf = $PRACTICES_PAGE_MAP[$slug] ?? [
  'header_class' => 'is-default',
  'term_slug'    => '',
  'term_name'    => '',
  'heading'      => get_the_title(),
];

// term を取得（slug 優先、なければ name）
$term = null;
if ( ! empty($conf['term_slug']) ) {
  $term = get_term_by('slug', $conf['term_slug'], 'workresult_category');
}
if ( ! $term && ! empty($conf['term_name']) ) {
  $term = get_term_by('name', $conf['term_name'], 'workresult_category');
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
      <ul class="cards">
        <?php while ( $q->have_posts() ) : $q->the_post(); ?>
          <li class="card">
            <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
              <h3 class="card-ttl"><?php the_title(); ?></h3>
              <?php if ( function_exists('get_field') && ($d = get_field('wr_short_desc')) ) : ?>
                <p class="card-desc"><?php echo esc_html($d); ?></p>
              <?php endif; ?>
            </a>
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

<style>
  /* 必要があれば最低限の装飾を追加 */
  .cards { display:grid; gap:20px; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)); }
  .card a { text-decoration:none; display:block; }
  .card-ttl { margin:.5rem 0 0; font-weight:600; }
  .card-desc { margin:.35rem 0 0; color:#555; line-height:1.6; font-size:.95rem; }
</style>
<?php get_footer(); ?>
