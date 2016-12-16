<?php
    foreach($professional_data as $row)
    {
?>

    <!--=== Shop Product ===-->
    <div class="shop-product">
       
        
        
        <!-- Product Body -->
        <div class="container">
            <div class="row product_body">
               <!-- Categories and related products-->
                <div class="col-md-3">
                <!-- Inicio Categorías -->

                <div class="categories_body">
                    Categorías
                </div>
                <!-- Fin Categorías -->
                </div>
                   
                <div class="col-md-4">
                    <div class="ms-showcase2-template">
                    <div class="nameProfessional">
                    <?php echo $row['nombre']; ?>
                    </div>
                       <img src="<?php echo base_url();?>uploads/professional/logo_<?php echo $row['id_vendor'];?>.png" width="100%" />
                    </div>
                </div>
                <div class="col-md-5" style="border-right:1px solid #D4D4D4;">
                    <div class="professional-heading">
                        <div class="serviceProfessional"><?php echo $row['servicio_prestar']; ?></div>
                        <div class="col-md-6 shadow-wrapper">       
                        </div>

                    </div><!--/end shop product social-->
                    <div class="description-service">Descripción del servicio </div>
                    <div class="description"><?php echo $row['description']?> </div>
                    <br />
                        
                        <br />

                    <?php
                     if ($this->session->userdata('user_login') != "yes") {
                              echo '<div class="registerProfessional"><span class="dataLogin">Para ver los datos de contacto debes iniciar sesión</span>
                            <input type="submit" value="Contactar profesional"></div>';
                        }
                        else{

                            if ($_GET['item'] == '1'){
                                 echo '
                                <div class="profileProfessional">
                                    <table>
                                        <tr> <td> Correo Electrónico: </td> <td>'.$row['email'].'</td></tr>
                                        <tr> <td> Ciudad: </td><td>'.$row['ciudad'].'</td></tr>
                                        <tr> <td> Teléfono: </td><td>'.$row['telefono'].'</td></tr>
                                    </table>
                                </div>';
                            }
                            else{
                                ?>
                                   <form method="get" action="">
                                    <input type="hidden" name="item" value="1">
                                    <input type="submit" value="Ver datos">
                                   </form>
                                <?php
                            }

                           

                        }
                        
                    ?>

                    


            </div><!--/end row-->
        </div>    
    </div>
    <!--=== End Product Body ===-->

    <?php
}
?>
