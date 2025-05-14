<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetEntidadEmpresaModel;
use App\Models\MovimientosModel;
use XMLWriter;

class MovimientosController extends Controller
{
    public function index()
    {
        return view('movimientos/movimientos');
    }

    public function guardar_movimientos()
{
    $data = $this->request->getJSON(true);
    $movimientos = $data['movimientos'] ?? null;
    $session = session();
    $idempresa = $session->get('codempresa');

    $model = new MovimientosModel();
    
    try {
        foreach ($movimientos as $mov) {
            $resultado = $model->registrar_sincro_mov(
                $idempresa,
                $mov['nombre_depositante'],
                $mov['observacion'],
                $mov['fecha_hora'],
                $mov['monto'],
                $mov['moneda'],
                $mov['noperacion']
            );
        }
        return $this->response->setJSON([
            'status' => 'OK',
            'message' => 'Movimientos registrados correctamente'
        ]);
        
    } catch (\Exception $e) {
        // Manejo simple de cualquier otro error
        return $this->response->setJSON([
            'status' => 'ERROR',
            'message' => 'Los movientos ya fueron registrados'
        ]);
    }
}
}
