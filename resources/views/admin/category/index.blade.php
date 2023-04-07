@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <div class="col-12">
                <form action="{{ route('searchCategory') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Category"
                            aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>

            <div class="container d-flex justify-content-end">
                <!-- Create Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                    <i class="ri-add-circle-fill"></i> Create Category
                </button>
                @include('admin.category.create-modal')
                <!-- End Create Modal -->
            </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($category as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->slug }}</td>
                            <td>
                                <img class="w-25 h-auto" src="{{ $row->image }}" alt="">
                            </td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <!-- Edit Modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal{{ $row->name }}">
                                    <i class="ri-pencil-line"></i> Edit Category
                                </button>
                                @include('admin.category.edit-modal')
                                <!-- End Edit Modal -->

                                <form action="{{ route('category.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi-trash3"></i> Delete Category
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="6" class="text-center">
                                <div class="alert alert-danger mb-0 alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    Data tidak boleh kosong !
                                </div>
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="container mt-2">{{ $category->links('pagination::bootstrap-5') }}</div>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
