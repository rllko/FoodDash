<div style="background-color: #202020;">
  <div class="container">
    <h1 style="text-align: left; font-weight: bolder; color: white;">FoodDash</h1>
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-2 border-top border-bottom">
      <div class="col mb-3">
        <img src="./assets/stock_imgs/fd_logo_blackWhite.png" alt="Bootstrap" width="190" height="110">
      </div>
      <div class="col mb-3"></div>
      <div class="col mb-3"></div>
      <div class="col mb-3">
        <h4 style="color: #FEBB41;">Conta Cliente</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-2" id="btn_login_footer"><a href="./login_register/login.php" class="nav-link p-0" style="color: white;">Login</a></li>
          <li class="nav-item mb-2" id="btn_register_footer"><a href="./login_register/register.php" class="nav-link p-0" style="color: white;">Registar</a></li>
        </ul>
      </div>
      <div class="col mb-3">
        <h4 style="color: #FEBB41;">Sobre</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-2" id="btn_our_story_footer"><a href="./our_story.php" class="nav-link p-0" style="color: white;">História</a></li>
          <li class="nav-item mb-2" id="btn_team_footer"><a href="./team.php" class="nav-link p-0" style="color: white;">Equipa</a></li>
        </ul>
      </div>
    </footer>
    <p class="text-end" style="color: white; margin: 0;">Todos os direitos reservados © FoodDash, 2024</p>
  </div>
</div>

<script>
  document.getElementById('logo_fooddash').addEventListener('click', function() {
    window.location.href = './index.php';
  });
  document.getElementById('home_btn').addEventListener('click', function() {
    window.location.href = './index.php';
  });
  document.getElementById('restaurantes_btn').addEventListener('click', function() {
    window.location.href = './restaurantes_page.php';
  });
  document.getElementById('btn_login_footer').addEventListener('click', function() {
    window.location.href = './login_register/login.php';
  });
  document.getElementById('btn_register_footer').addEventListener('click', function() {
    window.location.href = './login_register/register.php';
  });
  document.getElementById('btn_our_story_footer').addEventListener('click', function() {
    window.location.href = './our_story.php';
  });
  document.getElementById('btn_team_footer').addEventListener('click', function() {
    window.location.href = './team.php';
  });
</script>