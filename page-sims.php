<?php
/*
Template Name: management-system
*/
?>

<!-- --------------------------------------------- Header(header-3.php) -->
<?php get_header("3"); ?>

    <div>
        <a href="<?php echo home_url();?>" id="svj_logo"></a>
    </div>
</header>

  <main>
    <!-- --------------------------------------------- hero_section -->
    <section class="hero">
      <div class="container">
        <div class="heading-wrap">
            <h1 class="heading">IMPACT FLOW</h1>
            <p class="heading-small">社会的インパクト・マネジメント<br>オンラインシステム</p>
        </div>
      </div>
      <!-- <div class="vl-line hero-line"></div> -->
      <nav class="nav-wrap">
      <ul class="nav-items">
        <li class="nav-item">
          <a class="nav-anchor" href="#intro">
            <p class="ibm">Introduction</p>
            <hr>
            <span>紹介</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/social-impact-management-system/#overview'); ?>">
            <p class="ibm">Overview</p>
            <hr>
            <span class="pc tb">システム概要</span>
            <span class="sp">概要</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/social-impact-management-system/#case'); ?>">
            <p class="ibm">Case</p>
            <hr>
            <span class="pc tb">システム導入事例</span>
            <span class="sp">導入事例</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/social-impact-management-system/#method'); ?>">
            <p class="ibm">Method</p>
            <hr>
            <span>導入方法</span>
          </a>
        </li>
      </ul>
    </nav>
    </section>
    <!-- --------------------------------------------- intro_section -->
    <section class="intro" id="intro">
      <!-- <div class="vl-line intro-line-upper"></div> -->
      <div class="sec-container">
        <h2 class="section-name-box ibm">Introduction</h2>
        <p class="section-name-small">紹介</p>

        <div class="section-inner-wrap">
            <h3 class="intro-title">
社会的インパクト・マネジメントに必要なロジックモデルの設定や指標設定、<br class="pc">パフォーマンス管理等を一括してオンラインで実施することができます。
            </h3>
            <p class="intro-content">
これまでの社会的インパクト評価やマネジメントの実践においては、その評価設計や、参照する指標設定に専門性が必要とされ、外部のコンサルタントに依頼することが一般的でした。<br>
				現在では、これらの手法についての認知は広まりましたが、依然として導入には困難が多いことが課題として指摘されています。<br>
				本システムの活用により、社会的インパクト評価・マネジメントの実施プロセスを、標準的なオンラインでのフォーマットを提供、指標についての参照データやケーススタディを提供することで、自組織での社会的インパクト導入を支援します。<br>
				導入に際して、コンサルタントから得ることが必要なサポートを最小限にし、効率的な社会的インパクト評価・マネジメントの実施が可能になります。
            </p>
        </div><!-- /.section-inner-wrap -->
      </div>
    </section>
    <!-- --------------------------------------------- overview_section -->
    <section id="overview" class="overview">
      <div class="sec-container" id="video">
        <h2 class="section-name-box">Overview</h2>
        <p class="section-name-small">システム概要</p>
        <div class="video-contents">
          <div id="trailer-content" class="video-each-content">
            <div class="vimeo">
              <iframe src="https://player.vimeo.com/video/712755853" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>

            </div>
            <div class="section-inner-wrap">
                <p class="video-title">本システムでは、「社会的インパクト評価に関するオンラインシステム」と「動画によるオンライン学習ツール」をご提供しています。</p>
              <div class="video-description">
                <p class="video-description-ttl">
                    １．社会的インパクト評価に関するオンラインシステム「IMPACT FLOW」
                </p><!-- /.video-description-ttl -->
                <p class="video-description-txt">
                    ロジックモデルの作成や指標の設定など、社会的インパクト評価・マネジメントの実施プロセスを、標準的なオンラインでのフォーマットを用いて実施することが出来ます。
                </p><!-- /.video-description-txt -->
                <p class="video-description-ttl">
                    ２．動画によるオンライン学習ツール
                </p>
                <p class="video-description-txt">
                    IMPACT FLOWを利用するにあたり参考となる、社会的インパクト評価の概要から最新潮流まで、動画を用いて学ぶことが出来ます。
                </p>
              </div>
              <p class="video-description-txt2">本システムのご利用にご関心をお持ちいただければ、システムの詳細や利用料等、以下のボタンから必要事項を記入の上、お問い合わせください。
</p>
              <a id="trailer-button" class="video-tobuy" href="<?php echo home_url('/contact'); ?>">
                お問い合わせ
              </a>
          </div>
        </div>
      </div>
    </section>

    <!-- --------------------------------------------- Method_section -->
    <section class="method" id="method">
      <div class="sec-container">
        <h2 class="section-name-box">Method</h2>
        <p class="section-name-small">システム導入方法</p>

        <div class="section-inner-wrap">

            <p class="method-discription-txt1">IMPACT FLOWは、社会的インパクト評価・マネジメントの以下のそれぞれの段階で活用することが可能です。</p>

            <ul class="method-discription-txt2">
                <li>・テーマに該当するロジックモデル例や指標事例の参照</li>
                <li>・オンラインツールによるロジックモデルの構築</li>
                <li>・オンラインツールによる成果指標の設定</li>
                <li>・設定した成果指標のモニタリング</li>
            </ul>

            <div class="method-image-wrap">
                <img src="<?php bloginfo('template_directory'); ?>/img/sims-img-02.jpg" alt="">
                <img src="<?php bloginfo('template_directory'); ?>/img/sims-img-03.jpg" alt="">
                <img src="<?php bloginfo('template_directory'); ?>/img/sims-img-04.jpg" alt="">
                <img src="<?php bloginfo('template_directory'); ?>/img/sims-img-05.jpg" alt="">
            </div><!-- /.method-image -->

        </div><!-- /.method-wrap -->

      </div>
    </section>
    <!-- --------------------------------------------- Case_section -->
    <section class="case" id="case">
      <div class="sec-container">
        <h2 class="section-name-box">Case</h2>
        <p class="section-name-small">システム導入事例</p>
        
        <div class="section-inner-wrap">

            <div class="case-contents">
                準備中です...
            </div><!-- /.case-contents -->

        </div>
      </div>
    </section>
  </main>

  <!-- --------------------------------------------- Footer(footer-3.php) -->
  <?php get_footer("3"); ?>
