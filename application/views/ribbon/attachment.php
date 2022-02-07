<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">RIBBON ATTACHMENT</h4>
						<p class="card-description">
							Add Ribbon Attachment
						</p>
						<?php echo validation_errors(); ?>
						<?php if ($this->session->flashdata('error')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
						<?php } ?>
						<?php echo validation_errors(); ?>
						<?php if ($this->session->flashdata('uploadError')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('uploadError');?></div>
						<?php } ?>

						<form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= base_url()?>index.php/attachment/">
							<div class="form-group">
								<label for="exampleInputUsername1">Name</label>
								<input name="name" type="text" class="form-control" id="exampleInputUsername1" placeholder="Ribbon Attachment Name">
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Option Type</label>
								<div class="form-check form-check-flat form-check-primary">
									<label class="form-check-label">
										<input name="option_type" value="1" type="checkbox" class="form-check-input">
										Select
										<i class="input-helper"></i></label>
								</div>
								<div class="form-check form-check-flat form-check-primary">
									<label class="form-check-label">
										<input name="option_type" value="2" type="checkbox" class="form-check-input">
										Checkbox
										<i class="input-helper"></i></label>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleInputUsername1">Multiple Attachments</label>
								<div class="form-check form-check-flat form-check-primary">
									<label class="form-check-label">
										<input name="multiple" value="1" type="checkbox" class="form-check-input">
										Multiple
										<i class="input-helper"></i></label>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Option</label>
								<textarea name="option" class="form-control">0</textarea>
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

