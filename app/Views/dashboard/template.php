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
  <!-- Favicon para icono pestaña -->
	<link rel="icon" href="https://grupoasiu.com/wp-content/uploads/2020/08/favicon-e1707234995480-150x150.png" sizes="32x32" />
	<link rel="icon" href="https://grupoasiu.com/wp-content/uploads/2020/08/favicon-e1707234995480.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="https://grupoasiu.com/wp-content/uploads/2020/08/favicon-e1707234995480.png" />
	<meta name="msapplication-TileImage" content="https://grupoasiu.com/wp-content/uploads/2020/08/favicon-e1707234995480.png" />
<!---------------------------------------   CSS/ESTILOS  ---------------------------------------------------->
<!-- Tipografía -->
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
  integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
  crossorigin="anonymous" />
<!-- Bootstrap 5 (base de diseño) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Iconos -->
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
  integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
  crossorigin="anonymous" />
<link href="<?= base_url('public/dist/libs/fontawesome/css/fontawesome.css') ?>" rel="stylesheet">
<link href="<?= base_url('public/dist/libs/fontawesome/css/solid.css') ?>" rel="stylesheet">
<!-- Plugin: OverlayScrollbars -->
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
  integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
  crossorigin="anonymous" />
<!-- Plugin: DataTables -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css"> <!-- Añadido -->
<!-- Plugin: ApexCharts -->
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
  integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
  crossorigin="anonymous" />
<!-- Plugin: SweetAlert2 -->
<link href="<?= base_url('public/dist/libs/sweetalert2/dist/sweetalert2.css') ?>" rel="stylesheet" />
<!-- Estilos personalizados / AdminLTE -->
<link href="<?= base_url('public/dist/css/adminlte.css') ?>" rel="stylesheet">
<!-- Estilos específicos de la vista -->
<?= $this->renderSection('estilos'); ?>
<!---------------------------------------   FIN CSS/ESTILOS  ---------------------------------------------------->
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
        </ul>
        <ul class="navbar-nav ms-auto">
          <button type="button" class="btn btn-block btn-dark btn-flat" onclick="abrirModalEmpresa()"><i class="fas fa-exchange-alt"></i></button>
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
                <a onclick="abrirModalPerfil()" class="btn btn-default btn-flat">PERFIL</a>
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
                <li class="breadcrumb-item"><i class="fa-solid fa-industry"></i> <?= session('sucursal') ?></li>
                <li class="breadcrumb-item"><i class="fa-solid fa-warehouse"></i> <?= session('almacen') ?></li>
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
  <!-------------------------------------------------MODAL CREDENCIALES---------------------------------------------------------->
  <div class="modal fade" id="mdlcambio" tabindex="-1" role="dialog" aria-labelledby="lbltitulo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="lbltitulo" name="lbltitulo" class="modal-title">Cambiar Credenciales</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="control-label form-label"><i class="fa fa-building"></i>&nbsp;Empresa</label>
            <select id="cmbempresas" name="cmbempresas" class="form-select form-select-sm"></select>
          </div>
          <div class="form-group mb-3">
            <label class="control-label form-label"><i class="fa fa-industry"></i>&nbsp;Sucursal</label>
            <select id="cmbsucursal" name="cmbsucursal" class="form-select form-select-sm"></select>
          </div>
          <div class="form-group mb-3">
            <label class="control-label form-label"><i class="fa fa-warehouse"></i>&nbsp;Almacén</label>
            <select id="cmbalmacen" name="cmbalmacen" class="form-select form-select-sm"></select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="btnguardar" name="btnguardar" onclick="cambioEmpresa()">
            <i class="fas fa-exchange-alt"></i>&nbsp;Cambiar</button>
        </div>
      </div>
    </div>
  </div>
 <!-------------------------------------------------MODAL PERSONAL---------------------------------------------------------->
  <div class="modal fade" id="mdlpersonal" tabindex="-1" role="dialog" aria-labelledby="lbltitulo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="lbltitulo" name="lbltitulo" class="modal-title">Configurar Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="hidden" id="txtidp" name="txtidp">
            <label class="control-label form-label">Cambiar Nombre</label>
            <input type="text" class="form-control" id="txtnombrep" name="txtnombrep">
          </div>
          <div class="form-group mb-3">
            <label class="control-label form-label">Cambiar foto de perfil</label>
            <input type="text" class="form-control" id="txtfotop" name="txtfotop">
          </div>
          <div class="form-group mb-3">
            <label class="control-label form-label">Cambiar Correo</label>
            <input type="text" class="form-control" id="txtcorreo" name="txtcorreo">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="btnguardar" name="btnguardar" onclick="update()">
            <i class="fas fa-exchange-alt"></i>&nbsp;Cambiar</button>
        </div>
      </div>
    </div>
  </div>
<!---------------------------------------   SCRIPTS   ---------------------------------------------------->
<!-- Variables JS (deben ir antes que cualquier otro script que las use) -->
<script>
  var URL_PY = "<?= base_url() ?>";
</script>
<script>
  var codalmacen = "<?= session()->get('codigoalmacen') ?? 'NL' ?>";
</script>
<!-- jQuery -->
<script src="<?= base_url('public/dist/libs/jquery/jquery-3.7.1.min.js') ?>"></script>
<!-- Popper.js (necesario para Bootstrap) -->
<script
  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
  crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
  crossorigin="anonymous"></script>
<!-- OverlayScrollbars -->
<script
  src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
  integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
  crossorigin="anonymous"></script>
<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 5 Integration -->
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- DataTables Responsive Extension -->
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('public/dist/libs/sweetalert2/dist/sweetalert2.js') ?>"></script>
<!-- AdminLTE y JS personalizados -->
<script src="<?= base_url('public/dist/js/adminlte.js') ?>"></script>
<script src="<?= base_url('public/dist/js/paginas/generales.js') ?>"></script>
<!-- Scripts específicos de la vista -->
<?= $this->renderSection('scripts'); ?>
<!---------------------------------------    SCRIPTS   ---------------------------------------------------->
</body>
<!--end::Body-->
</html>