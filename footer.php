    <footer>
        <div class="page_top">
            <a href="#top">↑</a>
        </div>
        <div class="inner">
            <div class="logo">
                <a href="<?=home_url()?>"><img src="<?=get_template_directory_uri()?>/img/logo_b.png" alt=""></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <span>組織概要</span>
                        <ul>
                            <li><a href="<?=home_url()?>/organization">法人概要</a></li>
                            <li><a href="<?=home_url()?>/message">代表理事からのご挨拶</a></li>
                            <li><a href="<?=home_url()?>/member">メンバー紹介</a></li> 
							<li><a href="<?=home_url()?>/service">サービス</a></li>
                            <li><a href="<?=home_url()?>/workresult">事業実績</a></li>
							<li><a href="<?=home_url()?>/privacypolicy">プライバシーポリシー</a></li>
							<li><a href="<?=home_url()?>/human-rights-policy">人権方針</a></li>
							<li><a href="<?=home_url()?>/recruit/">採用情報</a></li>
                        </ul>
                    </li>
                    <li><span>お知らせ</span>
                        <ul>
							<li><a href="<?=home_url()?>/topics/category/news">お知らせ</a></li>	
							<li><a href="<?=home_url()?>/topics/category/eventseminar">イベント／セミナー</a></li>	
                        </ul>
                    </li>
                    <li>
                        <span>社会的インパクト評価とは</span>
                        <ul>
                            <li><a href="<?=home_url()?>/impactassessment">社会的インパクト評価の概要</a>
												<ul>
														<li><a href="<?=home_url()?>/impactassessment/aboutsroi">SROIの概要・分析活用事例</a></li>
												</ul>
										</li>
                            
                            <li><a href="<?=home_url()?>/impactassessment/global-trends/">グローバルの潮流</a></li>
										<li>
												・活用事例
												<ul>
														<li><a href="<?=home_url()?>/impactassessment/practices-of-companies/">企業における実践</a></li>
														<li><a href="<?=home_url()?>/impactassessment/practices-of-foundations-and-non-profit-organizations/">財団・非営利組織における実践</a></li>
						</ul>
											<li>
												・データベース
												<ul>
														<li><a href="<?=home_url()?>/database/category/download/">ダウンロードコンテンツ</a></li>
														<li><a href="<?=home_url()?>/database/category/article/">インパクト評価 最新Topics</a></li>
						</ul>
										</li>
			        </ul>
                    </li>					
					<li><span>PFS/SIBとは</span>
						<ul>
							<li><a href="<?=home_url()?>/aboutsib">PFS/SIBとは</a></li>	
							<li><a href="<?=home_url()?>/sibresearch">PFS/SIBの調査・研究</a></li>								
						</ul>                            
                    </li>
                </ul>
            </nav>
			<a class="contact footer-social-impact-seminar-video" style="bottom:90px;"   href="<?=home_url()?>/online-seminar">Impact Management Seminar<div class="ja">社会的インパクトマネジメントセミナー</div></a>
            <a class="contact" style="bottom:90px;"   href="<?=home_url()?>/contact">Contact<div class="ja">お問い合わせ</div></a>

            <div class="api_footer_1" style="clear:both;"></div>
            <div style="float:left;">
                <table class="api_footer_2" border="0">
                <tr>
                <td valign="middle" align="left">
                    <?php
                        echo do_shortcode('[social_icons_group id="736"]');
                    ?>
                </td>
                </tr>
                </table>
            </div>
            <div style="clear:both"></div>

        </div>
        <div class="copyright">
            Copyright © Social Value Japan 2018 All Rights Reserved.
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
