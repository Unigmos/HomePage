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
    <link rel="stylesheet" href="https://shaneron.com/wp-content/themes/shaneron/style.css">
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
	<p>現在準備中です！</p>
	<main class="main_container">
        <div class="main_content">
            <div class="article_container">
				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="article_data">
                    <a href="<?the_permalink()?>">
                        <div class="img_box">
							<?if(has_post_thumbnail()){?>
                                <img src="<?the_post_thumbnail_url('medium')?>" alt="<?the_title()?>"/>
							<?}else{?>
								<img src="https://blog.sumahotektek.com/wp-content/uploads/2021/02/no-image.jpg" alt="<?the_title()?>"><?}?>
                        </div>
                        <div class="article_content">
                            <h2><?the_title()?></h2>
                            <p><time><?the_time('Y.m.d')?></time></p>
                        </div>
                    </a>
                </article>
				<?php endwhile; endif; ?>
            </div>

            <div class="top_title" style="text-align: left;margin: 0 15px;">
                <h2 style="padding: 0.1rem 0rem;margin-bottom: 0.2rem;border-bottom: 3px solid #f6ba33;font-weight: bold;font-size: 26px;">最新記事</h2>
            </div>

            <div class="article_container">
                <article class="article_data">
                    <a href="#">
                        <div class="img_box">
                            <img src="https://placehold.jp/1200x630.png"/>
                        </div>
                        <div class="article_content">
                            <h2>タイトル名</h2>
                            <p>2022-01-01</p>
                        </div>
                    </a>
                </article>

                <article class="article_data">
                    <a href="#">
                        <div class="img_box">
                            <img src="https://placehold.jp/1200x630.png"/>
                        </div>
                        <div class="article_content">
                            <h2>タイトル名</h2>
                            <p>2022-01-01</p>
                        </div>
                    </a>
                </article>
            </div>
        </div>

        <div class="side_container">
            <?php get_template_part('profile'); ?>
			
			<div class="side_cats">
				<div class="side_cats_title">
					<h3>カテゴリー</h3>
				</div>
				<div class="side_cats_list">
					<ul>
						<?php
						$categories = get_categories();
						foreach($categories as $category) {
						echo '<li><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
			
			<div class="side_tags">
				<div class="side_tags_title">
					<h3>タグ</h3>
				</div>
				<div class="side_tags_list">
					<ul>
						<?php
						$tags = get_tags();
						foreach( $tags as $tag) { 
						echo '<li><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
        </div>
	</main>
	<footer>
		<?wp_footer();?>
        	<?php get_footer(); ?>
	</footer>
</body>
</html>
