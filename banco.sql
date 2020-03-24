CREATE DATABASE oficina CHARSET = utf8;
USE oficina;

CREATE TABLE usuario (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(5) NOT NULL,
    PRIMARY KEY(id)
) CHARSET=utf8;

CREATE TABLE fornecedor (
    cnpj BIGINT(14) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone BIGINT(11) NOT NULL,
    endereco VARCHAR(350) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY(cnpj)
) CHARSET=utf8;

CREATE TABLE cliente (
    cpf BIGINT(11) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone BIGINT(11) NOT NULL,
    endereco VARCHAR(350) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY(cpf)
) CHARSET=utf8;

CREATE TABLE veiculo (
    placa VARCHAR(7) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    quilometragem FLOAT NOT NULL,
    cpfProprietario BIGINT(11) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY(placa),
    FOREIGN KEY(cpfProprietario) REFERENCES cliente(cpf)
) CHARSET=utf8;

CREATE TABLE ordem (
    id INTEGER NOT NULL AUTO_INCREMENT,
    placaVeiculo VARCHAR(7) NOT NULL,
    cpfProprietario BIGINT(11) NOT NULL,
    dataRegistro DATETIME NOT NULL,
    valorTotal FLOAT NOT NULL DEFAULT 0.00,
    aberta BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY(id),
    FOREIGN KEY(placaVeiculo) REFERENCES veiculo(placa),
    FOREIGN KEY(cpfProprietario) REFERENCES cliente(cpf)
) CHARSET=utf8;

CREATE TABLE item (
    id INTEGER NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    valor FLOAT NOT NULL DEFAULT 0.00,
    cnpjFornecedor BIGINT(14) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY(id),
    FOREIGN KEY(cnpjFornecedor) REFERENCES fornecedor(cnpj)
) CHARSET=utf8;

CREATE TABLE itemOrdem (
    idOrdem INTEGER NOT NULL,
    idItem INTEGER NOT NULL,
    FOREIGN KEY(idOrdem) REFERENCES ordem(id),
    FOREIGN KEY(idItem) REFERENCES item(id)
) CHARSET=utf8;

INSERT INTO usuario(nome, senha) VALUES ("ma",11111);
INSERT INTO fornecedor(cnpj, nome, telefone, endereco, ativo) VALUES (04040400404403,"volvo express",51992392828,"rua ermindo mayrer, 319, feliz - rs",1),(04040400404444,"volvo express",51992392828,"rua ermindo mayrer, 319, feliz - rs",1),(04040400404448,"volvo express",51992392828,"rua ermindo mayrer, 319, feliz - rs",0);
INSERT INTO cliente(cpf, nome, telefone, endereco, ativo) VALUES (04044455511,"mateus",51992382929,"rua xyz",1),(04044455522,"mateus2",51992382929,"rua xyz",1),(04044455532,"mateus3",51992388829,"rua zzz",0);
INSERT INTO item(descricao, valor, cnpjFornecedor, ativo) VALUES ("óleo lubrificante",300.23,04040400404403,1),("óleo lubrificante2",566.23,04040400404444,1),("óleo lubrificante3",900.50,04040400404444,0);
INSERT INTO veiculo(placa, modelo, quilometragem, cpfProprietario) VALUES ("ipq3030","vw gol 1.0 2008, vermelho",12000,04044455511),("ipq3031","vw golf 2.0 2005, branco",82000,04044455511),("zzz6031","vw up 1.0 tsi 2018, preto",2000,04044455511);