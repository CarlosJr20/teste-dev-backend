@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('usuarios/new')}}">Cadastrar Novo candidato</a></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <h1>Lista de Candidato</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($usuarios as $u)
               
                            <tr>
                                <th scope="row">{{$u->id}}</th>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    <a href="usuarios/{{$u->id}}/edit" class="btn btn-info">Editar</a>

                                </td>
                                <td>
                                    <form action="usuarios/delet/{{$u->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>

                            </tr>

                


                    <!-- <p>{{$u->name}} | {{$u->email}}</p> -->
                    @endforeach

                    </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
