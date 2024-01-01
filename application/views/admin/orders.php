<!-- start: Content -->
<div id="content" class="span10">
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Order</h2>
            </div>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red;
                }
            </style>
            <style>
                .text-success {
                    color: green;
                }

                .text-danger {
                    color: red;
                }

                .font {
                    font-weight: bold;
                }
            </style>
            <div id="result">
                <p>
                    <?php echo $this->session->flashdata('message'); ?>
                </p>
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
                            <th>Payment Proof</th>
                            <th>Payment Status</th>
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
                                <td class="center">
                                    <img 
                                    src="<?php echo base_url('uploads/' . $single_order->payment_image); ?>"
                                        alt="Payment Image" width="100">
                                </td>
                                <td style="text-align: center;">
                                    <?php
                                    $status = $single_order->payment_status;
                                    $class = ($status === 'Lunas') ? 'text-success font-weight-bold' : (($status === 'Sudah') ? 'text-info font-weight-bold' : 'text-danger font-weight-bold') ;
                                    echo "<span class='{$class}'>" . ucfirst($status) . "</span>";
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-info"
                                        href="<?php echo base_url('Admin/order_details/' . $single_order->order_id); ?>">View</a>
                                    <a class="btn btn-warning btn-edit-status text-white"
                                        data-orderid="<?php echo $single_order->order_id ?>">Edit Status</a>
                                    <button class="btn btn-danger btn-delete"
                                        data-orderid="<?php echo $single_order->order_id ?>">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('.btn-edit-status').click(function () {
                            var order_id = $(this).data('orderid');
                            var new_status = prompt('Masukkan status baru ("Lunas" atau "Belum Lunas atau "Sudah" (Sudah digunakan jika sudah ke excel)):');

                            if (new_status !== null && (new_status === 'Lunas' || new_status === 'Belum Lunas' || new_status === 'Sudah')) {
                                $.ajax({
                                    url: '<?php echo base_url('Admin/update_payment_status/') ?>' + order_id,
                                    method: 'POST',
                                    data: { order_id: order_id, new_status: new_status },
                                    success: function (response) {
                                        window.location.reload();
                                    },
                                    error: function () {
                                        alert('Gagal memperbarui status pembayaran.');
                                    }
                                });
                            } else {
                                alert('Status tidak valid. Harap masukkan "Lunas" atau "Belum Lunas" atau "Sudah.');
                            }
                        });
                    });
                </script>
                <script>
                    $(document).ready(function () {
                        $('.btn-delete').click(function () {
                            if (confirm('Anda yakin ingin menghapus pesanan ini?')) {
                                var order_id = $(this).data('orderid');

                                $.ajax({
                                    url: '<?php echo base_url('Admin/delete_order/') ?>' + order_id,
                                    method: 'POST',
                                    success: function (response) {
                                        window.location.reload();
                                    },
                                    error: function () {
                                        alert('Gagal menghapus pesanan.');
                                    }
                                });
                            }
                        });

                    });

                </script>
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->