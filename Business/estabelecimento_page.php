<?php
require_once __DIR__ . '/includes/session.php';

include __DIR__ . "/../database/empresa_estabelecimento.php";
include __DIR__ . "/../database/credentials.php";
include __DIR__ . "/../database/db_connection.php";

$id_empresa = $_SESSION['id_empresa'] ?? $_GET['id_empresa'] ?? null;

if (!$id_empresa) {
    echo "No company ID provided!";
    exit();
}

$estabelecimentos = ObterEstabelecimentosPorEmpresa($pdo, $id_empresa);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Estabelecimentos da Empresa</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="/../assets/styles/dashboard_beatriz.css">
    <link rel="stylesheet" href="/../assets/styles/sitecss.css">
    <link rel="stylesheet" href="/../assets/styles/dashboard.css">
    <link rel="stylesheet" href="/../assets/styles/responsive_styles.css">

    <style>
        /* Define a classe .container-75 com uma largura de 75% */
        .container {
            width: 75%;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        /* Define a classe .max-img-size com a largura e altura máximas desejadas */
        .max-img-size {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<ul>
    <!--Zona do Header -->
    <div id="topHeader" class="container-xxl">
        <!-- Top/Menu da Página -->
        <?php include __DIR__ . "/includes/header_business_logged.php"; ?>
        <?php include __DIR__ . "/includes/sidebar_business.php"; ?>
    </div>

    <!--Zona de Conteudo -->
    <div class="direita">
        <h1 class="container">Estabelecimentos da Empresa</h1>
        <div class="d-grid gap-2">
            <a href="adicionar_estabelecimento.php" class="btn btn-light">Adicionar Estabelecimento</a>
        </div>
        <br><br>
        <?php if (!empty($estabelecimentos)): ?>
            <?php foreach ($estabelecimentos as $estabelecimento): ?>
                <div class="container">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid max-img-size"
                                    src="<?php echo htmlentities($estabelecimento['imagem']); ?>"
                                    class="img-fluid rounded-start" alt="<?php echo htmlentities($estabelecimento['nome']); ?>">
                            </div>
                            <div class="col-md-8 justify-content-between">
                                <br>
                                <h5 class="esquerdo"><?php echo htmlentities($estabelecimento['nome']); ?></h5>
                                <div>
                                    <form id="editar_form" action="editar_estabelecimento.php" method="post">
                                        <input type="hidden" name="id_estabelecimento"
                                            value="<?php echo htmlentities($estabelecimento['id_estabelecimento']); ?>">
                                        <button id="editar_btn" class="btn btn-warning direito" style="width: auto;">
                                            Editar
                                        </button>
                                    </form>
                                    <form id="apagar_form" action="estabelecimento_page.php" method="post">
                                        <input type="hidden" name="id_estabelecimento"
                                            value="<?php echo htmlentities($estabelecimento['id_estabelecimento']); ?>">
                                        <button id="apagar_btn" class="btn btn-danger direito" style="width: auto;">
                                            Apagar
                                        </button>
                                    </form>
                                </div>
                                <hr>
                                <dl class="list-group list-group-flush">
                                    <dd name="id" disabled><strong>Id do estabelcimento:</strong>
                                        <?php echo htmlentities($estabelecimento['id_estabelecimento']); ?><br>
                                    </dd>
                                    <dd name="localizacao"><strong>Localização:</strong>
                                        <?php echo htmlentities($estabelecimento['localizacao']); ?><br>
                                    </dd>
                                    <dd name="telemovel"><strong>Telemóvel:</strong>
                                        <?php echo htmlentities($estabelecimento['telemovel']); ?><br>
                                    </dd>
                                    <dd name="taxa"><strong>Taxa de Entrega:</strong>
                                        <?php echo htmlentities($estabelecimento['taxa_entrega']); ?><br>
                                    </dd>
                                    <dd name="tempo"><strong>Tempo Médio de Entrega:</strong>
                                        <?php echo htmlentities($estabelecimento['tempo_medio_entrega']); ?>
                                    </dd>
                                    <br>
                                </dl>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum estabelecimento encontrado para esta empresa.</p>
        <?php endif; ?>
    </div>

    <!--Fim do conteúdo de página-->

    <!-- Footer-->
    <?php include __DIR__ . "/includes/footer_business.php"; ?>
    </body>

    <script>
        document.getElementById("apagar_btn").addEventListener("click", function (event) {
            event.preventDefault(); // Prevenir o envio do formulário por enquanto

            var $apagarForm = document.getElementById("apagar_form")
            var confirmar = confirm("Pretende mesmo eliminar o estabelecimento <?php echo htmlentities($estabelecimento['nome']); ?>?");
            texto = "Após eliminar, não é possível reaver";
            var confirmar2 = confirm("Pretende mesmo eliminar o estabelecimento <?php echo htmlentities($estabelecimento['nome']); ?>?" . texto);

            if (confirmar) {
                if (confirmar2) {
                    // Se confirmar, envia o formulário
                    $apagarForm.submit();
                } else {
                    // Se não confirmar, não faz nada
                    return false;
                }
            } else {
                // Se não confirmar, não faz nada
                return false;
            }
        });
    </script>

</html>