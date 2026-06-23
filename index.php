<?php

$data = json_decode(
    file_get_contents('system.json'),
    true
);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CyberDeck Monitor</title>

<meta http-equiv="refresh" content="5">

<style>

body{
    background:#000;
    color:#00ff00;
    font-family:monospace;
    padding:20px;
}

h1{
    text-align:center;
    border-bottom:1px solid #00ff00;
    padding-bottom:10px;
}

.card{
    border:1px solid #00ff00;
    padding:15px;
    margin-bottom:15px;
}

.label{
    font-weight:bold;
}

.status{
    color:#00ff00;
}

</style>

</head>

<body>

<h1>CYBERDECK MONITOR</h1>

<div class="card">
    <div class="label">STATUS</div>
    <div class="status">ONLINE</div>
</div>

<div class="card">
    <div class="label">CPU</div>
    <div><?= htmlspecialchars($data['cpu']) ?></div>
</div>

<div class="card">
    <div class="label">RAM</div>
    <div><?= htmlspecialchars($data['ram']) ?></div>
</div>

<div class="card">
    <div class="label">BATERIA</div>
    <div><?= htmlspecialchars($data['battery']) ?></div>
</div>

<div class="card">
    <div class="label">UPTIME</div>
    <div><?= htmlspecialchars($data['uptime']) ?></div>
</div>

<div class="card">
    <div class="label">ÚLTIMA ATUALIZAÇÃO</div>
    <div><?= htmlspecialchars($data['last_update']) ?></div>
</div>

</body>
</html>