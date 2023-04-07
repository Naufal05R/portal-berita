@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit News</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
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

            <div class="card p-3">
                <!-- Multi Columns Form -->
                <form class="row g-3" action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label for="inputNameNews" class="form-label">News Name</label>
                        <input type="text" class="form-control" id="inputNameNews" value="{{ $news->title }}"
                            name="title" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputNewsImage" class="form-label">Image News</label>
                        <input type="file" class="form-control" id="inputNewsImage" value="{{ $news->image }}"
                            name="image">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCategoryNews" class="form-label">Category News</label>
                        <select id="inputCategoryNews" class="form-select" name="category_id">
                            <option required selected value="{{ $news->category->id }}">{{ $news->category->name }}</option>
                            <option required >Choose...</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <textarea id="editor" name="description"> {!! $news->description !!} </textarea>
                        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>
    </div>
@endsection
