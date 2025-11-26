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
<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $config_data = array(
        'slug' => $uri_segments[3],
        'post_type' => 'topics',
        'posts_per_page' => 10,
        'paged' => $uri_segments[5],
    );
    $result = api_initial_data($config_data);
    $postslist = $result['select_data'];
    $wp_query->query_vars['paged'] = $uri_segments[5];
    $wp_query->query_vars['number'] = 10;
    $wp_query->max_num_pages = $result['max_num_pages'];
?>

        <div class="heading">
            <h1>
            	<?=$category_name_en?><div class="ja"><?=$category_name?></div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li>
                <li><?= $result['term_name']; ?></li>
            </ul>
        </div>
        <nav class="button_nav">
        <?php
            $config_data = array(
                'taxonomy' => 'topics_category',
                'base_url' => home_url().'/topics/category',
            );
            $temp = api_display_category_button($config_data);
            echo $temp['display'];
        ?>
        </nav>
<div class="container">
<?php
    echo '<ul class="archive_list">';
    foreach ($postslist as $post) :
        setup_postdata($post);
        $temp_src = get_the_post_thumbnail_url($post->ID, 'large_thumbnail', array('title' => $post->post_title));
        $temp_2 = str_replace(site_url().'/','',$temp_src);
        if (is_file($temp_2))
            $temp_image = $temp_src;
        else
            $temp_image = site_url().'/wp-content/themes/socialvalue/img/no_image.jpg';
        echo '
            <li>
                <a id="api_'.$post->ID.'" href="' . get_the_permalink() . '" >
                    <img src="'.$temp_image.'" alt="'.$post->post_title.'">
                    <div class="data">
                        <div class="date">
                            '.get_the_date('Y.n.j').'
                        </div>
                        <div class="category">
                            '.api_get_taxonomy($post->ID).'
                        </div>
                    </div>
                    <div class="title">
                        '.mb_strimwidth(get_the_title(), 0, 90, '…').'
                    </div>
                    <div class="content">
                        '.mb_strimwidth(get_the_content(), 0, 240, '…').'
                    </div>
                </a>
            </li>
        ';
	endforeach;
	echo '</ul>';
?>
<?php wp_pagenavi(); ?>
</div>
<?php get_footer(); ?>
