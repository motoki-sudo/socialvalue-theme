<?php get_header(); ?>
        <div class="heading">
            <h1>
                Contact<div class="ja">お問い合わせ</div>
            </h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=home_url()?>">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="container">
            <?=do_shortcode('[contact-form-7 id="10" title="お問い合わせ"]')?>
        </div>
<?php get_footer(); ?>