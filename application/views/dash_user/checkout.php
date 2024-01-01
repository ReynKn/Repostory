<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Payment Options</h3>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }

                input[type="radio"] {
                    width: 20px;
                    height: 20px;
                }

            </style>
            <div id="result">
                <?php if (!empty($this->session->flashdata('message'))): ?>
                    <p>
                        <?php echo $this->session->flashdata('message'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-container"
                style="width: 500px; margin: 0 auto; border: solid 1px #CCCCCC; border-radius: 5px; padding: 20px">
                <form method="post" action="<?php echo base_url('save/order'); ?>" style="text-align: left"
                    enctype="multipart/form-data"></br>
                    <span><input type="radio" name="payment_type" value="Cash On Delivery" />Cash On
                        Delivery (Tidak Perlu Foto Bukti Pembayaran)</span></br></br>
                    <span><input type="radio" name="payment_type" value="BRI" />BRI {034 3xx xxxx} [An/Vany]</span></br></br>
                    <span><input type="radio" name="payment_type" value="BCA" />BCA {0666 0100 0xxx xxx}
                        [An/Vany]</span></br></br>
                    <span><input type="radio" name="payment_type" value="Mandiri" />Mandiri {108 00x xxx xxxx}
                        [An/Vany]</span></br></br>
                    <span><input type="radio" name="payment_type" value="Panin" />Panin {577 xxx xxxx}
                        [An/Iwan]</span></br></br>
                    </br>
                    <!-- <div class="control-group">
                        <label class="control-label" for="fileInput">Product Image</label>
                        <div class="controls">
                            <input class="span6 typeahead" name="payment_image" id="fileInput" type="file" />
                        </div>
                    </div> -->
                    <input type="file" name="payment_image" id="payment_image" />
                    <?php if (!empty($error)): ?>
                        <?php echo $error; ?>
                    <?php endif; ?>
                    <br></br>
                    <p>Jika Foto tidak dimasukkan, maka dianggap memilih <span style="color: red;">COD</span></p>
                    <input type="submit" value="Pay" style="display: block; margin: 0 auto;">
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>