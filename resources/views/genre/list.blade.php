@extends('templateadmin')

@section('namaAdminLogin')
{{ $userLogin }}
@endsection

@section('namaAdminLogin2')
{{ $userLogin }}
@endsection

@section('titlepage')
    Genre List
@endsection

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    <form method="post">
        @csrf
        <button type="submit" formaction="/genre/insert" class="btn btn-info" style="float: right">Add New Genre</button>
    </form>

    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th>ID </th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($genreArr) > 0 )
                @for ($i = 0; $i < count($genreArr); $i++)
                    <tr>
                        <td>{{ $genreArr[$i]->id }}</td>
                        <td>{{ $genreArr[$i]->name }}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                <button type="submit" formaction="/genre/editForm/{{$genreArr[$i]->id}}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if($genreArr[$i]->trashed())
                                    <button type="submit" formaction="/genre/active/{{$genreArr[$i]->id}}" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @else
                                    <button type="submit" formaction="/genre/nonActive/{{$genreArr[$i]->id}}" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
@endsection

