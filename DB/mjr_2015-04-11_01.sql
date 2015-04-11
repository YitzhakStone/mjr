-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Abr-2015 às 04:13
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `mjr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nomeCategoria`) VALUES
(1, 'Show'),
(2, 'Teatro'),
(3, 'Stand-Up');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `cpf`) VALUES
(1, 'Diego Moreira', '100.276.256-13'),
(2, 'Enios Lima', '100.245.812-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `protocolo` varchar(45) DEFAULT NULL,
  `quantidade` varchar(45) DEFAULT NULL,
  `valor_total` varchar(45) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `evento_idevento` int(11) NOT NULL,
  PRIMARY KEY (`idcompra`),
  KEY `fk_compra_cliente_idx` (`cliente_idcliente`),
  KEY `fk_compra_evento1_idx` (`evento_idevento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`idcompra`, `protocolo`, `quantidade`, `valor_total`, `cliente_idcliente`, `evento_idevento`) VALUES
(1, '1416062634', '2', '90', 1, 6),
(2, '1416062654', '3', '237', 1, 9),
(3, '1416062668', '3', '270', 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEvento` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`idevento`),
  KEY `fk_evento_categoria1_idx` (`categoria_idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`idevento`, `nomeEvento`, `data`, `horario`, `preco`, `categoria_idcategoria`) VALUES
(2, 'Samba do Zé', '1970-01-01', '19:00', '11.11', 1),
(3, 'Geraldo Magela', '2014-01-01', '19:00', '111.99', 1),
(4, 'U2', '2014-02-04', '19:45', '90.00', 1),
(5, 'Serginho Malandro', '2014-11-05', '20:45', '50.00', 3),
(6, 'Sambô', '2014-03-06', '21:00', '45.00', 1),
(8, 'Jammil', '2014-05-13', '22:00', '120.00', 1),
(9, 'Caetano Veloso', '2014-06-17', '19:45', '79.00', 1),
(10, 'Revelação', '2014-06-25', '00:00', '120.00', 1),
(11, 'Zé Ramalho', '2014-07-16', '21:00', '90.00', 1),
(12, 'Bruno Mars', '2014-10-28', '13:00', '13.00', 1),
(13, 'O Marido da minha mulher', '2014-12-18', '22:00', '15.00', 2),
(14, 'Amar é uma comédia', '2014-10-08', '21:45', '50.00', 1),
(15, 'Vai que cola', '2014-09-15', '21:00', '95.00', 2),
(16, 'Bom gosto', '2014-08-29', '22:45', '120.00', 1),
(17, 'Assunta Brasil', '2014-01-28', '12:00', '200.90', 2),
(18, 'Toquinho', '2014-12-25', '21:24', '45.00', 1),
(19, 'Butequim', '2014-04-11', '21:45', '25.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `ID_Evento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Valor` decimal(8,2) unsigned DEFAULT NULL,
  `Local` varchar(100) DEFAULT NULL,
  `Obs` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jovem`
--

CREATE TABLE IF NOT EXISTS `jovem` (
  `ID_Jovem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FlgExcluido` tinyint(1) DEFAULT 0 NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `DatNasc` date DEFAULT NULL,
  `NomePai` varchar(100) DEFAULT NULL,
  `NomeMae` varchar(100) DEFAULT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `RG` varchar(15) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `Obs` varchar(200) DEFAULT NULL,
  `ID_Sede` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID_Jovem`),
  KEY `ID_Sede` (`ID_Sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `jovem`
--

INSERT INTO `jovem` (`ID_Jovem`, `Nome`, `DatNasc`, `NomePai`, `NomeMae`, `Endereco`, `Telefone`, `Celular`, `Email`, `RG`, `CPF`, `Obs`, `ID_Sede`) VALUES
(1, 'Robson', '1994-10-14', 'PAI', 'MAE', 'Rua dosTrogloditas, 155, Bairro das Falácias', '31-3458-9999', '31-9999-8855', 'bol@bol.com', 'MG123456789', '12345678900', 'Observações do cadastro', 1),
(2, 'Yitzhak', '1994-10-14', 'PAI', 'MAE', 'Rua dosTrogloditas, 155, Bairro das Falácias', '31-3458-9999', '31-9999-8855', 'bol@bol.com', 'MG123456789', '12345678900', 'Observações do cadastro', 2),
(3, 'Vinicius', '1994-10-14', 'PAI', 'MAE', 'Rua dosTrogloditas, 155, Bairro das Falácias', '31-3458-9999', '31-9999-8855', 'bol@bol.com', 'MG123456789', '12345678900', 'Observações do cadastro', 2),
(4, 'Camila', '1994-10-14', 'PAI', 'MAE', 'Rua dosTrogloditas, 155, Bairro das Falácias', '31-3458-9999', '31-9999-8855', 'bol@bol.com', 'MG123456789', '12345678900', 'Observações do cadastro', 1),
(5, 'Yitzhak', '1994-10-14', 'PAI', 'MAE', 'Rua dosTrogloditas, 155, Bairro das Falácias', '31-3458-9999', '31-9999-8855', 'bol@bol.com', 'MG123456789', '12345678900', 'Observações do cadastro', 1),
(6, 'Mateus', '1994-10-14', 'PAI', 'MAE', 'Rua dosTrogloditas, 155, Bairro das Falácias', '31-3458-9999', '31-9999-8855', 'bol@bol.com', 'MG123456789', '12345678900', 'Observações do cadastro', 2),
(8, 'xistoes', '1970-01-01', '', '', '', '', '(31)9226-8740', '', '', '', '', 9),
(9, 'Abel', '1940-07-18', 'Adão', 'Eva', 'Bairro Paraiso', '(31)3131-3131', '(91)9988-7755', 'naoexisitaemail@seilaporque.com', 'naoexisitaemail', 'inútil', 'qualquer informação que julgamos ser necessária!', 3),
(21, 'zebulom', '1967-12-31', 'joaquim da silva sei la das quantas', 'maria da silva sei la das quantas ', 'algum lugar em santa luzia', '(31)3212-3212', '(31)3270-5000', 'zebulom@soeletem.com', 'zebulom@soelete', 'ele não é b', 'eu gosto de coelhos!', 9),
(22, 'Daniele', '1948-01-01', 'Papai', 'Mamae', 'Centro BH', '(31)3131-3131', '(31)9797-9797', 'lider@teste', 'lider@teste', '46887468468', 'estou com sono já', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jovemevento`
--

CREATE TABLE IF NOT EXISTS `jovemevento` (
  `ID_Jovem` int(10) unsigned NOT NULL,
  `ID_Evento` int(10) unsigned NOT NULL,
  `FlgPago` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID_Jovem`,`ID_Evento`),
  KEY `ID_Evento` (`ID_Evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ministerio`
--

CREATE TABLE IF NOT EXISTS `ministerio` (
  `ID_Minist` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FlgExcluido` tinyint(1) DEFAULT 0 NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `ID_Lider` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID_Minist`),
  KEY `ID_Lider` (`ID_Lider`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `ministerio`
--

INSERT INTO `ministerio` (`ID_Minist`, `Nome`, `ID_Lider`) VALUES
(1, 'teste', 1),
(2, 'street', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `ID_Sede` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FlgExcluido` tinyint(1) DEFAULT 0 NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  `Obs` varchar(200) DEFAULT NULL,
  `ID_Lider` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID_Sede`),
  KEY `ID_Lider` (`ID_Lider`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `sede`
--

INSERT INTO `sede` (`ID_Sede`, `Nome`, `Endereco`, `Obs`, `ID_Lider`) VALUES
(1, 'Sede BH', 'Avenida dos Andradas, 1005 Centro', 'Ainda em fase de testes', 22),
(2, 'Nome Sede 2', 'Rua sede dois, 725', 'OBS 222', 2),
(3, 'Acaiaca', 'afonso pena', 'teste', 1),
(4, 'Barro Preto', 'rua rio grande do sul', '', 6),
(5, 'Neves', 'neves', '', 4),
(9, 'Venda Nova', 'sei la', '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nmusuario` varchar(45) DEFAULT NULL,
  `dssenha` varchar(45) DEFAULT NULL,
  `fgstatus` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `perfil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nmusuario`, `dssenha`, `fgstatus`, `login`, `perfil`) VALUES
(1, 'Fulano de Teste', 'c4ca4238a0b923820dcc509a6f75849b', 'A', '1', 'admin'),
(3, 'Administrador', 'e3afed0047b08059d0fada10f400c1e5', 'A', 'admin', 'admin');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_evento1` FOREIGN KEY (`evento_idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jovem`
--
ALTER TABLE `jovem`
  ADD CONSTRAINT `jovem_ibfk_1` FOREIGN KEY (`ID_Sede`) REFERENCES `sede` (`ID_Sede`);

--
-- Limitadores para a tabela `jovemevento`
--
ALTER TABLE `jovemevento`
  ADD CONSTRAINT `jovemevento_ibfk_1` FOREIGN KEY (`ID_Jovem`) REFERENCES `jovem` (`ID_Jovem`),
  ADD CONSTRAINT `jovemevento_ibfk_2` FOREIGN KEY (`ID_Evento`) REFERENCES `jovem` (`ID_Jovem`);

--
-- Limitadores para a tabela `ministerio`
--
ALTER TABLE `ministerio`
  ADD CONSTRAINT `ministerio_ibfk_1` FOREIGN KEY (`ID_Lider`) REFERENCES `jovem` (`ID_Jovem`);

--
-- Limitadores para a tabela `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`ID_Lider`) REFERENCES `jovem` (`ID_Jovem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
