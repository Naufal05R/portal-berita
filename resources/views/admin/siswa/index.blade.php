@extends('admin.parent')

@section('content')

ini halaman crud siswa

<div class="container card">
    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
        Add Siswa
    </a>

    <div class="container">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            <a href="{{ route('siswa.show', $row->id) }}" class="btn btn-primary">
                                Show
                            </a>

                            <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('siswa.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
