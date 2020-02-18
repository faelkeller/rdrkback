<h1>Teste Back End Raia Drogasil - Rafael Keller</h1>

<h2>1 - Pré requisitos:</h2>

<p>O projeto pode ser executado de duas formas:</p>

<strong>Ambiente local</strong>
<ul>      
    <li>Mysql</li>
    <li>PHP</li>
    <li>Composer</li>  
</ul>

<strong>Docker</strong>
<ul>      
    <li>Docker</li>
    <li>Docker Compose</li>  
</ul>

<p>
Nas duas formas de execução <strong>o GIT é um pré requisito</strong>
</p>

<h2>2 - Tecnologias utilizadas</h2>
<ul>
    <li>PHP</li>
    <li>Laravel</li>
    <li>Mysql</li>
    <li>GIT</li>
    <li>Docker</li>
</ul>

<h2>3 - Justificativa das tecnologias usadas</h2>
<p>Foi usado laravel, mysql, docker pois eram as tecnologias pedidas na vaga. </p>

<p>Pela simplicidade do teste, poderia ser usado node.js com mongodb, mas a decisão foi tomada pelos requisitos da função</p>

<h2>4 - Como rodar o projeto</h2>

<p>Para execução do projeto pelo docker <strong>(recomendado)</strong>, é necessário somente a execução do shell script "run.sh" na raiz do projeto. Com a execução desse script, as imagens são baixadas e executadas com todo o ambiente ja configurado (php, laravel, mysql e nginx). O teste pode ser acessado pelo navegador em "http://localhost:81/" </p>

<p>
    Para execução do projeto manualmente, tem-se que criar uma base de dados mysql e apontar as configurações no arquivo .env na raiz do projeto. Em seguida deve-se instalar as dependencias com o composer "composer install" . O laravel fornece um webserver interno que pode ser iniciado executando o seguinte comando "php artisan serve". O sistema pode ser acessado em "http://localhost:8000"
</p>

