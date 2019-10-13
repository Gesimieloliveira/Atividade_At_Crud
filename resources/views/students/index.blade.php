@extends('students.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Lista de usuário</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('students.create') }}"> Novo</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($students) > 0)
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DETALHES</th>
                <th width="280px">OPÇÕES</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->detail }}</td>
                    <td>
                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Editar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Clicks em novo para adicionar mais um usuário.</div>
    @endif

    {!! $students->links() !!}

@endsection