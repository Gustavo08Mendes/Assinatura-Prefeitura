<?php
$optionsArray = [
    "GABINETE",
    "ASCOM",
    "ATAJ",
    "ATECC",
    "ATIC",
    "CAEPP",
    "CAEPP / DECPP",
    "CAEPP / DERPP",
    "CAEPP / DESPP",
    "CAF",
    "CAF / DGP",
    "CAF / DLC",
    "CAF / DOF",
    "CAF / DRV",
    "CAF / DSUP",
    "CAP",
    "CAP / ARTHUR SABOYA",
    "CAP / DEPROT",
    "CAP / DPCI",
    "CAP / DPD",
    "CAP / NÚCLEO DE ATENDIMENTO",
    "CASE",
    "CASE / DCAD",
    "CASE / DDU",
    "CASE / DLE",
    "CEPEUC",
    "CEPEUC / DCIT",
    "CEPEUC / DDOC",
    "CEPEUC / DVF",
    "COMIN",
    "COMIN / DCIGP",
    "COMIN / DCIMP",
    "CONTRU",
    "CONTRU / DACESS",
    "CONTRU / DINS",
    "CONTRU / DLR",
    "CONTRU / DSUS",
    "DEUSO",
    "DEUSO / DMUS",
    "DEUSO / DNUS",
    "DEUSO / DSIZ",
    "GEOINFO",
    "GTEC",
    "ILUME",
    "PARHIS",
    "PARHIS / DHGP",
    "PARHIS / DHMP",
    "PARHIS / DHPP",
    "PARHIS / DPS",
    "PLANURB",
    "PLANURB / DART",
    "PLANURB / DMA",
    "PLANURB / DOT",
    "RESID",
    "RESID / DRGP",
    "RESID / DRH",
    "RESID / DRVE",
    "SERVIN",
    "SERVIN / DSIGP",
    "SERVIN / DSIMP",
    "STEL"
  ];

 include 'conexao.php';

// Inserção de dados na tabela
foreach ($optionsArray as $option) {
    $sql = "INSERT INTO unidades (unidades) VALUES ('$option')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro inserido com sucesso: $option<br>";
    } else {
        echo "Erro ao inserir registro: " . $conn->error . "<br>";
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>