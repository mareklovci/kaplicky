<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@kaplicky.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Populate users
        factory(App\User::class, 19)->create();

        // Populate categories
        factory(App\Category::class, 80)->create();

        // Populate artefacts with metadata
        factory(App\Artefact::class, 300)->create()->each(function ($u) {
            $u->metadata()->saveMany(factory(App\Metadata::class, 10)->make());
        });

        // Get all the categories attaching up to 1 random categories to each user
        $categories = App\Category::all();

        // Populate the artefact_category pivot table
        App\Artefact::all()->each(function ($artefact) use ($categories) {
            $artefact->categories()->attach(
                $categories->random(1)->pluck('id')->toArray()
            );
        });

        // Get all the metadata attaching up to 50 random metadata to each user
        $artefacts = App\Metadata::all();

        // Populate the artefact_user pivot table
        App\User::all()->each(function ($user) use ($artefacts) {
            $user->likesArtefacts()->attach(
                $artefacts->random(rand(1, 50))->pluck('id')->toArray()
            );
        });

        // Get all the metadata attaching up to 50 random metadata to each user
        $metadata = App\Metadata::all();

        // Populate the metadata_user pivot table
        App\User::all()->each(function ($user) use ($metadata) {
            $user->likesMetadata()->attach(
                $metadata->random(rand(1, 50))->pluck('id')->toArray()
            );
        });
    }
}
