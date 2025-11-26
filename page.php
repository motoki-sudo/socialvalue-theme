<?php get_header(); ?>
	<div id="page-default">
        <div class="heading">
            <h1>
						<?php if( get_field('midashi_en') ) { ?><?php the_field('midashi_en'); ?><?php } ?>
						<div class="ja"><?php the_title(); ?></div>
            </h1>
        </div>
			<?php //固定ページの親・子・孫に対応したパンクズリストを表示
  echo '<div class="breadcrumb"><ul>';
  echo '<li class="home"><a href="'. home_url( '/', 'http' ).'">Home</a></li>';
  if(is_page()){ // 固定ページの場合に表示
    if( $post -> post_parent != 0 ){ // 投稿の親ページがあるかどうかを判別
      $ancestors = array_reverse( $post->ancestors ); // 投稿の祖先ページの ID を配列として取得
      foreach($ancestors as $ancestor){ // 配列を一覧として表示
        echo '<li><a href="'.get_permalink($ancestor).'">'.get_the_title($ancestor).'</a></li>'; // 親ページの URL とタイトルを表示
      }
    }
    echo '<li class="current">'.wp_trim_words( get_the_title(), 24, '...' ).'</li>'; // 現在の投稿のタイトルを字数制限して表示
  }
  echo '</ul></div>';
?>
        <div class="container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
	</div>
<?php get_footer(); ?>