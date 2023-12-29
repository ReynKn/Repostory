<!-- start: Content -->
<div id="content" class="span10">
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Order</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
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
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Customer Name</th>
                            <th>Customer Phone Number</th>
                            <th>Customer Email</th>
                            <th>Total Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_manage_order_info as $single_order) {
                            $i++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $single_order->customer_name ?>
                                </td>
                                <td>
                                    <?php echo $single_order->customer_phone ?>
                                </td>
                                <td>
                                    <?php echo $single_order->customer_email ?>
                                </td>
                                <td>Rp.
                                    <?php echo $this->cart->format_number($single_order->order_total) ?>
                                </td>
                                <td>

                                    <a class="btn btn-info"
                                        href="<?php echo base_url('Admin/order_details/' . $single_order->order_id); ?>">View</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->