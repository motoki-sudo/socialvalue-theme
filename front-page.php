<?php get_header(); ?>
        <script>
            $(function(){
                $('#main_visual').vegas({
                    delay: 7000,
                    timer: false,
                    transition: 'fade',
                    animation: 'kenburns',
                    slides: [
                        { src: '<?=get_template_directory_uri()?>/img/main_visual_6.jpg' },
                        { src: '<?=get_template_directory_uri()?>/img/main_visual_5.jpg' },
                        { src: '<?=get_template_directory_uri()?>/img/main_visual_4.jpg' }
                    ]
                });
            });
        </script>
        <div id="main_visual"></div>
        <div class="scroll"><a href="#topics">Scroll</a></div>
        <div id="topics" class="topics">
            <div class="inner">
                <h2>Topics<div class="ja">トピックス</div></h2>
                <ul>
                    <?php
                    $topics_query = new WP_Query(['post_type'=>'topics','posts_per_page'=>3]);
                    ?>
                    <?php while($topics_query->have_posts()): ?>
                        <?php $topics_query->the_post(); ?>
                        <li>
                            <a href="<?=get_the_permalink()?>">
                                <div class="date">
                                    <?=get_the_date('Y.n.j')?>
                                </div>
                                <div class="label">
                                    <?=get_the_terms($post->ID, 'topics_category')[0]->name?>
                                </div>
                                <div class="title"><?=get_the_title()?></div>
                                <div class="description"><?=mb_strimwidth(get_the_content(), 0, 128, '…')?></div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
                <div class="more">
                    <a href="<?=home_url()?>/topics">READ MORE</a>
                </div>
            </div>
        </div>
        <div class="about">
            <h2>What’s Social Value Japan<div class="ja">ソーシャル・バリュー・ジャパンとは</div></h2>
            <div class="description">
                Social Value Japanは、2012年に設立された社会的インパクトに特化した非営利のコンサルティング・ファームです。社会的インパクト評価と社会的投資に関して蓄積された知見をもとに、社会的事業の成長とその生産性の向上を通じて、様々な社会的課題の加速度的解決に寄与します。Social Value Japanは世界20か国に加盟団体を持つSocial Value Internationalの日本で唯一の加盟組織として、社会的インパクト評価に関するコンサルティングやトレーニング、また手法についての研究開発を中心に活動しています。
            </div>
        </div>
        <div class="contents">
            <h2>Contents<div class="ja">コンテンツ一覧</div></h2>
            <div class="link">
                <div class="etc content">
                    <div class="inner">
                        <div class="text">
                            About us<div class="ja">組織概要</div>
                        </div>
                    </div>
                    <div class="child">
                        <a href="<?=home_url()?>/organization">
                            <div class="inner">法人概要</div>
                        </a>
                        <a href="<?=home_url()?>/message">
                            <div class="inner">ご挨拶</div>
                        </a>
                        <a href="<?=home_url()?>/member">
                            <div class="inner">メンバー紹介</div>
                        </a>
                        <a href="<?=home_url()?>/workresult">
                            <div class="inner">事業実績</div>
                        </a>
                    </div>
                </div>
                <div class="content impactassessment">
                    <div class="inner">
                        <div class="text">Impact Assessment<div class="ja">社会的インパクト評価とは</div></div>
                    </div>
                    <div class="child">
                        <a href="<?=home_url()?>/impactassessment">
                            <div class="inner">社会的インパクト評価とは</div>
                        </a>
                        <a href="<?=home_url()?>/aboutsroi">
                            <div class="inner">SROIの概要・SROI分析活用事例</div>
                        </a>
                        <a href="<?=home_url()?>/aboutsib">
                            <div class="inner">SIBとは</div>
                        </a>
                        <span>
                            <div class="inner"></div>
                        </span>
                    </div>
                </div>
                <div class="content database">
                    <div class="inner">
                        <div class="text">Database<div class="ja">データベース</div></div>
                    </div>
                    <div class="child">
                        <a href="<?=home_url()?>/database/category/article">
                            <div class="inner">インパクト評価 最新Topics</div>
                        </a>
                        <a href="<?=home_url()?>/database/category/download">
                            <div class="inner">ダウンロードコンテンツ</div>
                        </a>
                        <span>
                            <div class="inner"></div>
                        </span>
                        <span>
                            <div class="inner"></div>
                        </span>
                    </div>
                </div>
            </div>
        </div>

		<div class="contents">
            <h2>Past Projects<div class="ja">事業実績</div></h2>
			<div class="logo_area">
				<h3><div class="ja">公的機関</div></h3>
				<ul>
<?php
    $args = array(
        'numberposts'       => -1,
        'offset'            => '',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_type'         => 'post',
			'category'          => 29,
        'post_status'       => 'publish',
        'suppress_filters'  => true,
        'category_name' => 'public'	// 表示したいカテゴリーのスラッグを指定
    );
    $postslist = get_posts( $args );
    foreach ($postslist as $post) :
        setup_postdata($post);
        $temp = trim(strip_tags($post->post_content));
        echo '
            <li>
                <a class="api_link_box_none" href="'.$temp.'" target="_blank" title="'.$post->post_title.'">
                    <img src="'.get_the_post_thumbnail_url($post->ID, '', array('title' => $post->post_title)).'"/>
                </a>
            </li>
        ';
	endforeach;

?>
				</ul>
			</div>
			
			<div class="logo_area">
				<h3><div class="ja">企業</div></h3>
				<ul>
<?php
    $args = array(
        'numberposts'       => -1,
        'offset'            => '',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_type'         => 'post',
			'category'          => 29,
        'post_status'       => 'publish',
        'suppress_filters'  => true,
        'category_name' => 'corporate'	// 表示したいカテゴリーのスラッグを指定
    );
    $postslist = get_posts( $args );
    foreach ($postslist as $post) :
        setup_postdata($post);
        $temp = trim(strip_tags($post->post_content));
        echo '
            <li>
                <a class="api_link_box_none" href="'.$temp.'" target="_blank" title="'.$post->post_title.'">
                    <img src="'.get_the_post_thumbnail_url($post->ID, '', array('title' => $post->post_title)).'"/>
                </a>
            </li>
        ';
	endforeach;

?>
				</ul>
			</div>
			
			<div class="logo_area">
				<h3><div class="ja">財団・非営利組織</div></h3>
				<ul>
<?php
    $args = array(
        'numberposts'       => -1,
        'offset'            => '',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_type'         => 'post',
			'category'          => 29,
        'post_status'       => 'publish',
        'suppress_filters'  => true,
        'category_name' => 'npo'	// 表示したいカテゴリーのスラッグを指定
    );
    $postslist = get_posts( $args );
    foreach ($postslist as $post) :
        setup_postdata($post);
        $temp = trim(strip_tags($post->post_content));
        echo '
            <li>
                <a class="api_link_box_none" href="'.$temp.'" target="_blank" title="'.$post->post_title.'">
                    <img src="'.get_the_post_thumbnail_url($post->ID, '', array('title' => $post->post_title)).'"/>
                </a>
            </li>
        ';
	endforeach;

?>
				</ul>
			</div>

		</div>

        <div class="contact_area">
            <a href="<?=home_url()?>/contact"><div class="button">CONTACT</div></a>
        </div>
<?php get_footer(); ?>
