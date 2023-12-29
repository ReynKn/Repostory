<!-- start: Content -->
<div id="content" class="span10">
    <style>
        .box {
            margin-top: 10px;
            color: #fff;
            background: lightsteelblue;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 200px;
            overflow: hidden;
        }

        .box i {
            font-size: 40px;
            color: #fff;
        }

        .box h1 {
            margin-top: 20px;
            font-size: 30px;
        }

        .box:hover {
            background: gold;
            color: #000;
            font-weight: bold;
        }

        .box:hover i,
        .box:hover h1 {
            color: #fff;
        }

    </style>
    <div class="row">

        <div class="col-sm-3">
            <div class="box 1">
                <i class="nc-icon nc-single-02"></i>
                <h1>
                    <?php $query = $this->db->query('SELECT * FROM user');
                    echo $query->num_rows(); ?>
                </h1>
                <h4>Users</h4>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box 2">
                <i class="nc-icon nc-cart-simple"></i>
                <h1>
                    <?php $query = $this->db->query('SELECT * FROM orders');
                    echo $query->num_rows(); ?>
                </h1>
                <h4>Orders</h4>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box 3">
                <i class="nc-icon nc-box-2"></i>
                <h1>
                    <?php $query = $this->db->query('SELECT * FROM product');
                    echo $query->num_rows(); ?>
                </h1>
                <h4>Products</h4>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box 4">
                <i class="nc-icon nc-money-coins"></i>
                <h1>
                    <?php $query = $this->db->query('SELECT SUM( order_total)as total FROM orders;')->row();
                    echo $query->total; ?>
                </h1>
                <h4>Total</h4>
            </div>
        </div>
    </div><!--/row-->

</div>