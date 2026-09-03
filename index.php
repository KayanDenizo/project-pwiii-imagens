<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Produto | Loja Etim</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <header class="navbar">
        <span class="logo">Loja Etim</span>
        <nav>
            <a href="index.php" class="ativo">Início</a>
            <a href="produtos.php">Produtos Cadastrados</a>
            <a href="produtosestatico.php">Catálogo</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Envio de Imagens</h1>
        <p>Cadastre um novo produto com nome, descrição, valor e fotos.</p>
    </section>

    <main>
        <form method="post" enctype="multipart/form-data" class="card-form">
            <label for="nome">Nome do Produto</label>
            <input type="text" name="nome" id="nome" placeholder="Ex: Sofá Confort 3 Lugares">

            <label for="desc">Descrição</label>
            <textarea name="desc" id="desc" placeholder="Descreva as principais características do produto"></textarea>

            <label for="val">Valor</label>
            <input type="number" name="valor" id="val" step="0.01" min="0" placeholder="0,00">

            <label for="foto">Imagens do Produto</label>
            <div class="upload-wrap">
                <input type="file" name="foto[]" multiple id="foto" class="upload-input">
                <div class="upload-box" id="upload-box">
                    <span class="icone">🖼️</span>
                    <strong>Clique ou arraste as imagens aqui</strong>
                    <small id="arquivos-nome">JPG ou PNG &middot; pode selecionar várias</small>
                </div>
            </div>

            <button type="submit" id="botao">Enviar Produto</button>
        </form>
    </main>

    <footer>Loja Etim &middot; Cadastro de produtos</footer>

    <script>
        const inputFoto = document.getElementById('foto');
        const caixaUpload = document.getElementById('upload-box');
        const nomeArquivos = document.getElementById('arquivos-nome');

        inputFoto.addEventListener('change', () => {
            if (inputFoto.files.length === 0) {
                nomeArquivos.textContent = 'JPG ou PNG · pode selecionar várias';
            } else if (inputFoto.files.length === 1) {
                nomeArquivos.textContent = inputFoto.files[0].name;
            } else {
                nomeArquivos.textContent = inputFoto.files.length + ' arquivos selecionados';
            }
        });

        ['dragenter', 'dragover'].forEach(evento =>
            inputFoto.addEventListener(evento, () => caixaUpload.classList.add('arrastando'))
        );
        ['dragleave', 'drop'].forEach(evento =>
            inputFoto.addEventListener(evento, () => caixaUpload.classList.remove('arrastando'))
        );
    </script>
</body>

</html>

<?php
//checa se o usuario preencheu ao menos o nome
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    //coloca o dado preenchido em uma variavel nome e checa se nao tem injection
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['desc']); //faz o mesmo para a descricao
    $valor = addslashes($_POST['valor']);

    //cria um array vazio para guardar os nomes das fotos caso tenha enviado
    $fotos = array();

    //checa se foi enviada alguma foto
    if (isset($_FILES['foto'])) {
        $tipo = '';
        //cria um laco e repete enquanto houver fotos
        for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
            if ($_FILES['foto']['type'][$i] == "image/png") {
                $tipo = ".png";
            } elseif ($_FILES['foto']['type'][$i] == 'image/jpeg') {
                $tipo = ".jpg";
            } else {
                $tipo = "outro";
            }

            if ($tipo == 'outro') {
?>
                <script>
                    alert("Só é possível enviar arquivos JPG e PNG");
                </script>
<?php
            } else {
                $nome_arquivo = md5($_FILES['foto']['name'][$i]) . rand(1, 999) . $tipo; //encripta

                //move o arquivo para a pasta imagens ja com o nome novo do arquivo
                move_uploaded_file($_FILES['foto']['tmp_name'][$i], 'imagens/' . $nome_arquivo);

                //armazena o nome do arquivo no vetor fotos
                array_push($fotos, $nome_arquivo);
            }
        }
    }

    //Verifica se todos os campos foram digitados no formulario
    if (!empty($nome) && !empty($descricao) && !empty($fotos)) {
        require 'classes/Produto.class.php';
        $p = new Produto();
        $p->conecta();
        $p->enviarProduto($nome, $descricao, $valor, $fotos);
    } else {
?>
        <script>
            alert("Preencha os campos obrigatorios!")
        </script>
<?php
    }
}
?>
