<?php include('includes/head.php');?>
<body>
	<div class="container">
		<div class="page-header">
		  	<h1 class="titlePage">Agenda <small class="subtitlePage">Cadastrar</small></h1>
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
					
					<form action="<?=base_url()?>gerenciar/inserir" id="form_cadastro" method="POST">
						<div class="col-sm-6">
							<div class="form-group">
							    <label>Nome</label>
							    <input type="nome" class="form-control" placeholder="Nome" name="nome">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							    <label>E-mail</label>
							    <input type="email" class="form-control" placeholder="E-mail" name="email">
							</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label>Telefone</label>
						  		<input type="tel" class="form-control" placeholder="Telefone" name="telefone">
						  	</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label>Endereço</label>
						  		<input type="text" class="form-control" placeholder="Endereço" name="endereco">
						  	</div>
						</div>
						<button type="submit" class="btn btn-success pull-right">Salvar</button>
					</form>
				</div>


			</div>
		</section>
	</div>


</body>
</html>