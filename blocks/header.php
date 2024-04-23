<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    <span class="fs-4">JETtkizy</span>
  </a>

  <ul class="nav nav-pills">
      <li class="nav-item"><a href="./" class="nav-link active mr-2" aria-current="page">Негізгі бетке</a></li>
      <?php
        if($_COOKIE['login'] != '')
          echo '<li class="nav-item"><a href="article.php" class="nav-link">Тапсырыс беру</a></li>'
      ?>
      <?php
        if($_COOKIE['login'] == ''):
      ?>
      <li class="nav-item"><a href="authentication.php" class="nav-link mr-2">Сайтқа кіру</a></li>
      <li class="nav-item"><a href="registration.php" class="nav-link">Сайтқа тіркелу</a></li>
      <?php
        else:
      ?>
      <li class="nav-item"><a href="authentication.php" class="nav-link"><?=$_COOKIE['login']?></a></li>
      <?php
        endif;
      ?>
    </ul>
</header>