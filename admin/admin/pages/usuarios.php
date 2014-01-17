
<?php 

	#CONFIGURAÇÕES

	#Titulo da página
	define("TITLE", "CADASTRO USUÁRIOS");

	#Nome da tabela no banco
	define("TABLE", "usuarios");



	#Dados para a listagem
	$listagem = array(
		labels=>array("Nome","E-mail", "Cidade", "Estado"),
		campos=>array("nome","email", "cidade", "estado"),
		tipoCampo=>array("titulo", "titulo", "titulo", "titulo"),
		tamanho=>array("35%","25%","15%","15%")
	);

	if(@$_GET["acao"] == 'inserir'){

		#Dados para insert
		$insert = array(
			labels=>array("Nome", "E-mail", "Senha", "Endereço", "Numero", "Complemento", "Cidade", "UF", ""),
			campos=>array("nome", "email", "senha", "endereco", "numero", "complemento", "cidade", "estado","dataCadastro"),
			tipoCampo=>array("titulo", "titulo", "senha", "titulo", "titulo", "titulo", "titulo", "titulo", "dataCadastro"),
			required=>array("", "", "", ""),
			maxlength=>array("", "", "", "","", "", "", "2", ""),
			relacionamento=>array("","","","","","","","","")
		);

	} else if(@$_GET["acao"] == 'editar'){

		#Dados para update
		$insert = array(
			labels=>array("Nome", "E-mail", "Senha", "Endereço", "Numero", "Complemento", "Cidade", "UF"),
			campos=>array("nome", "email", "senha", "endereco", "numero", "complemento", "cidade", "estado"),
			tipoCampo=>array("titulo", "titulo", "Senha", "titulo", "titulo", "titulo", "titulo", "titulo"),
			required=>array("", "", "nao", ""),
			maxlength=>array("", "", "", "","", "", "", "2", ""),
			relacionamento=>array("","","","","","","","","")
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
