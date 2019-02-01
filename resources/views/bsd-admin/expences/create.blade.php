@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('expences.index') }}" class="btn btn-primary btn-lg">Back to Expense</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Add Expense</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('expences.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" name="date" id="date" value="{{ old('date') }}" class="form-control bootstrap_datepicker">
                </div>
                <div class="form-group">
                    <label for="name">Expense Title</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="details">Expense Details</label>
                    <textarea name="details" id="" cols="30" rows="4" class="form-control">{{ old('details') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="total">Expense Total</label>
                    <input type="text" name="total" id="total" value="{{ old('total') }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Expense</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                }
            });
            $('.bootstrap_datepicker').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
@endsection