<?php
header('Content-Type: application/json; charset=utf-8');

// Sanitize
function sanitize($v){ return htmlspecialchars(strip_tags(trim($v)), ENT_QUOTES, 'UTF-8'); }

$nome      = sanitize($_POST['nome']      ?? '');
$empresa   = sanitize($_POST['empresa']   ?? '');
$email     = sanitize($_POST['email']     ?? '');
$telefone  = sanitize($_POST['telefone']  ?? '');
$tipo      = sanitize($_POST['tipo']      ?? '');
$pessoas   = sanitize($_POST['pessoas']   ?? '');
$data      = sanitize($_POST['data']      ?? '');
$inicio    = sanitize($_POST['horario-inicio']   ?? '');
$termino   = sanitize($_POST['horario-termino']  ?? '');

// Validação básica
if(!$nome || !$email || !$telefone || !$tipo || !$pessoas || !$data || !$inicio || !$termino){
  echo json_encode(['ok'=>false,'mensagem'=>'Por favor, preencha todos os campos obrigatórios.']);
  exit;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  echo json_encode(['ok'=>false,'mensagem'=>'E-mail inválido.']);
  exit;
}

// Monta e-mail
$destinatario = 'luciana@nahgranja.com.br';
$assunto      = "Novo orçamento - {$tipo} - {$nome}";

$corpo  = "Nova solicitação de orçamento recebida pelo site:\n\n";
$corpo .= "Nome:           {$nome}\n";
$corpo .= "Empresa:        " . ($empresa ?: 'Não informado') . "\n";
$corpo .= "E-mail:         {$email}\n";
$corpo .= "Telefone:       {$telefone}\n";
$corpo .= "Tipo de Evento: {$tipo}\n";
$corpo .= "Pessoas:        {$pessoas}\n";
$corpo .= "Data:           {$data}\n";
$corpo .= "Horário:        {$inicio} às {$termino}\n";

$headers  = "From: site@nahgranja.com.br\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

$enviado = mail($destinatario, $assunto, $corpo, $headers);

if($enviado){
  echo json_encode(['ok'=>true,'mensagem'=>'Mensagem enviada com sucesso! Em breve entraremos em contato.']);
} else {
  echo json_encode(['ok'=>false,'mensagem'=>'Não foi possível enviar. Tente pelo WhatsApp ou e-mail diretamente.']);
}
?>
