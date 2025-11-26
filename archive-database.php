<?php get_header(); ?>
<?php
$tax_slug = get_query_var('taxonomy');  

$term_slug = get_query_var('term'); 
$term = get_term_by('slug', $term_slug, $tax_slug);
$category_name_en = $term->description;


?>
        <script>
            $(function(){
                if($('body').hasClass('database')){
                    if($(location).attr('hash')){
                        $('#modal').show();
                    }
                }
                $(document).on('click touchend', '.modal_button', function(event){
/*                  $('#download_link').remove();
                    $('#modal .response').remove();
*/

                    $('#download_link').html('<a href="' + $('#api_download_' + $(event.currentTarget).data('download')).attr('data-link') + '" target="_blank">PDFファイルを取得する</a>');
                    $('#download_link').css('visibility', 'hidden');
                    $('#modal').height($('body').height());
                    $('#modal_inner').css('margin-top', $(window).scrollTop() + 'px');
                    setTimeout(function(){
                        $('#modal').fadeIn();
                    }, 200);
                    $('#form_content_title').val($(event.target).data('title'));
                    form_action_url = $('#modal form').attr('action');
                    form_action_url_split = form_action_url.split('#');
                    form_action_url = '<?=home_url()?>/database/category/download/?dl=' + $(event.currentTarget).data('download') + '#' + form_action_url_split[1];
                    $('#modal form').attr('action', form_action_url);
                });
                $(document).on('click touchend', '#modal', function(event) {
                    if (!$(event.target).closest('#modal_inner').length) {
                        $('#modal').fadeOut();
                        $('#modal form')[0].reset();
                    }
                });
                $('#modal_close_button').on('click touchend', function(){
                    $('#modal').fadeOut();
                    $('#modal form')[0].reset();
                });
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ('1429' == event.detail.contactFormId ) {
        $('#download_link').css('visibility', 'visible');
    }
}, false );
            });
        </script>

<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $config_data = array(
        'slug' => $uri_segments[3],
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
            	Database<div class="ja">データベース</div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li>
                <li>Database</li>
                <li><?= $result['term_name']; ?></li>
            </ul>
        </div>
        <?php
            $config_data = array(
                'taxonomy' => 'database_category',    
                'base_url' => home_url().'/database/category',   
            );
            $temp = api_display_category_button($config_data);
            echo $temp['display'];
        ?>
        <div class="container">

<?php


    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $config_data = array(
        'slug' => $uri_segments[3],
        'post_type' => 'database',
        'posts_per_page' => 10,
        'paged' => $uri_segments[5],
    );
    $temp = api_initial_data($config_data);
    $postslist = $temp['select_data'];
    $wp_query->query_vars['paged'] = $uri_segments[5];
    $wp_query->query_vars['number'] = 10;
    $wp_query->max_num_pages = $temp['max_num_pages'];

    echo '<ul class="archive_list">';
    foreach ($postslist as $post) :   
        //print_arrays($post);  
        setup_postdata($post);
        $temp_src = get_the_post_thumbnail_url($post->ID, 'large_thumbnail', array('title' => $post->post_title));
        $temp_2 = str_replace(site_url().'/','',$temp_src);
        if (is_file($temp_2))
            $temp_image = $temp_src;
        else
            $temp_image = site_url().'/wp-content/themes/socialvalue/img/no_image.jpg';           
        echo '
            <li>
        ';
                $api_get_download_link = api_get_download_link($post->ID);
                if ($api_get_download_link != '') {
                    $href = ' class="no_link"';
                } else {
                    $href = ' href="' . get_the_permalink() . '"';
                }                
        echo '

                <a id="api_'.$post->ID.'" '.$href.' >
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
                        '.get_the_title().'
                    </div>
                    <div class="content">
                        '.mb_strimwidth(get_the_content(), 0, 240, '…').'
                    </div>
        ';
                
                if ($api_get_download_link != '') {
                    echo '
                    <div id="api_download_'.SCF::get('download').'" class="modal_button" data-title="'.get_the_title().'" data-download="'.SCF::get('download').'" data-link="'.$api_get_download_link.'">ダウンロード</div>
                    ';
                    // echo '
                    //     <div class="modal_button" data-title="'.get_the_title().'" onmouseover="$(\'#api_'.$post->ID.'\').removeAttr(\'href\');" onmouseout="$(\'#api_'.$post->ID.'\').attr(\'href\',\''. get_the_permalink().'\');" onclick="window.open(\''.$api_get_download_link.'\', \'Download\'); " >
                    //         ダウンロード
                    //     </div>
                    // ';                
                }
        echo '
                </a>
            </li>    
        ';    
	endforeach;
	echo '</ul>';
    
?>

<?php wp_pagenavi(); ?>

        </div>
<?php if ($api_get_download_link != '') { ?>
    <div id="modal">
        <div id="modal_inner">
            <div id="modal_close_button">×閉じる</div>
                   <div class="description">フォームに必要事項をご入力の上、送信してください。</div>
                   <?php echo do_shortcode('[contact-form-7 id="1429" title="ダウンロードコンテンツ_new"]')?>
            <?/* php if(isset($_GET['dl'])): */ ?>
                    <div id="download_link"><a href="<?php echo wp_get_attachment_url(post_custom('download', get_the_ID()));  ?>" target="_blank">PDFファイルを取得する</a></div>
            <?php /* endif; */ ?>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>