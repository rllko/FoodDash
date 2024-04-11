<!--http://localhost/PTAW_FoodDash/perfil_utilizador/New%20folder/perfil%20de%20utilizador/registrar/perfil_dados.php-->

<!-- 
    Código usado para testar 
    use bd_ptaw_2024;

-- Tabela Cliente
CREATE TABLE IF NOT EXISTS Clientes (
    id BIGINT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE NOT NULL,
    morada TEXT,
    telemovel VARCHAR(20),
    senha VARCHAR(100) NOT NULL
);

SHOW COLUMNS FROM Clientes;

INSERT INTO Clientes (id, nome, email, morada, telemovel, senha) 
VALUES (1, 'Nome', 'exemplo@gmail.com', 'morada', 'xxx-xxx-xxx', 'senha');
-->
<?php
function GetUtilizador($ID)
{
    try {
        //conexão ao banco de dados
        $pdo = new PDO(
            'mysql:host=localhost;port=3306;dbname=bd_ptaw_2024;charset=utf8',
            'root',
            ''
        );

        //query
        $stmt = $pdo->prepare('SELECT * FROM Clientes WHERE id = ?');
        $stmt->bindValue(1, $ID, PDO::PARAM_INT);

        // Executar a query e verificar que não retornou false
        if ($stmt->execute()) {
            // Fetch retorna um único resultado, então usamos fetch() e não fetchAll()
            $registo = $stmt->fetch();
            // Retornar os dados
            return $registo;
        } else {
            // Se a consulta falhar, retornar null
            return null;
        }

    } catch (Exception $e) {
        echo "Erro na conexão à BD: " . $e->getMessage();
        // Se ocorrer um erro, retornar null
        return null;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Obter os dados do utilizador
    $utilizador = GetUtilizador(1);
    echo var_dump($utilizador);
} else {
    return null;
}
?>

<script>
    /*Se não clicar no botão editar, 
     - dizer que todos os inputs são "readonly", isto é são visivéis e não editáveis
    se clicar
    - por o botão como guardar ou disabled
    - retirar as propriedades readonly
    - criar botão guardar*/
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header class="py-3 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <img src="../../imgs/FoodDash.png" />
            </a>
        </div>
    </header>
    <nav class="py-2 bg-body-tertiary border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2 active"
                        aria-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Menu</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Contactos</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Empresarial</a></li>
            </ul>
            <ul class="nav">
                <button class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg></button>
                <span style="padding:2.5px"></span>
                <button class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg></button>
            </ul>
        </div>
    </nav>

    <br>
    <div class="sidebar esquerdo d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px">
        <button class="btn btn-dark" style="text-align: left">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns-gap"
                viewBox="0 0 16 16">
                <path
                    d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
            </svg>
            DashBoard
        </button>
        <button class="btn btn-dark" style="text-align: left">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path
                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5z" />
            </svg>
            Perfil de Utilizador
        </button>
        <button class="btn btn-dark" style="text-align: left">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list"
                viewBox="0 0 16 16">
                <path
                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                <path
                    d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
            </svg>
            Pedidos
        </button>
        <button class="btn btn-dark" style="text-align: left">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07" />
            </svg>
            Estatísticas
        </button>
        <button class="btn btn-dark" style="text-align: left">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                <path
                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1z" />
            </svg>
            Método de Pagamento
        </button>
        <hr>
        <button class="btn btn-light mt-auto">Terminar Sessão</button>
    </div>

    <div class="perfil direito texto_perfil">
        <h3>Perfil do Utilizador</h3>
        <p>Esta é a tua página de perfil de utilizador. Aqui podes ver as tuas informações pessoais e editá-las</p>

        <div class="pedidos direito">
            <div class="align-items-md-stretch">
                <div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="esquerdo">A minha conta</h5>
                            <button id="btn_editar" class="btn btn-warning direito" style="width: auto;"> Editar </button>
                        </div>
                        <div class="card-body">

                            <p class="cinzento" style="padding:5px">Informação do Utilizador</p>
                            <div class="esquerdo" style="padding:5px">
                                <span>Primeiro Nome</span>
                                <div class="input-group flex-nowrap">
                                    <input readonly type="text" class="form-control" placeholder="PNome" aria-label="PNome"
                                        aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['nome']))
                                            echo $utilizador['nome']; ?>">
                                </div>
                                <br>
                                <span>Email</span>
                                <div class="input-group flex-nowrap">
                                    <input readonly type="text" class="form-control" placeholder="Email" aria-label="Email"
                                        aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['email']))
                                            echo $utilizador['email']; ?>">
                                </div>
                            </div>
                            <div class="direito" style="padding:5px">
                                <span>Último Nome</span>
                                <div class="input-group flex-nowrap">
                                    <input readonly type="text" class="form-control" placeholder="Username" aria-label="Username"
                                        aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['nome']))
                                            echo $utilizador['nome']; ?>">
                                </div>
                                <br>
                                <span>Nº de Telemóvel</span>
                                <div class="input-group flex-nowrap">
                                    <input readonly type="text" class="form-control" placeholder="Telemovel"
                                        aria-label="Telemovel" aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['telemovel']))
                                            echo $utilizador['telemovel']; ?>">
                                </div>
                            </div>

                            &emsp;
                            <hr>&emsp;

                            <p class="cinzento">Morada Predefinida</p>
                            <span>Morada</span>
                            <div class="input-group flex-nowrap">
                                <input readonly type="text" class="form-control" placeholder="Morada" aria-label="Morada"
                                    aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['morada']))
                                        echo $utilizador['morada']; ?>">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12 esquerdo">
                                        <span>Cidade</span>
                                        <div class="input-group flex-nowrap">
                                            <input readonly type="text" class="form-control" placeholder="Cidade"
                                                aria-label="Cidade" aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['morada']))
                                                    echo $utilizador['morada']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <span>País</span>
                                        <div readonly class="input-group flex-nowrap">
                                            <input readonly type="text" class="form-control" placeholder="País"
                                                aria-label="País" aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['morada']))
                                                    echo $utilizador['morada']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <span>Código-Postal</span>
                                        <div class="input-group flex-nowrap">
                                            <input readonly type="text" class="form-control" placeholder="cod-postal"
                                                aria-label="cod-postal" aria-describedby="addon-wrapping" value="<?php if (!empty($utilizador['morada']))
                                                    echo $utilizador['morada']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>