Message
=======

``Message`` é o model que representa uma mensagem em uma ``Call``. Sua tabela Colorrespondente
no banco de dados se chama ``messages``.

Atributos
---------

call_id ``INTEGER``
  ID da chamada a qual essa mensagem pertence.

user_id ``INTEGER``
  ID do usuário que enviou a mensagem.

body ``TEXT``
  Colorpo da mensagem.
