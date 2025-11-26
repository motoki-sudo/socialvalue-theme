<?php get_header(); ?>
<?php while(have_posts()): ?>
<?php the_post(); ?>
        <div class="heading">
            <h1>
            	Database<div class="ja">データベース</div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li><!--
                --><li>Database</li><!--
                --><li><a href="<?=home_url()?>/database/category/article">Latest Topics</a></li><!--
                --><li><?=get_the_title()?></li>
            </ul>
        </div>
        <nav class="button_nav">
            <ul>
                <li><a href="<?=home_url()?>/database/category/article">インパクト評価 最新Topics</a></li><!--
                --><li><a href="<?=home_url()?>/database/category/download">ダウンロードコンテンツ</a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="data">
                <div class="date">
                    <?=get_the_date('Y.n.j')?>
                </div>
                <div class="category">
                インパクト評価 最新Topics
                </div>
            </div>
            <div class="title">
                <?=get_the_title()?>
            </div>
            <div class="main_image">
                <img src="<?=get_the_post_thumbnail_url()?>" alt="">
            </div>
            <div class="description">
                <?=get_the_content()?>
            </div>
            <div class="section_page_link">
                <div class="page_link_heading">目次</div>
                <ul>
                    <?php $section_number = 0; ?>
                    <?php foreach(SCF::get('section') as $section): ?>
                        <?php $section_number++; ?>
                        <li<?=$section['is_child']?' class="child"':''?>>
                            <a href="#section_<?=$section_number?>">
                                <?=$section['heading']?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php $section_number = 0; ?>
            <?php foreach(SCF::get('section') as $section): ?>
                <?php $section_number++; ?>
                <section id="section_<?=$section_number?>"<?=$section['is_child']?' class="child"':''?>>
                    <?=!$section['is_child']?'<h2>'.$section['heading'].'</h2>':'<h3>'.$section['heading'].'</h3>'?>
                    <div class="body">
                        <?=$section['body']?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
<?php endwhile; ?>
<?php get_footer(); ?>