<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">RIBBON BRANCH</h4>
						<p class="card-description">
							Add Ribbon Branch
						</p>
						<?php echo validation_errors(); ?>
						<?php if ($this->session->flashdata('uploadError')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('uploadError');?></div>
						<?php } ?>
						<?php if ($this->session->flashdata('error')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
						<?php }?>

						<form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= base_url()?>index.php/branch/">
							<div class="form-group">
								<label for="exampleInputUsername1">Name</label>
								<input name="name" type="text" class="form-control" id="exampleInputUsername1" placeholder="Ribbon Branch">
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

