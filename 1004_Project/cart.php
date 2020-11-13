<?php
    include "head.inc.php";
?>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>


<style>
    .popover
    {
        width: 100%;
        max-width: 800px;
    }
</style>

<!--  Cart Popover button-->
<div class="container">
    <br />
    <br />

    <ul class="navbar-nav ml-auto">
            <a class="nav-link" title="Shopping Cart" href="#">
                <i class="material-icons" style="font-size:2em" data-container="body" data-toggle="popover" data-placement="bottom"
                   data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">shopping_cart</i>
            </a>
</div>




















<!---->
<!--<!--Contents in Cart Popover-->-->
<!--    <div class="popover-content">-->
<!--        <h3 class="popover-title">Shopping Cart</h3>-->
<!--        <span id="cart_details">-->
<!--        <div class="table-responsive" id="order_table">-->
<!--            <table class="table table-bordered table-striped">-->
<!---->
<!--                <tbody><tr>-->
<!--                    <th width="40%">Product Name</th>-->
<!--                    <th width="10%">Quantity</th>-->
<!--                    <th width="20%">Price</th>-->
<!--                    <th width="15%">Total</th>-->
<!--                    <th width="5%">Action</th>-->
<!--                </tr>-->
<!---->
<!--            <tr>-->
<!--                <td colspan="5" align="center">-->
<!--                    Your Cart is Empty!-->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--            </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--        </span>-->
<!---->
<!--            <div align="right">-->
<!--                <a href="#" class="btn btn-primary" id="check_out_cart">-->
<!--                    <span class="glyphicon glyphicon-shopping-cart"></span> Check out-->
<!--                </a>-->
<!--                <a href="#" class="btn btn-default" id="clear_cart">-->
<!--                    <span class="glyphicon glyphicon-trash"></span> Clear-->
<!--                </a>-->
<!--            </div>-->
<!--    </div>-->
