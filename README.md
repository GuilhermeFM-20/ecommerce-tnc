# ecommerce-tnc

E-Commerce do Grupo TNC

# Sobre o Projeto

<h4 align="center"> 
	Nosso projeto prático de E-Commerce visa aplicar os conhecimentos adquiridos durante o curso, sendo inspirado por um sistema real. Optamos por utilizar os frameworks Slim, RainTPL e a funcionalidade de migração do CakePHP para otimizar o desenvolvimento. Este esforço não só consolida nosso aprendizado teórico, mas também visa criar um E-Commerce funcional e eficiente. Estamos comprometidos em seguir as melhores práticas, priorizando a documentação abrangente, padrões de codificação, segurança e testes. A escolha específica dos frameworks reflete nossa busca por eficiência e simplicidade, enquanto a integração da migração do CakePHP promete flexibilidade contínua no banco de dados. Este projeto não apenas aprimora nossas habilidades práticas, mas também representa uma oportunidade de aplicar de forma tangível os conceitos aprendidos no ambiente profissional. Estamos entusiasmados em transformar teoria em resultados impactantes neste cenário de E-Commerce.
</h4>

# Sobre o Phinx

- O Phinx vai ser uma aplicação para rodar migrations;

- Para acessar o banco local é só alterar as configurações no arquivo .env;

- As migrations estarão localizadas na pasta db/migrations;
 

*Comando para rodar o Phinx*

- .\phinx: esse comando quando executado no terminal, consegue acessar as funcionalidades da migration e verificar os comandos;

- Para conseguir criar novas tabelas no banco verifique a documentação do Phinx:
Link: https://book.cakephp.org/phinx/0/en/index.html

# Estrutura de arquivos do sistema

- O projeto seguirá o padrão MVC, com a parte de serviços separada.

- Cada módulo terá seu próprio arquivo nas pastas dentro do diretório `\src`.

-Exemplo: A categoria terá
`src/Controller/CategoryController.php`: Apenas os controles que serão chamados pelas rotas do arquivo routes/app.php.
`src/Models/Category.php`: Serão organizados os getters e setters simulando os dados da base de dados.
`src/Services/CategoryService.php`: Conterão os métodos principais para manipular os dados.

 - Para a parte de visualização que está na pasta `resources/views/pages/`
 - Nesse caminho ficarão os arquivos html das páginas.
 Sempre seguirão o padrão:
 `category_search.html`: Página do filtro de busca do módulo, onde será exibido um grid com os registros e um filtro de busca. 
 `category.html`: Será o formulário de cadastro e atualização."

# Select DB no sistema

 *Exemplo do select com as informações do banco*
 
```html

<select class="form-control" id="nome_campo" onclick="changeValues('nome_campo','api/load/nome_campo');"></select>

```

*Exemplo do select com busca das informações no banco*

Precisa chamar a função inputSelect no arquivo view/assets/js/script, passando o id do campo, rota da api, e o valor this por padrão

```html
                
<input type="text" id="category" class="form-control w-100" name="name_campo" onkeydown="inputSelect('category','api/load/categories',this)" placeholder="Pesquisar..." onblur="emptySearch(this)">
<div id="div_category" class="position-absolute w-100 mt-4-5"></div>

```






