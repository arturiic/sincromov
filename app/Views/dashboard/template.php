<!doctype html>
<html lang="es">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SincroMovimientos</title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="AdminLTE | Dashboard v3" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!--end::Primary Meta Tags-->
  <!---------------------------------------   CSS/ESTILOS  ---------------------------------------------------->
  <link href="<?= base_url('public/dist/css/adminlte.css') ?>" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
    crossorigin="anonymous" />
    <link href="<?= base_url('public/dist/libs/fontawesome/css/fontawesome.css') ?>" rel="stylesheet">
	  <link href="<?= base_url('public/dist/libs/fontawesome/css/solid.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/dist/libs/sweetalert2/dist/sweetalert2.css') ?>" rel="stylesheet" />
	  <link href="<?= base_url('public/dist/libs/datatables/datatables.min.css') ?>" rel="stylesheet">
  <?= $this->renderSection('estilos'); ?>
  <!---------------------------------------   CSS/ESTILOS  ---------------------------------------------------->
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
              <i class="bi bi-list"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen">
              <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
              <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
            </a>
          </li>
          <!--end::Fullscreen Toggle-->
          <!--begin::User Menu Dropdown-->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img
                src="<?= base_url('public/dist/assets/img/' . session('fotito')) ?>"
                class="user-image rounded-circle shadow"
                alt="User Image" />
              <span class="d-none d-md-inline"><?= session('nombre_personal') ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-bg-primary">
                <img
                  src="<?= base_url('public/dist/assets/img/' . session('fotito')) ?>"
                  class="rounded-circle shadow"
                  alt="User Image" />
                <p>
                  <?= session('nombreusuario') ?> - <?= session('perfil') ?>
                  <small><?= session('correo') ?></small>
                </p>
              </li>
              <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">PERFIL</a>
                <a href="<?= base_url('login/salir') ?>" class="btn btn-default btn-flat float-end">SALIR</a>
              </li>
              <!--end::Menu Footer-->
            </ul>
          </li>
          <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
      </div>
      <!--end::Container-->
    </nav>
    <!--end::Header-->
    <!--begin::Sidebar-->
    <?= $this->include('Views/dashboard/aside'); ?>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
              <?= $this->renderSection('titulo_pagina'); ?>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard v3</li>
              </ol>
            </div>
            <?= $this->renderSection('contenido_template'); ?>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>

      <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
      <!--begin::To the end-->
      <div class="float-end d-none d-sm-inline">SincroMovimientos v.1.0</div>
      <!--end::To the end-->
      <!--begin::Copyright-->
      <strong>
        Copyright &copy; 2025&nbsp;
        <a href="https://www.youtube.com/watch?v=WCRTdpTfoB0" class="text-decoration-none">Arturi Izquierdo</a>.
      </strong>
      Todos los derechos reservados.
      <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
  </div>
  <!--end::App Wrapper-->
  <!---------------------------------------   SCRIPTS  ---------------------------------------------------->
  <script>
		var URL_PY = "<?= base_url() ?>";
	</script>
  <script src="<?= base_url('public/dist/js/adminlte.js') ?>"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="<?= base_url('public/dist/libs/jquery/jquery-3.7.1.min.js') ?>"></script>
  <script src="<?= base_url('public/dist/libs/sweetalert2/dist/sweetalert2.js') ?>"></script>
  <script src="<?= base_url('public/dist/libs/datatables/datatables.min.js') ?>"></script>
	<?= $this->renderSection('scripts'); ?>
  <!---------------------------------------   SCRIPTS  ---------------------------------------------------->
</body>
<!--end::Body-->

</html>