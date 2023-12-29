<div class="main">
    <div class="content mt-6" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }

                .form-container {
                    border: 2px solid black;
                    padding: 20px;
                    border-radius: 10px;
width: 600px;
                    color: white;
                }

                .btn-primary {
                    background-color: royalblue;
                    color: white;
                    border-color: royalblue;
                }

                .btn-primary:hover {
                    background-color: gold;
                    color: black;
                    border-color: gold;
                }
            </style>
            <div id="result">
                <p>
                    <?php echo $this->session->flashdata('message'); ?>
                </p>
            </div>
            <form method="post" action="<?php echo base_url('customer/save/shipping_address'); ?>">
                <table>
                    <div class="form-container">
                        <div class="text-center ma">
                            <h4 class="font-weight-bolder" style="color:black">Shipping Form</h4>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Masukkan Namamu" aria-label="shipping_name" name="shipping_name"
                                        id="shipping_name" value="<?= set_value('shipping_name'); ?>">
                                    <?= form_error('shipping_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div style="width: 48%;">
                                <div class="mb-3">
                                    <input type="email" class="form-control form-control-user"
                                        placeholder="Masukkan Emailmu" aria-label="shipping_email" id="shipping_email"
                                        name="shipping_email" value="<?= set_value('shipping_email'); ?>">
                                    <?= form_error('shipping_email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-user" placeholder="Masukkan Alamatmu"
                                aria-label="" id="shipping_address" name="shipping_address"
                                value="<?= set_value('shipping_address'); ?>">
                            <?= form_error('shipping_address', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-user"
                                placeholder="Masukkan Nomor Telepon yang Bisa Dihubungi" aria-label=""
                                id="shipping_phone" name="shipping_phone" value="<?= set_value('shipping_phone'); ?>">
                            <?= form_error('shipping_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Diantarkan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>