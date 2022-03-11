@extends('layouts.app')

@section('title', 'Atletas')

@section('content')

@include('sweetalert::alert')

<div id="event-create-container" class="col-md-12">
    
    <div class="d-flex justify-content-between">
      <div class="d-flex flex-row ml-2">
          <h2><i class="fas fa-running"></i> Atletas</h2>
      </div>
      <div>
        <a href="/athletes/create" class="text-white"><button class="btn btn-success"><i class="fas fa-plus-square"></i> Cadastrar</button></a>
      </div>
    </div>
    
    @if (count($athletes) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Apelido</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">Celular</th>
                {{-- <th scope="col">Ativo</th> --}}
                <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($athletes as $athlete)
                <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ucfirst($athlete->name)}}</td>
                <td>{{$athlete->surname}}</td>
                <td>{{date('d/m/Y', strtotime($athlete->birthName))}}</td>
                <td class="cell" data-mask="(00) 00000-0000">{{$athlete->cell}}</td>
                {{-- <td >{{ ($athlete->active == '1') ? 'Ativo' : 'Inativo' }}</td> --}}
                <td class="d-flex flex-column flex-md-row justify-content-center">
                    <a href="/athletes/show/{{ $athlete->id }}" class="btn btn-secondary btn-sm edit-btn mr-1"><span data-feather="eye"></span></a> 
                    <a href="/athletes/edit/{{ $athlete->id }}" class="btn btn-warning btn-sm edit-btn mr-1"><span data-feather="edit"></span></a> 
                    <form action="/athletes/{{ $athlete->id }}" method="POST">
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
      <h1 class="text-center">Você ainda não possui atletas cadastrados.</h1>
    @endif
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
    </script>
@stop





