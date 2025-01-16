# Imagem de Banco de Dados PostgreSQL

## O que é

Uma imagem Docker de um banco de dados PostgreSQL, onde é possível criar tabelas e setar informações diretamente, através do arquivo `init.sql`.

## O que o usuário precisa fazer

1. **Duplicar o arquivo `.env-sample`**
    - Remova o sufixo `-sample` para criar o arquivo `.env` a partir do `.env-sample`.

2. **Definir os nomes de banco, usuário e senha**
    - No arquivo `.env`, defina os valores para o banco de dados, o usuário e a senha conforme sua necessidade.

3. **Configurar o arquivo `init.sql`**
    - Abra o arquivo `init.sql` e adicione as tabelas e dados que você deseja que o banco de dados contenha ao ser iniciado.

4. **Construir a imagem Docker**
    - Com os arquivos configurados, execute o comando abaixo para construir a imagem Docker:

      ```bash
      docker build -t postgres-personal-db .
      ```

5. **Executar o container Docker**
    - Após a construção da imagem, execute o container com o seguinte comando:

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

Dentro da pasta **examples**, você encontrará dois exemplos prontos para integração com o banco PostgreSQL:

### Exemplo com Node.js
- Na pasta **examples/Node**, há um exemplo de como se conectar ao banco PostgreSQL usando Node.js.
- Para rodar o exemplo, siga as etapas abaixo:

    1. Navegue até a pasta `Examples/Node`.
    2. Instale as dependências:

       ```bash
       npm install
       ```

    3. Execute o script de conexão:

       ```bash
       node index.js
       ```

### Exemplo com PHP
- Na pasta **examples/PHP**, há um exemplo de como se conectar ao banco PostgreSQL usando PHP.
- Para rodar o exemplo, siga as etapas abaixo:

    1. Navegue até a pasta `Examples/PHP`.
    2. Execute o script de conexão:

       ```bash
       php index.php
       ```

## Conclusão

Agora você tem uma imagem Docker personalizada para rodar um banco de dados PostgreSQL, com inicialização flexível via `init.sql` e a possibilidade de personalizar as variáveis de configuração diretamente no arquivo `.env`. Exemplos de integração com Node.js e PHP estão disponíveis para facilitar a conexão com o banco.
