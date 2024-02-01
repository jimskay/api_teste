# API REST
Esta API é utilizada para login de usuários

## Endpoints
### POST /usuarios/login
Esse endpoint é responsável por retornar a listagem de todos os usuarios cadastrados no banco de dados.
#### Parametros
Nenhum
#### Respostas
##### OK! 200
Caso essa resposta aconteça você vai receber a listagem de todos os usuários.
Exemplo de resposta:
...
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJuYW1lIjoiTGVhbmRybyBSb2NoYSIsImV4cGlyZXNfaW4iOjE3MDY4ODY0Mzh9.FvfWnOfMKVUv002KVPykVI0rHBkWHCAlfVRZ4vaKbl0",
    "data": {
        "id": "1",
        "name": "Leandro Rocha",
        "expires_in": 1706886438
    }
}
...
##### Falha na autenticação! 401
Caso essa resposta aconteça, isso significa que aconteceu alguma falha durante o processo de autenticação da requisição. Motivos: Token inválido, Token expirado.
