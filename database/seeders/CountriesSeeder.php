<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use File;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Country::truncate();

        $json = File::get("database/data/countries.json");

        $countries = json_decode($json);

        foreach ($countries as $key => $value) {

            Country::create([
                "id" => $value->id,
                "name" => $value->name,
                "code" => $value->code,
                "spanish_name" => $value->spanish_name
            ]);

        }
    }
}
