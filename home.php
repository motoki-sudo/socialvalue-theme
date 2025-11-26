<?php get_header(); ?>
<?php
if(is_tax()){
    $tax_slug = get_query_var('taxonomy');  
    $term_slug = get_query_var('term'); 
    $term = get_term_by('slug', $term_slug, $tax_slug);
    $category_name = $term->name;
    $category_name_en = $term->description;
} else {
    $category_name = 'トピックス一覧';
    $category_name_en = 'Topics';
}
?>
        <div class="heading">
            <h1>
            	<?=$category_name_en?><div class="ja"><?=$category_name?></div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li>
                <li><?=$category_name_en?></li>
            </ul>
        </div>
        <nav class="button_nav">
            <ul>
                <li><a href="<?=home_url()?>/topics">トピックス一覧</a></li><!--
                --><li><a href="<?=home_url()?>/topics/category/news">お知らせ</a></li><!--
                --><li><a href="<?=home_url()?>/topics/category/eventseminar">イベント/セミナー</a></li>
            </ul>
        </nav>
        <div class="container">
            <ul class="archive_list">
                <?php while(have_posts()): ?>
                    <?php the_post(); ?>
                    <li>
                        <a href="<?=get_the_permalink()?>">
                            <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large_thumbnail')?>" alt="">
                            <div class="data">
                                <div class="date">
                                    <?=get_the_date('Y.n.j')?>
                                </div>
                                <div class="category">
                                    <?=get_the_terms($post->id, 'topics_category')[0]->name?>
                                </div>
                            </div>
                            <div class="title">
                                <?=get_the_title()?>
                            </div>
                            <div class="content">
                                <?=mb_strimwidth(get_the_content(), 0, 240, '…')?>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_pagenavi(); ?>
        </div>
<?php get_footer(); ?>