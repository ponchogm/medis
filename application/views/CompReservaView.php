<?php
	// Inicio HTML
	$this->load->view('sis_header');
?>

<div class="container-fluid" style='text-align:center'>
<div class="container-fluid">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<hr/>
		</div>
		<div class="col-md-1">
		</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>
			<div class="col-md-10">
				<div class="container-fluid">
					<div class="table-responsive">				
						<span style="font-size:12px;">
							<form action="" method="POST">
								<div class="panel panel-danger">
									<div class="panel-heading"><strong><h3>RESERVA CONFIRMADA</h3></strong></div>
										<table class="table table-hover" id="tbl_datos">
											<thead>
												<?php foreach ($comprobante as $fila){ ?>
													<tr align="center">
														<td align="center"><p><strong>ID RESERVA</strong></p></td>
														<td align="center"><p><strong>NOMBRE MEDICO</strong></p></td>
														<td align="center"><p><strong>ESPECIALIDAD</strong></p></td>	
														<td align="center"><p><strong>RESERVADO POR</strong></p></td>	
														<td align="center"><p><strong>FECHA RESERVA</strong></p></td>
														<td align="center"><p><strong>HORA</strong></p></td>					
														<td align="center"><p><strong>ESTADO RESERVA</strong></p></td>
														<td align="center"><p><strong>NOMBRE PACIENTE</strong></p></td>
													</tr>
													<tr align="center">
														<td><?=$fila->id_reserva?></td>
														<td><?=$fila->medico?></td>
														<td><?=$fila->especialidad?></td>
														<td><?=$fila->reservador?></td>
														<td><?=$fila->dia_fecha?></td>
														<td><?=$fila->hora?></td>
														<td><?=$fila->estado?></td>
														<td><?=$fila->nombre_paciente?></td>
													</tr>	
														<?php } ?>
												</thead>
												
										</table>
											<hr/>
											<div class="panel-footer" align="center">
												<?php
													if( isset($_SESSION['flag']) && $_SESSION['flag'] ){
														/*
															$_SESSION['flag'] == true 
																Significa que se actualizó exitosamente.
														*/ 
												?>
													<div class="container">
														<div class="alert alert-success alert-dismissible fade in">
															<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																Su reserva número <strong> <?=$fila->id_reserva?></strong> para el <strong><?=$fila->dia_fecha?> a las <?=$fila->hora?>hrs. </strong> a nombre de <strong><?=$fila->nombre_paciente?></strong> se ha confirmado exitosamente.
														</div>
													</div>
												<?php
													}
												?>
												<a class="btn btn-warning btn-md" href=<?=base_url("index.php/ReservaMedController")?>>Volver a Búsqueda de horas</a>
												</br></br>
											</div>
								</div>
							</form>
						</span>
					</div>
				</div>
			</div>
		<div class="col-md-1">
		</div>
	</div>
</div>
</br>
<?php
	// Fin HTML
	$this->load->view('sis_footer');
?>