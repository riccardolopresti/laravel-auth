<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])){
            $search =$_GET['search'];

            $projects = Project::where('name','like',"%$search%")
                ->orWhere('client_name','like',"%$search%")
                ->orWhere('id','like',"%$search%")->paginate(10);
        }else{
            $projects = Project::orderBy('id','desc')->paginate(10);
        }

        $direction = 'desc';
        $column = 'id';

        return view('admin.projects.index', compact('projects','direction','column'));
    }

    public function orderBy($column, $direction)
    {
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Project::orderBy($column, $direction)->paginate(10);

        return view('admin.projects.index', compact('projects','direction','column'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.projects.create');
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

        if(array_key_exists('cover_image',$form_data)){

            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();

            $form_data['cover_image'] = Storage::put('uploads',$form_data['cover_image']);
        }

        $form_data['slug'] = Project::SlugGenerator($form_data['name']);

        $new_project = Project ::create($form_data);

        return redirect()->route('admin.projects.show', $new_project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::where('slug',$slug)->first();

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $project = Project::where('slug',$slug)->first();

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data= $request->all();

        if($form_data['name'] != $project['name']){
            $form_data['slug'] = Project::SlugGenerator($form_data['name']);
        }else{
            $project['slug'];
        }

        if(array_key_exists('cover_image',$form_data)){

            // se invio una nuova immagine devo eliminare la vecchia dal filesystem
            if($project->cover_image){
                Storage::disk('public')->delete($project->cover_image);
            }

            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();

            $form_data['cover_image'] = Storage::put('uploads',$form_data['cover_image']);
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project->slug)->with('update',"Post <strong>$project->name</strong> aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('delete',"L'elemento <strong>$project->name</strong> è stato eliminato correttamente");
    }
}
