<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create();
        $files = factory(App\Archivo::class, 20)->create();

        $files->each(function(App\Archivo $file) use ($users){
            $file->users()->attach(
                $users->random(random_int(1,3))
            );
        });
    }


}
