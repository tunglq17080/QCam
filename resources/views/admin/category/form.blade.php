@if (session()->has('message'))
    <div class="alert alert-primary">
        {{ session('message') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ old('id') }}">

    <div class="mb-3">
        <label class="form-label">Category name</label>
        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback help-block d-block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Category Slug</label>
        <input name="slug" type="text" class="form-control" value="{{ old('slug') }}">
        @error('slug')
        <div class="invalid-feedback help-block d-block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="button-form-area">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i> Save
        </button>
        <a href="{{ route('admin.category') }}" class="btn btn-dark">
            Cancel
        </a>
    </div>

</form>


