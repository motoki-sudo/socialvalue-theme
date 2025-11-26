<?php
/*
Template Name: online-seminar
*/
?>
<?php get_header("2"); ?>
    <div>
      <a href="<?php echo home_url();?>" id="svj_logo"></a>
    </div>
    <nav class="nav-wrap">
      <ul class="nav-items">
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/online-seminar/#intro'); ?>">
            <p class="ibm">Introduction</p>
            <hr>
            <span>紹介</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/online-seminar/#video'); ?>">
            <p class="ibm">Video</p>
            <hr>
            <span>動画</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/online-seminar/#buy'); ?>">
            <p class="ibm">Buy</p>
            <hr>
            <span>購入</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-anchor" href="<?php echo home_url('/contact'); ?>">
            <p class="ibm">Contact</p>
            <hr>
            <span>お問い合わせ</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="hero">
      <div class="container">
        <div class="heading-wrap">
          <h1 class="heading ibm">
            Social Impact
            <span>Seminar Video</span>
          </h1>
        </div>
      </div>
      <div class="vl-line hero-line"></div>
    </section>
    <section class="intro" id="intro">
      <div class="vl-line intro-line-upper"></div>
      <div class="container">
        <h2 class="section-name-box ibm">Introduction</h2>
        <h3 class="intro-title">
          社会的インパクト評価や<br class="sp">マネジメントについて、<br>
          基礎から最新の潮流まで、<br>
          セミナー映像で学ぶことができます。
        </h3>
        <p class="intro-content">
          少子高齢化の進行など、社会構造 が急速に変化する中で、<br class="pc">
          これまで通りの政策や手法では深刻化する社会課題に対応することが難しい現在、<br class="pc">
          これまでと違った新しい手法やアプローチでの社会課題解決が求められている事は明らかです。<br class="pc">
          新しい手法をデザインする過程において、それらの取り組みが「どのように」課題解決に貢献するのか、<br class="pc">
          また「どれだけ」貢献するのかという視点を持って、これらの取り組みを評価し、その生産性や精度を高め、<br class="pc">より良いプロジェクトや事業の構築を推進していくのかが、非営利組織や助成財団のみならず、<br class="pc">
          企業や行政にも大きな関心となっています。<br class="pc">
          本セミナーを通じて、社会課題の解決に貢献する「社会的インパクト評価」や<br class="pc">
          「ソーシャルインパクトボンド」等を学んでいただき、ご自身の事業や活動の発展に<br class="pc">
          つなげていただけたらと考えています。
        </p>
      </div>
      <div class="vl-line intro-line-lower"></div>
    </section>
    <section class="video">
      <div class="container" id="video">
        <h2 class="section-name-box">Trailer Video</h2>
        <div class="video-contents">
          <div id="trailer-content" class="video-each-content">
            <div class="vimeo">
              <iframe src="https://player.vimeo.com/video/488342140" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
            <div id="trailer-info-wrap" class="video-info-wrap">
                <h4 class="video-title">
                  社会的インパクト・マネジメント<br class="sp">オンライン・セミナー紹介動画
                </h4>
              <hr>
              <p class="video-description">
                無料でご視聴いただける本講座の紹介動画です。
              </p>
              <a id="trailer-button" class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <h2 class="section-name-box">Video</h2>
        <div class="video-contents">
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail01.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
                <h4 class="video-title">
                  社会的インパクト概論１<br class="sp">「社会的インパクト評価」
                </h4>
              <hr>
              <p class="video-description">
                社会的インパクト評価の概念や考え方だけでなく、社会的インパクト評価が注目されている社会的背景やニーズ、その効果についても学ぶことが出来ます。
              </p>
              <ul class="video-info">
                <li>2コマ</li>
                <li>約56分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg"  style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail02.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                社会的インパクト概論２「社会的インパクト・マネジメント」
              </h4>
              <hr>
              <p class="video-description">
                ご自身の事業や活動で社会的インパクトを創出していくうえで有効である、社会的インパクト・マネジメントの概念やプロセスについて解説しています。
              </p>
              <ul class="video-info">
                <li>3コマ</li>
                <li>約32分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail03.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                導入事例：企業における社会的インパクト・マネジメント導入
              </h4>
              <hr>
              <p class="video-description">
                企業における社会的インパクト・マネジメントの導入について、事例を交えて解説します。
              </p>
              <ul class="video-info">
                <li>1コマ</li>
                <li>約20分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail04.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                導入事例：非営利組織における社会的インパクト・マネジメント
              </h4>
              <hr>
              <p class="video-description">
                企業における社会的インパクト・マネジメントの導入について、事例を交えて解説します。
              </p>
              <ul class="video-info">
                <li>1コマ</li>
                <li>約22分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg"  style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail05.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                社会的インパクト評価のデザインと導入（１）
              </h4>
              <hr>
              <p class="video-description">
                社会的インパクト評価の設計について、アウトカムの考え方や調査票の作成など、基礎から学ぶことができる講座となっています。
              </p>
              <ul class="video-info">
                <li>2コマ</li>
                <li>約45分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail06.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                社会的インパクト評価のデザインと導入（２）
              </h4>
              <hr>
              <p class="video-description">
                社会的インパクト評価における分析の入門講座です。基本的な分析方法からデータの活用方法まで学ぶことが出来ます。
              </p>
              <ul class="video-info">
                <li>6コマ</li>
                <li>約43分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail07.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                社会的インパクト・マネジメントの政策導入：成果連動型契約とソーシャル・インパクト・ボンド
              </h4>
              <hr>
              <p class="video-description">
                近年注目されているソーシャル・インパクト・ボンド（SIB）について、スキームや概念、国内外の代表的な事例について解説しています。
              </p>
              <ul class="video-info">
                <li>5コマ</li>
                <li>約30分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/videos/thumbnail08.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
                社会的インパクトをめぐるグローバルの潮流（2020）
              </h4>
              <hr>
              <p class="video-description">
                社会的インパクトを取り巻く国際的な潮流や日本国内における取組を紹介しています。
              </p>
              <ul class="video-info">
                <li>1コマ</li>
                <li>約55分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(http://socialvaluejp.org/wp-content/uploads/2023/04/seminar_IMP.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
Impact Management Project（IMP）によるインパクト規範
              </h4>
              <hr>
              <p class="video-description">
社会的インパクト・マネジメントの一つの基準を作ったと言われているIMPの概要、インパクト規範の定義や活用方法について紹介しています。
              </p>
              <ul class="video-info">
				<li>2コマ</li>
				<li>約40分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(http://socialvaluejp.org/wp-content/uploads/2023/04/seminar_IFC.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
IFCによるインパクト・マネジメント運用原則（OPIM）
              </h4>
              <hr>
              <p class="video-description">
 IFCによるインパクト・マネジメント運用原則（OPIM：投資全体のサイクルにおけるインパクト・マネジメントを仕組み化したフレームワーク）の概要と活用方法について紹介しています。
              </p>
              <ul class="video-info">
                <li>2コマ</li>
                <li>約25分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div> 
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(http://socialvaluejp.org/wp-content/uploads/2023/04/seminar_GIINCOMPASS.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
GIIN & COMPASS（インパクトを比較分析する方法）
              </h4>
              <hr>
              <p class="video-description">
インパクト投資の分野で先進的な活動をしている米国非営利団体GIINによる「COMPASS（The Methodology for comparing and assessing impact）」の概要、COMPASS投資家ガイドの概要について紹介しています。
              </p>
              <ul class="video-info">
				<li>2コマ</li>
				<li>約25分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
          <div class="video-each-content">
            <div class="video-img-bg" style="background-image: url(http://socialvaluejp.org/wp-content/uploads/2023/04/seminar_SDGImpact.png);">
              <p></p>
            </div>
            <div class="video-info-wrap">
              <h4 class="video-title">
SDG Impact基準の概要と活用方法
             </h4>
              <hr>
              <p class="video-description">
国連開発計画（UNDP）によるSDG Impact基準の概要と活用方法について紹介しています。※「SDGインパクト」は、持続可能な開発目標（SDGs）達成につながる投資や事業の世界基準を策定し、研修を実施し、その基準に適合した案件を認証するためにUNDPが立ち上げた取り組みです。
              </p>
              <ul class="video-info">
                <li>2コマ</li>
                <li>約40分</li>
              </ul>
              <a class="video-tobuy" href="#buy">
                ↓セミナーの購入案内へ
              </a>
            </div>
          </div>
		  </div>
      </div>
    </section>
    <section class="buy" id="buy">
      <div class="vl-line buy-line-upper"></div>
      <div class="container">
        <h2 id="buy-box" class="section-name-box ibm">ご購入・ご視聴方法</h2>
        <p class="buy-title">
          当セミナー動画はセット販売となっています。<br>セット価格は24,000円で、購入から90日間は動画が見放題です。<br>
          セミナー映像の配信は、「Vimeo（ヴィメオ）」の動画配信サービスを利用しています。<br>
          以下の手順に従ってレンタル手続きの上、ご視聴ください。
        </p>
        <div class="buy-content-wrap">
          <ul class="buy-list">
            <li>以下の「90日間見放題プランを購入する」ボタンをクリックしてください</li>
            <li>Vimeo上のセミナー配信ページが開きます</li>
            <li>動画画面の右下にある「レンタル」ボタンをクリックしてください</li>
            <li>Vimeoへログイン、または会員登録をしてください</li>
            <li>カード決済（または PayPal）にてお支払いください</li>
            <li>動画はレンタル期間の間は何度でもご視聴いただけます。</li>
          </ul>
          <span>※レンタルには「Vimeo」への会員登録が必要です。</span>
        </div>
        <a class="buy-tobuy" href="https://vimeo.com/ondemand/socialimpact/" target="_blank" rel="noopener noreferrer">
          90日間見放題プランを購入する
        </a>
      </div>
      <div class="vl-line buy-line-lower"></div>
    </section>
    <section class="contact" id="contact">
      <div class="container">
        <h2 class="section-name-box">Contact</h2>
        <div class="contact-wrap">
          <div class="contact-img" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/ken-ito.jpg);">
            <p></p>
          </div>
          <div class="contact-detail">
            <h5 class="contact-name">伊藤 健</h5>
            <span class="contact-name-en ibm">Ito Ken</span>
            <p class="contact-title">特定非営利活動法人ソーシャルバリュージャパン 代表理事<br>
            慶應義塾大学大学院　政策・メディア研究科　特任講師
            </p>
            <hr>
            <p class="contact-profile">
              卒業後、日系メーカー勤務を経て、米国Thunderbird Global School of Management にて経営学修士課程を修了後、GE Internationalに入社。シックス・シグマ手法を使った業務改善や、コーポレート・ファイナンス部門で企業買収後の事業統合等を行う。2008年GE社を退職、NPO法人ISL社会イノベーションセンターを経て、2010年より慶應義塾大学大学院政策・メディア研究科　特任助教。2016年より特任講師。主に社会的インパクト評価を中心に研究し、2014年-2015年には、G8社会的インパクト投資タスクフォース日本諮問委員会の事務局、2015年経済産業省「ヘルスケア分野におけるソーシャル・インパクト・ボンドに関する検討会」委員長、内閣府「共助社会づくり懇談会　社会的インパクト評価検討WG」委員会主査、2016年には内閣府「社会的インパクト評価の普及促進に係る調査」有識者委員を務めるなど、日本の社会的インパクト評価、ソーシャルインパクトボンド、社会的投資の普及促進に尽力している。
            </p>
          </div>
        </div>
        <a class="contact-btn" href="<?php echo home_url('/contact'); ?>">
          お問い合わせはこちら
        </a>
      </div>
    </section>
  </main>
  <?php get_footer("2"); ?>
