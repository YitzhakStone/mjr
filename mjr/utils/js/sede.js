var table = "";
var tableLideres = "";

$(document).ready(function() {
	
	modalExcluirSede();
	modalAlterarSede();
	modalEfetuarCompra();
	
	$(".respostaAjax").hide();
	
    table = $('#tblIgrejas').DataTable({
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
    	"ajax" : "sede/listar_igrejas",
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets": 5,
            "data": null,
            "defaultContent": "<a href='#alterarSede' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#excluirSede' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a>"
        }
        ],
    	"columns" : [{"data" : "ID_Sede"}, {"data" : "Nome"}, {"data" : "Endereco"},{"data" : "Jovem_Nome"},{"data" : "Obs"}]
    });
    
    
    tableLideres = $('#tblContatoLideres').DataTable({
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
    	"ajax" : "sede/listar_igrejas",
    	 "columnDefs": [
    	 {
            "targets": 3,
            "data": null,
        }
        ],
    	"columns" : [{"data" : "Nome"}, {"data" : "Jovem_Nome"}, {"data" : "Telefone"}, {"data" : "Celular"}, {"data" : "Email"}]
    });
    
    
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



function modalExcluirSede(){
	$("#tblIgrejas tbody").on("click", ".btn-excluir", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".spanNomeSede").html(data["Nome"]);
		$("#spanIdSede").val(data["ID_Sede"]);
	 });
}


function modalAlterarSede(){
	$("#tblIgrejas tbody").on("click", ".btn-alterar", function () {
		var data = table.row( $(this).parents('tr') ).data();

		var titleOption = $("#idlider option");
		var nomeCategoria = data["Jovem_Nome"];
		$("#iptidlider option[title='"+nomeCategoria+"']").attr("selected","selected");


		$("#iptnome").val(data["Nome"]);
		$("#iptendereco").val(data["Endereco"]);
		$("#iptobs").val(data["Obs"]);
		$("#iptidSede").val(data["ID_Sede"]);


	 });
}

function modalEfetuarCompra(){
	$("#tblClientes tbody").on("click", ".btn-comprar", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".idClienteFk").val(data["idcliente"]);
	 });
}
