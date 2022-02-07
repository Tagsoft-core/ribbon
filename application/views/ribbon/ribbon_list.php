<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Ribbons</h4>
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
									<th>Ribbon Type</th>
									<th>Ribbon Branch</th>
                                    <th>Order</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=1;
								foreach ($ribbons as $ribbon){ ?>
									<tr>
										<td><?= $i;?></td>
										<td><?= $ribbon->name?></td>
										<td><?= $ribbon->type_name?></td>
										<td><?= $ribbon->branch_name?></td>
                                        <td><?= $ribbon->order_precedence?></td>
										<td class="py-1">
											<img style="width: 117px; height: 100%; border-radius: 0;" src="<?= base_url().$ribbon->image?>" alt="image"/>
										</td>
										<td>
                                            <a href="#" type="button" class="btn-sm btn-danger btn-icon-text">Delete<i class="ti-file btn-icon-append"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?=base_url()?>index.php/ribbon/ribbonWithAttachments/<?=$ribbon->id?>" type="button" class="btn-sm btn-success btn-icon-text">Attachments<i class="ti-file btn-icon-append"></i></a>
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

