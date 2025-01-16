# Imagem de Banco de Dados PostgreSQL

## O que �

Uma imagem Docker de um banco de dados PostgreSQL, onde � poss�vel criar tabelas e setar informa��es diretamente, atrav�s do arquivo `init.sql`.

## O que o usu�rio precisa fazer

1. **Duplicar o arquivo `.env-sample`**
    - Remova o sufixo `-sample` para criar o arquivo `.env` a partir do `.env-sample`.

2. **Definir os nomes de banco, usu�rio e senha**
    - No arquivo `.env`, defina os valores para o banco de dados, o usu�rio e a senha conforme sua necessidade.

3. **Configurar o arquivo `init.sql`**
    - Abra o arquivo `init.sql` e adicione as tabelas e dados que voc� deseja que o banco de dados contenha ao ser iniciado.

4. **Construir a imagem Docker**
    - Com os arquivos configurados, execute o comando abaixo para construir a imagem Docker:

      ```bash
      docker build -t postgres-personal-db .
      ```

5. **Executar o container Docker**
    - Ap�s a constru��o da imagem, execute o container com o seguinte comando:

      ```bash
      docker run -d --name postgres-personal-db-container -p 5432:5432 --env-file .env postgres-personal-db
      ```

6. **Acessar o banco dentro do container**
    - Para acessar o banco de dados diretamente dentro do container, use o comando abaixo:

      ```bash
      docker exec -it postgres-personal-db-container psql -U {seu-usuario} -d {seu-banco}
      ```

      Substitua `{seu-usuario}` e `{seu-banco}` pelos valores definidos no arquivo `.env`.

7. **Parar o container**
    - Para parar o container, use o comando abaixo:

      ```bash
      docker stop postgres-personal-db-container
      ```

## Exemplos

Dentro da pasta **examples**, voc� encontrar� dois exemplos prontos para integra��o com o banco PostgreSQL:

### Exemplo com Node.js
- Na pasta **examples/Node**, h� um exemplo de como se conectar ao banco PostgreSQL usando Node.js.
- Para rodar o exemplo, siga as etapas abaixo:

    1. Navegue at� a pasta `Examples/Node`.
    2. Instale as depend�ncias:

       ```bash
       npm install
       ```

    3. Execute o script de conex�o:

       ```bash
       node index.js
       ```

### Exemplo com PHP
- Na pasta **examples/PHP**, h� um exemplo de como se conectar ao banco PostgreSQL usando PHP.
- Para rodar o exemplo, siga as etapas abaixo:

    1. Navegue at� a pasta `Examples/PHP`.
    2. Execute o script de conex�o:

       ```bash
       php index.php
       ```

## Conclus�o

Agora voc� tem uma imagem Docker personalizada para rodar um banco de dados PostgreSQL, com inicializa��o flex�vel via `init.sql` e a possibilidade de personalizar as vari�veis de configura��o diretamente no arquivo `.env`. Exemplos de integra��o com Node.js e PHP est�o dispon�veis para facilitar a conex�o com o banco.
