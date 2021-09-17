User
====

``User`` é o model que representa um usuário. Sua tabela Colorrespondente no banco de dados
se chama ``users``.

Atributos
---------

name ``VARCHAR``
  Name do usuário.

email ``VARCHAR``
  Email do usuário, utilizado para o login. Deve ser único.

password ``VARCHAR``
  Password do usuário, utilizada para o login.

description ``TEXT``
  Descrição do usuário, idealmente seu Office. Ex.: "Coordenador de Sistemas de Informação".

color ``CHAR(7)``
  Código de Color do avatar do usuário em formato hexadecimal.

cel ``VARCHAR(19)``
  Número de telefone do usuário.

Views
-----

show
  Perfil do usuário.

index
  Lista de usuários.

edit
  Página de edição do usuário.
