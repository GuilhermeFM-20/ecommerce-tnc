## Estrutura do projeto

** Rota do Index **

- Cada módulo terá uma opção na barra de navegação. Para chamar a rota na tela é só usar a função `changeView()`
- Nessa função será passado os parâmetros: (link,title); Link: rota dos arquivos na pasta page/; Title: Título da página;

** Organização dos arquivos no page/ **

- Cada módulo terá sua própria pasta, exemplo: page/financeiro/
- Cada pasta terá ps arquivos com as telas do sistema, como: view_create, view_search

## Comandos GIT

- git checkout -b (nome branch): Comando para criar uma nova branch ;
- git add . : Comando para adicionar as alterações no arquivo de commit ;
- git commit -m "texto do commit" : Comando para commitar as alterações junto com o texto;
- git push: Enviar as alterações para a branch remota (Obs: vai ter uma link no terminal para abrir o merge request, esse link abre a solicitação de integração no código original);
- git pull: baixando as atualizações da branch remota;
