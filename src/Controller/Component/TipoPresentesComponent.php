<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class TipoPresentesComponent extends Component
{
    public function getArrayTipoPresentes()
    {
        $arrayTiposPresentes = array(
            PRESENTE_ACTIVO => PRESENTE_ACTIVO,
            PRESENTE_PASIVO => PRESENTE_PASIVO,
            AUSENTE_SIN_AVISO => AUSENTE_SIN_AVISO,
            AUSENTE_CON_AVISO => AUSENTE_CON_AVISO,
            NO_CORRESPONDE => NO_CORRESPONDE,
            FERIADO => FERIADO          
        );
        
        return $arrayTiposPresentes;
    }
    
    public function getCodigoPresente($tipo = null)
    {
        if ($tipo == null)
        {
            return '0';
        }
        else 
        {
            $pos = strpos($tipo, '.');
            $codigo = substr($tipo,0,$pos);
            return $codigo;
        }
    }
}