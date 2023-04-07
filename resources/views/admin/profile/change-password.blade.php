@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('updatePassword') }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input  type="password" class="form-control" id="currentPassword" placeholder="Input Current Password" name="current_password">
                </div>
                <div class="col-12">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" placeholder="Input New Password" name="password">
                </div>
                <div class="col-12">
                    <label for="confirmationPassword" class="form-label">Confirmation Password</label>
                    <input type="password" class="form-control" id="confirmationPassword" placeholder="Input Confirmation Password" name="confirmation_password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
@endsection
