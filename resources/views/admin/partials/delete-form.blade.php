<form class="d-inline" onsubmit="return confirm('Vuoi davvero eliminare eliminare {{$project->title}}?')" action="{{route('admin.projects.destroy', $project)}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-outline-danger" title="delete"><i class="fa-solid fa-trash"></i></button>
</form>
