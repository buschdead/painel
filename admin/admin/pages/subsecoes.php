
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO SUBSEÇÕES");

	#Nome da tabela no banco
	define("TABLE", "subsecoes");



	#Dados para a listagem
	$listagem = array(
		labels=>array("Nome","Ordem","Destaque Home","Seção"),
		campos=>array("nome","ordem","destaqueHome","secaoID"),
		tipoCampo=>array("titulo","titulo","titulo","relacionamento"),
		tamanho=>array("60%","20%","15%","15%","15%"),
		relacionamento=>array("","","","nome|secoes")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Seção","Nome","Ordem","Destaque Home","Cor Destaque"),
			campos=>array("secaoID","nome","ordem","destaqueHome","corDestaque"),
			tipoCampo=>array("selecao","titulo", "titulo","selecao","titulo"),
			required=>array("","", "nao", "", "nao"),
			maxlength=>array("","", "", "", "7"),
			relacionamento=>array("table:nome|secoes","","","option:1/SIM,2/NÃO","")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Seção","Nome","Ordem","Destaque Home","Cor Destaque"),
			campos=>array("secaoID","nome","ordem","destaqueHome","corDestaque"),
			tipoCampo=>array("selecao","titulo", "titulo","selecao","titulo"),
			required=>array("","", "nao", "", "nao"),
			maxlength=>array("","", "", "", "7"),
			relacionamento=>array("table:nome|secoes","","","option:1/SIM,2/NÃO","")
		);

	}

	include_once('modulos/construtor.php');



	//TIPOS DE CAMPOS PARA LISTAGEM
	// imagem -> thumb de campo imagem
	// date -> data formatada


	//TIPOS DE CAMPOS PARA INSERIR e EDITAR


	// date -> input date do html5
	// dateMasc -> dia/mes/ano - 20/10/2010
	// titulo -> input text
	// editor -> textarea ckeditor
	// texto -> textarea normal sem editor
	// url -> input url
	// email -> input e-mail nao valida e-mail
	// telefone -> telefone com mascara
	// telefoneSP -> telefone com mascara e 1 numero a mais para celulares de sp
	// cep -> campo cep com mascara
	// cpf -> campo cpf com mascara
	// cnpj -> campo cnpj com mascara
	// arquivo -> subir arquivo
	// selecao -> campo combo box 
		// como colocar dados combobox
		// no campo relacionamento relacionamento=>array("","","","")
		// colocar para trazer de uma outra tabela = relacionamento=>array("","","","table:campo|tabela")
		// sendo o campo o nome que vai imprimir, e a tabela a tabela que voce quer buscar os dados
		// *********** NAO ESQUECER QUE O id da tabela tem que ser padrao 'ID' se for diferente nao vai funciona o valor no option

?>
