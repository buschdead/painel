
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO VÍDEOS");

	#Nome da tabela no banco
	define("TABLE", "videos");



	#Dados para a listagem
	$listagem = array(
		labels=>array("Seção Vídeos","Nome", "Link vídeo youtube"),
		campos=>array("secoesvideosID","nome", "video"),
		tipoCampo=>array("relacionamento", "titulo", "titulo"),
		tamanho=>array("20%","30%","15%"),
		relacionamento=>array("nome|secoesvideo","","","")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Seção Vídeo", "Nome", "ID Vídeo Youtube ex:http://www.youtube.com/watch?v=<strong>QwnfnX9ILsQ</strong>"),
			campos=>array("secoesvideosID", "nome", "video"),
			tipoCampo=>array("selecao", "titulo", "titulo", "titulo"),
			required=>array("", "", "", ""),
			maxlength=>array("", "", "30", ""),
			relacionamento=>array("table:nome|secoesvideo","","","")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Seção Vídeo", "Nome", "ID Vídeo Youtube ex:http://www.youtube.com/watch?v=<strong>QwnfnX9ILsQ</strong>"),
			campos=>array("secoesvideosID", "nome", "video"),
			tipoCampo=>array("selecao", "titulo", "titulo", "titulo"),
			required=>array("", "", "", ""),
			maxlength=>array("", "", "30", ""),
			relacionamento=>array("table:nome|secoesvideo","","","")
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
