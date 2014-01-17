
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO CATEGORIA");

	#Nome da tabela no banco
	define("TABLE", "categoria_classificados");



	#Dados para a listagem
	$listagem = array(
		labels=>array("Nome","Imagem"),
		campos=>array("nome","foto"),
		tipoCampo=>array("titulo","imagem"),
		tamanho=>array("60%","20%","15%","15%")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Nome","Imagem"),
			campos=>array("nome","foto"),
			tipoCampo=>array("titulo", "arquivo"),
			required=>array("", "nao"),
			maxlength=>array("20", ""),
			relacionamento=>array("",""),
			imagemTam=>array("","resize:80/0")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Nome","Imagem"),
			campos=>array("nome","foto"),
			tipoCampo=>array("titulo", "arquivo"),
			required=>array("", "nao"),
			maxlength=>array("20", ""),
			relacionamento=>array("",""),
			imagemTam=>array("","resize:80/0")
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
