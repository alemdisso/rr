<?php 
require "../includes/doctype.html.php";
?>
<head>
<?php
require "../includes/meta.html.php";
require "../includes/css.html.php";
?>

<title>Nome do Livro | Ruth Rocha</title>

<script src="../js/alturaTotal.js" type="application/javascript"></script>

</head>

<body onLoad="redimensiona()">

<!-- topo -->
<?php include ("../includes/topo.php") ?>
<!-- /topo -->

<!-- container -->
<div id="container" class="clearfix livros">

<!-- breadcrumb -->
<div id="breadcrumb_livros">
<a href="/home" title="Home">Home</a> &rsaquo; <a href="/livros" title="Livros">Livros</a> &rsaquo; Nome do Livro
</div>
<!-- /breadcrumb -->

<!-- conteudo -->
<div id="conteudo">

<h1>Nome do Livro</h1>

<!-- detalhes -->
<div class="detalhe">
Tema: <a href="">Animais</a> <span>|</span> Idade: <a href="">6 a 8 anos</a>
</div>
<!-- /detalhes -->

<p><img src="/img/marcacao_livro_detalhe.jpg" class="float_left" /><strong>&Aacute;tica, 2000</strong></p>
<p>Borba, o gato, e Diogo, o cao, ensinam a todos uma grande licao: Que cao e gato podem ser amigos, e juntos enfrentar todos os perigos. Eles vao tomar conta da cidade para todos dormirem com tranquilidade.</p>

<p>Editora: Salamandra<br />
Colecao: Vou te contar<br />
Ilustracoes: Fabio Sgroi<br />
Ano: 2009<br />
Páginas: 30</p>

<form>
<input type="submit" value="Comprar online" />
</form>

<!-- outros livros -->
<div class="detalhe clear_both">
Outros livros da colecao: <a href="">Vou te contar</a>
</div>

<table id="livros" width="580px">    
<tr>
	<td width="100px"><a href="" alt="Titulo do Livro"><img src="/img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="/img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="/img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="/img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
    <td width="20px">&nbsp;</td>
    <td width="100px"><a href="" alt="Titulo do Livro"><img src="/img/marcacao_livro.jpg" alt="Titulo do Livro" /></a></td>
</tr> 
</table>
<!-- /outros livros -->

</div>
<!-- /conteudo -->

<!-- lateral -->
<div id="lateral">
<div class="box clearfix"><?php include ("../includes/box_filtro.php") ?></div>
<div class="box clearfix"><?php include ("../includes/box_busca.php") ?></div>
</div>
<!-- /lateral -->

</div>
<!-- /container -->

<!-- rodape -->
<br /><br /><br />
<div title="" id="rodape_container" class="clearfix" style="background:url(../img/personagens/livros.png) bottom center no-repeat">
<?php include ("../includes/rodape.php") ?>
</div>
<!-- /rodape -->

</body>
</html>