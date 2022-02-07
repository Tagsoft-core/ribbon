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

						<form class="forms-sample" method="post" action="<?= base_url()?>index.php/Attachment/edit/<?= $attachment[0]->id?>">

							Name: <?=$attachment[0]->name?>
							<br><br>
							Option Type: <?=$attachment[0]->option_type?>
							<br><br>
							<div class="form-group">
								<label for="exampleInputUsername1">Option</label>
								<textarea name="option" class="form-control"><?= $attachment[0]->options?></textarea>
							</div>

							<button type="submit" class="btn btn-primary mr-2">Submit</button>
							<button class="btn btn-light">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

A
