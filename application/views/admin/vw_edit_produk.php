<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
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
                <p>
                    <?php echo $this->session->flashdata('message'); ?>
                </p>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="box-content">
                <form action="<?= base_url('admin/update_product/' . $product_info_by_id->product_id) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="product_title" class="form-control"
                            value="<?= isset($product_info_by_id->product_title) ? $product_info_by_id->product_title : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea name="product_description"
                            class="form-control"><?= isset($product_info_by_id->product_description) ? $product_info_by_id->product_description : '' ?></textarea>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Product Image</label>
                        <div class="controls">
                            <input class="span6 typeahead" name="product_image" id="fileInput" type="file" />
                            <?php if (isset($product_info_by_id->product_image) && !empty($product_info_by_id->product_image)): ?>
                                <img src="<?= base_url('uploads/' . $product_info_by_id->product_image); ?>"
                                    style="width:100px;height:auto;" />
                            <?php else: ?>
                                <p>No image available</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="product_price" class="form-control"
                            value="<?= isset($product_info_by_id->product_price) ? $product_info_by_id->product_price : '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="number" name="product_quantity" class="form-control"
                            value="<?= isset($product_info_by_id->product_quantity) ? $product_info_by_id->product_quantity : '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Product Featured</label><br>
                        <input type="radio" name="product_feature" value="0"
                            <?= (isset($product_info_by_id->product_feature) && $product_info_by_id->product_feature == '0') ? 'checked' : '' ?>> Unfeatured
                        <input type="radio" name="product_feature" value="1"
                            <?= (isset($product_info_by_id->product_feature) && $product_info_by_id->product_feature == '1') ? 'checked' : '' ?>> Featured
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn">Cancel</button>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->