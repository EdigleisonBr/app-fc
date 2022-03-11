@extends('layouts.app')

@section('title', 'Locais')

@section('content')

@include('sweetalert::alert')

<div id="event-create-container" class="col-md-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row">
            <h2><i class="fas fa-map-marker-alt"></i> Cadastrar local</h2>
        </div>
        <div>
            <button type="button" class="btn btn-link bg-warning text-dark" onclick="history.go(-1);"><span data-feather="arrow-left"></span></button>
        </div>
    </div>
    <form action="/places" method="POST" enctype="multipart/form-data">
        @csrf

        <hr>

        <div class="row">
            <!-- errors -->
            {{-- @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
           
            <!-- name Field -->
            <div class="form-group col-md-6">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
        </div>

        <br>

        <!-- submit -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Salvar"> 
        </div> 
    </form> 
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@stop





