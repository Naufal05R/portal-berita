@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show News</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Show</li>
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
                    <div class="col-md-12">
                        <label for="inputNameNews" class="form-label">News Name</label>
                        <input type="text" class="form-control" id="inputNameNews" value="{{ $news->title }}"
                            name="title" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="inputNewsImage" class="form-label">Image News</label>
                        <img src="{{ $news->image }}" class="w-50 form-control" id="inputNewsImage" alt="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCategoryNews" class="form-label">Category News</label>
                        <select id="inputCategoryNews" class="form-select" name="category_id">
                            <option required selected value="{{ $news->category->id }}">{{ $news->category->name }}</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Description News</label>
                        <div class="card p-3">
                            {!! $news->description !!}
                        </div>
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
                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>
            </div>
        </div>
    </div>
@endsection
