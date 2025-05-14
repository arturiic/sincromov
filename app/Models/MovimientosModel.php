<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimientosModel extends Model
{
    protected $table      = 'mov_finanzas';
    protected $primaryKey = 'idmov_finanzas';
    protected $allowedFields = ['idmov_finanzas', 'iddestinatario', 'iddet_entidad_empresa', 'nombre_depositante',
                                'observacion', 'fecha', 'monto', 'tipo', 'noperacion', 'enviado_a'];
    
    public function registrar_sincro_mov($idempresa, $titulo, $enviado_a, $fecha_hora, $monto, $moneda, $noperacion)
{
    $sql = "CALL REGISTRAR_SINCROMOV(?, ?, ?, ?, ?, ?, ?)";
    $query = $this->db->query($sql, [
        $idempresa,
        $titulo,
        $enviado_a,
        $fecha_hora,
        $monto,
        $moneda,
        $noperacion
    ]);
    return $query->getRow()->mensaje ?? 'ERROR DESCONOCIDO';
}
}
