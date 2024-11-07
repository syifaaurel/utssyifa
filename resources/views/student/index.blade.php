@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <h4>Data Mahasiswa Syifa Aurelia Nada</h4>
                <a href="{{ route('student.create') }}" class="btn btn-warning btn-sm">Create</a>
            </div>
            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <div class="card">
                <div class="card-header">Student</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nim</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->nim }}</td>
                                <td>{{ $s->kelas }}</td>
                                <td>{{ $s->tempat_lahir }}</td>
                                <td>{{ $s->tanggal_lahir }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('student.show', $s->id) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('student.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('student.destroy', $s->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
