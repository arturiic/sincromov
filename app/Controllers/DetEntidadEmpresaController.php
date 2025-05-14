<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class DetEntidadEmpresaController extends Controller
{
    public function index()
    {
        return view('movimientos/det_entidad_empresa');
    }
}