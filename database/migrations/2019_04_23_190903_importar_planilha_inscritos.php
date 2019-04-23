<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportarPlanilhaInscritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $path = storage_path('importacoes/listagem_inscritos.xls');
        $data = Excel::load($path)->get();
        
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = ['nome' => $value->nome, 'cpf' => $value->cpf];
            }
 
            if (!empty($arr)) {
                dump($arr);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
