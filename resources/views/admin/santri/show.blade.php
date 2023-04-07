@extends('admin.parent')

@section('content')

<label for="" class="form-table">Name Santri</label>
<input type="text" class="form-control" value="{{ $santri->name }}" readonly>

<label for="" class="form-table mt-3">Phone Santri</label>
<input type="text" class="form-control" value="{{ $santri->phone }}" readonly>

<label for="" class="form-table mt-3">Address Santri</label>
<textarea class="form-control" cols="30" rows="10" value="{{ $santri->address }}" readonly></textarea>

<label for="" class="form-table">City Santri</label>
<input type="text" class="form-control" value="{{ $santri->city }}" readonly>

<label for="" class="form-table mt-3">Date Santri</label>
<input type="text" class="form-control" value="{{ $santri->date }}" readonly>

<a href="{{ route('santri.index') }}" class="btn btn-outline-info mt-3">Back</a>

@endsection
