# Projeto InvestNews

Este projeto é um tema WordPress personalizado para o site InvestNews usnado o Boilerplate BedRock (https://github.com/roots/bedrock).

### Ambiente Local com Local <font color="red">(Somente exemplo, necessário revisão)</font>

Para criar um ambiente local, você precisará do Local instalado em sua máquina. O Local é uma ferramenta que permite criar ambientes de desenvolvimento locais para WordPress.

Passos para criar um ambiente local <br>
Baixe e instale o Local em sua máquina. <br>
Crie um novo site no Local e selecione o tema InvestNews. <br>
Configure as opções de banco de dados e usuário. <br>
Clique em "Criar site" para criar o ambiente local. <br>

### Instalando Novos Plugins com Composer
Para instalar novos plugins com o Composer, você precisará seguir os passos abaixo:

<ul>
  <li>Abra o terminal e navegue até a pasta root do projeto.</li>
  <li>Execute o comando composer require <nome-do-plugin> para instalar o plugin desejado.</li>
  <li><pre>composer require "wpackagist-plugin/taboola":"2.2.2" --ignore-platform-reqs</pre></li>
  <li>Para definir o plugin como obrigatório (mu-plugins), adicione-o ao arquivo <code>composer.json</code> na lista da sessão
  extra.installer-paths.web/app/mu-plugins/{$name}/. Por exemplo:</li>
  <li>
    <pre>
      . . .
      "extra": {
        "installer-paths": {
          "web/app/mu-plugins/{$name}/": [
            "type:wordpress-muplugin",
            "wpackagist-plugin/seo-by-rank-math",
            "REPOSITORIO/PLUGIN"
          ],
      . . .
    </pre>
  </li> 
</ul>

Instalando na pasta mu-plugins, ele se tornará obrigatório e será ativado automaticamente, não podendo ser desativado no painel de administração do WordPress.
Caso opte por instalar o plugin fora da pasta mu-plugins, ele será instalado na pasta plugins, e você poderá ativar/desativar ele no painel de administração do WordPress.

### Estrutura do Projeto

A estrutura do projeto é a seguinte:

<ul>
  <li>
    web/app: Pasta raiz do projeto.
  </li>
  <li>
    web/app/mu-plugins: Pasta para plugins mu.
  </li>
  <li>
    web/app/themes: Pasta para temas.
  </li>
  <li>
    web/app/themes/investnews: Pasta do tema InvestNews.
  </li>
</ul>
