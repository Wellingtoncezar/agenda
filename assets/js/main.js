$(function(){
	var table = $('#tableAgenda').DataTable();

	// $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	// 	var letra = $(e.target).data('letra');
	// 	$('#letra_'+letra+' #tableAgenda').DataTable();
	//   	 // newly activated tab
	//   	// e.relatedTarget // previous active tab
	// });
	// 


	$('#form_cadastro').submit(function(){
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',
			// dataType: 'json, script, or html)',
			data: $(this).serialize(),
		})
		.done(function(data) {
			if(data == true)
			{
				console.log(data);
				$.notify({
					message: 'Dados enviados com sucesso',
				},{
					type: "success",
					placement: {
						from: "bottom",
						align: "right"
					}
				});

				$('#form_cadastro').trigger('reset');
			}else
			{
				$.notify({
					message: data,
				},{
					type: "warning",
					placement: {
						from: "bottom",
						align: "right"
					}
				});
			}
		});
		return false;
		
	})


	$('#form_edicao').submit(function(){
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',
			// dataType: 'json, script, or html)',
			data: $(this).serialize(),
		})
		.done(function(data) {
			if(data == true)
			{
				console.log(data);
				$.notify({
					message: 'Dados atualizados',
				},{
					type: "success",
					placement: {
						from: "bottom",
						align: "right"
					}
				});

			}else
			{
				$.notify({
					message: data,
				},{
					type: "warning",
					placement: {
						from: "bottom",
						align: "right"
					}
				});
			}
		});
		return false;
		
	});


	table.$('.btnExcluir').on('click', function(){
		var id_pessoa = $(this).attr('id_pessoa');
		$.ajax({
			url: baseurl+'gerenciar/excluir',
			type: 'POST',
			data: {id_pessoa, id_pessoa},
		})
		.done(function(data) {
			if(data == true)
			{
				console.log(data);
				$.notify({
					message: 'Registro excluído',
				},{
					type: "success",
					placement: {
						from: "bottom",
						align: "right"
					}
				});
				$('tr#item_'+id_pessoa).remove();

			}else
			{
				$.notify({
					message: data,
				},{
					type: "warning",
					placement: {
						from: "bottom",
						align: "right"
					}
				});
			}
		});
		return false;

	})
})