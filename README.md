# API REST
Esta API é utilizada para login de usuários

## Endpoints

### POST api/usuarios/login
Esse endpoint é responsável por fazer o processo de login.
#### Parametros form-data

login: Username do usuário cadastrado no sistema.
senha: Senha do usuário cadastrado no sistema, com aquele determinado Username.

Exemplo:

```
login: leandro
senha: 123456
```

#### Respostas
##### OK! 200
Caso essa resposta aconteça você vai receber token JWT para conseguir acessar endpoints protegidos na API.
Exemplo de resposta:

```

{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJuYW1lIjoiTGVhbmRybyBSb2NoYSIsImV4cGlyZXNfaW4iOjE3MDY4ODY0Mzh9.FvfWnOfMKVUv002KVPykVI0rHBkWHCAlfVRZ4vaKbl0",
    "data": {
        "id": "1",
        "name": "Leandro Rocha",
        "expires_in": 1706886438
    }
}

```

##### Token Inválido! 403

```
{
    "dados": "token invalido."
}

```

##### Falha na autenticação! 401
Caso essa resposta aconteça, isso significa que aconteceu alguma falha durante o processo de autenticação da requisição. Motivos: Token inválido, Token expirado.


### GET api/clientes/listar
Esse endpoint é responsável por retornar a listagem de todos os usuarios cadastrados no banco de dados.
#### Parametros Bearer Token
Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJuYW1lIjoiTGVhbmRybyBSb2NoYSIsImV4cGlyZXNfaW4iOjE3MDY4ODY0Mzh9.FvfWnOfMKVUv002KVPykVI0rHBkWHCAlfVRZ4vaKbl0
#### Respostas
##### OK! 200
Caso essa resposta aconteça você vai receber a listagem de todos os usuários.
Exemplo de resposta:

```

{
    "dados": [
        {
            "id": "2",
            "nome": "Usuario A"
        },
        {
            "id": "1",
            "nome": "Usuario B"
        },
        {
            "id": "3",
            "nome": "testeasdasd"
        }
    ]
}

```

##### Falha na autenticação! 401
Caso essa resposta aconteça, isso significa que aconteceu alguma falha durante o processo de autenticação da requisição. Motivos: Token inválido, Token expirado.

### GET api/clientes/adicionar
Esse endpoint é responsável por retornar a listagem de todos os usuarios cadastrados no banco de dados.
#### Parametros Bearer Token

Token: Bearer Token gerado no Login.

Exemplo:
Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJuYW1lIjoiTGVhbmRybyBSb2NoYSIsImV4cGlyZXNfaW4iOjE3MDY4ODY0Mzh9.FvfWnOfMKVUv002KVPykVI0rHBkWHCAlfVRZ4vaKbl0

#### Respostas
##### OK! 200
Caso essa resposta aconteça você vai receber a listagem de todos os usuários.
Exemplo de resposta:

```

{
    "dados": "Dados foram inseridos com sucesso."
}

```

##### Falha na autenticação! 401
Caso essa resposta aconteça, isso significa que aconteceu alguma falha durante o processo de autenticação da requisição. Motivos: Token inválido, Token expirado.

