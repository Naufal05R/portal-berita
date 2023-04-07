<div class="modal fade" id="editCategoryModal{{ $row->name }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Basic Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('category.update', $row->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Name Category</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="name" value="{{ $row->name }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
            <div class="col-sm-10">
              <input class="form-control" type="file" id="formFile" name="image" value="{{ $row->image }}">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
