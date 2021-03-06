<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        Comment::create(array(
            'author' => 'Chris Sevilleja',
            'text' => 'Look I am a test comment.',
	    'phone_id' => 1
        ));

        Comment::create(array(
            'author' => 'Nick Cerminara',
            'text' => 'This is going to be super crazy.',
	    'phone_id' => 1
        ));

        Comment::create(array(
            'author' => 'Holly Lloyd',
            'text' => 'I am a master of Laravel and Angular.',
	    'phone_id' => 1
        ));
    }
}
