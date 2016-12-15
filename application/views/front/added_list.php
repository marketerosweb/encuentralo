<li>
    <a href="<?php echo base_url(); ?>index.php/home/cart_checkout">
        <i class="fa fa-shopping-cart"></i>
    </a>
    <span class="badge badge-sea rounded-x counter" id="counter"><?php echo count($carted); ?></span>
    <?php if(count($carted) > 0){ ?>
    <ul id="scrollbar" class="list-unstyled badge-open contentHolder">
        <?php 
            $tax        = 0;
            $shipping   = 0;
            $grand      = 0;
            foreach ($carted as $items){ 
        ?>
        <li>
            <img src="<?php echo $items['image']; ?>" alt="">
            <button type="button" class="close remove_from_cart" style="color:white;" data-rowid="<?php echo $items['rowid']; ?>" data-pid="<?php echo $items['id']; ?>">×</button>
            <div class="overflow-h">
                <span><?php echo $items['name']; ?></span>
                <small>Valor <?php echo currency().$this->cart->format_number($items['price']); ?></small>
                <small>IVA: <?php echo currency(); ?><?php echo $tax_n = $this->cart->format_number($items['tax']*$items['qty']); $tax += $tax_n; ?></small>
                <br>
                <?php if($this->crud_model->get_type_name_by_id('business_settings','3','value') == 'product_wise'){ ?>
                <small>Envío: <?php echo currency(); ?><?php echo $shipping_n = $this->cart->format_number($items['shipping'])*$items['qty']; $shipping += $shipping_n;  ?></small>
                <br>
                <small>Total : <?php echo currency(); ?><?php echo $this->cart->format_number($items['subtotal']+$shipping_n+$tax_n); ?></small>
                <?php } else { ?>
                <small>Total : <?php echo currency(); ?><?php echo $this->cart->format_number($items['subtotal']+$tax_n); ?></small>
                <?php } ?>
            </div>
        </li>
        <?php } ?>
        <li class="subtotal" id="subtotal">
            <div class="overflow-h margin-bottom-10">
                <div>
                    <span>Subtotal: </span>
                    <span class="pull-right subtotal-cost" id="scroll_total"></span>
                    <br>
                    <span>IVA: </span>
                    <span class="pull-right subtotal-cost" id="scroll_tax"></span>
                    <br>
                    <span>Envío: </span>
                    <span class="pull-right subtotal-cost" id="scroll_ship"></span>
                    <br>
                    <span >Total: </span>
                    <span class="pull-right subtotal-cost" id="scroll_grand"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="btn-u btn-u-light-violet-shop btn-block" id="empty">
						Vaciar la bolsa
                    </div>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo base_url(); ?>index.php/home/cart_checkout" class="btn-u btn-u-light-violet-shop btn-block">Comprar</a>
                </div>
            </div>
        </li>
    </ul>
    <?php } ?>
</li>
<script>
	var add_to_cart = '<?php echo translate('add_to_cart'); ?>';
	var cart_emptied  = '<?php echo translate('cart_emptied'); ?>';
	var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url(); ?>template/front/assets/js/custom/added_list.js"></script>