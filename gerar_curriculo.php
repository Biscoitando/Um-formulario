<?php
// Obtendo os dados enviados pelo formulário
$nome = $_POST['nome'];
$dataNascimento = $_POST['data_nascimento'];
$experiencias = $_POST['experiencia'];

// Formatação do currículo
$curriculo = "Nome: $nome\n";
$curriculo .= "Data de Nascimento: $dataNascimento\n";
$curriculo .= "\nExperiências Profissionais:\n";
foreach ($experiencias as $experiencia) {
    $curriculo .= "- $experiencia\n";
}

// Geração do arquivo PDF (utilizando a biblioteca TCPDF)
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->MultiCell(0, 10, $curriculo);
$pdf->Output('curriculo.pdf', 'D');
?>
