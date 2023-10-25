USE application;



CREATE TABLE usuarios(
    us_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    user_capa VARCHAR(200),
    user_perfil VARCHAR(200),
    nivel_acess INT NOT NULL
);

CREATE TABLE musicas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    genero VARCHAR(30) NOT NULL,
    caminho VARCHAR(200) NOT NULL,
    capa VARCHAR(200) NOT NULL,
    privacidade CHAR(7)NOT NULL,
    descricao VARCHAR(300),
    fk_usuarios_us_id INT
);

CREATE TABLE generos(
    gn_id INT AUTO_INCREMENT PRIMARY KEY,
    gn_nome VARCHAR(30)
);

ALTER TABLE musicas ADD CONSTRAINT FK_musicas
    FOREIGN KEY (fk_usuarios_us_id)
    REFERENCES usuarios(us_id)
    ON DELETE RESTRICT;


INSERT INTO usuarios(nome, email, senha, nivel_acess) VALUES 
('UnderSounds ADM','undersounds5@gmail.com','Undersounds2023', 3),
('UserArt','UserArt@gmail.com','Art12345', 2),
('UserNorm','UserNorm@gmail.com','Norm12345', 1);

INSERT INTO generos(gn_nome) VALUES
('Rock'),
('Sertanejo'),
('Rap');