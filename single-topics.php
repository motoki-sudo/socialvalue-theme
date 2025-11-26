<?php get_header(); ?>
<?php while(have_posts()): ?>
<?php the_post(); ?>
<?php
$term = get_the_terms($post->id, 'topics_category')[0];
$category_name = $term->name;
$category_name_en = $term->description;
$category_slug = $term->slug;
?>
        <div class="heading">
            <h1>
            	<?=$category_name_en?><div class="ja"><?=$category_name?></div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li><!--
                --><li><a href="<?=home_url()?>/topics/category/<?=$category_slug?>"><?=$category_name_en?></a></li><!--
                --><li><?=get_the_title()?></li>
            </ul>
        </div>
        <nav class="button_nav">
            <ul>
                <li><a href="<?=home_url()?>/topics">トピックス一覧</a></li><!--
                --><li><a href="<?=home_url()?>/topics/category/news">お知らせ</a></li><!--
                --><li><a href="<?=home_url()?>/topics/category/eventseminar">イベント/セミナー</a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="data">
                <div class="date">
                    <?=get_the_date('Y.n.j')?>
                </div>
                <div class="category">
                    <?=$category_name?>
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