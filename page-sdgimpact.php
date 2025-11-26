<?php get_header(); ?>
    <div class="heading">
        <h1>
            SDG Impact<div class="ja"></div>
        </h1>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?=home_url()?>">Home</a></li>
            <li>SDG Impact</li>
        </ul>
    </div>
    <nav class="button_nav">
        <ul>
            <li><a href="#overview">SDGインパクト<br>の背景と概要</a></li>
            <li><a href="#standard">SDGインパクト<br>基準について</a></li>
            <li><a href="#training">ユーザー向け<br>研修について</a></li>
            <li><a href="#resource">関連リソース</a></li>
    
        </ul>
    </nav>
    <!-- =================================================================================== SDGインパクトの背景と概要 -->
    <section id="overview">
        <h2>SDGインパクトの背景と概要</h2>
		<div class="container">
            <div class="text text-disp">
                <p>
                    SDGインパクトとは、2030年までのSDGs達成に向けて、民間資金の流れを拡大するためにUNDP（国連開発計画）が立ち上げた取り組みです。<br>
                    SDGインパクトは、投資家や企業のSDGs達成に向けた取り組みを後押しし、そのプロセスや評価のために必要な情報やツールを提供することをミッションとしています。<br>
                    現時点では、以下の4つの取り組みが進められています。
                </p>
            </div>

            <div id="card" class="card">
                <div class="inner">
                    <div class="card-items">
                    <div class="card-item">
                        <img src="<?=get_template_directory_uri()?>/img/sdgimpact_icon-01.png" alt="" />
                        <div class="card-item-title">SDGインパクト基準<br>の策定</div>
                        <div class="card-item-txt">
                        2022年2月時点では、以下の3バージョンが公開済。<br>
                        ・企業・事業体向け<br>
                        ・債権発行体向け<br>
                        ・プライベートエクイティ向け
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="<?=get_template_directory_uri()?>/img/sdgimpact_icon-02.png" alt="" />
                        <div class="card-item-title">SDGインパクト<br>教育・研修制度</div>
                        <div class="card-item-txt">
                        Duke Universityによる、SDGインパクト測定・マネジメント無料オンラインコースがCourseraで公開中。今後はSDGインパクト基準のユーザーおよび認証提供者への研修が提供される予定。
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="<?=get_template_directory_uri()?>/img/sdgimpact_icon-03.png" alt="" />
                        <div class="card-item-title">SDGインパクト<br>認証ラベルの提供</div>
                        <div class="card-item-txt">
                        SDGインパクト基準を自主適用するユーザーを対象とした、第三者認証機関による認証のフレームワークおよびSDGインパクト認証ラベルが開発されている。2022年以降に試験運用開始予定。
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="<?=get_template_directory_uri()?>/img/sdgimpact_icon-04.png" alt="" />
                        <div class="card-item-title">SDG投資情報<br>プラットフォーム</div>
                        <div class="card-item-txt">
                        SDGs達成に向けて資金の流れを促進するため、投資家や政府関係者、開発金融関係者向けのデータと分析結果を提供。
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section>


    <!-- =================================================================================== SDGインパクト基準について -->
    <section id="standard">
        <h2>SDGインパクト基準について</h2>
		<div class="container">
            <div class="text text-disp">
                <p>
                    SDGインパクト基準は、民間セクターのSDGsへの取り組みを「報告との紐づけ」から「意思決定と具体的行動」へ移行させるための組織の意思決定の枠組みと位置付けられています。<br>
                    <br>
                    具体的には、戦略・アプローチ・透明性・ガバナンスの4つの要素から構成され、これらの要素に紐付いた実践のための12の行動と推奨指標が設けられています。（詳しくはページ末尾の関連リソースをご参照下さい）<br>
                    <br>
                    2022年2月時点では、本基準および指標に基づいた自己評価ツール（企業向けのみ）が一般公開されており、企業における経営・事業のあり方をSDGインパクト基準と照らし合わせて評価することができます。<br>
                </p>
            </div>

            <div class="standard__img">
                <img src="<?=get_template_directory_uri()?>/img/sdgimpact_img-01.png" alt="">
                <p class="text text-disp">
                    SDGインパクト基準を構成する4要素<br>
                    出典：SDGインパクト基準（国連開発計画SDGインパクト, 2021, p. 7）
                </p>
            </div>

            <p class="text text-disp text-center">また、SDGインパクト基準は他の既存の取り組みを土台とし、それらを繋ぐ全体の指針となるものです。</p>

            <div class="standard__img-02">
                <img src="<?=get_template_directory_uri()?>/img/sdgimpact_img-02.png" alt="">
                <p class="text text-disp">
                    SDGインパクト基準と他の原則、フレームワーク、ツールとの関係性<br>
                    出典：SDGインパクト基準（国連開発計画SDGインパクト, 2021, p. 9）
                </p>
            </div><!-- /.starndart__img -->
        </div><!-- /.container -->
    </section>


    <!-- =================================================================================== ユーザー向け研修について -->
    <section id="training">
        <h2>ユーザー向け研修について</h2>
		<div class="container">
            <div class="text text-disp">
                <p>
                    現在SVJでは、UNDP および Social Value International (SVI) と連携しながら、SDGインパクト認証の日本ユーザー向け研修パッケージの開発・提供に向けた準備を進めています。<br>
                    <br>
                    最新情報は本ページに随時更新していきますので、適宜ご確認頂ければ幸いです。SVJによる研修についての最新情報をメールでお受け取りされたい方は、弊団体問い合わせフォームよりお知らせください。<br>
                </p>
            </div>
            <div class="training__btn">
                <a href="/contact/" class="btn btn--orange btn-c"><i class="fa far fa-envelope"></i>お問い合わせはこちら
</a>
            </div><!-- /.training__btn -->
        </div><!-- /.container -->
    </section>


    <!-- =================================================================================== 関連リソース -->
    <section id="resource">
        <h2>関連リソース</h2>
		<div class="container">
            <div class="text text-disp">
                <ul>
                    <li><a href="https://sdgimpact.undp.org/" target="_blank" rel="noopener noreferrer">SDG Impact（UNDPオリジナルページ）</a></li>
                    <li><a href="https://www.jp.undp.org/content/tokyo/ja/home/sdg-impact.html" target="_blank" rel="noopener noreferrer">SDG Impact（UNDP駐日事務所）</a></li>
                    <li><a href="https://www.jp.undp.org/content/tokyo/ja/home/library/sdgimpact_standard_enterprises.html" target="_blank" rel="noopener noreferrer">企業・事業体向けSDGインパクト基準（日本語訳）</a></li>
                    <li><a href="https://www.jp.undp.org/content/dam/tokyo/docs/Publications/Other/sdgimpact_standard_entreprises_12actions.pdf" target="_blank" rel="noopener noreferrer">企業・事業体向けSDGインパクト基準 - 実践のための12の行動（日本語訳）</a></li>
                    <li><a href="https://www.jp.undp.org/content/dam/tokyo/docs/Publications/Other/JPN_SDG_Impact_Standards_for_Enterprises_-_Self-Assessment_by_business_action.xlsx" target="_blank" rel="noopener noreferrer">企業・事業体向けSDGインパクト自己評価ツール（日本語版）</a></li>
                    <li><a href="https://sdgimpact.undp.org/" target="_blank" rel="noopener noreferrer">SDG投資情報プラットフォーム</a></li>
                    <li><a href="https://ja.coursera.org/learn/impact-for-sdgs" target="_blank" rel="noopener noreferrer">SDGsのためのインパクト測定・マネジメント（Coursera、英語のみ）</a></li>
                </ul>
            </div>
        </div><!-- /.container -->
    </section>


    <!-- =================================================================================== 関連記事 -->
    <section id="related">
        <h2>関連記事</h2>
		<div class="container">
            <div class="related__list">
                <ul>
                <?php
                // WP_Queryのパラメータを指定
                $args = array(
                    // 投稿タイプ
                    'post_type' => 'sdg_impact',
                    // 記事を3件表示
                    'posts_per_page' => 3,
                );
                // WP_Queryのオブジェクト（インスタンス）を作成
                $query = new WP_Query( $args );

                // ループ開始
                while ( $query->have_posts() ) :
                    // サブループの投稿データをセット
                    $query->the_post();
                ?>
                    <li>
                        <a href="<?=get_the_permalink()?>">
                            <div class="date">
                                <?=get_the_date('Y.n.j')?>
                            </div>
                            <div class="title"><?=get_the_title()?></div>
                            <div class="description"><?=mb_strimwidth(get_the_content(), 0, 128, '…')?></div>
                        </a>
                    </li>
                <?php
                endwhile;
                // ループ終了

                // メインクエリの投稿データに戻す
                wp_reset_postdata(); 
                ?>
                </ul>
            </div><!-- /.related__list -->
        </div><!-- /.container -->
    </section>




    <ul>

</ul>




<?php get_footer(); ?>
