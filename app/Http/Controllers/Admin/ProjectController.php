<?php

namespace App\Http\Controllers\Admin;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Requests\ProjectRequest;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = "Crea nuovo progetto";
        $method = "POST";
        $route = route('admin.projects.store');
        $project = null;
        $button = "Crea";
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('title', 'method', 'route', 'project', 'button', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $form_data = $request->all();

        $new_project = new Project();

        $new_project['slug'] = Project::generateSlug($form_data['name']);

        $new_project->type_id = $form_data['type'];

        $new_project->image = $form_data['image'];

        $new_project->fill($form_data);

        $new_project->save();

        if(array_key_exists('technologies', $form_data)){
            $new_project->technology()->attach($form_data['technologies']);
        }

        return redirect()->route('admin.projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $title = "Modifica $project->name";
        $method = "PUT";
        $route = route('admin.projects.update', $project);
        $button = "Modifica";
        $types = Type::all();

        return view('admin.projects.create', compact('title','method', 'route', 'project', 'button', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {

        $form_data = $request->all();

        $project->type_id = $form_data['type'];

        $project->fill($form_data);

        $project->update();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with("success", "Hai eliminato il progetto con successo");
    }
}
