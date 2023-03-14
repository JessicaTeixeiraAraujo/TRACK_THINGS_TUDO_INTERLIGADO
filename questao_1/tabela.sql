CREATE TABLE USUARIO (
  nCdUsuario DECIMAL(10,0) NOT NULL,
  cNmUsuario VARCHAR(100) NOT NULL,
  cAtivo CHAR(1) DEFAULT '1' NOT NULL, -- CHAR é string
  cSenha VARCHAR(50) NOT NULL,
  dValidadeSenha TIMESTAMP NOT NULL, -- DATETIME enviado via pdf não é um tipo de dado nativo do PostgreSQL 14
  CONSTRAINT USUARIO_pkey PRIMARY KEY (nCdUsuario),
  CONSTRAINT USUARIO_cNmUsuario UNIQUE (cNmUsuario)
);
