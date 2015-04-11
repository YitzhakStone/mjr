var table = "";
var tableIngressos = "";

$(document).ready(function() {
	
	$("#cpf").mask("999.999.999-99");
	
	modalExcluirCliente();
	modalAlterarCliente();
	modalEfetuarCompra();
	
	$(".respostaAjax").hide();
	
    table = $('#tblClientes').DataTable({
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
    	"ajax" : "ingressos/listar_clientes",
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets": 3,
            "data": null,
            "defaultContent": "<a href='#alterarUsuario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#excluirUsuario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a> <a href='#efetuarCompra' data-toggle='modal' id='modal-30777' role='button' class='btn btn-info btn-comprar'><i class='glyphicon glyphicon-shopping-cart'></i></a>"
        }
        ],
    	"columns" : [{"data" : "idcliente"}, {"data" : "nome"}, {"data" : "cpf"}]
    });
    
    
    tableIngressos = $('#tblIngressosComprados').DataTable({
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
    	"ajax" : "ingressos/listar_ingressos_comprados",
    	 "columnDefs": [
    	 {
            "targets": 3,
            "data": null,
        }
        ],
    	"columns" : [{"data" : "nome"}, {"data" : "valor_total"}, {"data" : "quantidade"}, {"data" : "nomeEvento"}]
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


function modalExcluirCliente(){
	$("#tblClientes tbody").on("click", ".btn-excluir", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".spanNomeCliente").html(data["nome"]);
		$("#spanIdCliente").val(data["idcliente"]);
	 });
}

function modalAlterarCliente(){
	$("#tblClientes tbody").on("click", ".btn-alterar", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$("#iptNomeCliente").val(data["nome"]);
		$("#iptCpf").val(data["cpf"]);
		$("#iptEmail").val(data["email"]);
		$("#iptIdCliente").val(data["idcliente"]);
	 });
}

function modalEfetuarCompra(){
	$("#tblClientes tbody").on("click", ".btn-comprar", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".idClienteFk").val(data["idcliente"]);
	 });
}


