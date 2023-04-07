@extends('admin.parent')

@section('content')

ini halaman crud santri

<div class="container card">
    <a href="{{ route('santri.create') }}" class="btn btn-primary">
        Add Santri
    </a>

    <div class="container">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($santri as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->city }}</td>
                        <td>{{ $row->date }}</td>
                        <td>
                            <a href="{{ route('santri.show', $row->id) }}" class="btn btn-primary">
                                Show
                            </a>

                            <a href="{{ route('santri.update', $row->id) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('santri.destroy', $row->id) }}" method="post">
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
