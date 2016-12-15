
<!--=== Breadcrumbs ===-->
    <div style="padding:10px;background:rgba(212, 224, 212, 0.72)">
        <center>
            <h1 class="text-center; "><img src="http://encuentralopronto.com/uploads/logo_image/logo_3.png" alt="" width="60%"> </h1>
        </center><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <table width="100%" style="background:rgba(212, 224, 212, 0.17);">
    <?php
        $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
        foreach($sale_details as $row){
    ?>
        <!--Invoice Header-->
        <tr>
        
            <td style="padding:10px;">
            <?php
                        $imagen = json_decode($row['delivery_status'],true);
                    ?>
            <img src='http://encuentralopronto.com/uploads/vendor/logo_<?php echo $imagen['vendor']; ?>.png' />
                
            </td>
            <td>
                <table>
                    <tr><td><strong>Pedido No:</strong> <?php echo $row['sale_code']; ?> </td></tr>
                    <tr><td><strong>Fecha: </strong> <?php echo date('d M, Y',$row['sale_datetime'] );?></td></tr>
                </table>
            </td>
        </tr>
        <!--End Invoice Header-->

        <!--Invoice Detials-->
        <tr>
            <td style="padding:20px;">
                <div class="tag-box tag-box-v3">
                    <?php
                        $info = json_decode($row['shipping_address'],true);
                    ?>
                    <h2>Información del cliente</h2>
                    <table>
                        <tr><td><strong>Nombre: </strong> <?php echo $info['firstname']; ?></td></tr>
                        <tr><td><strong>Apellido: </strong> <?php echo $info['lastname']; ?></td></tr>
                        <tr><td><strong>Ciudad: </strong> <?php echo $info['city']; ?></td></tr>
                    </table>
                </div>        
            </td>
            <td>
                <div class="tag-box tag-box-v3">
                    <h2>Detalles de pago: </h2>  
                    <table>       
                        <tr><td><strong><?php echo translate('payment_status_:');?></strong> <i><?php echo translate($this->crud_model->sale_payment_status($row['sale_id'])); ?></i></td></tr>
                        <tr><td><strong><?php echo translate('payment_method_:');?></strong> <?php echo ucfirst(str_replace('_', ' ', $info['payment_type'])); ?></td></tr>  
                    </table>
                </div>
            </td>
        </tr>
        <!--End Invoice Detials-->

        <!--Invoice Table-->
        <tr>
            <td style="padding:10px 5px 0px; background:#35b7e9; color:white; text-align:center;" colspan="2" >
                <h3>Detalles de factura</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:0px;">
            <table width="100%">
                <thead>
                    <tr>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)">No. </th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)">Artículo</th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)">Cantidad</th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)">Precio Unitario</th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)">Total</th>
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
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $i; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1['name']; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1['qty']; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                            <td style="padding: 5px;text-align:right;background:rgba(128, 128, 128, 0.18)"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <td>
        </tr>
        <!--End Invoice Table-->

        <!--Invoice Footer-->
        <tr>
            <td width="50%" style="background:rgba(212, 224, 212, 0.72)">
                 <table>
                    <tr >
                        <td style="padding:10px 20px;"><h2><?php echo translate('address');?></h2></td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo $info['address1']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo $info['address2']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('city');?> : <?php echo $info['city']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('zip');?> : <?php echo $info['zip']; ?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('phone');?> : <?php echo $info['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('e-mail');?> : <?php echo $info['email']; ?>
                        </td>    
                    </tr> 
                 </table> 
            </td>
            <td style="text-align:right;">
                 <table width="100%">
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%; "><h3>Subtotal :</h3></td>
                        <td style="text-align:right;padding:3px"><h3><?php echo currency().$this->cart->format_number($total);?></h3></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%;"><h3>IVA :</h3></td>
                        <td style="text-align:right;padding:3px"><h3><?php echo currency().$this->cart->format_number($row['vat']);?></h3></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%;"><h3>Envío :</h3></td>
                        <td style="text-align:right;padding:3px"><h3><?php echo currency().$this->cart->format_number($row['shipping']);?></h3></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%;"><h2>Total :</h2></td>
                        <td style="text-align:right;padding:3px"><h2><?php echo currency().$this->cart->format_number($row['grand_total']);?></h2></td>
                    </tr>
                 </table>
               
            </td>
        </tr>
    <?php } ?>
    </table><!--/container-->     
    <!--=== End Content Part ===-->
    <h4>&nbsp;</h4>