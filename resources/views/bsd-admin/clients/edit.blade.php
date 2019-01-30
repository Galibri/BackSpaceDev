@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('clients.index') }}" class="btn btn-primary btn-lg">Back to Clients</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Edit Client</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('clients.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="display_name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $client->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ $client->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="client_source_type">Client Source</label>
                    <select id="client_source_type" class="form-control" v-model="client_source_type">
                        <option value="UpWork">UpWork</option>
                        <option value="Fiverr">Fiverr</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="PPH">PPH</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div v-if="show_other" class="form-group">
                    <label for="client_source">Details of Client Source</label>
                    <input type="text" name="client_source" value="{{ $client->client_source }}" class="form-control">
                </div>
                <div v-else="show_other" class="form-group">
                    <input type="hidden" name="client_source" :value="client_source_type">
                </div>
                <div class="form-group">
                    <label for="business_type">Business Type</label>
                    <input type="text" name="business_type" id="business_type" value="{{ $client->business_type }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" value="{{ $client->country }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="skype">Skype</label>
                    <input type="text" name="skype" id="skype" value="{{ $client->skype }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" name="whatsapp" id="whatsapp" value="{{ $client->whatsapp }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Client</button>
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
                    client_source_type: "{{ in_array($client->client_source, ['UpWork', 'Fiverr', 'Freelancer', 'PPH']) ? $client->client_source : 'Other' }}",
                    show_other: {{ in_array($client->client_source, ['UpWork', 'Fiverr', 'Freelancer', 'PPH']) ? 'false' : 'true' }}
                },
                watch: {
                    client_source_type: function() {
                        if(this.client_source_type == 'Other') {
                            this.show_other = true
                        } else {
                            this.show_other = false
                        }
                    }
                }
            });
        });
    </script>
@endsection