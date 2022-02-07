
<div class="clear"></div>

<div class="main-page-wrapper">

    <div class="titlehead">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <ul>
                        <li></li>
                        <li><h2>Order Details</h2></li>
                    </ul>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
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
        <div class="row">
            <div class="site-content col-sm-12" role="main">
                <section class="ribbon-sec">
                    <div class="container">
                        <div class="row">

                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="polaroid">
                                    <img src="<?= $finalData["ribbon_image"] ?>" width="100%">
                                    <div class="img-container">
                                        <p>Your Ribbons Stack</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-12">
                                <div class="table-responsive bd-example">
                                    <table class="table table-striped table-hover" border="1" width="100%" style="text-align: center; border: none">

                                        <tr>
                                            <th style="text-align: center">Order ID</th>
                                            <td>0<?=$id?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Name</th>
                                            <td><?=$finalData['first_name'] .' '. $finalData['last_name']?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Email</th>
                                            <td><?=$finalData['email'];?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Phone</th>
                                            <td><?=$finalData['phone'];?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Payment ID</th>
                                            <?php $payment = json_decode($finalData['payment_data']) ?>
                                            <td><?= $payment->id;?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Payment Receipt</th>
                                            <td><?= $payment->links ;?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Amount</th>
                                            <td><?= $payment->amount->currency_code .' '. $payment->amount->value;?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">Status</th>
                                            <td><?= $payment->status;?></td>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>

            </section>
            <!-- #post -->

        </div><!-- .site-content -->

    </div> <!-- end row -->
</div> <!-- end container -->
</div><!-- .main-page-wrapper -->
<style>
    div.polaroid {
        width: 100%;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 25px;
    }

    div.img-container {
        text-align: center;
        padding: 10px 20px;
    }
    .table .thead-dark th {
        color: #fff;
        background-color: #212529;
        border-color: #32383e;
    }
    .table td, .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table td, .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .bd-example {
        position: relative;
        padding: 1rem;
        margin: 1rem -15px 0;
        /*border: solid #f8f9fa;*/
        /*border-width: 0.2rem 0 0;*/
    }


    @media (min-width: 576px)
        .bd-example {
            padding: 1.5rem;
            margin-right: 0;
            margin-left: 0;
            border-width: 0.2rem;
        }
</style>
