<?php get_header(); ?>
        <div class="heading">
            <h1>
                Recruit<div class="ja">採用情報</div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li>
                <li>Recruit</li>
            </ul>
        </div>
        <div class="container">
            <div class="shadow_box">
                Social Value Japanでは、インパクト評価や社会的投資を通じて日本のソーシャル・セクターの社会的価値を最大化する仲間を募集しています。ご関心がある方は、希望の職種・プロジェクトを明記の上、<a href="mailto:info@socialvaluejp.org">info@socialvaluejp.org</a> まで職務経歴書等を添付にてお送りください。折り返し、ご連絡差し上げます。
            </div>
            <ol class="toggle_list">
                <?php $recruit_number = 0; ?>
                <?php while(have_posts()): ?>
                    <?php
                    the_post();
                    $recruit_number++;
                    ?>
                    <li>
                        <h3><div class="number"><?=sprintf("%02d", $recruit_number);?></div><?=get_the_title()?></h3>
                        <div class="data">
                            <ul>
                                <?php foreach(SCF::get('recruit_data') as $data): ?>
                                    <li>
                                        <div class="term"><?=$data['recruit_term']?></div>
                                        <div class="description"><?=$data['recruit_description']?></div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ol>
        </div>
<?php get_footer(); ?>