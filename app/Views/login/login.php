<!doctype html>
<html lang="es">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SincroMovimientos</title>
    <!--begin::CSS Required Plugin(AdminLTE)-->
    <link href="<?= base_url('public/dist/css/adminlte.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/dist/libs/fontawesome/css/fontawesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/dist/libs/fontawesome/css/solid.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/dist/libs/sweetalert2/dist/sweetalert2.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('public/dist/libs/toastr/build/toastr.min.css') ?>" rel="stylesheet" />
    <!--end:: CSS Required Plugin(AdminLTE)-->
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a
                    href="https://grupoasiu.com/"
                    class="link-dark text-center text-decoration-none link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>Grupo </b>ASIU</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <div class="input-group mb-3">
                    <select class="form-select form-select-sm" id="cmbusuario" name="cmbusuario">
                        <?php foreach ($usuarios as $usuariosreg): ?>
                            <option value="<?= esc($usuariosreg['idusuarios']); ?>">
                                <?= esc($usuariosreg['usuario']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-sm" placeholder="Password"
                        name="txtpassword" id="txtpassword">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <!--begin::Row-->
                <!-- /.col -->
                <div class="row">
                    <div class="col-6">
                        <button onclick="loguear_sistema()" class="btn btn-sm w-100 btn-primary">INGRESAR</button>
                    </div>
                    <div class="col-6">
                        <a href="https://grupoasiu.com/" class="btn btn-sm w-100 btn-danger">SALIR</a>
                    </div>

                    <!-- /.col -->
                </div>
                <!--end::Row-->
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
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
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <script>
		const URL_PY = "<?= base_url(); ?>";
	</script>
    <script src="<?= base_url('public/dist/libs/jquery/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('public/dist/libs/toastr/build/toastr.min.js') ?>"></script>
    <script src="<?= base_url('public/dist/libs/sweetalert2/dist/sweetalert2.js') ?>"></script>
    <script src="<?= base_url('public/dist/js/adminlte.js') ?>"></script>
	<script src="<?= base_url('public/dist/js/paginas/login.js') ?>" defer></script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->
</html>