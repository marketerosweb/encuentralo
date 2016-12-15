<?php
$conexion = new mysqli('localhost', 'arketero_encu', 'marketeros123', 'arketero_encuentralo');
mysqli_set_charset($conexion, 'utf-8');

$inscritos = 'SELECT * FROM inscripciones ORDER BY id_registro DESC';
$buscar = $conexion->query($inscritos);

?>
<table width="100%" border="1">
<tr> 
<th>Nombre</th>
<th>Tienda</th>
<th>NIT</th>
<th>Teléfono</th>
<th>Celular</th>
<th>Email</th>
<th>Productos que ofrece</th>
<th>Ciudad</th>
<th>Fecha de inscripción</th>
</tr>

<?php
while( $buscartotal = $buscar->fetch_array() ){
	?>
	<tr>
	<td> <?php echo $buscartotal['nombre']; ?> </td>
	<td> <?php echo $buscartotal['nom_comercio']; ?> </td>
	<td> <?php echo $buscartotal['nit']; ?> </td>
	<td> <?php echo $buscartotal['telefono']; ?> </td>
	<td> <?php echo $buscartotal['celular']; ?> </td>
	<td> <?php echo $buscartotal['email']; ?> </td>
	<td> <?php echo $buscartotal['productos']; ?> </td>
	<td> <?php echo $buscartotal['ciudad']; ?> </td>
	<td> <?php echo $buscartotal['time']; ?> </td>
	</tr>
	<?php
}

?>
</table>