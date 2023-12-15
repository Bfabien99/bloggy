<?php require('includes/header.php');?>
	<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading">Search: <?= $search;?></div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
					<?php if(!empty($results)):?>
						<?php foreach ($results as $result):?>
							<div class="blog-entry d-flex blog-entry-search-item">
								<a href="/single?slug=<?= $result['slug'];?>" class="img-link me-4">
									<img src="uploads/<?= $result['picture_one'];?>" alt="Image" class="img-fluid">
								</a>
								<div>
									<span class="date"><?= date("M jS Y", strtotime($result['added_date']));?> &bullet; <a href="#"><?= $result['categories'];?></a></span>
									<h2><a href="/single?slug=<?= $result['slug'];?>"><?= $result['title'];?></a></h2>
									<p><?= substr($result['content'], 0, 150);?>[...]</p>
									<p><a href="/single?slug=<?= $result['slug'];?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
								</div>
							</div>
						<?php endforeach;?>

					<div class="row text-start pt-5 border-top">
						<div class="col-md-12">
							<div class="custom-pagination">
								<?= generatePagination($totalItems, $itemsPerPage, $currentPage, $url)?>
							</div>
						</div>
					</div>
					<?php else: ?>
						<p class="text-info">No post found</p>
					<?php endif; ?>
				</div>

				<div class="col-lg-4 sidebar">
					
					<div class="sidebar-box search-form-wrap mb-4">
						<form action="#" class="sidebar-search-form">
							<span class="bi-search"></span>
							<input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
						</form>
					</div>
					<!-- END sidebar-box -->
					<div class="sidebar-box">
						<h3 class="heading">Popular Posts</h3>
						<div class="post-entry-sidebar">
							<?php if(!empty($mostViewed)):?>
							<ul>
								<?php foreach($mostViewed as $viewed):?>
								<li>
									<a href="?slug=<?=$viewed['slug']?>">
										<img src="uploads/<?=$viewed['picture_one']?>" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4><?=$viewed['title']?></h4>
											<div class="post-meta">
												<span class="mr-2"><?=date("M jS Y",strtotime($viewed['added_date']))?></span>
											</div>
										</div>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
							<?php else:?>
							<?php endif;?>
						</div>
					</div>
					<!-- END sidebar-box -->

					<div class="sidebar-box">
						<h3 class="heading">Categories</h3>
						<ul class="categories">
							<li><a href="#">Food <span>(12)</span></a></li>
							<li><a href="#">Travel <span>(22)</span></a></li>
							<li><a href="#">Lifestyle <span>(37)</span></a></li>
							<li><a href="#">Business <span>(42)</span></a></li>
							<li><a href="#">Adventure <span>(14)</span></a></li>
						</ul>
					</div>
					<!-- END sidebar-box -->

					<div class="sidebar-box">
						<h3 class="heading">Tags</h3>
						<ul class="tags">
							<li><a href="#">Travel</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Freelancing</a></li>
							<li><a href="#">Travel</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Freelancing</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php require('includes/footer.php');?>