<!DOCTYPE html>
<!--
    Welcome to shaneron.com!!
-->
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Shaneron">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shaneron.page</title>
    <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/mysite/style.css">
	<?if(is_singular()){?><style>h2{background:red}</style><?}?>
    <?wp_head();?>
</head>
<body>
	<header>
		<div class="header_menu">
            <nav>
                <ul>
                    <li><a href="#top">Top</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#works">Works</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
	</header>
	<main class="single_main">
		<?php if(have_posts()): ?>
		<?php while(have_posts()):the_post(); ?>
        <div class="article_box">
			<div class="breadcrumbs">
			  <?php if(function_exists('bcn_display'))
			  {
				bcn_display();
			  }?>
			</div>
            <div class="article_title">
                <h1><?php the_title(); ?></h1>
            </div>
			<div class="article_tags">
				<?php
				  $category = get_the_category();
				  $cat_name = $category[0]->cat_name;
				  // カテゴリー名を表示
				  echo $cat_name;
				?>
				<?php
					//tag
					$tagout = '';
					$posttags = get_the_tags();
					if( $posttags ){
						foreach ( $posttags as $tag ) {
							$tagout .= '<a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a>';
						}
					}
					echo $tagout
				?>
			</div>
			<div class="article_date">
				<time>
				公開日:<?php the_time('Y/m/d');?>&emsp;
				<?php if(get_the_time('Y/m/d') != get_the_modified_date('Y/m/d')):?>
				最終更新日:<?php the_modified_date('Y/m/d') ?>
				<?php endif;?>
				</time>
			</div>
            <div class="article_image">
            <?if(has_post_thumbnail()){?>
				<img src="<?the_post_thumbnail_url('medium')?>" alt="<?the_title()?>">
			<?}else{?>
                <img src="https://blog.sumahotektek.com/wp-content/uploads/2021/02/no-image.jpg" alt="<?the_title()?>">
            <?}?>
            </div>
            <div class="article_sentence">
				<?php the_content(); ?>
            </div>
        </div>
		<?php endwhile; endif; ?>
        
        <div class="side_container">
            <?php get_template_part('profile'); ?>
        </div>

    </main>
	<footer>
		<?wp_footer();?>
        <?php get_footer(); ?>
	</footer>
</body>
</html>
