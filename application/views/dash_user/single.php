<style>
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .content {
        text-align: center;
    }

    .container {
        border: 1px solid #333;
        padding: 20px;
        background-color: #f7f7f7;
        margin: 0 auto;
        width: 800px;
    }

    .grid {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .grid img {
        border: 1px solid #ccc;
        padding: 5px;
        margin-bottom: 15px;
    }

    .product-info {
        text-align: center;
    }

    .product-details p {
        text-align: justify;
    }

    .product-details {
        max-width: 400px;
        margin: 0 auto;
        text-align: left;
    }

    .add-cart {
        text-align: center;
    }

    .buyfield {
        width: calc(70% - 130px);
        /* Menyesuaikan lebar input berdasarkan lebar tombol */
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        margin-right: 10px;
    }

    .buysubmit {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .buysubmit:hover {
        background-color: #45a049;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="container">
                <div class="cont-desc span_1_of_2">
                    <div class="grid images_3_of_2">
                        <?php if (isset($single_product->product_image)): ?>
                            <img src="<?php echo base_url('uploads/' . $single_product->product_image) ?>" alt=""
                                width="302px">
                        <?php endif; ?>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2>
                            <?php echo isset($single_product->product_title) ? $single_product->product_title : ''; ?>
                        </h2>
                        <p>
                            <?php echo isset($single_product->product_description) ? word_limiter($single_product->product_description, 250) : ''; ?>
                        </p>
                        <div class="price">
                            <p>Price: Rp. <span>
                                    <?php echo isset($single_product->product_price) ? $this->cart->format_number($single_product->product_price) : ''; ?>
                                </span></p>
                        </div>
                        <div class="add-cart">
                            <form action="<?php echo base_url('save/cart'); ?>" method="post">
                                <input type="number" class="buyfield" name="qty" value="1" />
                                <input type="hidden" class="buyfield" name="product_id"
                                    value="<?php echo isset($single_product->product_id) ? $single_product->product_id : ''; ?>" />
                                <input type="submit" class="buysubmit" name="submit" value="Buy Now" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>