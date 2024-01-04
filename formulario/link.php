<?php
session_start();
if (isset($_POST['zerar'])) {
    include '../conexao.php';
    $sql = "DELETE FROM assinatura.tbl_telefones WHERE id_key > 773";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }
}

if (isset($_POST['gera_assinatura'])) {



    $data = $_POST['data'];
    $datas = explode('-', $data);
    $dia = $datas[2];
    $mes = $datas[1];

    $secretaria = 'SMUL';
    $rede = $_SESSION['SesID'];
    $nome = $_POST['nome'];

    if (strlen($nome) > 27) {
        $array = explode(' ', $nome);
        $stringFinal = $array[0] . ' ' . end($array);
        $nome = $stringFinal;
    }

    $cargo = $_POST['cargo'];
    $email = $_SESSION['SesE-mail'];
    $unidade = $_POST['unidade'];
    $telefone = $_POST['telefone'];
    $telefone_completo = 'Tel.: 55 ' . $telefone;
    $fone_semdd = explode(' ', $telefone);
    $fone_sql = $fone_semdd[1];
    $andar = $_POST['endereco'];
    $endereco_completo = 'Rua São Bento, 405 | ' . $andar . '° andar';
    $site = 'www.prefeitura.sp.gov.br';
    $data = $_POST['data'];
    $cep = '01011 100 | São Paulo | SP';

    include '../conexao.php';

    $sql = "INSERT INTO tbl_telefones (cp_usuario_rede, cp_secretaria, cp_nome, cp_departamento, cp_cargo, cp_email, cp_telefone, cp_andar, cp_cep, cp_site, cp_nasc_dia, cp_nasc_mes)
            VALUES ('$rede', '$secretaria', '$nome', '$unidade', '$cargo', '$email', '$fone_sql', '$endereco_completo', '$cep', '$site', $dia, $mes)";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }
}

print_r($_POST)

 ?>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.min.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;

        }

        body a {
            font-style: none;
            text-decoration: none;
            color: black;
        }

        .container {
            display: flex;
            justify-content: start;
            width: 520px;
            height: 172px;
            background-color: white;
        }

        .div_img img {
            max-width: 130px;
        }

        .div_img {
            display: flex;
            align-items: center;
            width: 152px;
            padding: 1px;
        }

        .conteudo {
            width: 100%;
            height: 100%;
            padding-left: 10px;
        }

        .conteudo p {
            font-size: 12px;
            margin: 0;
        }

        #nome {
            font-size: 18px;
            text-transform: uppercase;
            margin: 0;
            padding: 30px 0 0 0;
        }

        .container-conteudo {
            border-left: 3px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 361px;
        }

        .informações {
            margin-top: 15px;
        }

        #setor {
            text-transform: uppercase;
        }

        .result {
            margin-top: 40px;
            background-color: black;
            width: 520px !important;
        }

        .download_img {
            width: 520px !important;
        }
        .container_principal{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: blue;
            width: 100%;
            height: 100%;
        }
        .container_botao{
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .botao_download{
            color: white;
            border: 2px solid white;
            border-radius: 20px;
            width: 350px;
            background-color: transparent;
            cursor: pointer;
            padding: 5px 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>


</head>


<body>
    <div class="container_principal">
        <div class="container_imagens">
            <div class="container">
                <div class="div_img">
                    <img src="../img_assinatura.png" alt="imagem prefeitura">
                </div>
                <div class="container-conteudo">
                    <div class="conteudo">
                        <div class="pessoa">
                            <h1 id="nome">result</h1>
                            <p id="setor"><?php echo $cargo; ?> / <?php echo $unidade; ?></p>
                        </div>
                        <div class="informações">
                            <p id="email"><a href=""><?php echo $email; ?></a></p>
                            <p id="telefone"><?php echo $telefone_completo; ?></p>
                            <p id="local"><?php echo $endereco_completo; ?></p>
                            <p id="cep"><?php echo $cep; ?></p>
                            <p id="site"><a href="http://www.prefeitura.sp.gov.br"><?php echo $site; ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="download_img">
                <a href="">
                    <div class="result">
                    </div>
                </a>
            </div>
            <div class="container_botao">
                <a href=""><button class="botao_download">Baixar identidade de e-mail</button></a>
            </div>
        </div>
    </div>



</body>

<script>
    const div = document.querySelector(".container");
    const result = document.querySelector(".result");
    const nameArquivo = document.getElementById("nome").value;


    function convert() {
        html2canvas(div).then(function(canvas) {
            result.appendChild(canvas);

            let cvs = document.querySelector("canvas");
            let dataURI = cvs.toDataURL("image/png");

            let downloadLink = document.querySelector("a");
            downloadLink.href = dataURI;
            downloadLink.download = nameArquivo + " .png";
        });
        result.style.display = "block";
        result.style.width = "520px";
    }
    convert();
</script>