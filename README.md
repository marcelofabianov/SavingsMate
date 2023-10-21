# SavingsMate

**FinanceWise** é uma aplicação amigável e repleta de recursos projetada para capacitar você a assumir o controle de suas finanças pessoais. Gerenciar seu dinheiro nunca foi tão fácil.

## Requisitos

- [Docker](https://docs.docker.com/install/)
- [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

## Instalação

1. Clone o repositório

```bash
git clone git@github.com:marcelofabianov/SavingsMate.git
```

2. Preparando ambiente para rodar a aplicação

```bash
sh _docker/local/init.sh
```

3. Carregando alias para o projeto

```bash
source alias.sh
```

4. Rodando a aplicação

```bash
app.up
```

5. Executando os testes

```bash
app.test
```

6. Analizando código, lint e sintax

```bash
app.quality
```
