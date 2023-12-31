<!-- start: Content -->
<div id="content" class="span8">
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><span class="break"></span>Order Details (
                    <?php
                    $payment_status = ($order_info->payment_status === 'Lunas') ? 'Lunas' : (($order_info->payment_status === 'Sudah') ? 'Sudah' : 'Belum Lunas');
                    echo $payment_status;
                    ?>
                    )
                </h2>
            </div>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }
            </style>
            <div id="result">
                <p>
                    <?php echo $this->session->flashdata('message'); ?>
                </p>
            </div>

            <div class="box-content">
                <div class="row-fluid">
                    <div class="span4 text-left">
                        <h2>Customer Info
                            <?php echo $customer_info->customer_id; ?>
                        </h2>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Customer Name : </td>
                                <td>
                                    <?php echo $customer_info->customer_name; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer Address : </td>
                                <td>
                                    <?php echo $customer_info->customer_address; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer Phone : </td>
                                <td>
                                    <?php echo $customer_info->customer_phone; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer Email : </td>
                                <td>
                                    <?php echo $customer_info->customer_email; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="span4 text-right" class="table table-striped table-bordered">
                        <h2>Shipping Info
                            <?php echo $shipping_info->shipping_id; ?>
                        </h2>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Shpping Name : </td>
                                <td>
                                    <?php echo $shipping_info->shipping_name; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping Address : </td>
                                <td>
                                    <?php echo $shipping_info->shipping_address; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping Mobile : </td>
                                <td>
                                    <?php echo $shipping_info->shipping_phone; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping Email : </td>
                                <td>
                                    <?php echo $shipping_info->shipping_email; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Product Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($order_details_info as $single_order_details) {
                            $i++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $single_order_details->product_name ?>
                                </td>
                                <td><img src="<?php echo base_url('uploads/' . $single_order_details->product_image); ?>"
                                        style="width:100px;height:auto;" /></td>
                                <td>Rp.
                                    <?php echo $this->cart->format_number($single_order_details->product_price) ?>
                                </td>
                                <td>
                                    <?php echo $single_order_details->product_quantity ?>
                                </td>
                                <td>Rp.
                                    <?php echo $this->cart->format_number($single_order_details->product_price * $single_order_details->product_quantity) ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfooter>
                        <td colspan="5" style="font-weight: bold;">Total Amount</td>
                        <td style="font-weight: bold;">Rp.
                            <?php echo $this->cart->format_number($order_info->order_total) ?>
                        </td>
                    </tfooter>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->