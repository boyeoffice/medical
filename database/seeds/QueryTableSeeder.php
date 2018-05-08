<?php

use Illuminate\Database\Seeder;

class QueryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('query_icd10_group')->insert([
        	'name' => 'A00-B99 - Algumas doenças infecciosas e parasitárias.'
        ]);
        DB::table('query_icd10_group')->insert([
        	'name' => 'C00-D48 - Neoplasmas (tumores).'
        ]);
        DB::table('query_icd10_group')->insert([
        	'name' => 'D50-D89 - Doenças do sangue e dos órgãos hematopoéticos e alguns transtornos imunitários.'
        ]);
        DB::table('query_icd10_group')->insert([
        	'name' => 'E00-E90 - Doenças endócrinas, nutricionais e metabólicas.'
        ]);
        DB::table('query_icd10_group')->insert([
        	'name' => 'F00-F99 - Transtornos mentais e comportamentais.'
        ]);

        DB::table('query_origin_destination')->insert([
        	'name' => 'Consulta Externa'
        ]);
        DB::table('query_origin_destination')->insert([
        	'name' => 'Internamento'
        ]);
        DB::table('query_origin_destination')->insert([
        	'name' => 'UAVC'
        ]);
        DB::table('query_origin_destination')->insert([
        	'name' => 'UCIP'
        ]);
        DB::table('query_origin_destination')->insert([
        	'name' => 'UCISU'
        ]);

        DB::table('query_techniques')->insert([
        	'name' => 'Punção medular (com ou sem biópsia óssea)'
        ]);
        DB::table('query_techniques')->insert([
        	'name' => 'Biópsia hepática percutânea'
        ]);
        DB::table('query_techniques')->insert([
        	'name' => 'Outras técnicas de colheita de tecidos para estudo histológico'
        ]);
        DB::table('query_techniques')->insert([
        	'name' => 'Avaliação electrocardiográfica'
        ]);

        DB::table('query_specialty')->insert([
        	'name' => 'Anatomia Patológica'
        ]);
        DB::table('query_specialty')->insert([
        	'name' => 'Anestesiologia'
        ]);
        DB::table('query_specialty')->insert([
        	'name' => 'Angiologia e Cirurgia Vascular'
        ]);
        DB::table('query_specialty')->insert([
        	'name' => 'Cardiologia'
        ]);

        DB::table('query_icd10_single')->insert([
        	'name' => 'A00-Cólera'
        ]);
        DB::table('query_icd10_single')->insert([
        	'name' => 'A000-Cólera devida a Vibrio cholerae 01, estirpe cholerae'
        ]);
        DB::table('query_icd10_single')->insert([
        	'name' => 'A001-Cólera devida a Vibrio cholerae 01, estirpe El Tor'
        ]);
        DB::table('query_icd10_single')->insert([
        	'name' => 'A009-Cólera não especificada'
        ]);
    }
}
