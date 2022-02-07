<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Ribbon Attachments</h4>
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
									<th>Option Type</th>
									<th>Multiple</th>
									<th>Price</th>
									<th>Image</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=1;
								foreach ($attachments as $attachment){ ?>
									<tr>
										<td><?= $i;?></td>
										<td><?= $attachment->name?></td>
										<td><?= ($attachment->option_type == 1)? 'select': 'checkbox'; ?></td>
										<td><?= $attachment->multiple?></td>
										<td><?= $attachment->price?></td>
										<td class="py-1">
											<img style="width: 30px; height: 100%;" src="<?= base_url().$attachment->image?>" alt="image"/>
										</td>
										<td>
                                            <a href="#" type="button" class="btn-sm btn-danger btn-icon-text">Delete<i class="ti-file btn-icon-append"></i></a>
                                        </td>
										<td>
											<a href="<?=base_url()?>index.php/Attachment/addOptions/<?=$attachment->id?>" type="button" class="btn-sm btn-primary btn-icon-text">Add Options<i class="ti-file btn-icon-append"></i></a>
                                        </td>
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

