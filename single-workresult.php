<?php
/**
 * Single: Work Result 詳細
 * - 実践カテゴリ（企業/財団・非営利）に属する投稿は、practicesレイアウトで表示
 * - それ以外は通常の workresult 詳細表示
 */
get_header();

/**
 * ▼ 実践カテゴリの判定に使う値（必要に応じて編集）
 *   slug が未整備なら name 判定でOK。両方用意しておくと堅牢。
 */
$PRACTICES_TERMS = [
  [
    'slug' => '',                    // 例: 'companies-practices'
    'name' => '企業における実践',
    'class'=> 'is-companies',
  ],
  [
    'slug' => '',                    // 例: 'foundations-npo-practices'
    'name' => '財団・非営利組織における実践',
    'class'=> 'is-foundations',
  ],
];

$terms = get_the_terms( get_the_ID(), 'workresult_category' );
$term_slugs = $terms ? wp_list_pluck($terms, 'slug') : [];
$term_names = $terms ? wp_list_pluck($terms, 'name') : [];

$is_practices = false;
$header_class = 'is-default';
foreach ( $PRACTICES_TERMS as $pt ) {
  if ( ($pt['slug'] && in_array($pt['slug'], $term_slugs, true)) ||
       ($pt['name'] && in_array($pt['name'], $term_names, true)) ) {
    $is_practices = true;
    $header_class = $pt['class'];
    break;
  }
}
?>
<main class="single-workresult <?php echo esc_attr($header_class); ?>">

<?php if ( $is_practices ) : ?>

  <!-- ▼ practices レイアウト -->
  <section class="hero">
    <h1 class="ttl"><?php the_title(); ?></h1>
  </section>

  <section class="meta container">
    <ul class="grid md:grid-cols-2 gap-16" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px;">
      <li><strong>ジャンル</strong><div><?php echo esc_html( function_exists('get_field') ? get_field('pd_genre') : '' ); ?></div></li>
      <li><strong>発注者</strong><div><?php echo esc_html( function_exists('get_field') ? get_field('pd_client') : '' ); ?></div></li>
      <li><strong>受注年度</strong><div><?php echo esc_html( function_exists('get_field') ? get_field('pd_year') : '' ); ?></div></li>
    </ul>
  </section>

  <section class="body container">
    <?php if ( function_exists('get_field') && ($ov = get_field('pd_overview')) ): ?>
      <h2>事業概要</h2><div class="rich"><?php echo wp_kses_post($ov); ?></div>
    <?php endif; ?>

    <?php if ( function_exists('get_field') && ($obj = get_field('pd_objective')) ): ?>
      <h2>評価目的</h2><div class="rich"><?php echo wp_kses_post($obj); ?></div>
    <?php endif; ?>

    <?php if ( function_exists('get_field') && ($methods = get_field('pd_methods')) ): ?>
      <h2>評価方法</h2>
      <ul><?php foreach ($methods as $r): ?><li><?php echo esc_html($r['text']); ?></li><?php endforeach; ?></ul>
    <?php endif; ?>

    <?php if ( function_exists('get_field') && ($interims = get_field('pd_interim')) ): ?>
      <h2>中間評価の結果</h2>
      <?php foreach ($interims as $r): ?>
        <div class="grid md:grid-cols-2 gap-6 interim-row" style="display:grid;grid-template-columns:1fr;gap:24px;margin:16px 0;">
          <div>
            <?php if (!empty($r['subtitle'])): ?><h3><?php echo esc_html($r['subtitle']); ?></h3><?php endif; ?>
            <div class="rich"><?php echo wp_kses_post($r['text']); ?></div>
          </div>
          <div class="img"><?php echo wp_get_attachment_image($r['image'] ?? 0, 'large'); ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ( function_exists('get_field') && ($util = get_field('pd_utilization')) ): ?>
      <h2>クライアントによる評価の活用</h2><div class="rich"><?php echo wp_kses_post($util); ?></div>
    <?php endif; ?>
  </section>

  <?php
  // ▼ 関連する事業実績（同カテゴリ3~5件、現在記事を除外）
  if ( $terms ) {
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
      <section class="container related">
        <h2>関連する事業実績</h2>
        <ul class="cards" style="display:grid;gap:20px;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));">
          <?php while ( $q->have_posts() ) : $q->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <?php if ( function_exists('get_field') && ($d = get_field('wr_short_desc')) ): ?>
                <p class="mini" style="margin:.3rem 0 0;color:#555;"><?php echo esc_html($d); ?></p>
              <?php endif; ?>
            </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </section>
    <?php endif; } ?>
  <!-- ▲ practices レイアウト -->

<?php else : ?>

  <!-- ▼ 通常の workresult 詳細（必要に応じて既存構造へ置換） -->
  <div class="heading"><h1>Work Result<div class="ja">事業実績</div></h1></div>
  <div class="container"><?php the_title('<h2>','</h2>'); the_content(); ?></div>
  <!-- ▲ 通常 -->

<?php endif; ?>
</main>

<?php get_footer(); ?>
