CREATE TABLE Funcionarios (
    id_funcionario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE,
    cpf CHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(15),
    endereco VARCHAR(40),
    id_cargo INT,
    id_usuario INT,
    dept_id INT,
    financeiro_id INT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Cargos (
id_cargo INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(10)
);

CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    senha VARCHAR(40) NOT NULL,
    foto BLOB,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Departamentos (
id_dept INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(40) NOT NULL
);

CREATE TABLE Fornecedor (
    id_fornecedor INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE,
    cnpj CHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(15),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE Clientes (
    id_clientes INT PRIMARY KEY AUTO_INCREMENT,
    cpf CHAR(14) UNIQUE NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Categorias (
id_categoria INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(10)
);

CREATE TABLE Produtos (
    id_produto INT PRIMARY KEY AUTO_INCREMENT,
    foto BLOB,
    nome VARCHAR(50) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade_em_estoque INT NOT NULL,
    id_categoria INT,
    id_fornecedor INT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria),
    FOREIGN KEY (id_fornecedor) REFERENCES Fornecedor(id_fornecedor)
);

INSERT INTO Categorias (nome) values ('Limpeza');
INSERT INTO Departamentos (nome) values ('Atendimento');
INSERT INTO Fornecedor (nome, email, cnpj, telefone)
VALUES 
('Fornecedor A', 'contato@fornecedora.com', '12345678000100', '(11) 98765-4321'),
('Fornecedor B', 'suporte@fornecedorb.com', '98765432000111', '(21) 99876-5432'),
('Fornecedor C', 'vendas@fornecedorc.com', '56789012000122', '(31) 91234-5678'),
('Fornecedor D', 'info@fornecedord.com', '11223344000133', '(41) 92345-6789'),
('Fornecedor E', 'comercial@fornecedore.com', '22334455000144', '(51) 93456-7890');
INSERT INTO Produtos (foto, nome, descricao, preco, quantidade_em_estoque, id_categoria, id_fornecedor)
VALUES 
('produtos/exemplo1.jpg', 'Produto A', 'Descrição do Produto A', 100.00, 50, 1, 1),
('produtos/exemplo2.jpg', 'Produto B', 'Descrição do Produto B', 150.00, 30, 1, 1),
('produtos/exemplo3.jpg', 'Produto C', 'Descrição do Produto C', 200.00, 20, 1, 1),
('produtos/exemplo4.jpg', 'Produto D', 'Descrição do Produto D', 250.00, 40, 1, 1),
('produtos/exemplo5.jpg', 'Produto E', 'Descrição do Produto E', 300.00, 60, 1, 1);


SELECT * from Produtos;
CREATE TABLE Vendas (
    id_venda INT PRIMARY KEY AUTO_INCREMENT,
    id_funcionario INT NOT NULL,
    horario_venda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    valor_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_funcionario) REFERENCES Funcionarios(id_funcionario)
);

CREATE TABLE ItensVenda (
    id_item_venda INT PRIMARY KEY AUTO_INCREMENT,
    id_venda INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_venda) REFERENCES Vendas(id_venda),
    FOREIGN KEY (id_produto) REFERENCES Produtos(id_produto)
);

CREATE TABLE Carrinho (
    id_carrinho INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_clientes)
);

CREATE TABLE ItensCarrinho (
    id_item INT PRIMARY KEY AUTO_INCREMENT,
    id_carrinho INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_carrinho) REFERENCES Carrinho(id_carrinho),
    FOREIGN KEY (id_produto) REFERENCES Produtos(id_produto)
);





