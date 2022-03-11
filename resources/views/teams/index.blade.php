@extends('layouts.app')

@section('title', 'Times')

@section('content')

@include('sweetalert::alert')

<div id="event-create-container" class="col-md-12">
    
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row ml-2">
            <h2><i class="far fa-flag"></i> Times</h2>
        </div>
        <div>
            <a href="/teams/create" class="text-white"><button class="btn btn-success"><i class="fas fa-plus-square"></i> Cadastrar</button></a>
        </div>
    </div>
    
    @if (count($teams) > 0)
      <table class="table table-striped">
          <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Responsável</th>
                <th scope="col">Celular</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teams as $team)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ucfirst($team->name)}}</td>
                <td>{{$team->responsible}}</td>
                <td class="cell" data-mask="(00) 00000-0000">{{$team->cell}}</td>
                <td class="d-flex flex-column flex-md-row justify-content-center">
                    <a href="/teams/show/{{ $team->id }}" class="btn btn-secondary btn-sm edit-btn mr-1"><span data-feather="eye"></span></a> 
                    <a href="/teams/edit/{{ $team->id }}" class="btn btn-warning btn-sm edit-btn mr-1"><span data-feather="edit"></span></a> 
                    <form action="/teams/{{ $team->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn"><span data-feather="trash-2"></span></button>
                    </form>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    @else  
      <hr>
      <h1 class="text-center">Você ainda não possui times cadastrados.</h1>
    @endif
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
    </script>
@stop





