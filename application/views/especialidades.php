<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container">
	<h4>MANTENEDOR DE ESPECIALIDADES</br></h4>
</div>
<div class="container">
	<br>
	<?= form_open("/Especialidades/add_esp") ?>
	<?php 
		$codigo_esp = array(
			'name' => 'cod',
			/*'placeholder' => 'Ingrese Código',*/
			'class'=>'form-control'
		);
		$nombre_esp = array(
			'name' => 'nombre',
			/*'placeholder' => 'Nombre especialidad',*/
			'class'=>'form-control'
		);
	?>
	<div class="form-group">
	<label>
		Código Especialidad:
		<!-- tb el label se puede poner asi<?= form_label('Código Especialidad: ','cod') ?> -->
		<?= form_input($codigo_esp) ?>
	</label>
	</div>
	<div class="form-group">
	<label>
		Nombre Especialidad:
		<?= form_input($nombre_esp) ?>
	</label>
	</div>
	<?php $atrib = array ('class'=>'btn btn-primary'); ?>
	<?= form_submit('','Ingresar Nueva Especialidad', $atrib) ?>
	<?= form_close() ?>
	</br></br></br></br>
	<table class="table table-striped">
		<tr>
			<th>Código de Especialidad</th>
			<th>Nombre de Especialidad</th>
			<th colspan="2">Acciones</th>
		</tr>
		<tr>
		<?php
			if ($consulta) {
			foreach ($consulta->result() as $esp) { ?>
				<tr>
					<td><?= $esp->cod_espe; ?></td>
					<td><?= $esp->nombre_espe ?></td>
					<td><a href="<?=base_url('index.php/Especialidades/editar/'.$esp->id_espe);?>">Editar</a></td>
					<td><a href="<?=base_url('index.php/Especialidades/eliminar/'.$esp->id_espe);?>">Eliminar</a></td>
				</tr>
			<?php }
		}else{
			echo "<tr>
					<td colspan='4'>No existen registros en esta tabla</td>
				</tr>";
		}
		?>
	</table>
</div>
</br></br></br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>