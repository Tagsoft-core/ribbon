
<div class="clear"></div>

<div class="main-page-wrapper">

    <div class="titlehead">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-5">
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
                        <div class="col-md-6 right-preview">
                            <h3>Shipping Details</h3>
                            <div class="">
                                <form action="<?= base_url() ?>index.php/submit-order" class="form-validation" method="post" id="order-form" style="text-align: left">

                                    <input name="ribbon_stack_image" value="<?= $data['image']?>" type="hidden">
                                    <input id="payment_data" name="payment_data" value="" type="hidden">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name:</label>
                                        <input name="first_name" required type="text" class="form-control"
                                               id="first_name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name:</label>
                                        <input name="last_name" required type="text" class="form-control" id="last_name">
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input name="email" required type="email" class="form-control" id="email">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone:</label>
                                        <input name="phone" required type="tel" class="form-control" id="phone">
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-12">
                                        <label for="state">State:</label>
                                        <select id="state" required name="state" class="form-control">
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-12">
                                        <label for="address">Street address:</label>
                                        <input name="address" required type="text" class="form-control"
                                               id="address">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="city">Town / City:</label>
                                        <input name="city" required type="text" class="form-control" id="city">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="county">County (optional)</label>
                                        <input name="county" type="text" class="form-control" id="county">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="post_code">Postcode:</label>
                                        <input name="post_code" required type="text" class="form-control" id="post_code">
                                    </div>

                                    <div class="clearfix"></div>
                                    <!-- payment -->


                                    <div class='form-row row col-md-12'>
                                        <div id="error" class='col-md-12 error form-group' style="display: none">
                                            <div class='alert-danger alert'>
                                                <p>Error occurred while making the payment.</p>
                                                <p id="detail-error"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end payment -->
                                    <div class="col-md-12">
                                        <div id="smart-button-container">
                                            <div style="text-align: center;">
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="polaroid">
                                    <img src="<?= $data["image"] ?>" width="100%">
                                    <div class="img-container">
                                        <p>Your Ribbons Stack</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-preview col-md-12">
                                <h3>Your order Details</h3>
                                <div class="table-responsive bd-example">
                                    <table class="table table-striped table-hover" border="1" width="100%" style="text-align: center; border: none">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th style="text-align: center">Product</th>
                                            <th width="5%" style="text-align: center">Qty</th>
                                            <th style="text-align: center">Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $total = number_format((float)0, 2, '.', '');
                                        foreach ($cartData as $key => $item) { ?>
                                            <tr>

                                                <td>
                                                    <div class="col-md-12">
                                                        <h6><?= $item['name']; ?> </h6>
                                                        <?php if (isset($attachments[$item['id']])) { ?>
                                                            <div class="col-md-12">
                                                                <hr style="margin-top: 5px; margin-bottom: 5px">
                                                                <?php foreach ($attachments[$item['id']] as $attachment) { ?>
                                                                    <small><?= $attachment->name; ?></small><br>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="col-md-12">
                                                        <h6><?= $item['qty']; ?></h6>

                                                        <?php if (isset($attachments[$item['id']])) { ?>
                                                            <div class="col-md-12">
                                                                <hr style="margin-top: 5px; margin-bottom: 5px">
                                                                <?php foreach ($attachments[$item['id']] as $attachment) { ?>
                                                                    <small><?= $attachment->qty; ?></small><br>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="col-md-12">
                                                        <h6><?= $item['price'] * $item['qty']; ?>.00</h6>

                                                        <?php if (isset($attachments[$item['id']])) { ?>
                                                            <div class="col-md-12">
                                                                <hr style="margin-top: 5px; margin-bottom: 5px">
                                                                <?php foreach ($attachments[$item['id']] as $attachment) { ?>
                                                                    <small> <?= $attachment->price * $attachment->qty; ?>.00</small><br>
                                                                    <?php $total += $attachment->price; } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php $total += $item['price']; } ?>
                                        
                                        <tr>
                                            <td><h3>Total</h3></td>
                                            <td></td>
                                            <td id="total-charges"><h3><b>$<?= $total; ?></b></h3></td>
                                        </tr>
                                        </tbody>
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
.right-preview h6 {
        color: #212529!important;
    }
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

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="https://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>

<script src="https://www.paypal.com/sdk/js?client-id=AT_Icbjcw3YvRSpTHABUViKGSJakF2373ouSfcEQYQjrvRkMuH84TVb_lfh1ZjLfAlWWFlWOtSEwIbtj&enable-funding=venmo&currency=USD"
        data-sdk-integration-source="button-factory"></script>

<script>
    let totalAmount = "<?=$total;?>";

    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',

            },

            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [
                        {
                            "amount":
                                {
                                    "currency_code": "USD",
                                    "value": parseInt(totalAmount)
                                }
                        }
                    ]
                });
            },

            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {

                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    $('#payment_data').val(JSON.stringify(orderData, null, 2));
                    $('#order-form').submit();

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function (err) {
                $('#error').show();
                const element = document.getElementById('detail-error');
                element.innerHTML = err;
                console.log(err);
            },

            // onClick is called when the button is clicked
            onClick: function (data, actions) {
                if ($("#order-form").valid()) {
                    return actions.resolve();
                } else {
                    return actions.reject();
                }

                $('#order-form').validate({
                    debug: true,
                    // initialize the plugin
                    rules: {
                        first_name: {
                            required: true,
                            text: true
                        },
                        last_name: {
                            required: true,
                            text: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            number: true
                        },
                        state: {
                            required: true,
                        },
                        address: {
                            required: true,
                            text: true
                        },
                        city: {
                            required: true,
                            text: true
                        },
                        post_code: {
                            required: true,
                            text: true
                        }
                    },
                });
            }
        }).render('#paypal-button-container');
    }

    initPayPalButton();
</script>
<style>
    .error {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
</style>