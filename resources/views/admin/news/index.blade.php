@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">News</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        A simple danger alert—check it out!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <div class="col-12">
                <form action="{{ route('searchNews') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search News" aria-describedby="button-addon2" name="keyword">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>

            <div class="container d-flex justify-content-end">
                <a href="{{ route('news.create') }}" class="btn btn-primary">
                    <i class="bx bxs-plus-square"></i><span> Add News</span></a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    @forelse ($news as $row)
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td>
                            <img src="{{ $row->image }}" class="w-25" alt="">
                        </td>
                        <td>{{ $row->created_at }}</td>
                        <td>
                            <a href="{{ route('news.show', $row->id) }}" class="btn btn-primary">
                                <i class="bi bi-eye"></i> Show
                            </a>

                            <a href="{{ route('news.edit', $row->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('news.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button href="" class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    @endforelse
                </tbody>
            </table>
            <div class="container mt-2">{{ $news->links('pagination::bootstrap-5') }}</div>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
