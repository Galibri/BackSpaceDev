@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('expences.create') }}" class="btn btn-primary btn-lg">Add New Expence</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Expence</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped dataTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expences as $expence)
                        <tr>
                            <td>{{ $expence->date->format('d-m-Y') }}</td>
                            <td>{{ $expence->name }}</td>
                            <td>{{ $expence->total }}</td>
                            <td>
                                <a href="#" data-toggle="modal" expense_id='{{ $expence->id }}' data-target="#expenseModal" class="show_expense_details btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('expences.edit', $expence->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('expences.destroy', $expence->id) }}" onclick="return confirm('Are you sure to delete?')" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
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
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
             $(document).on('click', '.show_expense_details', function() {
                $('.modal-body-items').html("");
                let expense_id = $(this).attr('expense_id');
                axios.get("{{ url('/bsd-admin/expences/') }}/" + expense_id)
                    .then(res => {
                        $('.modal-title').html(res.data.name);
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Date: </strong>" + res.data.date + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Title: </strong>" + res.data.name + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Details: </strong>" + res.data.details + "</li>");
                        $('.modal-body-items').append("<li class='list-group-item'><strong>Totals: </strong>" + res.data.total + "</li>");
                    })
                    .catch(err => console.log(err));
             })
         });
    </script>
@endsection