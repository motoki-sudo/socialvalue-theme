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
				<ul>
					<li><a href="https://www.mhlw.go.jp/index.html" target="_blank"><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_kouseiroudousyou.png" alt="厚生労働省"></a></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_recruit.png" alt="リクルート"></li>
					<li><img class="w60" src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_panasonic.png" alt="Panasonic"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_siif.png" alt="SIIF"></li>
					<li><img class="w80" src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_kamonohashi.png" alt="かものはし"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_sodateagenet.png" alt="育て上げネット"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_toybox.png" alt="トイボックス"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_habataku.png" alt="ハバタク"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_ileap.png" alt="iLEAP"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_jwli.png" alt="JWLI"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_shinkouekirenmei.png" alt="新公益連盟"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/02/logo_tamadaigaku.png" alt="多摩大学"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2020/07/logo_SPF.png" alt="笹川平和財団"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/01/logo_BFF.jpg" alt="BFF"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/01/logo_CSO.gif" alt="CSO"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/01/logo_kwsi.png" alt="kwsi"></li>
					<li><img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2021/02/SIMI.jpg" alt="SIMI"></li>
				</ul>
			</div>
		</div>

        <div class="contact_area">
            <a href="<?=home_url()?>/contact"><div class="button">CONTACT</div></a>
        </div>
<?php get_footer(); ?>
