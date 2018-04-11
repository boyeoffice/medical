<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Admission extends Model
{
    use FilterPaginateOrder;
    protected $fillable = [
    		'iniciais_paciente',
    		 'data_entrada',
            'data_saída',
            'dias_internamento',
            'sexo',  
            'idade',
            'origem',
            'especialidade_origem',
            'destino',
            'grupo_ICD_10',
            'ICD_10_primario',
            'ICD_10_secundario',
            'ICD_10_secundario_II',
            'ICD_10_secundario_III',
            'ICD_10_secundario_IV',
            'ICD_10_secundario_V',
            'obito',
            'ICD_10_obito',
            'alta_destino',
            'alta_especialidade'
    ];
    protected $filter = ['id'];
}
