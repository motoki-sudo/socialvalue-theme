<?php
$current_post_id = get_query_var('p');
$current_post = get_post($current_post_id);
$body_class_list = [];
if(!is_front_page()){
    array_push($body_class_list, 'sub');
}
if(is_page()){
    array_push($body_class_list, $current_post->post_name);
} elseif(is_post_type_archive('topics')||is_singular('topics')) {
    array_push($body_class_list, 'topics');
} elseif(is_post_type_archive('database')||is_singular('database')) {
    array_push($body_class_list, 'database');
} elseif(is_post_type_archive('workresult')) {
    array_push($body_class_list, 'workresult');
} elseif(is_post_type_archive('recruit')) {
    array_push($body_class_list, 'recruit');
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=get_bloginfo('stylesheet_url')?>">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/vegas/2.4.0/vegas.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/vegas/2.4.0/vegas.min.js"></script>
        <script src="<?=get_template_directory_uri()?>/js/script.js"></script>
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <link rel="stylesheet" href="<?= site_url(); ?>/wp-content/themes/socialvalue/sass/public.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    </head>
		<?php wp_head()?>
    <body id="top" <?=body_class(implode(' ', $body_class_list))?>>
        <header class="fixed">
            <div class="logo">
                <a href="<?=home_url()?>"></a>
            </div>
            <div id="nav_button"></div>
            <nav>
                <ul>
                    <li>
                        <span class="parent_nav">About us<div class="ja">組織概要</div>
                            <ul>
                                <li>
                                    <a href="/organization">法人概要</a>
                                </li>
                                <li>
                                    <a href="/message">代表理事からのご挨拶</a>
                                </li>
                                <li>
                                    <a href="/member">メンバー紹介</a>
                                </li>
                                <li>
                                    <a href="<?=home_url()?>/service">サービス</a>
                                </li>
                                <li>
                                    <a href="/workresult">事業実績</a>
                                </li>
                                <li>
                                    <a href="<?=home_url()?>/recruit">採用情報</a>
                                </li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <span class="parent_nav">News<div class="ja">お知らせ</div>
                            <ul>
                                <li>
                                    <a href="<?=home_url()?>/topics/category/news">お知らせ</a>
                                </li>
                                <li>
                                    <a href="<?=home_url()?>/topics/category/eventseminar">イベント / セミナー</a>
                                </li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <span class="parent_nav">Impact Assessment<div class="ja">社会的インパクト評価とは</div>
                            <ul>
                                <li class="sub_parent">
									<span class="parent_nav"><a class="hv_wh" href="/impactassessment">社会的インパクト評価の概要</a>
                                        <ul>
                                            <li>
                                                <a href="/impactassessment/aboutsroi">SROIの概要・分析活用事例</a>
                                            </li>
                                        </ul>
                                    </span>
                                </li>
                                <li>
									<a href="/impactassessment/global-trends/">グローバルの潮流</a>
                                </li>
                                <li class="sub_parent">
                                    <span class="parent_nav">活用事例
                                        <ul>
                                            <li>
                                                <a href="/impactassessment/practices-of-companies/">企業における実践</a>
                                            </li>
                                            <li>
                                                <a href="/impactassessment/practices-of-foundations-and-non-profit-organizations/">財団・非営利組織における実践</a>
                                            </li>
                                        </ul>
                                    </span>
                                </li>
                                <li class="sub_parent">
                                    <span class="parent_nav">データベース
                                        <ul>
                                            <li>
                                                <a href="/database/category/article">インパクト評価 最新Topics</a>
                                            </li>
                                            <li>
                                                <a href="/database/category/download">ダウンロードコンテンツ</a>
                                            </li>
                                        </ul>
                                    </span>
                                </li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <span class="parent_nav">PFS/SIB<div class="ja">PFS/SIBとは</div>
                            <ul>
                                <li>
                                    <a href="/aboutsib">PFS/SIBとは</a>
                                </li>
                                <li>
                                    <a href="/sibresearch">PFS/SIBの調査・研究</a>
                                </li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <a href="<?=home_url()?>/sdgimpact">SDG Impact Certification<div class="ja">SDG Impact認証</div></a>
                    </li>
                    <li>
                        <a href="<?=home_url()?>/social-impact-management-system">Impact Management System<div class="ja">社会的インパクトマネジメントシステム</div></a>
                    </li>
                    <li>
                        <a href="<?=home_url()?>">Japanese<div class="ja">日本語ページへ</div></a>
                    </li>
                    <li>
                        <a class="header-social-impact-seminar-video" href="<?=home_url()?>/online-seminar">Impact Management Seminar<div class="ja">社会的インパクトマネジメントセミナー</div></a>
                    </li>
                    <li>
                        <a href="<?=home_url()?>/contact">Contact<div class="ja">お問い合わせ</div></a>
                    </li>
                </ul>
            </nav>
        </header>
