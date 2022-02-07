<div class="titlehead">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="#"><i class="fa fa-long-arrow-left"></i></a>
			</div>
			<div class="col-md-4">
				<ul>
					<li>Select Ribbon type</li>
				</ul>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>

<section class="ribbon-sec">
	<div class="container">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php }
        if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error');?>
            </div>
        <?php }
        if ($this->session->flashdata('other-error')) { ?>
            <div class="alert alert-info">
                <?= $this->session->flashdata('other-error');?>
            </div>
        <?php } ?>
		<div id="branches_div" class="row">
			<div class="col-md-1"></div>
			<?php foreach ($branches as $branch){ ?>
				<div class="col-md-2">
					<a class="branches" onclick='branches(<?= $branch->id?>)' href="#"><img src="<?= base_url() . $branch->image ?>" alt="Aerial Achievement">
						<p><b><?= $branch->name ?></b></p></a>
			    </div>
			<?php } ?>
			<div class="col-md-1"></div>
		</div>
	</div>
</section>
<form id="type_branch_form" method="post" hidden action="<?=base_url()?>index.php/get-ribbons">
<!--	<input value="" id="input_type" name="type" hidden>-->
	<input value="" id="input_branch" name="branch" hidden>
</form>

<!-- Custom js for this page-->
<script src="<?= base_url() ?>assets/custom_js/types_branches.js"></script>
<!-- End custom js for this page-->
