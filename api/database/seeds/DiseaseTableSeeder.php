<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DiseaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->insert([
            'name' => "Hepatiti",
            'description' => "Hepatiti viral duke përfshirë hepatitin A, hepatitin B dhe hepatitin C është një grup sëmundjesh të ndara që ndikojnë në mëlçi. Secili ka shenja të ndryshme dhe trajtimet perkatëse. Testimi në laborator mund të përcaktojë llojet e hepatitit.",

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('diseases')->insert([
            'name' => "Diabeti",
            'description' => "Diabeti paraqet një sëmundje e cila mund të ndodhë kur pankreasi prodhon pak ose aspak insulinë ose kur trupi nuk i përgjigjet siç duhet insulinës. Diabeti mund të ndodhë nëse ka shumë pak ose pak oksigjen të prodhuar nga pankreasi ose nëse trupi nuk korrigjohet me saktësi me glukozë. Njerëzit me diabet kanë nevojë për menaxhimin e kësaj sëmundje.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('diseases')->insert([
            'name' => "Hipertensioni",
            'description' => "Hipertensioni (Tensioni i lartë) i gjakut  rritë rrezikun e sëmundjeve të zemrës dhe të veshkëve. Faktorët e rrezikut të hipertensionit përfshijnë obezitetin, pirja e alkoolit, pirja e duhanit dhe historia e familjes.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('diseases')->insert([
            'name' => "Lupus",
            'description' => "Sëmundja auto-immune Lupus ndodh kur sistemi imunitar është sulmuar dhe shkakton skuqje, dhimbje dhe dëmtim të indeve. Lodhja, parehatia, inflamacioni dhe skuqja  janë të gjitha shenja të lupus. Ka lloje të ndryshme Lupus dhe çdo situatë është e dallueshme. Simptomat tuaja mund të rriten me shpejtësi ose ngadalë. Disa mund të jenë të buta dhe disa mund të jenë serioze.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
