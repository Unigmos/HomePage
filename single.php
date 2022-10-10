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
	<link rel="icon" href="https://shaneron.com/wp-content/themes/shaneron/favicon/page_logo_32x32.ico">
    <link rel="stylesheet" href="https://shaneron.com/wp-content/themes/shaneron/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<?if(is_singular()){?>
		<style>
			h2{
			  padding: 0.25em;
			  color: #010101;
			  background: #ffe18f;
			  border-bottom: solid 3px #f6ba33;
			}
			h3{
			  color: #505050;
			  padding: 0.5em;
			  display: inline-block;
			  line-height: 1.3;
			  background: #ffe18f;
			  vertical-align: middle;
			  border-radius: 25px 0px 0px 25px;
			}
			h3:before {
			  content: '●';
			  color: white;
			  margin-right: 8px;
			}
			h4{
				border-bottom: solid 2px #ffe18f;
			}
			h4:before{
				font-family: "Font Awesome 6 Free";
				content: '\f00c';
				font-weight: 900;
				color: #ffe18f;
				margin-right: 8px;
			}
			table{
				width: 100%;
				border-collapse: collapse;
				border-spacing: 0;
				border: 1px solid #eee;
			}
			table th,table td{
			  	padding: 10px 0;
			  	text-align: center;
			}

			table tr:nth-child(odd){
			 	background-color: #eee;
			}
			td{
				border: 1px solid #999;
				font-weight:600;
			}
		</style>
	<?}?>
    <?wp_head();?>
</head>
<body>
	<header>
		<?php get_header(); ?>
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
			<div class="article_cat_tag">
				<?php
				  $category = get_the_category();
				  if ( $category[0] ) {
					echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
					}
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
				公開日:<?php the_time('Y/m/d');?>
				<?php if(get_the_time('Y/m/d') != get_the_modified_date('Y/m/d')):?>
				&emsp;最終更新日:<?php the_modified_date('Y/m/d') ?>
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
