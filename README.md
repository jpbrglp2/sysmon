# 🚀 CyberDeck Monitor

Um sistema de monitoramento remoto desenvolvido com **Bash, PHP e JSON**, onde um dispositivo Android executando **Termux** coleta informações do sistema e as envia para um servidor web hospedado em um computador com **XAMPP**.

O projeto transforma um celular Android em um pequeno agente de monitoramento capaz de enviar dados de hardware e sistema em tempo real para um dashboard web acessível pelo navegador.

---

# 📸 Visão Geral

```text
Dispositivo Android (Termux)
        │
        ▼
   collector.sh
        │
        ▼
   system.json
        │
        ▼
      CURL
        │
        ▼
receiver.php (XAMPP)
        │
        ▼
   system.json
        │
        ▼
    index.php
        │
        ▼
   Navegador
```

---

# ✨ Funcionalidades

- Monitoramento remoto via navegador
- Coleta automática de dados do Android
- Atualização periódica
- Interface estilo terminal hacker
- Comunicação via HTTP POST
- Arquitetura simples e didática
- Desenvolvido sem frameworks

---

# 📊 Dados Monitorados

Atualmente o sistema monitora:

- CPU
- Uso de RAM
- Nível da bateria
- Tempo de atividade (Uptime)
- Data e hora da última atualização

---

# 🛠 Tecnologias Utilizadas

## Backend

- PHP
- JSON

## Coletor

- Bash Script
- Curl

## Ambiente Mobile

- Android
- Termux
- Termux:API

## Ambiente Desktop

- XAMPP
- Apache

---

# 📂 Estrutura do Projeto

```text
CyberDeckMonitor/

├── collector.sh
├── system.json
├── receiver.php
├── index.php
└── README.md
```

---

# ⚙ Como Funciona

## 1. Coleta

O script `collector.sh` executa comandos Linux para obter informações do dispositivo.

Exemplos:

```bash
free -h
```

```bash
uptime -p
```

```bash
cat /proc/cpuinfo
```

```bash
termux-battery-status
```

---

## 2. Geração do JSON

Os dados coletados são convertidos para JSON.

Exemplo:

```json
{
    "cpu":"MT6750",
    "ram":"1.1G / 2.0G",
    "battery":"85%",
    "uptime":"up 3 hours",
    "last_update":"09/08/2025 14:32:05"
}
```

---

## 3. Envio

O script envia os dados utilizando CURL.

```bash
curl -X POST \
-H "Content-Type: application/json" \
-d @system.json \
http://IP_DO_PC/CyberDeckMonitor/receiver.php
```

---

## 4. Recepção

O arquivo `receiver.php` recebe o JSON enviado pelo celular.

```php
$json = file_get_contents('php://input');
```

---

## 5. Armazenamento

O servidor salva os dados recebidos.

```php
file_put_contents('system.json', $json);
```

---

## 6. Exibição

O dashboard lê o arquivo JSON e exibe as informações.

```php
$data = json_decode(
    file_get_contents('system.json'),
    true
);
```

---

# 📦 Instalação do Servidor

## Instalar o XAMPP

Baixe:

https://www.apachefriends.org

---

## Iniciar o Apache

Abra o XAMPP Control Panel e clique em:

```text
Start → Apache
```

---

## Copiar os Arquivos

Mover o projeto para:

```text
C:\xampp\htdocs\CyberDeckMonitor
```

---

## Acessar

```text
http://localhost/CyberDeckMonitor
```

---

# 📱 Instalação no Android

## Instalar o Termux

Recomendado:

https://f-droid.org

---

## Atualizar Pacotes

```bash
pkg update
pkg upgrade -y
```

---

## Instalar Dependências

```bash
pkg install curl
pkg install procps
pkg install figlet
pkg install termux-api
```

---

## Instalar Termux API

Instale também:

Termux:API

https://f-droid.org/packages/com.termux.api/

---

# 🔧 Configuração

No arquivo:

```bash
collector.sh
```

Alterar:

```bash
PC_IP="192.168.1.100"
```

Para o IP do computador.

---

# 🖥 Descobrir o IP do Computador

Windows:

```cmd
ipconfig
```

Procurar:

```text
IPv4 Address
```

Exemplo:

```text
192.168.1.100
```

---

# 🚀 Executando

Dar permissão:

```bash
chmod +x collector.sh
```

Executar:

```bash
./collector.sh
```

---

# 📈 Exemplo do Terminal

```text
 ██████╗██╗   ██╗██████╗ ███████╗██████╗
██╔════╝╚██╗ ██╔╝██╔══██╗██╔════╝██╔══██╗
██║      ╚████╔╝ ██████╔╝█████╗  ██████╔╝
██║       ╚██╔╝  ██╔══██╗██╔══╝  ██╔══██╗
╚██████╗   ██║   ██████╔╝███████╗██║  ██║
 ╚═════╝   ╚═╝   ╚═════╝ ╚══════╝╚═╝  ╚═╝

STATUS............. ONLINE

CPU................ MT6750
RAM................ 1.1G / 2.0G
BATERIA............ 85%
UPTIME............. up 3 hours

SERVIDOR........... 200
ULTIMO ENVIO....... 09/08/2025 14:32:05
```

---

# 📡 Código HTTP

| Código | Significado |
|----------|------------|
| 200 | Sucesso |
| 400 | Requisição inválida |
| 404 | Arquivo não encontrado |
| 500 | Erro interno |

---

# 🔒 Segurança

Atualmente o projeto é voltado para estudos.

Possíveis melhorias:

- Autenticação por token
- HTTPS
- Validação de IP
- Criptografia dos dados
- Logs de auditoria

---

# 🧠 Conceitos Aprendidos

Este projeto ensina:

- Linux
- Bash Script
- Android + Termux
- JSON
- PHP
- APIs HTTP
- Comunicação Cliente/Servidor
- Monitoramento de Sistemas
- Redes
- XAMPP

---

# 🛣 Roadmap

## Versão 1.0

- [x] Coleta de CPU
- [x] Coleta de RAM
- [x] Coleta de Bateria
- [x] Coleta de Uptime
- [x] Dashboard Web
- [x] Comunicação HTTP

## Versão 1.1

- [ ] Temperatura do dispositivo
- [ ] Processos ativos
- [ ] IP Local
- [ ] IP Público
- [ ] Latência

## Versão 1.2

- [ ] Histórico de dados
- [ ] Gráficos
- [ ] Logs

## Versão 2.0

- [ ] PWA
- [ ] Multi-dispositivos
- [ ] Dashboard em tempo real
- [ ] WebSocket
- [ ] Sistema de alertas

---

# 🤝 Contribuição

Contribuições são bem-vindas.

1. Faça um Fork
2. Crie uma Branch

```bash
git checkout -b feature/minha-feature
```

3. Commit

```bash
git commit -m "Minha feature"
```

4. Push

```bash
git push origin feature/minha-feature
```

5. Abra um Pull Request

---

# 📄 Licença

Este projeto é distribuído sob a licença MIT.

---

# 👨‍💻 Autor

Desenvolvido por **jp**

Projeto criado para aprendizado de:

- Linux
- Bash
- PHP
- Redes
- Monitoramento de Sistemas
- Desenvolvimento Web

---

⭐ Se este projeto te ajudou, considere dar uma estrela no repositório.