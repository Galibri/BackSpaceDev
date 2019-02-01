@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg">Create Projects</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Projects</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped dataTable">
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Client Name</th>
                        <th>Project Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->client->name }}</td>
                            <td>{{ $project->status == 0 ? 'Running' : 'Completed' }}</td>
                            <td>
                                <a href="#" data-toggle="modal" project_id='{{ $project->id }}' data-target="#projectDetailsModal" class="show_project_details btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('projects.destroy', $project->id) }}" onclick="return confirm('Are you sure to delete?')" method="post" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="projectDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Project title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group modal-body-items"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
         window.addEventListener('load', function() {
             $(document).on('click', '.show_project_details', function() {
                $('.modal-body-items').html("");
                let project_id = $(this).attr('project_id');
                axios.get("{{ url('/bsd-admin/projects/') }}/" + project_id)
                    .then(res => {
                        $('.modal-title').html(res.data.name);
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Client Name: </strong>" + res.data.client.name + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Client Email: </strong>" + res.data.client.email + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Project Details: </strong>" + res.data.details + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Project Budget: </strong>" + res.data.estimated_amount + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Estimated Time: </strong>" + res.data.estimated_time + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Start Date: </strong>" + res.data.start_date + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>End Date: </strong>" + res.data.end_date + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Status: </strong>" + (res.data.status == 0 ? 'Processing': 'Completed') + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Comments: </strong>" + res.data.comments + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>File Location: </strong>" + res.data.file_location + "</li>");
                    })
                    .catch(err => console.log(err));
             })
         });
    </script>
@endsection