<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'=> 'Boolflix',
                'thumb'=> 'https://media.istockphoto.com/id/1552848925/it/foto/ufficio-programmazione-e-uomo-con-tecnologia-codice-e-digitazione-con-analisi-dei-dati.jpg?s=612x612&w=0&k=20&c=6vTY4v06GsytPJggBjPafquNtdX2oowEzf9JqzF1z9Q=',
                'description' => 'Boolflix'
            ],

            [
                'title'=> 'Boolzapp',
                'thumb'=> 'https://media.istockphoto.com/id/1552848925/it/foto/ufficio-programmazione-e-uomo-con-tecnologia-codice-e-digitazione-con-analisi-dei-dati.jpg?s=612x612&w=0&k=20&c=6vTY4v06GsytPJggBjPafquNtdX2oowEzf9JqzF1z9Q=',
                'description' => 'Boolzap'
            ],

            [
                'title'=> 'Boolando',
                'thumb'=> 'https://media.istockphoto.com/id/1552848925/it/foto/ufficio-programmazione-e-uomo-con-tecnologia-codice-e-digitazione-con-analisi-dei-dati.jpg?s=612x612&w=0&k=20&c=6vTY4v06GsytPJggBjPafquNtdX2oowEzf9JqzF1z9Q=',
                'description' => 'Boolando'
            ],
            [
                'title'=> 'Comics',
                'thumb'=> 'https://media.istockphoto.com/id/1552848925/it/foto/ufficio-programmazione-e-uomo-con-tecnologia-codice-e-digitazione-con-analisi-dei-dati.jpg?s=612x612&w=0&k=20&c=6vTY4v06GsytPJggBjPafquNtdX2oowEzf9JqzF1z9Q=',
                'description' => 'Comics'
            ]
        ];

        $types = Type::all(); 
        $ids = $types->pluck('id');

        $technologies= Technology::all();
        $techIds = $technologies->pluck('id');

        foreach($projects as $project){
            $newProject = new Project(); 
            $newProject->title = $project['title'];
            $newProject->thumb = $project['thumb'];
            $newProject->description = $project['description'];
            $newProject->type_id= $ids->random();
            
            $newProject->save();

            $newProject->technologies()->attach(
                $techIds->random(rand(1, 10))->all()
            );

        }    
    }
}