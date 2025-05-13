<?php
$this->extend('dashboard/template.php'); ?>
<?= $this->section('titulo_pagina'); ?>
<h3 class="mb-0">Sincronizacion de Movimientos</h3>
<?= $this->endsection() ?>
<?= $this->section('contenido_template'); ?>
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Movimientos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="dtpfecha" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4 col-12 d-flex align-items-end">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fa-regular fa-eye"></i>&nbsp;Ver Movimientos</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Destinatario</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Moneda</th>
                            <th>N°Operación</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    &nbsp;Insertar Movimientos</button>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
<?= $this->endsection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('public/dist/js/paginas/sincromovimi.js') ?>"></script>
<?= $this->endsection() ?>