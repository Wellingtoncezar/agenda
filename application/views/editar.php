<?php include('includes/head.php');?>
<body>
	<div class="container">
		<div class="page-header">
		  	<h1 class="titlePage">Agenda <small class="subtitlePage">Editar</small></h1>
		  	<div class="btn-group btn-group-sm pull-right groupAction">
			    <a class="btn btn-primary pull-right" href="<?=base_url()?>" role="button">
					<span class="glyphicons glyphicons-plus"></span> 
					Voltar
				</a>
			</div>
		</div>
		<section class="content">
			
			

			<div class="row">
				<div class="col-sm-12">
					
					<form action="<?=base_url()?>gerenciar/atualizar" id="form_edicao" method="POST">
						<div class="col-sm-6">
							<div class="form-group">
							    <label>Nome</label>
							    <input type="nome" class="form-control" placeholder="Nome" name="nome" value="<?=$pessoa->nome_pessoa?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							    <label>E-mail</label>
							    <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?=$agenda->email?>">
							</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label>Telefone</label>
						  		<input type="tel" class="form-control" placeholder="Telefone" name="telefone" value="<?=$agenda->telefone?>">
						  	</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label>Endereço</label>
						  		<input type="text" class="form-control" placeholder="Endereço" name="endereco" value="<?=$pessoa->endereco?>">
						  	</div>
						</div>
					  	<input type="hidden" name="id_pessoa" value="<?=$pessoa->id_pessoa?>">
						<button type="submit" class="btn btn-success pull-right">Salvar</button>
					</form>
				</div>


			</div>
		</section>
	</div>


</body>
</html>