<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\User;
use App\Admission;
use App\Consult;

class ExcelController extends Controller
{
    public function csv()
    {
        //$users = User::all();
 
        // Generate and return the spreadsheet
        //Excel::create('users', function ($excel) use ($users) {
 
            // Build the spreadsheet, passing in the users array
          //  $excel->sheet('sheet1', function ($sheet) use ($users) {
            //    $sheet->fromArray($users);
            //});
 
//        })->download('xlsx');

            $users = User::all();
            
                    foreach ($users as $user) {
            
                            $userData[] = [
                                'ID' => $user->id,
                                'Name' => $user->name,
                                'Address' => $user->email,
                                'Status' => $user->statu,
                            ];
                        }
            
                    // Generate and return the spreadsheet
                    Excel::create('users', function ($excel) use ($userData) {
            
                        // Build the spreadsheet, passing in the users array
                        $excel->sheet('sheet1', function ($sheet) use ($userData) {
                            $sheet->fromArray($userData);
                        });
            
                    })->download('xlsx');
    }
    public function exportInternamento($id)
    {
        $admin = Admission::find($id);
            

                $adminData[] = [
                    'Referência Pessoa' => $admin->iniciais_paciente,
                    'Data Entrada' => $admin->data_entrada,
                    'Data Saída' => $admin->data_saída,
                    'Dias Internamento' => $admin->dias_internamento,
                    'Sexo' => $admin->sexo,
                    'Idade' => $admin->idade,
                    'Origem' => $admin->origem,
                    'Especialidade Origem' => $admin->especialidade_origem,
                    'Reinternamento' => $admin->reinternamento,
                    'Grupo ICD-10' => $admin->grupo_ICD_10,
                    'ICD-10 Primário' => $admin->ICD_10_primario,
                    'ICD-10 Secundário' => $admin->ICD_10_secundario,
                    'ICD-10 Secundário II' => $admin->ICD_10_secundario_II,
                    'ICD-10 Secundário III' => $admin->ICD_10_secundario_III,
                    'ICD-10 Secundário IV' => $admin->ICD_10_secundario_IV,
                    'ICD-10 Secundário V' => $admin->ICD_10_secundario_V,
                    'Óbito' => $admin->obito,
                    'ICD-10 Óbito' => $admin->ICD_10_obito,
                    'Alta Destino' => $admin->alta_destino,
                    'Alta Especialidade' => $admin->alta_especialidade,
                    'Mort 30 Dias' => $admin->mort_30_dias,
                    'Observações' => $admin->observacoes
                ];

        // Generate and return the spreadsheet
        Excel::create('Internamento', function ($excel) use ($adminData) {

            // Build the spreadsheet, passing in the users array
            $excel->sheet('sheet1', function ($sheet) use ($adminData) {
                $sheet->fromArray($adminData);
            });

        })->download('xlsx');
    }
    public function exportConsult($id)
    {
        $admin = Consult::find($id);
            

                $consultData[] = [
                    'Referência Pessoa' => $admin->iniciais_paciente,
                    'Primeira Consulta' => $admin->primeira_consulta,
                    'Sexo' => $admin->sexo,
                    'Idade' => $admin->idade,
                    'Origem' => $admin->origem,
                    'Especialidade Origem' => $admin->especialidade_origem,
                    'Grupo ICD-10' => $admin->grupo_ICD_10,
                    'ICD-10 Primário' => $admin->ICD_10_primario,
                    'ICD-10 Secundário' => $admin->ICD_10_secundario,
                    'ICD-10 Secundário II' => $admin->ICD_10_secundario_II,
                    'ICD-10 Secundário III' => $admin->ICD_10_secundario_III,
                    'ICD-10 Secundário IV' => $admin->ICD_10_secundario_IV,
                    'ICD-10 Secundário V' => $admin->ICD_10_secundario_V,
                    'Óbito' => $admin->obito,
                    'ICD-10 Óbito' => $admin->ICD_10_obito,
                    'Alta Destino' => $admin->alta_destino,
                    'Alta Especialidade' => $admin->alta_especialidade,
                    'Observações' => $admin->observacoes
                ];

        // Generate and return the spreadsheet
        Excel::create('consult', function ($excel) use ($consultData) {

            // Build the spreadsheet, passing in the users array
            $excel->sheet('sheet1', function ($sheet) use ($consultData) {
                $sheet->fromArray($consultData);
            });

        })->download('xlsx');
    }
}
