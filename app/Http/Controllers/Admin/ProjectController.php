<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::orderBy('name', 'ASC')->get();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|max:255|',
            'thumb' => 'required|url',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technology_id' => 'nullable|exists:technologies,id'
        ]);
    
        $newProject = Project::create($data);

        if($request->has('techs')) {
            $newProject->technologies()->attach($data['techs']);
        };
        
        return redirect()->route('admin.projects.index', $newProject)->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'ASC')->get();
        $typeIds = $types ? $types->pluck('id') : [];
    
        $technologies = Technology::all();
        $technologyIds = $technologies ? $technologies->pluck('id') : [];
    
        return view('admin.projects.edit', compact('project', 'types', 'typeIds', 'technologies', 'technologyIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:255|',
            'thumb' => 'required|url',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technology_id' => 'nullable|exists:technologies,id'
        ]);

        $project->update($data);

        if($request->has('techs')) {
            $project->technologies()->sync($data['techs']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project->id);

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
