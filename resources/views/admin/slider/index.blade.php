@extends('admin.parent')

@section('content')

<div class="card">
  <div class="card-body">
    <h5 class="card-title">slider</h5>

    <nav>
        <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('slider.index') }}">News</a></li>
                </ol>
            </nav>

    @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSliderModal">
      <i class="ri-add-circle-fill"></i> Add Data
    </button>
    @include('admin.slider.create-modal')

    <!-- Table with stripped rows -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">url</th>
          <th scope="col">Image</th>
          <th scope="col">Section</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($slider as $row)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $row->url }}</td>
          <td>
            <img src="{{ $row->image }}" class="w-25" alt="">
          </td>
          <td>

            <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editsliderModal{{ $row->id }}">
            <i class="bi bi-pencil-square"></i> Edit
            </button>
            @include('admin.slider.edit-modal')

            <form action="{{ route('slider.destroy', $row->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger mt-1" type="submit">
              <i class="bi bi-trash-fill"></i> Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- End Table with stripped rows -->

  </div>
</div>

@endsection
