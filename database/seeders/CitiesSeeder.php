<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use File;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //City::truncate();

        $json = File::get("database/data/cities.json");

        $cities = json_decode($json);

        foreach ($cities as $key => $value) {

            City::create([
                "id" => $value->id,
                "name" => $value->name,
                "state_id" => $value->state_id,
                "country_id" => $value->country_id
            ]);

        }
    }
}
