@extends('admin.parent')

@section('content')

<form action="{{ route('santri.update', $santri->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="" class="form-label"> Name Santri </label>
    <input type="text" class="form-control" name="name">

    <label for="" class="form-label"> Phone Santri </label>
    <input type="number" class="form-control" name="phone">

    <label for="" class="form-label"> Adress Santri </label>
    <textarea class="form-control" cols="30" rows="10" name="address">

    </textarea>

    <label for="" class="form-label"> City Santri </label>
    <input type="text" class="form-control" name="city">

    <label for="" class="form-label"> Date Santri </label>
    <input type="date" class="form-control" name="date">

    <button type="submit" class="btn btn-primary mt-3">Edit Santri</button>
</form>

@endsection
