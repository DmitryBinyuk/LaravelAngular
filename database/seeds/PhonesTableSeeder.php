<?php

use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$phonesJson =  File::get(database_path('data/phones.json'));

	$phones = json_decode($phonesJson, true);

//	$progress = $this->getProgressbar();
//        $progress->start(count($areas));

	foreach($phones as $phone){
	    $newPhone = Phone::create([
			'name' => $phone['name'],
			'brand' => $phone['brand'],
			'processor' => $phone['processor'],
			'description' => $phone['description'],
			'image' => $phone['image'],
		    ]);
	    $newPhone->save();
//
//	    $progress->advance();
	}

	$progress->finish();
    }
}
