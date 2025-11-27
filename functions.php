<?php
add_theme_support('post-thumbnails');
add_image_size('large_thumbnail', '470', '282', true);
add_image_size('small_thumbnail', '224', '136', true);
function custom_post_type(){
    register_post_type('topics',
        array(
            'labels' => array(
                'name' => __('トピックス'),
                'singular_name' => __('トピックス')
            ),
            'public' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'rewrite' => array(
                'with_front' => false,
            ),
        )
    );
    register_post_type('database',
        array(
            'labels' => array(
                'name' => __('データベース'),
                'singular_name' => __('データベース')
            ),
            'public' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'rewrite' => array(
                'with_front' => false,
            ),
        )
    );
    register_post_type('workresult',
        array(
            'labels' => array(
                'name' => __('事業実績'),
                'singular_name' => __('事業実績')
            ),
            'public' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'with_front' => false,
            ),
        )
    );
    register_post_type('recruit',
        array(
            'labels' => array(
                'name' => __('採用情報'),
                'singular_name' => __('採用情報')
            ),
            'public' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'with_front' => false,
            ),
        )
    );
    register_post_type('sdg_impact',
        array(
            'labels' => array(
                'name' => __('SDG Impact'),
                'singular_name' => __('SDG Impact')
            ),
            'public' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions'
            ),
            'rewrite' => array(
                'with_front' => false,
            ),
        )
    );
}
add_action('init', 'custom_post_type');

// カスタム投稿が５個以上になっても表示位置がメディアの下にいかないようにするため
function customize_menus(){
    global $menu;
    $menu[19] = $menu[10];  //メディアの移動
    unset($menu[10]);
}
add_action( 'admin_menu', 'customize_menus' );


function custom_taxonomy(){
    register_taxonomy(
        'workresult_category',
        'workresult',
        array(
            'label' => __('カテゴリ'),
            'rewrite' => array('slug' => 'workresult_category'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'custom_taxonomy');


$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
if (!is_int(strpos($uri_path,"/page/"))) {
    function custom_taxonomy_2(){
        register_taxonomy(
            'topics_category',
            'topics',
            array(
                'label' => __('カテゴリ'),
                'rewrite' => array('slug' => 'topics_category'),
                'hierarchical' => true,
            )
        );
        register_taxonomy(
            'database_category',
            'database',
            array(
                'label' => __('カテゴリ'),
                'rewrite' => array('slug' => 'database_category'),
                'hierarchical' => true,
            )
        );
    }
    add_action('init', 'custom_taxonomy_2');
}


function custom_rewrite_rule(){
    add_rewrite_rule('workresult/category/(.+?)/?$', 'index.php?post_type=workresult&workresult_category=$matches[1]', 'top');
    add_rewrite_rule('topics/category/(.+?)/?$', 'index.php?post_type=topics&topics_category=$matches[1]', 'top');
    add_rewrite_rule('database/category/(.+?)/?$', 'index.php?post_type=database&database_category=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_rule');

function api_get_taxonomy($post_id) {
    global $wpdb;
    $results = $wpdb->get_results("
        SELECT t2.description as description
        FROM ".$wpdb->prefix."term_relationships as t1 inner join ".$wpdb->prefix."term_taxonomy as t2 on t1.term_taxonomy_id = t2.term_id
        WHERE t1.object_id = ".$post_id." "
    , OBJECT);
    $temp = $results[0]->description;
    for ($i=1;$i<count($results);$i++) {
        if ($results[$i]->description != '')
            $temp .= ', '.$results[$i]->description;
    }
    return $temp;
}

function api_get_postmeta($config_data) {
    global $wpdb;
    $results = $wpdb->get_results("
        SELECT *
        FROM ".$wpdb->prefix."postmeta
        WHERE post_id = ".$config_data['post_id']." ".$config_data['condition']
    , OBJECT);
    return $results;
}

function api_get_download_link($post_id) {
    global $wpdb;
    $return = '';
    $config_data = array(
        'post_id' => $post_id,
        'condition' => " and meta_key = 'download'",
    );
    $temp_postmeta = api_get_postmeta($config_data);

    if ($temp_postmeta[0]->meta_value > 0) {
        $results = $wpdb->get_results("
            SELECT *
            FROM ".$wpdb->prefix."posts
            WHERE id = ".$temp_postmeta[0]->meta_value
        , OBJECT);
        $return = $results[0]->guid;
    }

    return $return;
}


function print_arrays() {
    $args = func_get_args();
    echo "<pre>";
    foreach ($args as $arg) {
        print_r($arg);
    }
    echo "</pre>";
    //die();
}

function api_display_category_button($config_data) {
    global $wpdb;
    $temp = $wpdb->get_results("
        SELECT t1.*
        FROM ".$wpdb->prefix."terms t1 left join ".$wpdb->prefix."term_taxonomy t2 on t1.term_id = t2.term_id
        WHERE t2.taxonomy = '".$config_data['taxonomy']."' order by t1.term_order asc"
    , OBJECT);


    $return['display'] .= '
        <nav class="button_nav">
            <ul>
    ';
        for ($i=0;$i<count($temp);$i++) {
            $return['display'] .= '
                <li>
                    <a class="api_margin_bottom_10" href="'.$config_data['base_url'].'/'.$temp[$i]->slug.'">'.$temp[$i]->name.'</a>
                </li>
            ';
        }
    $return['display'] .= '
            </ul>
        </nav>
    ';

    return $return;
}

function api_initial_data($config_data) {
    global $wpdb;

    if ($config_data['paged'] <= 1)
        $temp_paged = 0;
    else
        $temp_paged = $config_data['paged'] - 1;

    $temp_term = $wpdb->get_results("
        SELECT term_id, name
        FROM ".$wpdb->prefix."terms
        WHERE slug = '".$config_data['slug']."'"
    , OBJECT);

    $postslist = $wpdb->get_results("
        SELECT t1.*
        FROM ".$wpdb->prefix."posts t1 inner join ".$wpdb->prefix."term_relationships t2 on t1.id = t2.object_id
        WHERE t1.post_type = '".$config_data['post_type']."' and t1.post_status = 'publish' and t2.term_taxonomy_id = ".$temp_term[0]->term_id." ORDER BY t1.post_date desc limit ".($temp_paged * $config_data['posts_per_page']).", ".$config_data['posts_per_page']
    , OBJECT);

    $temp_total = $wpdb->get_results("
        SELECT t1.id
        FROM ".$wpdb->prefix."posts t1 inner join ".$wpdb->prefix."term_relationships t2 on t1.id = t2.object_id
        WHERE t1.post_type = '".$config_data['post_type']."' and t1.post_status = 'publish' and t2.term_taxonomy_id = ".$temp_term[0]->term_id." "
    , OBJECT);

    $temp = count($temp_total) / $config_data['posts_per_page'];
    $temp_2 = explode('.',$temp);
    if ($temp_2[1] > 0)
        $temp += 1;


    $return['term_name'] = $temp_term[0]->name;
    $return['max_num_pages'] = $temp;
    $return['select_data'] = $postslist;
    return $return;
}
// === ACF: 事業実績 一覧用フィールド ===
if ( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group([
    'key' => 'group_wr_listing',
    'title' => '事業実績：一覧用',
    'location' => [[[
      'param' => 'post_type',
      'operator' => '==',
      'value' => 'workresult',
    ]]],
    'fields' => [
      [
        'key' => 'field_wr_link_url',
        'label' => 'リンクURL',
        'name' => 'wr_link_url',
        'type' => 'url',
        'instructions' => 'タイトルクリック時の遷移先URLを入力（空なら通常の個別ページに遷移）',
        'required' => 0,
      ],
      [
        'key' => 'field_wr_link_type',
        'label' => 'リンクの種別',
        'name' => 'wr_link_type',
        'type' => 'select',
        'choices' => [
          'internal' => '内部リンク',
          'external' => '外部リンク',
          'none'     => 'リンクなし（タイトルはリンクしない）',
        ],
        'default_value' => 'internal',
        'ui' => 1,
        'instructions' => 'アイコン表示・リンクターゲットの制御に使用します',
        'return_format' => 'value',
      ],
      [
        'key' => 'field_wr_short_desc',
        'label' => '簡単な説明（59文字以内）',
        'name' => 'wr_short_desc',
        'type' => 'text',
        'maxlength' => 59,
        'instructions' => '一覧のタイトル下に表示（推奨59文字以内）',
      ],
    ],
  ]);
}
// === ACF: Practices 詳細（Workresult） ===
if ( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group([
    'key' => 'group_practices_detail_wr',
    'title' => 'Practices 詳細（Workresult）',
    'location' => [[[
      'param' => 'post_type',      // ★ここがポイント
      'operator' => '==',
      'value' => 'workresult',     // 事業実績投稿すべてで表示
    ]]],
    'fields' => [
      ['key'=>'pd_genre','label'=>'ジャンル','name'=>'pd_genre','type'=>'text'],
      ['key'=>'pd_client','label'=>'発注者','name'=>'pd_client','type'=>'text'],
      ['key'=>'pd_year','label'=>'受注年度','name'=>'pd_year','type'=>'text'],
      [
        'key'=>'pd_overview',
        'label'=>'事業概要',
        'name'=>'pd_overview',
        'type'=>'wysiwyg',
        'tabs'=>'all',
        'toolbar'=>'full',
        'media_upload'=>0,
      ],
      [
        'key'=>'pd_objective',
        'label'=>'評価目的',
        'name'=>'pd_objective',
        'type'=>'wysiwyg',
        'tabs'=>'all',
        'toolbar'=>'full',
        'media_upload'=>0,
      ],
      [
        'key'=>'pd_methods',
        'label'=>'評価方法',
        'name'=>'pd_methods',
        'type'=>'repeater',
        'layout'=>'table',
        'button_label'=>'+方法を追加',
        'sub_fields' => [
          [
            'key'=>'pd_methods_text',
            'label'=>'テキスト',
            'name'=>'text',
            'type'=>'text',
          ],
        ],
      ],
      [
        'key'=>'pd_interim',
        'label'=>'中間評価の結果',
        'name'=>'pd_interim',
        'type'=>'repeater',
        'layout'=>'row',
        'button_label'=>'+ブロックを追加',
        'sub_fields' => [
          [
            'key'=>'pd_interim_sub',
            'label'=>'サブタイトル',
            'name'=>'subtitle',
            'type'=>'text',
          ],
          [
            'key'=>'pd_interim_txt',
            'label'=>'本文',
            'name'=>'text',
            'type'=>'wysiwyg',
            'tabs'=>'all',
            'toolbar'=>'basic',
            'media_upload'=>0,
          ],
          [
            'key'=>'pd_interim_img',
            'label'=>'画像',
            'name'=>'image',
            'type'=>'image',
            'return_format'=>'id',
            'preview_size'=>'medium',
          ],
        ],
      ],
      [
        'key'=>'pd_utilization',
        'label'=>'クライアントによる評価の活用',
        'name'=>'pd_utilization',
        'type'=>'wysiwyg',
        'tabs'=>'all',
        'toolbar'=>'full',
        'media_upload'=>0,
      ],
      [
        'key'=>'pd_related_category',
        'label'=>'関連記事の元となるカテゴリ',
        'name'=>'pd_related_category',
        'type'=>'taxonomy',
        'taxonomy'=>'workresult_category',
        'field_type'=>'select',
        'return_format'=>'id',
        'add_term'=>0,
      ],
    ],
  ]);
}

// === ACF: 事業実績：本文（v2） ===
if ( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group([
    'key'      => 'group_wr_detail_v2',
    'title'    => '事業実績：本文（v2）',
    'location' => [[[
      'param'    => 'post_type',
      'operator' => '==',
      'value'    => 'workresult',
    ]]],
    'fields' => [
      [
        'key'           => 'field_wr_genre_v2',
        'label'         => 'ジャンル',
        'name'          => 'wr_genre',
        'type'          => 'text',
        'instructions'  => '例）社会的インパクト評価 など',
      ],
      [
        'key'           => 'field_wr_client_v2',
        'label'         => '発注者',
        'name'          => 'wr_client',
        'type'          => 'text',
        'instructions'  => '例）〇〇株式会社 など',
      ],
      [
        'key'           => 'field_wr_order_year_v2',
        'label'         => '受注年度',
        'name'          => 'wr_order_year',
        'type'          => 'text',
        'instructions'  => '例）2017年度〜2018年度 など',
      ],
      [
        'key'           => 'field_wr_overview_v2',
        'label'         => '事業概要',
        'name'          => 'wr_overview',
        'type'          => 'wysiwyg',
        'instructions'  => '事業概要の本文を入力',
        'toolbar'       => 'full',
        'media_upload'  => 1,
      ],
      [
        'key'           => 'field_wr_evaluation_purpose_v2',
        'label'         => '評価目的',
        'name'          => 'wr_evaluation_purpose',
        'type'          => 'wysiwyg',
        'instructions'  => '評価の目的の本文を入力',
        'toolbar'       => 'full',
        'media_upload'  => 1,
      ],
      [
        'key'           => 'field_wr_method_period_v2',
        'label'         => '評価方法：実施期間',
        'name'          => 'wr_method_period',
        'type'          => 'text',
        'instructions'  => '例）2018年8月〜2019年3月（8ヶ月間）',
      ],
      [
        'key'           => 'field_wr_method_target_v2',
        'label'         => '評価方法：実施対象',
        'name'          => 'wr_method_target',
        'type'          => 'text',
        'instructions'  => '例）〇〇市立△△中学校 など',
      ],
      [
        'key'           => 'field_wr_method_approach_v2',
        'label'         => '評価方法：実施方法',
        'name'          => 'wr_method_approach',
        'type'          => 'text',
        'instructions'  => '例）アンケート調査およびインタビューを実施 など',
      ],
      [
        'key'           => 'field_wr_method_domain_v2',
        'label'         => '評価方法：評価領域',
        'name'          => 'wr_method_domain',
        'type'          => 'text',
        'instructions'  => '例）キャリア教育の育成の観点から、9つの領域で評価 など',
      ],
      [
        'key'           => 'field_wr_result_body_v2',
        'label'         => '評価結果（本文）',
        'name'          => 'wr_result_body',
        'type'          => 'wysiwyg',
        'instructions'  => '評価結果の本文を入力',
        'toolbar'       => 'full',
        'media_upload'  => 1,
      ],
      [
        'key'           => 'field_wr_result_image_v2',
        'label'         => '評価結果（画像）',
        'name'          => 'wr_result_image',
        'type'          => 'image',
        'instructions'  => '補足資料などの画像があれば設定',
        'return_format' => 'array',
        'preview_size'  => 'medium',
      ],
      [
        'key'           => 'field_wr_client_use_body_v2',
        'label'         => 'クライアントによる評価の活用（本文）',
        'name'          => 'wr_client_use_body',
        'type'          => 'wysiwyg',
        'instructions'  => 'クライアント側でどのように活用されているかを入力',
        'toolbar'       => 'full',
        'media_upload'  => 1,
      ],
      [
        'key'           => 'field_wr_client_use_image_v2',
        'label'         => 'クライアントによる評価の活用（画像）',
        'name'          => 'wr_client_use_image',
        'type'          => 'image',
        'return_format' => 'array',
        'preview_size'  => 'medium',
      ],
      [
        'key'           => 'field_wr_related_workresults_v2',
        'label'         => '関連する事業実績',
        'name'          => 'wr_related_workresults',
        'type'          => 'relationship',
        'post_type'     => [ 'workresult' ],
        'filters'       => [ 'search' ],
        'return_format' => 'object',
        'instructions'  => '関連する事業実績があれば選択',
      ],
    ],
  ]);
}

// === ACF: 事業実績：一覧用（v2） ===
if ( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group([
    'key'      => 'group_wr_listing_v2',
    'title'    => '事業実績：一覧用（v2）',
    'location' => [[[
      'param'    => 'post_type',
      'operator' => '==',
      'value'    => 'workresult',
    ]]],
    'fields' => [
      [
        'key'          => 'field_wr_list_description_v2',
        'label'        => '簡単な説明（59文字以内）',
        'name'         => 'wr_list_description',
        'type'         => 'text',
        'instructions' => '/workresult や 活用事例一覧 で表示する短い説明文（最大59文字）',
      ],
    ],
  ]);
}

?>
