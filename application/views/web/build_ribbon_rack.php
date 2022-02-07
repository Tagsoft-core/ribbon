<div class="titlehead">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div style="display: <?php echo ($this->session->userdata('cartProducts')) ? 'flex' : 'none'; ?>" id="cache-clear-btn" class="cache-clear-btn-holder">
                    <a href="<?= base_url()?>index.php/clear-rack" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-retweet"></span>
                        <b> CLEAR RACK </b>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <ul>
                    <li></li>
                    <li>BUILD YOUR RIBBONS RACK</li>
                </ul>
            </div>
            <div class="col-md-4">
                <div style="display: <?php echo ($this->session->userdata('cartProducts')) ? 'flex' : 'none'; ?>" id="preview-btn" class="preview-btn-holder">
                    <a target="rackwindow" href="<?= base_url()?>index.php/preview-ribbons-rack" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <b> PREVIEW </b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--start sticky bar-->
<div style="display: <?php echo ($this->session->userdata('cartProducts')) ? 'block' : 'none'; ?>" id="sticky-ribbons" class="sb-sec">
    <div id="ribbons-slider-container" class="col-md-7">
        <!--start ribbons-slider-->
        <div class="ribbons-slider">
            <?php if(!empty($this->session->userdata('cartProducts'))) {
                foreach ($this->session->userdata('cartProducts') as $ribbon) {?>
                    <img id="<?=$ribbon['id'];?>" class="ribbons-slider-img" src="<?=$ribbon['image'];?>"/>
            <?php } } ?>

        </div>
        <!--close ribbons-slider-->
    </div>

    <div class="col-md-3">
        <?php $count = 0; if(!empty($this->session->userdata('cartProducts'))) {
            $count = count($this->session->userdata('cartProducts'));
        }?>
        <p>Total Ribbons Selected: <span id="ribbon-count"><?= $count;?></span></p>
    </div>

    <div class="col-md-2" style="padding: 14px">
        <a style="display: none" id="sticky-preview-btn" target="rackwindow" href="<?= base_url()?>index.php/preview-ribbons-rack" class="btn btn-info btn-sm">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            <b> PREVIEW </b>
        </a>
    </div>
</div>
<!--close sticky bar-->

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
        <div class="col-md-12 padbot">
            <div class="col-md-6 col-md-offset-3">
                <input onkeyup="ribbonsSearch()" id="search_ribbon" type="text" class="form-control" placeholder="Search Ribbons">
            </div>
        </div>
        <div id="errorDiv" style="display: none" class="badge badge-danger">danger</div>
        <div id="successDiv" style="display: none" class="badge badge-success">success</div>
        <div class="row">
            <?php foreach ($ribbons as $ribbon) { ?>
                <div datasrc="<?=strtolower($ribbon->name);?>" class="col-md-3 ribbons" style="padding: 16px">
                    <div class="container2">
                        <div class="img-container">
                            <img width="50%" src="<?= base_url() . $ribbon->image ?>" alt="<?=$ribbon->name?>">
                        </div>
                        <p><?= $ribbon->name ?></p>
                        <div class="btn-holder">
                            <?php
                            $displayAdd = 'display: block';
                            $displayRemove = 'display: none';
                            if (!empty($this->session->userdata('cartProducts'))) {
                                foreach ($this->session->userdata('cartProducts') as $cartItem) {
                                    if (isset($cartItem['id']) && $cartItem['id'] == $ribbon->id) {
                                        $displayAdd = 'display: none';
                                        $displayRemove = 'display: block';
                                    }
                                }
                            } ?>

                            <a style="<?=$displayAdd?>" onclick='addToCart(this,"<?= $ribbon->id;?>", "<?=$ribbon->name;?>", "<?= $ribbon->image?>" , "<?= $ribbon->price?>", "<?= $ribbon->order_precedence?>")' href="#" class="ribbons btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <b> ADD TO CART </b>
                            </a>
                            <a style="<?=$displayRemove?>" onclick='removeCartProduct(this,"<?= $ribbon->id;?>", "<?=$ribbon->name;?>", "<?= $ribbon->image?>" , "<?= $ribbon->price?>", "<?= $ribbon->order_precedence?>")' href="#" class="ribbons-delete btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-remove"></span>
                                <b> REMOVE FROM CART </b>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    let base_url = "<?= base_url()?>";
    let request;
</script>
<!-- Custom js for this page-->
<script src="<?= base_url() ?>assets/custom_js/cart.js"></script>
<!-- End custom js for this page-->
