<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">RIBBON </h4>
						<p class="card-description">
							Add Ribbon
						</p>
						<?php if ($this->session->flashdata('error')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
						<?php }?>
						<?php echo validation_errors(); ?>
						<?php if ($this->session->flashdata('uploadError')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('uploadError');?></div>
						<?php } ?>

						<form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= base_url()?>index.php/ribbon/">
							<div class="form-group">
								<label for="exampleInputUsername1">Name</label>
								<input name="name" type="text" class="form-control" id="exampleInputUsername1" placeholder="Ribbon Name">
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Select Ribbon Type</label>
								<select required name="type" class="form-control">
									<option value="">Select</option>
									<?php foreach ($types as $type){ ?>
										<option value="<?= $type->id ?>"><?= $type->name ?></option> <img src="<?= base_url().$type->image?>">
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Select Ribbon Branch</label>
								<select required name="branch" class="form-control">
									<option value="">Select</option>
									<?php foreach ($branches as $branch){ ?>
									<option value="<?= $branch->id ?>"><?= $branch->name ?></option> <img src="<?= base_url().$branch->image?>">
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputUsername1">Select Ribbon Attachment</label>
								<?php foreach ($attachments as $attachment){ ?>
									<div class="form-check form-check-flat form-check-primary">
										<label class="form-check-label">
											<input name="attachments[]" value="<?= $attachment->id ?>" type="checkbox" class="form-check-input">
											<?= $attachment->name ?>
											<i class="input-helper"></i><img width="8%" src="<?= base_url().$attachment->image?>"> </label>
									</div>
								<?php } ?>

							</div>

							<div class="form-group">
								<label for="exampleInputUsername1">Price</label>
								<input name="price" type="number" class="form-control" id="exampleInputUsername1" placeholder="Ribbon Price">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Image</label>
								<input name="image" type="file" class="form-control" id="exampleInputEmail1">
							</div>
							<button type="submit" class="btn btn-primary mr-2">Submit</button>
							<button class="btn btn-light">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

