<?php

$json = file_get_contents('php://input');

if (!$json) {
    http_response_code(400);
    exit('Nenhum dado recebido');
}

file_put_contents('system.json', $json);

echo 'OK';