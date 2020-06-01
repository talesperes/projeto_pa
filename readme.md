[![N|Solid](https://naluta.site/assets/imagens/logo.png)](https://naluta.site)

## Qual o objetivo do Naluta?

Com várias pessoas passando a desenvolver seus próprios projetos a partir de suas ideias, acaba sendo necessária a contribuição de outras pessoas para torná-los realidade. Com esse sistema é possível unir pessoas para trabalharem juntas, visando a realização de seus projetos.

O Sistema tem como objetivo reunir pessoas de diversos lugares, com diferentes habilidades para trabalharem em conjunto, afim de ajudar no desenvolvimento de um projeto, onde uma pessoa ao criá-lo passa a ser o líder do mesmo, podendo aplicar definições como bem quiser e permitir com que pessoas interessadas no projeto possam participar, tendo antes a permissão do líder.

### Requisitos do Sistema
- Servidor Web
- PHP versão 5.6 ou mais recente
- Banco de dados MySQL

### Instalação
- Localize o banco de dados **banco_naluta.sql** na pasta **assets/database/**
- Importe o banco de dados
- Configure a conexão com o banco no arquivo **database.php**
- Mova os arquivos para dentro do servidor web
- Configure a conexão com o servidor de email SMTP no arquivo **Redefinir.php** no método **sendEmailPassword**, para que o sistema possa enviar email de redefinição de senha [OPCIONAL]

### Desenvolvimento

O naluta foi desenvolvido utilizando as seguintes bibliotecas e framework:

|  | LINK |
| ------ | ------ |
| Codeigniter 3 | [https://github.com/bcit-ci/CodeIgniter][COD] |
| MY_Model | [https://github.com/avenirer/CodeIgniter-MY_Model][MYM] |
| JQuery | [https://jquery.com][JQU] |
| JQuery.NiceScroll | [https://github.com/inuyaksa/jquery.nicescroll][JNI] |
| AlertifyJS | [https://alertifyjs.com][ALE] |
| Bootstrap 4 | [https://getbootstrap.com][BOO] |
| Font Awesome | [https://fontawesome.com/][FON] |

### Ferramentas

Ferramentas utilizadas para o desenvolvimento do projeto:
- Sublime Text 3
- WampServer
- MySQL Workbench
- GitHub Desktop

###### *Projeto desenvolvido para fins acadêmicos.

[COD]: <https://github.com/bcit-ci/CodeIgniter>
[MYM]: <https://github.com/avenirer/CodeIgniter-MY_Model>
[JQU]: <https://jquery.com>
[JNI]: <https://github.com/inuyaksa/jquery.nicescroll>
[ALE]: <https://alertifyjs.com>
[BOO]: <https://getbootstrap.com>
[FON]: <https://fontawesome.com/>
