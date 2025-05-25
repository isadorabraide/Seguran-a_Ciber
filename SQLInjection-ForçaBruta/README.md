# Segurança em Aplicações Web: SQL Injection e Força Bruta

Este projeto demonstra exemplos de código PHP vulnerável e seguro quanto a ataques de **SQL Injection** e **força bruta**.

## 📂 Arquivos

- `inseguro.php`: Código vulnerável que não protege contra SQL Injection nem contra múltiplas tentativas de login.
- `seguro.php`: Código com melhorias de segurança:
  - Uso de `PDO` com *prepared statements* para evitar SQL Injection.
  - Controle de tentativas de login via `$_SESSION` para mitigar ataques de força bruta.
  - Uso de `password_verify()` para comparar senhas com segurança.

## 🚨 Tipos de ataques prevenidos

| Tipo de ataque   | Prevenção                                     |
|------------------|-----------------------------------------------|
| SQL Injection    | Uso de `prepare()` e `bindParam()` do PDO     |
| Força bruta      | Limite de tentativas usando sessão PHP        |
| Senha em texto plano | Uso de `password_hash()` e `password_verify()` |

## 💡 Observações

Para armazenar senhas com segurança no banco de dados:

```php
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
