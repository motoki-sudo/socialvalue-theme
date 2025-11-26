<?php
/**
 * Archive: Work Result 一覧（ACF対応版）
 * - タイトルリンク先：ACF wr_link_url（未入力時は個別ページ）
 * - リンク種別：ACF wr_link_type（internal / external / none）
 * - 説明文：ACF wr_short_desc（59文字以内推奨）
 */
get_header();

// カテゴリページかどうか（既存動作を踏襲）
if ( is_tax() ) {
    $tax_slug   = get_query_var('taxonomy');
    $term_slug  = get_query_var('term');
    $term       = get_term_by('slug', $term_slug, $tax_slug);
    $category_name    = $term ? $term->name : '';
    $category_name_en = $term ? $term->description : '';
} else {
    $category_name    = 'トピックス一覧';
    $category_name_en = 'Topics';
}
?>
        <div class="heading">
            <h1>
                Work Result<div class="ja">事業実績</div>
            </h1>
        </div>

        <div class="breadcrumb">
            <ul>
                <li><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
                <li>Work Result</li>
            </ul>
        </div>

        <nav class="button_nav">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/workresult' ) ); ?>">事業実績一覧</a></li>
                <?php
                $wr_terms = get_terms( array(
                    'taxonomy'   => 'workresult_category',
                    'hide_empty' => false,
                ) );
                if ( ! is_wp_error( $wr_terms ) && $wr_terms ) :
                    foreach ( $wr_terms as $category ) : ?>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/workresult/category/' . $category->slug ) ); ?>">
                                <?php echo esc_html( $category->name ); ?>
                            </a>
                        </li>
                    <?php endforeach;
                endif; ?>
            </ul>
        </nav>

        <div class="container">
            <ul class="result_list">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php
                    // ===== ACF 取得 =====
                    $url  = function_exists('get_field') ? get_field('wr_link_url')   : '';
                    $type = function_exists('get_field') ? get_field('wr_link_type') : '';
                    $desc = function_exists('get_field') ? get_field('wr_short_desc'): '';

                    // デフォルト値やフォールバック
                    $type = $type ? $type : 'internal'; // internal / external / none
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

                    // アイコン（必要に応じて差し替え可）
                    $icon_html = '';
                    if ( $type === 'external' ) {
                        $icon_html = '<span class="wr-icon wr-icon-external" aria-label="外部リンク" title="外部リンク">↗</span>';
                    } elseif ( $type === 'internal' ) {
                        $icon_html = '<span class="wr-icon wr-icon-internal" aria-label="内部リンク" title="内部リンク">→</span>';
                    }

                    // カテゴリ名（先頭のみ）
                    $terms = get_the_terms( get_the_ID(), 'workresult_category' );
                    $cat_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
                    ?>
                    <li>
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
                <?php endwhile; endif; ?>
            </ul>

            <?php if ( function_exists( 'wp_pagenavi' ) ) { wp_pagenavi(); } ?>
        </div>

        <style>
            /* 簡易スタイル（必要に応じテーマCSSへ移動） */
            .wr-icon { display:inline-block; margin-left:.35em; font-size:.9em; }
            .wr-desc { margin:.3rem 0 0; color:#555; line-height:1.6; }
            .result_list .title a { text-decoration: none; }
        </style>
<?php get_footer(); ?>
