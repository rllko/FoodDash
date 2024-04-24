<!DOCTYPE html>
<html>

<head>
    <title>Utilizador</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/sitecss.css">
    <link rel="stylesheet" href="/dashboard.css">
</head>

<body>

    <?php
    include __DIR__."/includes/header_logged_in.php";
    ?>

    <?php
    include __DIR__."/includes/sidebar_perfil.php";
    ?>

    <div class="perfil  texto_perfil">
        <h3>Olá Maria!</h3>
        <p>Esta é a tua página de perfil. Aqui podes ver as tuas informções pessoais, ver estatísticas, sobre a tua
            conta, ver os teus pedidos e acompanhar o estado dos teus pedidos em tempo real</p>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class=" p-5 bg-body-tertiary border rounded-3">
                    <h3 style="float:left">Perfil do utilizador</h3>
                    <button class="btn btn-warning" style="float:right"> Visualizar </button>
                    <br><br>
                    <div class="esquerdo">
                        <span class="dados">Nome:</span>
                        <span class="dados_utilizador">Maria Letria</span>
                        <br>
                        <span class="dados">Email:</span>
                        <span class="dados_utilizador">maria_letria@gmail.com</span>
                        <br>
                        <span class="dados">Nº de Telemóvel:</span>
                        <span class="dados_utilizador">917 620 239</span>
                    </div>
                    <div class="direito">
                        <span class="dados">Morada:</span>
                        <span class="dados_utilizador">Avenida 25 de abril 38, 3ª Esq</span>
                        <br>
                        <span class="dados">Cidade:</span>
                        <span class="dados_utilizador">Aveiro</span>
                        <br>
                        <span class="dados">Código Postal:</span>
                        <p class="dados_utilizador">3810-164</span>
                    </div>
                    <button class="btn btn-outline-light" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-6 centro">
                <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                    <h3 style="float:left">Estatísticas</h3>
                    <button class="btn btn-warning" style="float:right"> Editar </button>
                    <br><br>
                    <div class="esquerdo">
                        <span class="dados">Dinheiro Total Gasto:</span>
                        <span class="dados_utilizador">489,27€</span>
                        <br>
                        <span class="dados">Total de Pedidos Realizados:</span>
                        <span class="dados_utilizador">71</span>
                        <br>
                        <span class="dados">Restaurante Mais Pedido:</span>
                        <span class="dados_utilizador">McDonald's</span>
                    </div>
                    <div class="direito">
                        <canvas id="lineChart"></canvas>

                        <script>
                            var ctx = document.getElementById('lineChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ["Dez", "Jan", "Fev", "Mar"],
                                    datasets: [{
                                        label: 'Total de Pedidos',
                                        data: [12, 18, 24, 30],
                                        backgroundColor: 'transparent',
                                        borderColor: '#d1c217',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true,
                                                suggestedMax: 30
                                            }
                                        }]
                                    },
                                    title: {
                                        display: true,
                                        text: 'Total de Pedidos'
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pedidos">
        <div class="align-items-md-stretch">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2 class="esquerdo">Pedidos</h2>
                <button class="btn btn-warning" style="float:right"> Visualizar </button>
                <br><br>
                <div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="esquerdo">
                                <div class="esquerdo" style="width:25%">
                                    <p class="texto_pedido" style="text-align: center;">13:46</p>
                                    <p class="texto_pedido" style="text-align: center;">16/03/2024</p>
                                </div>
                                <div class="direito" style="width:75%">
                                    <h6>Menu Big King<span>(Burger King)</span></h6>
                                    <p class="texto_pedido">(Big King + Batatas Médias + Ice Tea Manga)</p>
                                </div>
                            </div>
                            <div class="direito">
                                <div class="esquerdo" style="width: 75%">
                                    <span class="texto_pedido_negrito">Método de Pagamento:</span>
                                    <span class="texto_pedido">VISA 102*********************</span>
                                    <br>
                                    <span class="texto_pedido_negrito">Status de Pedido:</span>
                                    <span class="texto_pedido">Entrgue</span>
                                </div>
                                <div class="direito" style="width: 25%; text-align: center;">
                                    <h6>9,28€</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-light" type="button">Example button</button>
            </div>
        </div>
    </div>

    <?php
    include __DIR__."/includes/footer_2.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>