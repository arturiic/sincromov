<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class SincroMovimientosController extends Controller
{
    public function index()
  {
    return view('configuracion/sincromovimientos');
  }
}