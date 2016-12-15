<!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="text-center">Factura</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content invoice_div box-border margin-top-20 margin-bottom-20">
    <?php
        $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
        foreach($sale_details as $row){
    ?>
        <!--Invoice Header-->
        <div class="row invoice-header">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="" width="60%">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 invoice-numb">
            	<ul class="list-unstyled">
                    <li><strong>Pedido No: </strong> : <?php echo $row['sale_code']; ?> </li>
                    <li><strong>Fecha: </strong> : <?php echo date('d M, Y',$row['sale_datetime'] );?></li>
                </ul>
            </div>
        </div>
        <!--End Invoice Header-->

        <!--Invoice Detials-->
        <div class="row invoice-info">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="tag-box tag-box-v3">
                    <?php
                        $info = json_decode($row['shipping_address'],true);
                    ?>
                    <h2>Información del Cliente</h2>
                    <ul class="list-unstyled">
                        <li><strong>Nombre: </strong> <?php echo $info['firstname']; ?></li>
                        <li><strong>Apellido: </strong> <?php echo $info['lastname']; ?></li>
                        <li><strong>Ciudad: </strong> <?php echo $info['city']; ?></li>
                    </ul>
                </div>        
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="tag-box tag-box-v3">
                    <h2>Detalles de pago</h2>  
                    <ul class="list-unstyled">       
                        <li><strong>Estado del pago: </strong> <i><?php echo translate($this->crud_model->sale_payment_status($row['sale_id'])); ?></i></li>
                        <li><strong>Forma de pago: </strong> <?php echo ucfirst(str_replace('_', ' ', $info['payment_type'])); ?></li>  
                    </ul>
                </div>
            </div>
        </div>
        <!--End Invoice Detials-->

        <!--Invoice Table-->
        <div class="panel panel-purple margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title">Detalles de la factura</h3>
            </div>
            <table class="table table-striped invoice-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Artículo</th>
                        <th>Detalles</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $product_details = json_decode($row['product_details'], true);
                        $i =0;
                        $total = 0;
                        foreach ($product_details as $row1) {
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td>
                                <?php 
                                    $option = json_decode($row1['option'],true);
                                    foreach ($option as $l => $op) {
                                        if($l !== 'color' && $op['value'] !== '' && $op['value'] !== NULL){
                                ?>
                                    <?php echo $op['title'] ?> : 
                                    <?php 
                                        if(is_array($va = $op['value'])){ 
                                            echo $va = join(', ',$va); 
                                        } else {
                                            echo $va;
                                        }
                                    ?>
                                    <br>
                                <?php
                                        }
                                    } 
                                ?>
                            </td>
                            <td><?php echo $row1['qty']; ?></td>
                            <td style="text-align:center;"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                            <td style="text-align:right;"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!--End Invoice Table-->
        <!--Invoice Footer-->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                <div class="tag-box tag-box-v6">
                    <h2><?php echo translate('address');?></h2>
                    <address>
                        <?php echo $info['address1']; ?> <br>
                        <?php echo $info['address2']; ?> <br>
                        <?php echo translate('city');?> : <?php echo $info['city']; ?> <br>
                        <?php echo translate('zip');?> : <?php echo $info['zip']; ?> <br>
                        <?php echo translate('phone');?> : <?php echo $info['phone']; ?> <br>
                        <?php echo translate('e-mail');?> : <a href=""><?php echo $info['email']; ?></a>
                    </address>
                </div>            
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
            	<div class="tag-box tag-box-v6" style="padding:0px 15px !important;">
                 	 <table class="table">
                     	<tr>
                        	<td>Sub Total :</td>
                        	<td><?php echo currency().$this->cart->format_number($total);?></td>
                        </tr>
                        <tr>
                        	<td>IVA :</td>
                            <td><?php echo currency().$this->cart->format_number($row['vat']);?></td>
                        </tr>
                        <tr>
                        	<td>Envío :</td>
                            <td><?php echo currency().$this->cart->format_number($row['shipping']);?></td>
                        </tr>
                        <tr>
                        	<td>Total :</td>
                            <td><?php echo currency().$this->cart->format_number($row['grand_total']);?></td>
                        </tr>
                     </table>
               </div>
               
                <button class="btn-u btn-u-cust push pull-right margin-bottom-10" onclick="javascript:window.print();">
                	<i class="fa fa-print"></i> Imprimir
                </button>
            </div>
        </div>
       
        <!--End Invoice Footer-->
        <style type="text/css">
            @media print {
                .push{
                    display: none;
                }
                .topbar-v3{
                    display: none;
                }
                .breadcrumbs{
                    display: none;
                }
                .footer{
                    display: none;
                }
                .copyright{
                    display: none;
                }
                #mapa{
                    display: none;
                }
                .invoice_div{
                    display: block;
                }
            }
        </style>
        <?php
            $position = explode(',',str_replace('(', '', str_replace(')', '',$info['langlat'])));
        ?>
     
    <?php } ?>
    </div><!--/container-->     
    <!--=== End Content Part ===-->