<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsJson =  File::get(database_path('data/brands.json'));

	$brands = json_decode($brandsJson, true);

//	foreach($brands as $brand){
//	    $newBrand = Brand::create([
//			'name' => $brand['name'],
//		    ]);
//	    $newBrand->save();
//	}
    }
}
