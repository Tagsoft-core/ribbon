<section class="breadcrumb-sec ">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1">&nbsp;</div>
			<div class="col-md-5 ">
				<div class="location-ribbon">
					<i class="fa fa-home homesymb" aria-hidden="true"><a href="#">Home</a> / Preview</i>
				</div>
			</div>
		</div>
	</div>
</section>
<form id="checkout-form" action="<?= base_url()?>index.php/checkout" method="post">
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
<?php foreach ($cartData as $cartDatum) { ?>
	<section class="preview-detail padbot">
		<div class="container">

            <div class="col-md-1">
                <a href="<?=base_url()?>index.php/remove-item/<?= $cartDatum['id']?>" class="btn btn-secondary" style="background: #921514;"><i class="fa fa-times"></i> </a>
            </div>

            <div class="col-md-6">
				<div class="left-preview">
					<h1 class="ribbon-title"><?= $cartDatum['name']?></h1>
					<div id="div_<?=$cartDatum['id']?>" class="col-md-4 parent_images" style="background: url(<?= $cartDatum['image']?>) no-repeat center; height: 42px;">
					</div>
				</div>
			</div>

            <div class="col-md-5">
					<div class="right-preview">
						<!-- 1st row  -->
						<div class="col-md-3 black-bg"><a>&nbsp;</a></div>
						<div class="col-md-5 black-bg black-border"><a>Devices</a></div>
						<div class="col-md-4 black-bg"><a>Quantity</a></div>
						<div class="clearfix"></div>
						<?php if (!empty($cartDatum['attachments'])){ foreach ($cartDatum['attachments'] as $attachment) { ?>
							<div class="gap border-ribbon">
								<div class="col-md-3">
									<img class="img-sample" src="<?= base_url().$attachment->image ?>" alt="">
								</div>
								<div class="col-md-5">
									<h4 class="bronze-oak"><?= $attachment->name ?></h4>
								</div>
								<div class="col-md-4">
									<?php if ($attachment->option_type == 1) {
										if ($attachment->multiple == 1) { ?>
									<select data-id="<?=$cartDatum['id']?>" onchange="ribbonAttachment('<?=$cartDatum['id']?>', this)" name="ribbon_attachment[<?=$cartDatum['id']?>][<?=$attachment->id?>]" class="ribbon-quantity attachment_select_<?=$cartDatum['id']?>">
										<option value="0">0</option>
										<?php foreach ($attachment->select_options as $option) { ?>
											<option datasrc="<?= base_url().$option->image?>" dataname="<?= $option->name;?>" value="1,<?= $option->id ?>"><?= $option->name ?></option>
										<?php } ?>
									</select>
										<?php } else {
											$options = explode(',',$attachment->options); ?>
									<select data-id="<?=$cartDatum['id']?>" onchange="ribbonAttachment('<?=$cartDatum['id']?>', this)" name="ribbon_attachment[<?=$cartDatum['id']?>][<?=$attachment->id?>]" class="ribbon-quantity attachment_select_<?=$cartDatum['id']?>">
										<?php foreach ($options as $option) { ?>
											<option datasrc="<?= base_url().$attachment->image?>" dataname="<?= $attachment->name ?>" value="<?= $option ?>,0"><?= $option ?></option>
										<?php } ?>
									</select>
										<?php } } else { ?>
										<select data-id="<?=$cartDatum['id']?>" onchange="ribbonAttachment('<?=$cartDatum['id']?>', this)" name="ribbon_attachment[<?=$cartDatum['id']?>][<?=$attachment->id?>]" class="ribbon-quantity attachment_select_<?=$cartDatum['id']?>">
											<option value="0">0</option>
											<option dataname="<?=$attachment->name?>" datasrc="<?= base_url().$attachment->image?>" value="1,0">1</option>
										</select>
									<?php } ?>
									<h6>$<?= $attachment->price?> each</h6>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php } } else {
						    echo 'No devices on this ribbon';
                        } ?>
					</div>
				</div>

		</div>
	</section>
<?php } ?>
    <input type="hidden" name="image" value="" id="stack-image">

<section class="preview-detail padbot">
    <hr>
    <div class="container">
        <div class="col-md-3 padbot">
            <label>1/8" Row Spacing? (In Stock )</label>
            <select class="form-control">
                <option value="">None</option>
                <option value="1">Yes</option>
            </select>
        </div>

        <div class="col-md-3 padbot">
            <label>Magnetic Backing (In Stock )</label>
            <select class="form-control">
                <option value="">None</option>
                <option value="1">Yes</option>
            </select>
        </div>
    </div>
</section>
</form>
<section class="preview-detail padbot">
<hr>
	<div class="container" style="background: none">
		<div class="col-md-6">
		<h4 style="color: black!important;">Preview Your ribbon Rack</h4>
		</div>
	</div>
</section>

<section class="preview-detail padbot">


    <div class="container">

		<div class="col-md-7">
			<div class="left-preview">
				<div class="left-ribbon-div col-md-12 padbot">
					<div class="row left-ribbon" id="allRibbons">
					</div>
				</div>
			</div>
        </div>

		<div class="col-md-5">
			<div class="right-preview">
				<?php foreach ($cartData as $cartDatum) { ?>
				<div class="right-ribbon-div col-md-12 padbot">
					<div class="row right-row">
						<div id="div_bottom_<?=$cartDatum['id']?>" class="col-md-4 parent_images" style="background: url(<?= $cartDatum['image']?>) no-repeat center; height: 62px;padding-top: 10px;">

						</div>

						<div class="col-md-8">
							<h4 class="ribbon-title"><?= $cartDatum['name']?></h4>
							<label class="ribbon-title">$<?= $cartDatum['price']?></label>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<a id="checkout-btn" href="#" class="col-md-12 btn btn-secondary" style="background: #6d6d6d;">Proceed to Checkout</a>
		</div>

	</div>
</section>
<style>
    .parent_images {
        max-width: 152px;
        padding: 0;
        text-align: center;
    }

    .image_2 {
        vertical-align: middle;
        /*position: absolute;*/
        margin-top: 10px;
        margin-left: -23px;
        margin-right: -23px;
    }
</style>

<script>
	let ribbons = <?= $jsonRibbon ?>;
	let range = <?= $totalRibbons ?>;
</script>
<script src="<?= base_url()?>assets/custom_js/ribbon_stack.js"></script>
<script src="<?= base_url()?>assets/custom_js/ribbon_attachment.js"></script>
<script src="<?= base_url()?>assets/custom_js/html2canvas.js"></script>
