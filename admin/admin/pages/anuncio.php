<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO DE ANÚNCIOS");

	#Nome da tabela no banco
	define("TABLE", "anuncio");



	#Dados para a listagem
	$listagem = array(
		labels=>array("Categoria","Usuário","Titulo","Data Cadastro","Status"),
		campos=>array("categoriaID","usuarioID","titulo","dataCadastro","status"),
		tipoCampo=>array("relacionamento","relacionamento","titulo","date","titulo"),
		tamanho=>array("17%","17%","25%","15%","15%"),
		relacionamento=>array("nome|categoria_classificados","nome|usuarios","","")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Categoria","Usuário","Titulo","Descrição","Valor","Tags","Imagem","Status",""),
			campos=>array("categoriaID","usuarioID","titulo","descricao","valor","tags","foto","status","dataCadastro"),
			tipoCampo=>array("selecao", "selecao","titulo","editor","valor","titulo","arquivo","selecao","dataCadastro"),
			required=>array("", "nao", "", "","nao","nao","nao","",""),
			maxlength=>array("", "", "", "","12"),
			relacionamento=>array("table:nome|categoria_classificados","table:nome|usuarios","","","","","","option:AGUARDANDO/AGUARDANDO,LIBERADO/LIBERADO,INATIVO/INATIVO"),
			imagemTam=>array("","","","","","","resize:800/0")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Categoria","Usuário","Titulo","Descrição","Valor","Tags","Imagem","Status"),
			campos=>array("categoriaID","usuarioID","titulo","descricao","valor","tags","foto","status"),
			tipoCampo=>array("selecao", "selecao","titulo","editor","valor","titulo","arquivo","selecao"),
			required=>array("", "nao", "", "","nao","nao","nao","",""),
			maxlength=>array("", "", "", "","12"),
			relacionamento=>array("table:nome|categoria_classificados","table:nome|usuarios","","","","","","option:AGUARDANDO/AGUARDANDO,LIBERADO/LIBERADO,INATIVO/INATIVO"),
			imagemTam=>array("","","","","","","resize:800/0")
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
