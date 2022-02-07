<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Options</th>
									<th>Image</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=1;
								foreach ($options as $option){ ?>
									<tr>
										<td><?= $i;?></td>
										<td><?= $option->name?></td>
										<td><?= $option->options?></td>
										<td class="py-1">
											<img style="width: 100px; height: 100px;" src="<?= base_url().$option->image?>" alt="image"/>
										</td>
									</tr>
									<?php $i++; } ?>
								</tbody>
							</table>
							<hr>
							<br>

							<h4 class="card-title">ATTACHMENT OPTIONS</h4>
							<p class="card-description">
								Add Ribbon Attachment
							</p>
							<hr>
						<?php echo validation_errors(); ?>

						<form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= base_url()?>index.php/Attachment/addOptions/<?= $attachment[0]->id?>">

							Name: <?=$attachment[0]->name?>
							<br><br>
							Option Type: <?=$attachment[0]->option_type?>
							<br><br>
							Multiple: <?=$attachment[0]->multiple?>
							<br><br>
							<div class="form-group">
								<label for="exampleInputUsername1">Option</label>
								<input name="option" class="form-control">
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Name</label>
								<input name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Image</label>
								<input name="image" type="file" class="form-control">
							</div>

							<button type="submit" class="btn btn-primary mr-2">Submit</button>
							<button type="reset" class="btn btn-light">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
