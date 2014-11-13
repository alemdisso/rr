
-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Nov-2014 às 12:10
-- Versão do servidor: 5.5.40-36.1-log
-- versão do PHP: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `anamaria_rr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `author_collection_editions`
--

DROP TABLE IF EXISTS `author_collection_editions`;
CREATE TABLE IF NOT EXISTS `author_collection_editions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `uri` varchar(200) NOT NULL,
  `editor` int(10) unsigned NOT NULL,
  `country` varchar(2) NOT NULL,
  `serie` int(10) unsigned DEFAULT NULL,
  `pages` int(3) unsigned DEFAULT NULL,
  `cover` varchar(250) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `illustrator` varchar(200) DEFAULT NULL,
  `cover_designer` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uri` (`illustrator`),
  KEY `story` (`work`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

--
-- Extraindo dados da tabela `author_collection_editions`
--

INSERT INTO `author_collection_editions` (`id`, `work`, `title`, `prefix`, `uri`, `editor`, `country`, `serie`, `pages`, `cover`, `isbn`, `illustrator`, `cover_designer`) VALUES
(1, 1, 'arca de Noé', 'A', 'a-arca-de-noe', 1, 'BR', 1, 40, 'aarcadenoe.jpg', '9788516063146', 'Mariana Massarani', NULL),
(2, 2, 'Cinderela das Bonecas', 'A', 'a-cinderela-das-bonecas', 1, 'BR', 1, 40, 'acindereladasbonecas.jpg', '9788516070632', 'Mariana Massarani', NULL),
(3, 3, '... Que eu vou pra Angola... e outras histórias...', '', '-que-eu-vou-pra-angola-e-outras-historias', 1, 'BR', 2, 68, 'voupraangola.jpg', '9788516066826', 'Cláudio Martins', NULL),
(4, 4, 'Árvore do Beto', 'A', 'a-arvore-do-beto', 1, 'BR', 3, 32, 'aarvoredobeto.jpg', '9788516062743', 'Mariana Massarani', NULL),
(5, 5, 'Coisa', 'A', 'a-coisa', 1, 'BR', 6, 32, 'acoisa.jpg', '9788516065690', 'Suppa', NULL),
(6, 6, 'Decisão do Campeonato', 'A', 'a-decisao-do-campeonato', 1, 'BR', 3, 32, 'decisaodocampeonato.jpg', '9788516066505', 'Mariana Massarani', NULL),
(7, 7, 'Escola do Marcelo', 'A', 'a-escola-do-marcelo', 1, 'BR', 7, 32, 'aescoladomarcelo.jpg', '9788516073008', 'Alberto Llinares', NULL),
(8, 8, 'Escolinha do Mar', 'A', 'a-escolinha-do-mar', 1, 'BR', 1, 40, 'A escolinha do mar.jpg', '9788516062996', 'Adilson Farias', NULL),
(9, 9, 'Família do Marcelo', 'A', 'a-familia-do-marcelo', 1, 'BR', 7, 32, 'afamiliadomarcelo.jpg', '9788516072995', 'Alberto Llinares', NULL),
(10, 10, 'Fantástica Máquina dos Bichos', 'A', 'a-fantastica-maquina-dos-bichos', 1, 'BR', 1, 32, 'afantasticamaquinadosbichos.jpg', '9788516063139', 'Jean-Claude R. Alphen', NULL),
(11, 11, 'Galinha dos Ovos de Ouro e Outras Histórias', 'A', 'a-galinha-dos-ovos-de-ouro-e-outras-historias', 1, 'BR', 2, 64, 'agalinhadosovosdeouro.jpg', '9788516064068', 'Cláudio Martins', NULL),
(12, 12, 'Máquina Maluca', 'A', 'a-maquina-maluca', 1, 'BR', 3, 32, 'amaquinamaluca.jpg', '9788516067144', 'Mariana Massarani', NULL),
(13, 13, 'Menina Que Aprendeu A Voar', 'A', 'a-menina-que-aprendeu-a-voar', 1, 'BR', 8, 32, 'a menina que aprendeu a voar.jpg', '9788516080594', 'Suppa', NULL),
(14, 14, 'Primavera da Lagarta', 'A', 'a-primavera-da-lagarta', 1, 'BR', 1, 32, 'a_primavera.jpg', '9788516065331', 'Madalena Elek', NULL),
(15, 15, 'Rua do Marcelo', 'A', 'a-rua-do-marcelo', 1, 'BR', 7, 32, 'aruadomarcelo.jpg', '9788516072988', 'Alberto Llinares', NULL),
(16, 16, 'Almanaque Ruth Rocha', '', 'almanaque-ruth-rocha', 1, 'BR', NULL, 136, 'almanaque.jpg', '9788516067168', NULL, NULL),
(17, 17, 'Alvinho e os Presentes de Natal', '', 'alvinho-e-os-presentes-de-natal', 1, 'BR', 6, 32, 'alvinho_eospresentes.jpg', '9788516067106', 'Suppa', NULL),
(18, 18, 'Alvinho, o Edifício City of Taubaté e o Cachorro Wenceslau', '', 'alvinho-o-edificio-city-of-taubate-e-o-cachorro-wenceslau', 1, 'BR', 6, 32, 'alvinhooedificiocityoftaubateeocachorrowenceslau.jpg', '9788516065683', 'Suppa', NULL),
(19, 19, 'Armandinho, o Juiz', '', 'armandinho-o-juiz', 1, 'BR', 3, 32, 'armandinhoojuiz.jpg', '9788516066512', 'Mariana Massarani', NULL),
(20, 20, 'coisas que a gente fala', 'As', 'as-coisas-que-a-gente-fala', 1, 'BR', 8, 24, 'ascoisasqueagentefala.jpg', '9788516080549', 'Renato Moriconi', NULL),
(21, 21, 'Coisas Que Eu Gosto', 'As', 'as-coisas-que-eu-gosto', 1, 'BR', 9, 24, 'ascoisasqueeugosto.jpg', '9788516064051', 'Walter Ono', NULL),
(22, 22, 'Atrás da Porta', '', 'atras-da-porta', 1, 'BR', 8, 32, 'atrasdaporta.jpg', '9788516080525', 'Walter Ono', NULL),
(23, 23, 'Azul e Lindo: Planeta Terra, Nossa Casa', '', 'azul-e-lindo-planeta-terra-nossa-casa', 1, 'BR', NULL, 48, 'azulelindo.jpg', '8516041433', 'Otávio Roth', NULL),
(24, 24, 'Bom-dia, Todas As Cores!', '', 'bom-dia-todas-as-cores', 1, 'BR', 1, 40, 'bomdia.jpg', '9788516085773', 'Madalena Elek', NULL),
(25, 25, 'Borba, O Gato', '', 'borba-o-gato', 1, 'BR', 1, 32, 'borba_ogato.jpg', '9788516063115', ' Fábio Sgroi', NULL),
(26, 26, 'Canções, parlendas, quadrinhas, para crianças novinhas', '', 'cancoes-parlendas-quadrinhas-para-criancas-novinhas', 1, 'BR', NULL, 48, 'cancoes.jpg', '9788516085629', 'Cláudio Martins', NULL),
(27, 27, 'Como se fosse dinheiro', '', 'como-se-fosse-dinheiro', 1, 'BR', 3, 32, 'comosefosse.jpg', '9788516062729', 'Mariana Massarani', NULL),
(28, 28, 'Contos de Perrault', '', 'contos-de-perrault', 1, 'BR', 2, 72, 'contosdeperrault.jpg', '9788516066031', 'Gonzalo Cárcamo', NULL),
(29, 29, 'Davi Ataca Outra Vez', '', 'davi-ataca-outra-vez', 1, 'BR', 8, 48, 'daviatacaoutravez.jpg', '9788516063221', 'Al Stefano', NULL),
(30, 30, 'De repente dá certo', '', 'de-repente-da-certo', 1, 'BR', 16, 64, 'derepente.jpg', '9788516065157', 'Edu Francisco', NULL),
(31, 31, 'Declaração Universal Dos Direitos Humanos', '', 'declaracao-universal-dos-direitos-humanos', 1, 'BR', NULL, 48, 'declaracaouniversal.jpg', '8516041441', ' Otávio Roth', NULL),
(32, 32, 'Dois Idiotas Sentados Cada Qual No Seu Barril...', '', 'dois-idiotas-sentados-cada-qual-no-seu-barril', 1, 'BR', 10, 32, 'dois idiotas sentados cada qual no seu barril.jpg', '9788516081669', 'Walter Ono', NULL),
(33, 33, 'Elefante?', '', 'elefante', 1, 'BR', 1, 24, 'elefante.jpg', '9788516071844', 'Flávio Fargas', NULL),
(34, 34, 'Este admirável mundo louco', '', 'este-admiravel-mundo-louco', 1, 'BR', 10, 48, 'esteadmiravelmundolouco.jpg', '9788516081614', 'Walter Ono', NULL),
(35, 35, 'Eu gosto muito', '', 'eu-gosto-muito', 1, 'BR', 9, 24, 'eugostomuito.jpg', '9788516064006', 'Walter Ono', NULL),
(36, 36, 'Eugênio, o gênio', '', 'eugenio-o-genio', 1, 'BR', 1, 40, 'eugenio.jpg', '9788516063122', 'Fábio Sgroi', NULL),
(37, 37, 'Fábulas De Esopo', '', 'fabulas-de-esopo', 1, 'BR', 2, 48, 'fabulasdeesopo.jpg', '9788516066024', 'Jean-Claude Alphen', NULL),
(38, 38, 'Faca Sem Ponta, Galinha Sem Pé', '', 'faca-sem-ponta-galinha-sem-pe', 1, 'BR', 8, 32, 'facasempontagalinhasempe.jpg', '9788516063214', 'Suppa', NULL),
(39, 39, 'Fantasma existe?', '', 'fantasma-existe', 1, 'BR', 11, 24, 'fantasmaexiste.jpg', '9788516064044', 'Walter Ono', NULL),
(40, 40, 'Faz muito tempo', '', 'faz-muito-tempo', 1, 'BR', 1, 32, 'fazmuitotempo.jpg', '9788516063009', 'Helena Alexandrino', NULL),
(41, 41, 'Gabriela E A Titia', '', 'gabriela-e-a-titia', 1, 'BR', 3, 32, 'gabrielaeatitia.jpg', '9788516080556', 'Mariana Massarani', NULL),
(42, 42, 'Histórias Das Mil E Uma Noites', '', 'historias-das-mil-e-uma-noites', 1, 'BR', 2, 72, 'historiasdasmileumanoites.jpg', '9788516066833', 'Alexandre Rampazzo', NULL),
(43, 43, 'Historinhas Malcriadas', '', 'historinhas-malcriadas', 1, 'BR', 8, 40, 'historinhasmalcriadas.jpg', '9788516080532', 'Azeite de Leos', NULL),
(44, 44, 'João E Maria', '', 'joao-e-maria', 1, 'BR', 12, 32, 'joaoemaria.jpg', '9788516066543', 'Adilson Farias', NULL),
(45, 45, 'João E O Pé De Feijão', '', 'joao-e-o-pe-de-feijao', 1, 'BR', 12, 32, 'joaoeopedefeijao.JPG', '9788516066550', 'Elisabeth Teixeira', NULL),
(46, 46, 'Lá Vem O Ano Novo', '', 'la-vem-o-ano-novo', 1, 'BR', 1, 40, 'lavemoanonovo.jpg', '9788516063108', 'Carlos Brito', NULL),
(47, 47, 'Leila menina', '', 'leila-menina', 1, 'BR', 13, 32, 'leilamenina.jpg', '9788516081713', 'Suppa', NULL),
(48, 48, 'Macacote E Porco Pança', '', 'macacote-e-porco-panca', 1, 'BR', 1, 40, 'macacoteeporcopanca.jpg', '9788516063016', 'Jean-Claude R. Alphen', NULL),
(49, 49, 'Marcelo, Marmelo, Martelo', '', 'marcelo-marmelo-martelo', 1, 'BR', 7, 64, 'marcelomarmelomartelo.jpg', '9788516071493', 'Mariana Massarani', NULL),
(50, 50, 'Marcelo: De Hora Em Hora', '', 'marcelo-de-hora-em-hora', 1, 'BR', 7, 40, 'dehoraemhora.jpg', '9788516088194', 'Alberto Llinares', NULL),
(51, 51, 'Marília bela', '', 'marilia-bela', 1, 'BR', 13, 32, 'mariliabela.jpg', '9788516081706', 'Helena Alexandrino', NULL),
(52, 52, 'Mil Pássaros Pelos Céus', '', 'mil-passaros-pelos-ceus', 1, 'BR', 1, 32, 'milpassarospelosceus.jpg', '9788516063023', 'Rogério Coelho', NULL),
(53, 53, 'Mulheres de Coragem', '', 'mulheres-de-coragem', 1, 'BR', 2, 64, 'mulheresdecoragem.jpg', '9788516064839', 'Teresa Berlinck', NULL),
(54, 54, 'Ninguém Gosta De Mim?', '', 'ninguem-gosta-de-mim', 1, 'BR', 11, 24, 'ninguemgostademim.jpg', '9788516063986', 'Walter Ono', NULL),
(55, 55, 'No Caminho De Alvinho Tinha Uma Pedra', '', 'no-caminho-de-alvinho-tinha-uma-pedra', 1, 'BR', 6, 32, 'nocaminhodealvinhotinhaumapedra.jpg', '9788516065676', 'Suppa', NULL),
(56, 56, 'No Tempo Em Que A Televisão Mandava No Carlinhos...', '', 'no-tempo-em-que-a-televisao-mandava-no-carlinhos', 1, 'BR', 3, 32, 'notempo.jpg', '9788516074883', 'Mariana Massarani', NULL),
(57, 57, 'Nosso Amigo Ventinho', '', 'nosso-amigo-ventinho', 1, 'BR', 1, 40, 'nossoamigoventinho.jpg', '9788516063030', 'Suppa', NULL),
(58, 58, 'Amigo Do Rei', 'O', 'o-amigo-do-rei', 1, 'BR', 1, 32, 'oamigodorei.jpg', '9788516063047', 'Cris Eich', NULL),
(59, 59, 'bairro do Marcelo', 'O', 'o-bairro-do-marcelo', 1, 'BR', 7, 32, 'bairro_marcelo.jpg', '9788516072971', 'Alberto Llinares', NULL),
(60, 60, 'Barba-Azul', 'O', 'o-barba-azul', 1, 'BR', 2, 40, 'obarbaazul.jpg', '9788516066048', ' Mateus Ferreira', NULL),
(61, 61, 'Bichinho Do Pimpão', 'O', 'o-bichinho-do-pimpao', 1, 'BR', 14, 32, 'obichinhodopimpao.jpg', '9788516082086', 'Cláudio Martins', NULL),
(62, 62, 'Coelhinho Que Não Era De Páscoa', 'O', 'o-coelhinho-que-nao-era-de-pascoa', 1, 'BR', 1, 40, 'ocoelhinho.jpg', '9788516063092', 'Elisabeth Teixeira', NULL),
(63, 63, 'Jacaré Preguiçoso', 'O', 'o-jacare-preguicoso', 1, 'BR', 14, 32, 'ojacarepreguicoso.jpg', '8516048268', 'Luiz Maia', NULL),
(64, 64, 'Livro De Números Do Marcelo', 'O', 'o-livro-de-numeros-do-marcelo', 1, 'BR', 7, 40, 'marcelo_numeros.jpg', '9788516090203', 'Alberto Llinares', NULL),
(65, 65, 'macaco bombeiro', 'O', 'o-macaco-bombeiro', 1, 'BR', 14, 32, 'omacacobombeiro.jpg', '9788516079949', 'Mariana Massarani', NULL),
(66, 66, 'Menino Que Aprendeu A Ver', 'O', 'o-menino-que-aprendeu-a-ver', 1, 'BR', 1, 40, 'o_menino_que_aprendeu_a_ver.jpg', '9788516088200', 'Madalena Matoso', NULL),
(67, 67, 'Mistério Do Caderninho Preto', 'O', 'o-misterio-do-caderninho-preto', 1, 'BR', 16, 88, 'omisteriodocaderninho.jpg', '9788516065140', 'Amílcar Pinna', NULL),
(68, 68, 'Passarinho Que Não Queria Ser Cantor', 'O', 'o-passarinho-que-nao-queria-ser-cantor', 1, 'BR', 14, 32, 'opassarinhoquenaoqueriasercantor.jpg', '9788516079901', 'Luiz Maia', NULL),
(69, 69, 'Patinho Feio', 'O', 'o-patinho-feio', 1, 'BR', 12, 32, 'opatinhofeio.jpg', '9788516066819', 'Avelino Guedes', NULL),
(70, 70, 'Piquenique Do Catapimba', 'O', 'o-piquenique-do-catapimba', 1, 'BR', 3, 32, 'opiqueniquedocatapimba.jpg', '9788516062736', 'Mariana Massarani', NULL),
(71, 71, 'Que Os Olhos Não Veem', 'O', 'o-que-os-olhos-nao-veem', 1, 'BR', 10, 40, 'oqueosolhosnaoveem.jpg', '9788516081645', 'Carlos Brito', NULL),
(72, 72, 'Rato Do Campo E O Rato Da Cidade', 'O', 'o-rato-do-campo-e-o-rato-da-cidade', 1, 'BR', 12, 32, 'oratodocampoeoratodacidade.jpg', '9788516066802', 'Rogério Coelho', NULL),
(73, 73, 'Rei Que Não Sabia De Nada', 'O', 'o-rei-que-nao-sabia-de-nada', 1, 'BR', 10, 48, 'o rei que não sabia de nada.jpg', '9788516081638', 'Carlos Brito', NULL),
(74, 74, 'Reizinho Mandão', 'O', 'o-reizinho-mandao', 1, 'BR', 10, 40, 'reizinhomandao.jpg', '9788516089238', 'Walter Ono', NULL),
(75, 75, 'trenzinho do Nicolau', 'O', 'o-trenzinho-do-nicolau', 1, 'BR', 1, 32, 'otrenzinhodonicolau.jpg', '9788516063054', 'Luiz Maia', NULL),
(76, 76, 'Último Golpe De Alvinho', 'O', 'o-ultimo-golpe-de-alvinho', 1, 'BR', 6, 32, 'oultimogolpedealvinho.jpg', '9788516067137', 'Suppa', NULL),
(77, 77, 'Velho, O Menino E O Burro E Outras Histórias Caipiras', 'O', 'o-velho-o-menino-e-o-burro-e-outras-historias-caipiras', 1, 'BR', 2, 48, 'ovelhoomeninoeoburro.jpg', '9788516066529', 'Cláudio Martins', NULL),
(78, 78, 'Amigos Do Marcelo', 'Os', 'os-amigos-do-marcelo', 1, 'BR', 7, 32, 'osamigosdomarcelo.jpg', '9788516081652', 'Alberto Llinares', NULL),
(79, 79, 'Gatos De Botinhas', 'Os', 'os-gatos-de-botinhas', 1, 'BR', 14, 32, 'osgatosdebotinhas.jpg', '9788516075514', 'Alcy', NULL),
(80, 80, 'Músicos De Bremen', 'Os', 'os-musicos-de-bremen', 1, 'BR', 12, 32, 'osmusicosdebremen.jpg', '9788516066536', 'Cris Eich', NULL),
(81, 81, 'Palavras, Muitas Palavras', '', 'palavras-muitas-palavras', 1, 'BR', NULL, 56, 'palavras.jpg', '9788516085612', 'Raul Fernandes', NULL),
(82, 82, 'Pedrinho Pintor', '', 'pedrinho-pintor', 1, 'BR', 1, 40, 'pedrinhopintor.jpg', '9788516063085', 'Geraldo Valério', NULL),
(83, 83, 'Poemas Que Escolhi Para As Crianças', '', 'poemas-que-escolhi-para-as-criancas', 1, 'BR', NULL, 160, 'poemas.jpg', '9788516085636', 'Clara Gavilan, Cláudio Martins, Lúcia Brandão, Madalena Elek, Maria Valentina, Raul Fernandes, Teresa Berlinck, Thais Beltrame e Thiago Lopes', NULL),
(84, 84, 'Pra Que Serve?', '', 'pra-que-serve', 1, 'BR', 16, 116, 'praqueserve.jpg', '9788516065164', 'Amanda Grazini', NULL),
(85, 85, 'Procurando Firme', '', 'procurando-firme', 1, 'BR', 8, 40, 'procurandofirme.jpg', '9788516063207', 'Walter Ono', NULL),
(86, 86, 'Quando Eu Comecei A Crescer', '', 'quando-eu-comecei-a-crescer', 1, 'BR', 8, 24, 'quandoeucomeceiacrescer.jpg', '9788516063191', 'Maria Eugenia', NULL),
(87, 87, 'Quando Eu For Gente Grande', '', 'quando-eu-for-gente-grande', 1, 'BR', 6, 32, 'quandoeuforgentegrande.jpg', '9788516067113', 'Suppa', NULL),
(88, 88, 'Quem Tem Medo De Cachorro?', '', 'quem-tem-medo-de-cachorro', 1, 'BR', 17, 24, 'quemtemmedocachorro.jpg', '9788516081799', 'Mariana Massarani', NULL),
(89, 89, 'Quem Tem Medo De Dizer Não?', '', 'quem-tem-medo-de-dizer-nao', 1, 'BR', 17, 24, 'quemtemmedodedizernao.jpg', '9788516081805', 'Mariana Massarani', NULL),
(90, 90, 'Quem Tem Medo De Monstro?', '', 'quem-tem-medo-de-monstro', 1, 'BR', 17, 24, 'quemtemmedodemonstro.jpg', '9788516076436', 'Mariana Massarani', NULL),
(91, 91, 'Quem tem medo de quê?', '', 'quem-tem-medo-de-que', 1, 'BR', 17, 24, 'quemtemmedodeque.jpg', '9788516077259', 'Mariana Massarani', NULL),
(92, 92, 'Quem Tem Medo Do Ridículo?', '', 'quem-tem-medo-do-ridiculo', 1, 'BR', 17, 24, 'quemtemmedodoridiculo.jpg', '9788516077624', 'Mariana Massarani', NULL),
(93, 93, 'Romeu E Julieta', '', 'romeu-e-julieta', 1, 'BR', 1, 40, 'romeu e julieta.jpg', '9788516062989', 'Mariana Massarani', NULL),
(94, 94, 'Rubens, O Semeador', '', 'rubens-o-semeador', 1, 'BR', NULL, 40, 'rubens_osemeador.jpg', '851604145X', 'Aquarelas de Rubens Matuck', NULL),
(95, 95, 'Ruth Rocha Apresenta A Flauta Mágica', '', 'ruth-rocha-apresenta-a-flauta-magica', 1, 'BR', 18, 48, 'aflautamagica.jpg', '9788516081683', 'Cárcamo', NULL),
(96, 96, 'Ruth Rocha Apresenta Carmen', '', 'ruth-rocha-apresenta-carmen', 1, 'BR', 18, 42, 'carmen.jpg', '9788516080112', 'Fernando Vilela', NULL),
(97, 97, 'Ruth Rocha Apresenta O Barbeiro De Sevilha', '', 'ruth-rocha-apresenta-o-barbeiro-de-sevilha', 1, 'BR', 18, 64, 'obarbeirodesevilha.jpg', '9788516081676', 'Alcy', NULL),
(98, 98, 'Ruth Rocha Apresenta O Guarani', '', 'ruth-rocha-apresenta-o-guarani', 1, 'BR', 18, 40, 'oguarani.jpg', '9788516081690', 'Teresa Berlinck', NULL),
(99, 99, 'Ruth Rocha Conta A Ilíada', '', 'ruth-rocha-conta-a-iliada', 1, 'BR', 19, 136, 'iliada.jpg', '9788516069094', ' Eduardo Rocha', NULL),
(100, 100, 'Ruth Rocha Conta A Odisseia', '', 'ruth-rocha-conta-a-odisseia', 1, 'BR', 19, 112, 'odisseia.jpg', '9788516065348', 'Eduardo Rocha', NULL),
(101, 101, 'Ruth Rocha conta Tom Sawyer', '', 'ruth-rocha-conta-tom-sawyer', 1, 'BR', 19, 72, 'tomsawyer.jpg', '9788516065324', 'Rogério Borges', NULL),
(102, 102, 'Sabe Do Que Eu Gosto?', '', 'sabe-do-que-eu-gosto', 1, 'BR', 9, 24, 'sabedoqueeugosto.jpg', '9788516064020', 'Walter Ono', NULL),
(103, 103, 'Sapo Vira Rei Vira Sapo', '', 'sapo-vira-rei-vira-sapo', 1, 'BR', 10, 40, 'sapovirareivirasapo.jpg', '9788516081621', 'Walter Ono', NULL),
(104, 104, 'Será Que Vai Doer?', '', 'sera-que-vai-doer', 1, 'BR', 11, 24, 'seraquevaidoer.jpg', '9788516063993', 'Walter Ono', NULL),
(105, 105, 'Solta O Sabiá', '', 'solta-o-sabia', 1, 'BR', 13, 64, 'soltaosabia.jpg', '9788516075507', 'Gonzalo Cárcamo', NULL),
(106, 106, 'Tem Umas Coisas Que Eu Gosto', '', 'tem-umas-coisas-que-eu-gosto', 1, 'BR', 9, 24, 'temumascoisasqueeugosto.jpg', '9788516064037', 'Walter Ono', NULL),
(107, 107, 'Tenho Medo Mas Dou Um Jeito', '', 'tenho-medo-mas-dou-um-jeito', 1, 'BR', 11, 24, 'tenhomedomasdouumjeito.jpg', '9788516064013', 'Walter Ono', NULL),
(108, 108, 'Macaco Pra Frente', 'Um', 'um-macaco-pra-frente', 1, 'BR', 1, 40, 'ummacacoprafrente.jpg', '9788516063078', 'Alcy', NULL),
(109, 109, 'História Com Mil Macacos', 'Uma', 'uma-historia-com-mil-macacos', 1, 'BR', 1, 32, 'umahistoriacommilmacacos.jpg', '9788516063061', 'Cláudio Martins', NULL),
(110, 110, 'História De Rabos Presos', 'Uma', 'uma-historia-de-rabos-presos', 1, 'BR', 10, 40, 'umahistoriaderabospresos.jpg', '9788516081607', 'Carlos Brito', NULL),
(111, 111, 'Vivinha, A Baleiazinha', '', 'vivinha-a-baleiazinha', 1, 'BR', 14, 32, 'vivinhaabaleiazinha.jpg', '9788516079970', 'Mariana Massarani', NULL),
(112, 112, 'Você É Capaz De Fazer Isso?', '', 'voce-e-capaz-de-fazer-isso', 1, 'BR', 6, 32, 'voceecapazdefazerisso.jpg', '9788516067120', 'Suppa', NULL),
(113, 113, 'Livro da Escrita', 'O', 'o-livro-da-escrita', 2, 'BR', 20, 32, 'O Livro da Escrita.png', '9788506058251', 'Raquel Coelho', NULL),
(114, 114, 'Meu Amigo Dinossauro', '', 'meu-amigo-dinossauro', 2, 'BR', NULL, 16, 'Meu-Amigo-Dinossauro1.png', NULL, 'Carlos Brito', NULL),
(115, 115, 'Menino Que Quase Virou Cachorro', 'O', 'o-menino-que-quase-virou-cachorro', 2, 'BR', 21, 16, 'O-Menino-Que-Quase-Virou-Cachorro.png', NULL, 'Carlos Brito', NULL),
(116, 116, 'Férias de Miguel e Pedro', 'As', 'as-ferias-de-miguel-e-pedro', 2, 'BR', 22, 24, 'ferias-miguel.jpg', NULL, 'Eduardo Rocha', NULL),
(117, 117, 'Amigos do Pedrinho', 'Os', 'os-amigos-do-pedrinho', 2, 'BR', 22, 24, 'amigos-pedrinho.jpg', NULL, 'Eduardo Rocha', NULL),
(118, 118, 'Monstro do Quarto do Pedro', 'O', 'o-monstro-do-quarto-do-pedro', 2, 'BR', 22, 24, 'monstro-quarto.jpg', NULL, 'Eduardo Rocha', NULL),
(119, 119, 'Pedro e o Menino Valentão', '', 'pedro-e-o-menino-valentao', 2, 'BR', 22, 24, 'pedro-menino-valentao.jpg', NULL, 'Eduardo Rocha', NULL),
(120, 120, 'Dia em Que o Miguel Estava Muito Triste', 'O', 'o-dia-em-que-o-miguel-estava-muito-triste', 2, 'BR', 22, 24, 'dia-em-que.jpg', NULL, 'Eduardo Rocha', NULL),
(121, 121, 'Quando o Miguel Entrou na Escola', '', 'quando-o-miguel-entrou-na-escola', 2, 'BR', 22, 24, 'Quando-miguel.jpg', NULL, 'Eduardo Rocha', NULL),
(122, 122, 'Meus Lápis de Cor São Só Meus', '', 'meus-lapis-de-cor-sao-so-meus', 2, 'BR', 22, 24, 'meus-lapis.jpg', NULL, 'Eduardo Rocha', NULL),
(123, 123, 'Meu Irmãozinho Me Atrapalha', '', 'meu-irmaozinho-me-atrapalha', 2, 'BR', 22, 24, 'irmaozinho-atrapalha.jpg', NULL, 'Eduardo Rocha', NULL),
(124, 124, 'Menina Que Não Era Maluquinha II e Outras Histórias', 'A', 'a-menina-que-nao-era-maluquinha-ii-e-outras-historias', 2, 'BR', 23, 40, 'menina-que-nao-era-II.png', NULL, 'Mariana Massarani', NULL),
(125, 125, 'Menina Que Não Era Maluquinha e Outras Histórias', 'A', 'a-menina-que-nao-era-maluquinha-e-outras-historias', 2, 'BR', 23, 40, 'menina-que-nao-era.png', NULL, 'Mariana Massarani', NULL),
(126, 126, 'Cantinho Só pra Mim', 'Um', 'um-cantinho-so-pra-mim', 2, 'BR', NULL, 40, 'cantinho-so-pra-mim.png', NULL, 'Ziraldo', NULL),
(127, 127, 'Livro das Tintas', 'O', 'o-livro-das-tintas', 2, 'BR', 20, 32, 'livro-das-tintas.png', NULL, 'Raquel Coelho', NULL),
(128, 128, 'Livro do Papel', 'O', 'o-livro-do-papel', 2, 'BR', 20, 32, 'livro-do-papel.png', NULL, 'Raquel Coelho', NULL),
(129, 129, 'Livro das Línguas', 'O', 'o-livro-das-linguas', 2, 'BR', 20, 32, 'livro-das-linguas.png', NULL, 'Raquel Coelho', NULL),
(130, 130, 'História do Livro', 'A', 'a-historia-do-livro', 2, 'BR', 20, 32, 'historia-do-livro.png', NULL, 'Raquel Coelho', NULL),
(131, 131, 'Livro das Letras', 'O', 'o-livro-das-letras', 2, 'BR', 20, 32, 'livro-das-letras.png', NULL, 'Raquel Coelho', NULL),
(132, 132, 'Livro do Lápis', 'O', 'o-livro-do-lapis', 2, 'BR', 20, 32, 'O Livro do Lapis.png', NULL, 'Raquel Coelho', NULL),
(133, 133, 'Livro dos Gestos e dos Símbolos', 'O', 'o-livro-dos-gestos-e-dos-simbolos', 2, 'BR', 20, 32, 'livro-dos-gestos-e-dos-simbolos.png', NULL, 'Raquel Coelho', NULL),
(134, 134, 'Nicolau tinha uma ideia', '', 'nicolau-tinha-uma-ideia', 1, 'BR', 1, 40, 'nicolau.jpg', '9788516090852', 'Alcy', NULL),
(135, 135, 'livro das datas: agenda Ruth Rocha', 'O', 'o-livro-das-datas-agenda-ruth-rocha', 1, 'BR', NULL, 408, 'datas-agenda.jpg', '9788516060220', 'Mariana Massarani', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `author_collection_editors`
--

DROP TABLE IF EXISTS `author_collection_editors`;
CREATE TABLE IF NOT EXISTS `author_collection_editors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uri` (`uri`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `author_collection_editors`
--

INSERT INTO `author_collection_editors` (`id`, `name`, `uri`, `country`) VALUES
(1, 'Salamandra', 'salamandra', 'BR'),
(2, 'Melhoramentos', 'melhoramentos', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `author_collection_prizes`
--

DROP TABLE IF EXISTS `author_collection_prizes`;
CREATE TABLE IF NOT EXISTS `author_collection_prizes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work` int(10) unsigned NOT NULL,
  `prize_name` varchar(200) NOT NULL,
  `institution_name` varchar(200) DEFAULT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uri` (`category_name`),
  KEY `work` (`work`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `author_collection_prizes`
--

INSERT INTO `author_collection_prizes` (`id`, `work`, `prize_name`, `institution_name`, `category_name`, `year`) VALUES
(1, 114, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', '2006'),
(2, 115, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', '2006'),
(3, 120, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', NULL),
(4, 121, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', NULL),
(5, 122, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', NULL),
(6, 123, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', NULL),
(7, 125, 'Prêmio FCW de Ciência e Cultura', 'Fundação Conrado Wessel', 'Literatura', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `author_collection_series`
--

DROP TABLE IF EXISTS `author_collection_series`;
CREATE TABLE IF NOT EXISTS `author_collection_series` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `editor` int(10) unsigned NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uri` (`uri`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `author_collection_series`
--

INSERT INTO `author_collection_series` (`id`, `editor`, `name`, `uri`, `country`) VALUES
(1, 1, 'Vou Te Contar!', 'vou-te-contar', 'BR'),
(2, 1, 'Conte um Conto', 'conte-um-conto', 'BR'),
(3, 1, 'A Turma da Nossa Rua', 'a-turma-da-nossa-rua', 'BR'),
(6, 1, 'As Aventuras de Alvinho', 'as-aventuras-de-alvinho', 'BR'),
(7, 1, 'Marcelo, Marmelo, Martelo', 'marcelo-marmelo-martelo', 'BR'),
(8, 1, 'Toda Criança do Mundo', 'toda-crianca-do-mundo', 'BR'),
(9, 1, 'As Coisas que eu Gosto', 'as-coisas-que-eu-gosto', 'BR'),
(10, 1, 'O Reizinho Mandão', 'o-reizinho-mandao', 'BR'),
(11, 1, 'Os Medos Que Eu Tenho', 'os-medos-que-eu-tenho', 'BR'),
(12, 1, 'Conta De Novo', 'conta-de-novo', 'BR'),
(13, 1, 'Meninos, Eu Vi!', 'meninos-eu-vi', 'BR'),
(14, 1, 'O Pulo Do Gato', 'o-pulo-do-gato', 'BR'),
(16, 1, 'De Repente Dá Certo', 'de-repente-da-certo', 'BR'),
(17, 1, 'Quem Tem Medo?', 'quem-tem-medo', 'BR'),
(18, 1, 'Ruth Rocha Apresenta', 'ruth-rocha-apresenta', 'BR'),
(19, 1, 'Clássicos por Ruth Rocha', 'classicos-por-ruth-rocha', 'BR'),
(20, 2, 'O Homem e a Comunicação', 'o-homem-e-a-comunicacao', 'BR'),
(21, 2, 'Algodão-Doce', 'algodao-doce', 'BR'),
(22, 2, 'Comecinho', 'comecinho', 'BR'),
(23, 2, 'As Cores do Mundo', 'as-cores-do-mundo', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `author_collection_works`
--

DROP TABLE IF EXISTS `author_collection_works`;
CREATE TABLE IF NOT EXISTS `author_collection_works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `description` text,
  `summary` text,
  `type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

--
-- Extraindo dados da tabela `author_collection_works`
--

INSERT INTO `author_collection_works` (`id`, `title`, `prefix`, `uri`, `description`, `summary`, `type`) VALUES
(1, 'Arca de Noé', 'A', 'a-arca-de-noe', 'Se você fosse Noé, e tivesse de fazer uma arca, que bichos colocaria na sua barca? Peru, macaco, aranha, pato, avestruz, pulga, galinha, carrapato? Qual seria a sua decisão? Que bichos salvaria da inundação?', 'Se você fosse Noé, e tivesse de fazer uma arca, que bichos colocaria na sua barca? Peru, macaco, aranha, pato, avestruz, pulga, galinha, carrapato? Qual seria a sua decisão? Que bichos salvaria da inundação?', 3000),
(2, 'Cinderela das Bonecas', 'A', 'a-cinderela-das-bonecas', 'Todo mundo adora a vovó neném. Que sabe contar histórias como ninguém. E ela sabe fazer coisas ainda mais belas. Como transformar bonecas em cinderelas! Mariana ficou encafifada: "será que a vovó é também uma fada?"\r\n', 'Todo mundo adora a vovó neném. Que sabe contar histórias como ninguém. E ela sabe fazer coisas ainda mais belas. Como transformar bonecas em cinderelas! Mariana ficou encafifada: "será que a vovó é também uma fada?"\r\n', 3000),
(3, '... Que Eu Vou Pra Angola... e Outras Histórias...', '', '-que-eu-vou-pra-angola-e-outras-historias', 'Macacos nos mordam! A Ruth resolveu contar neste livro três histórias muito engraçadas que têm no macaco seu personagem principal: "...Que eu vou pra Angola...", "A macaca que perdeu a banana" e "O macaco e a boneca de piche". Com muita confusão, estas são uma macacada só!', '', 3000),
(4, 'Árvore do Beto', 'A', 'a-arvore-do-beto', 'Catapimba é um garoto legal. Amigo da turma toda, centro-avante e secretário do Estrela-D''Alva Futebol Clube, com ele o tempo só esquenta quando o Armandinho não apita o jogo direito. Em A árvore do Beto ele vai realizar um grande desejo que tinha desde pequeno. E vai descobrir também que qualquer sonho fica melhor quando a gente está perto dos amigos.', '', 3000),
(5, 'Coisa', 'A', 'a-coisa', 'Dizem que a curiosidade matou o gato. Por isso é que aquela "coisa" que Alvinho encontrou no porão da casa de seu avô meteu um medão na família toda. O que estaria ali, escondido no meio da escuridão?', '', 3000),
(6, 'Decisão do Campeonato', 'A', 'a-decisao-do-campeonato', 'Em A decisão do campeonato o leitor vai conhecer Catapimba e sua turma, os craques do campinho pegado à casa do seu Manoel. E descobrir que estrago um Bicão pode causar quando resolve "ajudar" a apitar o jogo.', '', 3000),
(7, 'Escola do Marcelo', 'A', 'a-escola-do-marcelo', 'Neste livro, vamos acompanhar um dia de aula numa escola muito divertida: a do Marcelo. Tomara que ela seja como a sua, cheia de amigos e atividades interessantes para fazer.\r\nNo final, ainda é possível se divertir com as brincadeiras preparadas especialmente para os leitores dessa série.', '', 3000),
(8, 'Escolinha do Mar', 'A', 'a-escolinha-do-mar', 'No fundo do mar existe uma escola, onde polvos, lulas e siri-patolas, todos os peixinhos e estrelas-do-mar se juntam alegres para estudar. Lá dona Ostra e o professor Camarão ensinam felizes sua lição.', '', 3000),
(9, 'Família do Marcelo', 'A', 'a-familia-do-marcelo', 'Neste livro, os leitores vão conhecer a família do Marcelo: o pai, seu João; a mãe, dona Laura; e a irmã, Aninha.\r\nMas não é só isso. Também vão conhecer os outros parentes do Marcelo e descobrir quantos tipos diferentes de família existem por aí.\r\nNo final, ainda é possível se divertir com as brincadeiras preparadas especialmente para os leitores desta série.', '', 3000),
(10, 'Fantástica Máquina dos Bichos', 'A', 'a-fantastica-maquina-dos-bichos', 'Lembra dos amigos macacote e porco pança, que faziam na floresta a maior lembrança? Tiveram como filhos zé mico e pancinha, uma dupla de arteiros de primeira linha. Se você pensa que pior que os pais não podia haver nada, é porque não conhece essa dupla da pesada!', '', 3000),
(11, 'Galinha dos Ovos de Ouro e Outras Histórias', 'A', 'a-galinha-dos-ovos-de-ouro-e-outras-historias', '"Enquanto o mundo pega fogo", "O homem e a galinha" e "Pra vencer certas pessoas" são os "causos" recontados por Ruth neste livro. Nos três, a sabedoria popular mostra até onde a ganância e a teimosia podem levar as pessoas, e também que os poderosos nem sempre são mais inteligentes que aqueles que não frequentam a escola.', '', 3000),
(12, 'Máquina Maluca', 'A', 'a-maquina-maluca', 'Em A Máquina Maluca o leitor vai conhecer o cientista Batista, um tio maluco que o Maneco tem. E vai descobrir também que por trás de uma ideia simples podem estar ocultas grandes soluções.', '', 3000),
(13, 'Menina Que Aprendeu A Voar', 'A', 'a-menina-que-aprendeu-a-voar', 'Lúcia é uma menina como qualquer outra: estuda, brinca e apronta algumas confusões de vez em quando. Na escola, ela e os amigos são obrigados a viver na lição do "não pode". Só que um dia ela descobre que pode voar! E o melhor: logo a turma toda também aprende essa maravilhosa arte!', '', 3000),
(14, 'Primavera da Lagarta', 'A', 'a-primavera-da-lagarta', 'Bem no meio da clareira, debaixo da bananeira, os bichos da floresta resolveram fazer uma festa. Mas não era festa, não! Era um comício do sr. camaleão. Todos protestavam contra a feiura da lagarta. Só não contavam com a sabedoria da mãe-natureza que na primavera espalha sua beleza!', '', 3000),
(15, 'Rua do Marcelo', 'A', 'a-rua-do-marcelo', 'Neste livro você vai conhecer a rua que o Marcelo mora, e vai descobrir como é importante ter algumas regras para conviver bem com seus vizinhos. E, no final, vai se divertir com as brincadeiras preparadas especialmente para você.', '', 3000),
(16, 'Almanaque Ruth Rocha', '', 'almanaque-ruth-rocha', 'Nesta nova edição, ele está ainda mais interessante. São histórias, brincadeiras, charadas, provérbios, adivinhas, piadas e mil outras coisinhas para você passar horas lendo e se divertindo. Um livro para acompanhar você o ano inteiro!', '', 3000),
(17, 'Alvinho e os Presentes de Natal', '', 'alvinho-e-os-presentes-de-natal', 'Alvinho agora anda com mania de comprar. E, quando chega o Natal, tem uma lista de presentes que não acaba nunca. Mas um pesadelo daqueles faz Alvinho mudar de idéia... será?', '', 3000),
(18, 'Alvinho, o Edifício City of Taubaté e o Cachorro Wenceslau', '', 'alvinho-o-edificio-city-of-taubate-e-o-cachorro-wenceslau', 'O que Alvinho mais quer na vida é ter um cachorro... Mas ninguém parece entender isso, muito menos a dona Violeta, a síndica do edifício.', '', 3000),
(19, 'Armandinho, o Juiz', '', 'armandinho-o-juiz', 'Em, Armandinho, o juiz, o leitor vai entender como dói ser chamado de "ladrão"... E vai entender a falta que um juiz faz numa partida...', '', 3000),
(20, 'Coisas Que a Gente Fala', 'As', 'as-coisas-que-a-gente-fala', 'As palavras podem nos parecer duras, suaves, feias, bonitas, tristes, alegres... Expressam tanto verdades como mentiras, portanto devem ser bem dimensionadas antes de ser ditas. Este livro possibilita discussões sobre ética nos relacionamentos e as consequências das palavras mal avaliadas. Escrito em forma de poema narrativo.', '', 3000),
(21, 'Coisas Que Eu Gosto', 'As', 'as-coisas-que-eu-gosto', 'Esta série retrata em pequenas cenas atividades do cotidiano que as crianças apreciam fazer. A escritora Ruth Rocha e a psicóloga Dora Lorch abrem espaço para que os pequenos identifiquem suas vontades e seus desejos mais característicos da primeira infância.', '', 2000),
(22, 'Atrás da Porta', '', 'atras-da-porta', 'A passagem secreta de uma velha casa vai causar muito mais surpresa do que se poderia imaginar. Aquela não era uma porta qualquer, era uma abertura para um mundo repleto de viagens inesquecíveis!', '', 3000),
(23, 'Azul e Lindo: Planeta Terra, Nossa Casa', '', 'azul-e-lindo-planeta-terra-nossa-casa', 'Um belíssimo livro que fala da importância do cuidado com a casa de todos nós: o planeta Terra. O que fazer para impedir que os solos se tornem desertos, que as águas fiquem envenenadas e que as florestas sejam devastadas? Como preservar o meio ambiente para que possamos viver com qualidade e para que as futuras gerações encontrem um planeta como deve ser: azul e lindo?', '', 4000),
(24, 'Bom-dia, Todas As Cores!', '', 'bom-dia-todas-as-cores', 'O camaleão queria a todos agradar.\r\nMas será que isso pode funcionar?\r\nPois quem a si mesmo não agrada também\r\nJamais vai conseguir agradar outro alguém...', '', 3000),
(25, 'Borba, O Gato', '', 'borba-o-gato', 'Borba, o gato, e Diogo, o cão, ensinam a todos uma grande lição: que cão e gato podem ser amigos, e juntos enfrentar todos os perigos. Eles vão tomar conta da cidade para todos dormirem com tranquilidade.', '', 3000),
(26, 'Canções, Parlendas, Quadrinhas, Para Crianças Novinhas', '', 'cancoes-parlendas-quadrinhas-para-criancas-novinhas', '"... é muito importante fazer com que as crianças falem. Falem bastante, cantem, recitem."\r\nCom essas palavras, Ruth Rocha encerra o texto de abertura deste livro, que traz de volta uma essencial característica da literatura para crianças: a oralidade. Quando ouvem e repetem textos da tradição popular, elas percebem intuitivamente a beleza do ritmo e da sonoridade das palavras - descobertas essenciais para que se tornem futuros leitores.', '', 2000),
(27, 'Como Se Fosse Dinheiro', '', 'como-se-fosse-dinheiro', 'Em Como se fosse dinheiro o leitor vai descobrir a diferença entre uma bala e uma moeda... E quando alguém não quiser dar seu troco, vai saber que a coisa pode "dar bode"!', '', 3000),
(28, 'Contos de Perrault', '', 'contos-de-perrault', 'Clássicos da literatura mundial, os maiores contos de fadas de Charles de Perrault são recontados aqui com muita criatividade e invenção.\r\nSobre o autor', '', 3000),
(29, 'Davi Ataca Outra Vez', '', 'davi-ataca-outra-vez', 'Davi ainda não sabe ler, mas adora escrever. Sua habilidade para rabiscar todas as paredes disponíveis do bairro não só vai fazer com que seja aceito na turma dos mais velhos, como vai torná-lo o pivô de um grande movimento!', '', 3000),
(30, 'De Repente Dá Certo', '', 'de-repente-da-certo', 'Beatriz e Pedro, dois adolescentes, filhos de pais separados que se casam novamente, agora fazem parte da mesma família. Brigas, discussões e disputas acontecem, mas aos poucos eles vão descobrindo que, quem sabe, "de repente, dá certo".', '', 4000),
(31, 'Declaração Universal Dos Direitos Humanos', '', 'declaracao-universal-dos-direitos-humanos', 'A Declaração Universal dos Direitos Humanos, documento firmado pela Organização das Nações Unidas logo após os horrores da Segunda Guerra Mundial, é o maior acordo de convivência entre os povos da Terra. Foi adaptada por Ruth Rocha para que as crianças entendam que o caminho a ser trilhado pela humanidade passa pela paz, pelo respeito, pelo amor e pela igualdade.', '', 5000),
(32, 'Dois Idiotas Sentados Cada Qual No Seu Barril...', '', 'dois-idiotas-sentados-cada-qual-no-seu-barril', 'Um é teimosinho. O outro é mandão. O que pode acontecer quando esses dois idiotas, sentados cada qual no seu barril de pólvora, com uma vela acesa na mão, se encontram para provar sua valentia?\r\nCom personagens que beiram ao ridículo, Ruth Rocha mostra como alguns conflitos poderiam ser evitados se o orgulho e o egoísmo deixassem de estar tão presentes na vida das pessoas.', '', 3000),
(33, 'Elefante?', '', 'elefante', 'Mári tinha uma dúvida interessante? Ela era uma menina ou era um elefante? Mas você já pensou nessa possibilidade: e se a realidade for sonho e o sonho for realidade?', '', 3000),
(34, 'Este Admirável Mundo Louco', '', 'este-admiravel-mundo-louco', 'Em Admirável mundo louco, um extraterrestre revela suas impressões sobre o planeta Terra, um mundo "habitado por seres que moram empilhados". Uns pelos outros aponta as extravagâncias das pessoas por causa do trânsito. Quando a escola é de vidro examina a educação limitada que é oferecida em "frascos de vidro". Três divertidas histórias, para curtir e refletir.', '', 4000),
(35, 'Eu gosto muito', '', 'eu-gosto-muito', 'Esta série retrata em pequenas cenas atividades do cotidiano que as crianças apreciam fazer. A escritora Ruth Rocha e a psicóloga Dora Lorch abrem espaço para que os pequenos identifiquem suas vontades e seus desejos mais característicos da primeira infância.', '', 2000),
(36, 'Eugênio, O Gênio', '', 'eugenio-o-genio', 'De que vale ser um burro genial se o tipo não consegue ser um burro legal? Eugênio era um gênio, mas vivia empacado, fazia muita onda, era muito mimado! Mas o mundo gira, a vida não pode parar. E o nosso amigo Eugênio terá de desempacar.', '', 3000),
(37, 'Fábulas De Esopo', '', 'fabulas-de-esopo', 'As fábulas mais antigas contadas em uma linguagem atualizada, que encanta e surpreende as crianças de todas as idades.', '', 3000),
(38, 'Faca Sem Ponta, Galinha Sem Pé', '', 'faca-sem-ponta-galinha-sem-pe', '"...Homem com homem, mulher com mulher". Este parece um provérbio antigo e ultrapassado. Mas quando os irmãos Joana e Pedro viram "João" e "Pedra", as coisas se complicam na família de seu Setúbal e dona Brites!', '', 3000),
(39, 'Fantasma Existe?', '', 'fantasma-existe', 'A série Os medos que Eu Tenho conta pequenas cenas que trazem à tona dramas infantis, como medo de fantasma, de ficar sozinho e de não conseguir realizar uma tarefa... Com maestria, a escritora Ruth Rocha e a psicóloga Dora Lorch ajudam a transformar esses medos em situações de aprendizagem. Em Fantasma existe? estão caracterizados os medos simbólicos, ou seja, aqueles que não conseguimos explicar.', '', 2000),
(40, 'Faz Muito Tempo', '', 'faz-muito-tempo', 'Há muito tempo, vou te contar, ninguém sabia o que havia pra lá do mar. Até que homens e meninos, pedros e pedrinhos, criaram coragem e puseram-se a caminho, rumo a lugares distantes e misteriosos, cheios de aventuras para navegantes corajosos.', '', 3000),
(41, 'Gabriela E A Titia', '', 'gabriela-e-a-titia', 'Em Gabriela e a titia, a menina levada foi passear com a senhora gorducha que não para de falar um só minuto. Enquanto a titia se distrai, Gabriela aproveita para fugir e deixar que a tagarela continue o passeio com um companheiro inusitado!', '', 3000),
(42, 'Histórias Das Mil E Uma Noites', '', 'historias-das-mil-e-uma-noites', 'As mais belas histórias e contos populares do Oriente Médio, contados pela Princesa Sherazade e recontados pela Ruth, em um livro"prá lá de encantado".', '', 3000),
(43, 'Historinhas Malcriadas', '', 'historinhas-malcriadas', 'Historinhas malcriadas é um livro que conta histórias engraçadas, inteligentes, mas nem sempre bem comportadas. \r\nEm quatro historinhas, Ruth Rocha fala – com seu tradicional bom-humor – de crianças não tão boazinhas, mas que na verdade são bem parecidas com as da vida real. \r\nUm ótimo livro para refletir com as crianças sobre determinados comportamentos.', '', 3000),
(44, 'João E Maria', '', 'joao-e-maria', '"Conta de novo!" - Quem conhece crianças, sabe: quando gostam de uma história, querem que ela seja repetida tantas vezes quantas houver alguém disposto a ler ou contá-la novamente. Esta série reúne alguns dos mais populares contos de fadas, recontados por Ruth Rocha de maneira simples, mas encantadora, de forma que as crianças bem pequenas possam acompanhar a narrativa. As bonitas ilustrações e o formato grande criam um clima especial, envolvendo ouvintes e leitores no mundo mágico criado por estas histórias.', '', 2000),
(45, 'João E O Pé De Feijão', '', 'joao-e-o-pe-de-feijao', '"Conta de novo!" - Quem conhece crianças, sabe: quando gostam de uma história, querem que ela seja repetida tantas vezes quantas houver alguém disposto a ler ou contá-la novamente. Esta série reúne alguns dos mais populares contos de fadas, recontados por Ruth Rocha de maneira simples, mas encantadora, de forma que as crianças bem pequenas possam acompanhar a narrativa. As bonitas ilustrações e o formato grande criam um clima especial, envolvendo ouvintes e leitores no mundo mágico criado por estas histórias.', '', 2000),
(46, 'Lá Vem O Ano Novo', '', 'la-vem-o-ano-novo', 'Na casa do tempo, o tempo não pode parar. Segundos e minutos passam sem cessar. O Ano Velho está cansado, o Ano Novo já vem... Mas por que a Meia-Noite não chega também? Uma história em que o tempo precisa correr para que a esperança possa renascer!', '', 3000),
(47, 'Leila Menina', '', 'leila-menina', 'A história de Leila menina ocorre na cidade do Rio de Janeiro, numa época muito especial para o Brasil: o ano de 1968, em que pessoas saíram às ruas para lutar pela liberdade política e pelos direitos das mulheres.', '', 3000),
(48, 'Macacote E Porco Pança', '', 'macacote-e-porco-panca', 'Macacote e Porco Pança vivem na floresta, e a vida deles é quase uma festa. Quase, porque Macacote é meio amalucado e vê inimigos por todo lado. Apesar de Porco Pança ter bom coração, será que vai poder tirá-lo da confusão?', '', 3000),
(49, 'Marcelo, Marmelo, Martelo', '', 'marcelo-marmelo-martelo', 'Situações do cotidiano ganham encanto nas palavras de Ruth Rocha, que inova a maneira de contar histórias. Os personagens dos três contos deste livro são crianças que vivem no espaço urbano. Elas resolvem seus impasses com muita esperteza e vivacidade: Marcelo cria palavras novas; Teresinha e Gabriela acabam se identificando, apesar das diferenças; Caloca compreende a importância da amizade.', '', 3000),
(50, 'Marcelo: De Hora Em Hora', '', 'marcelo-de-hora-em-hora', 'Neste livro você vai aprender, junto com o Marcelo, uma forma divertida de ver as horas, além de entender como e por que as pessoas dividem o tempo em pedacinhos.\r\nNo final, vai se divertir com as brincadeiras preparadas especialmente para você!', '', 3000),
(51, 'Marília bela', '', 'marilia-bela', 'A história de Marília bela se passa em 1872, quando o Brasil ainda era colônia de Portugal. Tudo acontece em Vila Rica (hoje, Ouro Preto), onde ocorreu o movimento mais importante pela nossa independência: a Inconfidência Mineira.', '', 3000),
(52, 'Mil Pássaros Pelos Céus', '', 'mil-passaros-pelos-ceus', 'Qual o segredo, meu Deus, que medo! O que fez todos os pássaros fugirem de Passaredo? Que coisa triste uma cidade