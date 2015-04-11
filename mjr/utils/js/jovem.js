var table = "";

$(document).ready(function() {

	$("#telefonejovem").mask("(99)9999-9999");
	$("#celuluarjovem").mask("(99)9999-9999");
	//$("#cpfjovem").mask("999.999.999-99");
	//$("#u_cpfjovem").mask("999.999.999-99");
	$("#u_telefonejovem").mask("(99)9999-9999");
	$("#u_celuluarjovem").mask("(99)9999-9999");



	modalExcluirJovem();
	modalAlterarJovem();
	
	tableEvento = $('#tblJovem').DataTable({
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
    	"ajax" : "jovem/listar_jovens",
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets":9,
            "data": null,
            "defaultContent": "<a href='#alterarJovem' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#excluirJovem' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a>"
        }
        ],
    	"columns" : [{"data" : "ID_Jovem"}, {"data" : "Nome"}, {"data" : "Endereco"}, {"data" : "Telefone"}, {"data" : "Celular"} , {"data" : "Email"} , {"data" : "DatNasc"} , {"data" : "NomePai"} , {"data" : "NomeMae"}]
    });
    
    $("#btnAddCategoria").click(function(){
    	$("#addCategoria").show('slow');
    	$("#formEvento").hide();
    	$("#btnAddCategoria").hide();
    	$("#btnAddEvento").show();
    });
    
     $("#btnAddEvento").click(function(){
     	$("#addCategoria").hide('slow');
     	$("#formEvento").show();
     	$("#btnAddCategoria").show();
     	$("#btnAddEvento").hide();
     });
    
});

//excluir jovem
function modalExcluirJovem(){
	$("#tblJovem tbody").on("click", ".btn-excluir", function () {
		var data = tableEvento.row( $(this).parents('tr') ).data();
		$(".spanNomeEvento").html(data["Nome"]);
		$(".spanIdEvento").val(data["ID_Jovem"]);

		
	 });
}

function modalAlterarJovem(){
	$("#tblJovem tbody").on("click", ".btn-alterar", function () {
		var data = tableEvento.row( $(this).parents('tr') ).data();
		var titleOption = $("#idsede option");
		var nomeCategoria = data["Nome_Sede"];
		$(".spanIdEvento").val(data["ID_Jovem"]);
		$("#u_idsede option[title='"+nomeCategoria+"']").attr("selected","selected");
		$("#iptnomejovem").val(data["Nome"]);
		$("#u_datnascjovem").val(data["DatNasc"]);
		$("#u_nomepai").val(data["NomePai"]);
		$("#u_nomemae").val(data["NomeMae"]);
		$("#u_enderecojovem").val(data["Endereco"]);
		$("#u_telefonejovem").val(data["Telefone"]);
		$("#u_celuluarjovem").val(data["Celular"]);
		$("#u_emailjovem").val(data["Email"]);
		$("#u_rgjovem").val(data["RG"]);
		//$("#u_cpfjovem").val(data["CPF"]);
		$("#u_obsjovem").val(data["Obs"]);


	 });
}

function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){  
    var sep = 0;  
    var key = '';  
    var i = j = 0;  
    var len = len2 = 0;  
    var strCheck = '0123456789';  
    var aux = aux2 = '';  
    var whichCode = (window.Event) ? e.which : e.keyCode;  
    if (whichCode == 13) return true;  
    key = String.fromCharCode(whichCode); // Valor para o código da Chave  
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida  
    len = objTextBox.value.length;  
    for(i = 0; i < len; i++)  
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;  
    aux = '';  
    for(; i < len; i++)  
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);  
    aux += key;  
    len = aux.length;  
    if (len == 0) objTextBox.value = '';  
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;  
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;  
    if (len > 2) {  
        aux2 = '';  
        for (j = 0, i = len - 3; i >= 0; i--) {  
            if (j == 3) {  
                aux2 += SeparadorMilesimo;  
                j = 0;  
            }  
            aux2 += aux.charAt(i);  
            j++;  
        }  
        objTextBox.value = '';  
        len2 = aux2.length;  
        for (i = len2 - 1; i >= 0; i--)  
        objTextBox.value += aux2.charAt(i);  
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);  
    }  
    return false;  
}  

function BlockKeybord()
		{
			if(window.event) // IE
			{
				if((event.keyCode < 48) || (event.keyCode > 57))
				{
					event.returnValue = false;
				}
			}
			else if(e.which) // Netscape/Firefox/Opera
			{
				if((event.which < 48) || (event.which > 57))
				{
					event.returnValue = false;
				}
			}

			
		}

		function troca(str,strsai,strentra)
		{
			while(str.indexOf(strsai)>-1)
			{
				str = str.replace(strsai,strentra);
			}
			return str;
		}

		function FormataMoeda(campo,tammax,teclapres,caracter)
		{
			if(teclapres == null || teclapres == "undefined")
			{
				var tecla = -1;
			}
			else
			{
				var tecla = teclapres.keyCode;
			}

			if(caracter == null || caracter == "undefined")
			{
				caracter = ".";
			}

			vr = campo.value;
			if(caracter != "")
			{
				vr = troca(vr,caracter,"");
			}
			vr = troca(vr,"/","");
			vr = troca(vr,",","");
			vr = troca(vr,".","");

			tam = vr.length;
			if(tecla > 0)
			{
				if(tam < tammax && tecla != 8)
				{
					tam = vr.length + 1;
				}

				if(tecla == 8)
				{
					tam = tam - 1;
				}
			}
			if(tecla == -1 || tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105)
			{
				if(tam <= 2)
				{
					campo.value = vr;
				}
				if((tam > 2) && (tam <= 5))
				{
					campo.value = vr.substr(0, tam - 2) + ',' + vr.substr(tam - 2, tam);
				}
				if((tam >= 6) && (tam <= 8))
				{
					campo.value = vr.substr(0, tam - 5) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
				}
				if((tam >= 9) && (tam <= 11))
				{
					campo.value = vr.substr(0, tam - 8) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
				}
				if((tam >= 12) && (tam <= 14))
				{
					campo.value = vr.substr(0, tam - 11) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
				}
				if((tam >= 15) && (tam <= 17))
				{
					campo.value = vr.substr(0, tam - 14) + caracter + vr.substr(tam - 14, 3) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
				}
			}
		}

		function maskKeyPress(objEvent)
		{
			var iKeyCode;
						
			if(window.event) // IE
			{
				iKeyCode = objEvent.keyCode;
				if(iKeyCode>=48 && iKeyCode<=57) return true;
				return false;
			}
			else if(e.which) // Netscape/Firefox/Opera
			{
				iKeyCode = objEvent.which;
				if(iKeyCode>=48 && iKeyCode<=57) return true;
				return false;
			}
			
			
		}
