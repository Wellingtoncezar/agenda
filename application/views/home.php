<?php include('includes/head.php');?>
<body>
	<div class="container">
		<div class="page-header">
		  	<h1 class="titlePage">Agenda</h1>
			<div class="btn-group btn-group-sm pull-right groupAction">
			    <a class="btn btn-primary pull-right" href="<?=base_url()?>gerenciar/cadastrar/" role="button">
					<span class="glyphicons glyphicons-plus"></span> 
					Cadastrar
				</a>
			</div>
		</div>
		<section class="content">

			<div class="row">

				<div>
					<table id="tableAgenda" class="table table-striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Telefone</th>
								<th width="200">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($lista as $item):?>
							<tr id="item_<?=$item['pessoa']->id_pessoa?>">
								<td><?=$item['pessoa']->nome_pessoa;?></td>
								<td><?=$item['agenda']->telefone;?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url()?>gerenciar/editar/<?=$item['pessoa']->id_pessoa?>" class="btn btn-primary">Editar</a>
										<a href="javascript:void(0)" class="btn btn-danger btnExcluir" id_pessoa="<?=$item['pessoa']->id_pessoa?>">Excluir</a>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>

				</div>
				


			</div>
		</section>
	</div>


</body>
</html>