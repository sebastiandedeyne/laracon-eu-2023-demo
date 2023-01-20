<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Country;
use App\Models\Event;
use App\Models\Session;
use App\Models\Track;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Country::insert(
            array_map(
                fn (array $data) => ['name' => $data['name'], 'short' => $data['iso_3166_2']],
                json_decode(file_get_contents(__DIR__.'/data/countries.json'), true),
            ),
        );

        User::factory()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@spatie.be',
                'role' => Role::Admin,
            ]);

        User::factory()
            ->create([
                'name' => 'Visitor',
                'email' => 'visitor@spatie.be',
                'role' => Role::User,
            ]);

        $venueA = Venue::factory()
            ->country(Country::where('short', 'PT')->first())
            ->create([
                'name' => 'Lx Factory',
            ]);

        $venueB = Venue::factory()
            ->country(Country::where('short', 'US')->first())
            ->create([
                'name' => 'Marathon Music Works',
            ]);

        $event = Event::factory()
            ->venue($venueA)
            ->create([
                'name' => 'Laracon EU',
            ]);

        Event::factory()
            ->venue($venueB)
            ->create([
                'name' => 'Laracon US',
            ]);

        [$trackA, $trackB] = Track::factory()
            ->event($event)
            ->createMany([
                ['name' => 'Track A'],
                ['name' => 'Track B'],
            ]);

        Session::factory()
            ->track($trackA)
            ->createMany([
                ['name' => 'Jeffrey Way', 'starts_at' => '2023-01-26 09:30:00', 'ends_at' => '2023-01-26 10:00:00'],
                ['name' => 'Nuno Maduro', 'starts_at' => '2023-01-26 10:00:00', 'ends_at' => '2023-01-26 10:30:00'],
                ['name' => 'Stefan Bauer', 'starts_at' => '2023-01-26 10:30:00', 'ends_at' => '2023-01-26 11:00:00'],
                ['name' => 'Christoph Rumpel', 'starts_at' => '2023-01-26 11:00:00', 'ends_at' => '2023-01-26 11:30:00'],
                ['name' => 'Diana Scharf', 'starts_at' => '2023-01-26 11:30:00', 'ends_at' => '2023-01-26 12:00:00'],
                ['name' => 'Steve McDougall', 'starts_at' => '2023-01-26 12:00:00', 'ends_at' => '2023-01-26 12:30:00'],
            ]);

        Session::factory()
            ->track($trackB)
            ->createMany([
                ['name' => 'Sónia Fernandes', 'starts_at' => '2023-01-26 09:30:00', 'ends_at' => '2023-01-26 10:00:00'],
                ['name' => 'Mateus Guimarães', 'starts_at' => '2023-01-26 10:00:00', 'ends_at' => '2023-01-26 10:30:00'],
                ['name' => 'Miguel Piedrafita', 'starts_at' => '2023-01-26 10:30:00', 'ends_at' => '2023-01-26 11:00:00'],
                ['name' => 'Roberto Butti', 'starts_at' => '2023-01-26 11:00:00', 'ends_at' => '2023-01-26 11:30:00'],
                ['name' => 'Taylor Otwell', 'starts_at' => '2023-01-26 11:30:00', 'ends_at' => '2023-01-26 12:00:00'],
                ['name' => ' Kai Sassnowski', 'starts_at' => '2023-01-26 12:00:00', 'ends_at' => '2023-01-26 12:30:00'],
            ]);
    }
}
