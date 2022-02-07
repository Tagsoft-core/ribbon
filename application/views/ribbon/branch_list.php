<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Ribbon Branches</h4>
						<?php if ($this->session->flashdata('error')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
						<?php }?>
						<?php if ($this->session->flashdata('success')){ ?>
							<div class="badge badge-success"><?= $this->session->flashdata('success');?></div>
						<?php }?>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=1;
								foreach ($branches as $type){ ?>
									<tr>
										<td><?= $i;?></td>
										<td><?= $type->name?></td>
										<td class="py-1">
											<img style="width: 100px; height: 100px;" src="<?= base_url().$type->image?>" alt="image"/>
										</td>
										<td><a href="#" type="button" class="btn btn-danger btn-icon-text">
												Delete
												<i class="ti-file btn-icon-append"></i>
											</a></td>
									</tr>
									<?php $i++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

