var table = "";
var tableLideres = "";

$(document).ready(function() {
	
	modalExcluirMinisterio();
	modalAlterarMinisterio();
	modalEfetuarCompra();
	modalremoverVinculo();

	
	$(".respostaAjax").hide();
	
    table = $('#tblMinisterios').DataTable({
    	"aaSorting": [[1, "asc"]],
    	"oLanguage": {
	        "sEmptyTable": "Nenhum registro encontrado.",
	        "sInfo": "_TOTAL_ registros",
	        "sInfoEmpty": "0 Registros",
	        "sInfoFiltered": "(De _MAX_ registros)",
	        "sInfoPostFix":    "",
	        "sInfoThousands":  ".",
	        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
	        "sLoadingRecords": "Carregando...",
	        "sProcessing":     "Processando...",
	        "sZeroRecords": "Nenhum registro encontrado.",
	        "sSearch": "Pesquisar",
	        "oPaginate": {
	            "sNext": "Proximo",
	            "sPrevious": "Anterior",
	            "sFirst": "Primeiro",
	            "sLast":"Ultimo"
	           }
	        },
    	"ajax" : "ministerio/listar_ministerios",
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets": 6,
            "data": null,
            "defaultContent": "<a href='#alteraMinisterio' title='Alterar Ministério' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#excluirMinisterio' title='Apagar Ministério' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a>"
        }
        ],
    	"columns" : [{"data" : "ID_Minist"}, {"data" : "Nome"}, {"data" : "Jovem_Nome"}, {"data" : "Telefone"}, {"data" : "Celular"},{"data" : "Email"}]
    });

    $("#filtroJovensMinist").change(function() {
    	var idMinist = $( "#filtroJovensMinist option:selected" ).val();
    	tableLideres.destroy();
	 	preencherTableJovensMinist(idMinist);

	});
    
    preencherTableJovensMinist(0);
    
    $("#nmevento option").click(function(){
    	var nomeEvento = $("#nmevento option:selected").val();
    	$(".precos").val(nomeEvento);
    });
    
    $("#nmevento option").click(function(){
    	var idevento = $("#nmevento option:selected").val();
    	
    	$.ajax({
			url : "ingressos/listarPrecoPorId/" + idevento,
			type : "POST",
			data: {
				idevento : idevento
			},
			success : function(data) {
				var json = $.parseJSON(data);
				
				if(json.tipo == "success"){
					$(".respostaAjax").show();
					$(".evento_idevento").val(idevento);
					$(".precos").val(json.preco);
				}else{
					
				}
			}
		});
    	
    });
    


});


function preencherTableJovensMinist(idMinist){
	//var idMinist = 1;
	tableLideres = $('#tblJovensMinisterio').DataTable({
		//exportação de dados
		dom: 'T<"clear">lfrtip',
		tableTools: 
		{
		
		
			"sSwfPath": "./utils/swf/copy_csv_xls_pdf.swf",
			"aButtons": [

			
                {
					"sExtends": "copy",
					"sButtonText": "Copiar",
					"mColumns": [1,2,3,4,5,6],
					"oSelectorOpts":{
						page: 'current'
					},
                } ,

               	//grupo impressão
                {
					"sExtends": "print",
					"sButtonText": "Imprimir",
					"sInfo": "Pagina para impressão Gerada! Aperte Esc para voltar",
					"mColumns": [1,2,3,4,5,6],
					"oSelectorOpts":{
									page: 'current'
							        },						
                } ,

                //grupo PDF

                {
					"sExtends": "pdf",
					"sButtonText": "Exportar PDF",								
					"mColumns": [1,2,3,4,5,6],								
					"oSelectorOpts":{								
					page: 'current'						                		
					},		            							
					"sPdfOrientation": "landscape"										
				},            			
												
            ]
        },
		//fim exportação de dados
		"aaSorting": [[1, "asc"]],
    	"oLanguage": {
	        "sEmptyTable": "Nenhum registro encontrado.",
	        "sInfo": "_TOTAL_ registros",
	        "sInfoEmpty": "0 Registros",
	        "sInfoFiltered": "(De _MAX_ registros)",
	        "sInfoPostFix":    "",
	        "sInfoThousands":  ".",
	        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
	        "sLoadingRecords": "Carregando...",
	        "sProcessing":     "Processando...",
	        "sZeroRecords": "Nenhum registro encontrado.",
	        "sSearch": "Pesquisar",
	        "oPaginate": {
	            "sNext": "Proximo",
	            "sPrevious": "Anterior",
	            "sFirst": "Primeiro",
	            "sLast":"Ultimo"
	           }
	        },
    	"ajax" : "ministerio/listar_jovens_ministerios/" + idMinist,
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets": 7,
            "data": null,
            "defaultContent": "<a href='#excluirVinculo' title='Remover do Ministério' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-remove'></i></a>"
            
        }
        ],
    	//"columns" : [{"data" : "Nome"}, {"data" : "Jovem_Nome"}, {"data" : "Telefone"}, {"data" : "Celular"}, {"data" : "Email"}]
    	"columns" : [ {"data" : "ID_Minist"}, {"data" : "Nome"}, {"data" : "Jovem_Nome"},{"data" : "RG"},{"data" : "Telefone"}, {"data" : "Celular"}, {"data" : "Email"}]
    });
}

$(document).ready(function() {
	$.ajax({
		url: "ministerio/listar_ministerios",
		context: document.body,
		type: "GET",
		success: function(data){
			$('#filtroJovensMinist').empty();
			$('#filtroJovensMinist').append('<option value="0"></option>');
			// Parse the returned json data
            var opts = $.parseJSON(data);
            // Use jQuery's each to iterate over the opts value
            $.each(opts, function() {
	            $.each(this, function(i, d) {
	                $('#filtroJovensMinist').append('<option value="' + d.ID_Minist + '">' + d.Nome + '</option>');
	            });
            });
		}
	});
});


function modalExcluirMinisterio(){
	$("#tblMinisterios tbody").on("click", ".btn-excluir", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".spanNomeMinisterio").html(data["Nome"]);
		$("#spanIDMinisterio").val(data["ID_Minist"]);
	 });
}

//funciounouuuuuuuuuuuuuuuuuuuuuuuuuuuuu!!!!!!!!!!!!!!!!
function modalremoverVinculo(){
	$("#tblJovensMinisterio tbody").on("click", ".btn-excluir", function () {
		var data = tableLideres.row( $(this).parents('tr') ).data();
		//alert(data["Nome"]);		
		$(".spanNomeMinisterioExcluir").html(data["Nome"]);		
		$("#spanIDMinisterioExcluir").val(data["ID_Minist"]);	
		$(".spanNomeJovemExcluir").html(data["Jovem_Nome"]);
		$("#spanIDJovemExcluir").val(data["ID_Jovem"]);
		
	 });
}


function modalAlterarMinisterio(){
	$("#tblMinisterios tbody").on("click", ".btn-alterar", function () {
		var data = table.row( $(this).parents('tr') ).data();

		var titleOption = $("#idlider option");
		var nomeCategoria = data["Jovem_Nome"];
		$("#iptidlider option[title='"+nomeCategoria+"']").attr("selected","selected");
		$("#iptnome").val(data["Nome"]);
		$("#iptidMinisterio").val(data["ID_Minist"]);


	 });
}

function modalEfetuarCompra(){
	$("#tblClientes tbody").on("click", ".btn-comprar", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".idClienteFk").val(data["idcliente"]);
	 });

}
