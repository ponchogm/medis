<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>
<div class="container">
<?= form_open("/Especialidades/actualizar/".$id_espe) ?>
<?php
	$cod_espe = array(
		'name' => 'id_espe',
		'class'=>'form-control',
		'placeholder' => 'Id Especialidad',
		'value' => $especialidad->result()[0]->cod_espe
	);
	$nombre_espe = array(
		'name' => 'nombre_espe',
		'class'=>'form-control',
		'placeholder' => 'Nombre Especialidad',
		'value' => $especialidad->result()[0]->nombre_espe
	);
?>
<?= form_label('Código Especialidad: ', 'id_espe') ?>
<?= form_input($cod_espe); ?>
<?= form_label('Nombre Especialidad: ', 'id_espe') ?>
<?= form_input($nombre_espe); ?>
<?php $atrib = array ('class'=>'btn btn-primary'); ?>
</br>
<?= form_submit('','Actualizar Especialidad', $atrib) ?>
<?= form_close() ?>
</div>
</br></br></br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>
