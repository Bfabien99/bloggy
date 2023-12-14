<?php require('includes/header.php'); ?>
<!-- Start retroy layout blog posts -->
<section class="section bg-light">
	<div class="container">
		<div class="row align-items-stretch retro-layout">
			<?php if (!empty($recentsPosts)): ?>
				<div class="col-md-6">
					<?php for ($i=0; $i <= 1; $i++):?>
					<a href="/single?slug=<?= $recentsPosts[$i]['slug'];?>" class="h-entry my-4 v-height gradient">

						<div class="featured-img" style="background-image: url('uploads/<?= $recentsPosts[$i]['picture_one']?>');"></div>

						<div class="text">
							<span class="date"><?= date("M jS Y",strtotime($recentsPosts[$i]['added_date']));?></span>
							<h2><?= $recentsPosts[$i]['title'];?></h2>
						</div>
					</a>
					<?php endfor;?>
				</div>
				<div class="col-md-6">
					<?php for ($i=2; $i <= 3; $i++):?>
					<a href="/single?slug=<?= $recentsPosts[$i]['slug'];?>" class="h-entry my-4 v-height gradient">

						<div class="featured-img" style="background-image: url('uploads/<?= $recentsPosts[$i]['picture_one']?>');"></div>

						<div class="text">
							<span class="date"><?= date("M jS Y",strtotime($recentsPosts[$i]['added_date']));?></span>
							<h2><?= $recentsPosts[$i]['title'];?></h2>
						</div>
					</a>
					<?php endfor;?>
				</div>
			<?php else: ?>
				<div class="col-md-12 order-md-1">
					<p class="text-info">No recent post</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<section class="section posts-entry">
	<div class="container">
		<div class="row mb-4">
			<div class="col-sm-6">
				<h2 class="posts-entry-title">Posts</h2>
			</div>
			<div class="col-sm-6 text-sm-end"><a href="/category?cat=all" class="read-more">View All</a></div>
		</div>
		<div class="row g-3">
			<?php if (!empty($allPosts)): ?>
			<div class="col-md-9 order-md-2">
				<div class="row g-3">
					<?php for($i=0;$i<=1;$i++):?>
					<div class="col-md-6">
						<div class="blog-entry">
							<a href="/single?slug=<?= $allPosts[$i]['slug'];?>" class="img-link">
								<img src="uploads/<?= $allPosts[$i]['picture_one']?>" alt="Image" class="img-fluid">
							</a>
							<span class="date"><?= date("M jS Y",strtotime($allPosts[$i]['added_date']));?></span>
							<h2><a href="/single?slug=<?= $allPosts[$i]['slug'];?>"><?= $allPosts[$i]['title']; ?></a></h2>
							<p><?= substr($allPosts[$i]['content'], 0, 100);?>[...]</p>
							<p><a href="/single?slug=<?= $allPosts[$i]['slug'];?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
						</div>
					</div>
					<?php endfor;?>
				</div>
			</div>
			<div class="col-md-3">
				<ul class="list-unstyled blog-entry-sm">
					<?php for($i=2;$i<=4;$i++):?>
					<li>
						<span class="date"><?= date("M jS Y",strtotime($allPosts[$i]['added_date']));?></span>
						<h3><a href="/single?slug=<?= $allPosts[$i]['slug'];?>"><?= $allPosts[$i]['title']; ?></a></h3>
						<p><?= substr($allPosts[$i]['content'], 0, 100);?>[...]</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</li>
					<?php endfor;?>
				</ul>
			</div>
			<?php else: ?>
			<div class="col-md-12 order-md-1">
				<p class="text-info">No post</p>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php require('includes/footer.php'); ?>