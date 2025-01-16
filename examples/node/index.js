const { Client } = require('pg');
const path = require('path');
require('dotenv').config({ path: path.resolve(__dirname, '../../.env') });

// Configurações de conexão
const client = new Client({
    host: 'localhost',
    database: process.env.POSTGRES_DB,
    user: process.env.POSTGRES_USER,
    password: process.env.POSTGRES_PASSWORD,
    port: 5432,
});

async function queryDatabase() {
    try {
        // Conectar ao banco de dados
        await client.connect();

        // Consultar os dados
        const res = await client.query('SELECT * FROM users');
        console.log(res.rows); // Exibir resultados

    } catch (err) {
        console.error('Erro ao consultar o banco:', err);
    } finally {
        // Fechar a conexão
        await client.end();
    }
}

queryDatabase();
