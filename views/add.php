<?php require('includes/header.php');?>
<?php require('includes/hero_overlay.php');?>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<form action="/add" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-12 mb-3">
								<?php if(!empty($success)):?>
									<p class="text-success p-3" style="font-weight: 600;"><?= $success?></p>
								<?php endif;?>
								<?php if(!empty($errors)):?>
									<?php foreach ($errors as $error):?>
										<p class="text-danger p-1" style="font-weight: 600;">.<?= $error?></p>
									<?php endforeach;?>
								<?php endif;?>
							</div>
							<div class="col-12 mb-3">
								<input name="title" type="text" class="form-control" placeholder="Title">
							</div>
							<div class="col-12 mb-3">
								<textarea name="content" id="" cols="30" rows="7" class="form-control" placeholder="Content"></textarea>
							</div>
							<div class="col-6 mb-3">
								<input name="categories" type="text" class="form-control" placeholder="categories">
							</div>
							<div class="col-6 mb-3">
								<input name="tags" type="text" class="form-control" placeholder="tags">
							</div>
							<div class="col-12 mb-3">
								<input name="picOne" type="file" class="form-control" placeholder="Picture one">
							</div>
							<div class="col-6 mb-3">
								<input name="picTwo" type="file" class="form-control" placeholder="Picture two">
							</div>
							<div class="col-6 mb-3">
								<input name="picThree" type="file" class="form-control" placeholder="Picture three">
							</div>

							<div class="col-12">
								<input type="submit" value="Save post" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- /.untree_co-section -->
	<?php require('includes/footer.php');?>