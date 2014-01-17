
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO NOTÍCIAS");

	#Nome da tabela no banco
	define("TABLE", "noticias");



	#Dados para a listagem
	$listagem = array(
		labels=>array("SubSeção","Titulo","Data","Destaque","Descrição"),
		campos=>array("secaoNoticia","titulo","data","destaque","descricao"),
		tipoCampo=>array("relacionamento","","date","",""),
		tamanho=>array("17%","35%","15%","10%","25%"),
		relacionamento=>array("nome|subsecoes")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("SubSeção","Titulo","Imagem","Tags","Autor","Manchete","Fonte","Descrição","Destaque",""),
			campos=>array("secaoNoticia","titulo","foto","tags","autor","manchete","fonte","descricao","destaque","data"),
			tipoCampo=>array("selecao","titulo","arquivo","titulo","titulo","titulo","titulo","editor","selecao","dataCadastro"),
			required=>array("", "", "nao", "nao", "nao", "nao", "", "", "",""),
			maxlength=>array("", "", "", "", "", "", "", "", "", ""),
			relacionamento=>array("table:nome|subsecoes","","","","","","","","option:normal/NORMAL,slider/SLIDER,urgente/URGENTE",""),
			imagemTam=>array("","","resize:800/0")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("SubSeção","Titulo","Imagem","Tags","Autor","Manchete","Fonte","Descrição","Destaque"),
			campos=>array("secaoNoticia","titulo","foto","tags","autor","manchete","fonte","descricao","destaque"),
			tipoCampo=>array("selecao","titulo","arquivo","titulo","titulo","titulo","titulo","editor","selecao"),
			required=>array("", "", "nao", "nao", "nao", "nao", "", "", "",""),
			maxlength=>array("", "", "", "", "", "", "", "", "", ""),
			relacionamento=>array("table:nome|subsecoes","","","","","","","","option:normal/NORMAL,slider/SLIDER,urgente/URGENTE"),
			imagemTam=>array("","","resize:800/0")
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
