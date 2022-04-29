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

<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ old('id') }}">
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <label class="form-label">Product name</label>
                <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback help-block d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" aria-label="Select category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('catwgory') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label class="form-label">Unit</label>
                    <input name="unit" type="text" class="form-control" value="{{ old('unit') }}">
                    @error('unit')
                    <div class="invalid-feedback help-block d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label class="form-label">Unit Price</label>
                    <input name="unit_price" type="text" class="form-control" value="{{ old('unit_price') }}">
                    @error('unit_price')
                    <div class="invalid-feedback help-block d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label class="form-label">Promotion Price</label>
                    <input name="promotion_price" type="text" class="form-control" value="{{ old('promotion_price') }}">
                    @error('promotion_price')
                    <div class="invalid-feedback help-block d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <label class="form-label">Image product</label>
            @isset($product)
                <div class="avail-product-img mb-2">
                 <img src="{{ $product->image_url }}" alt="" class="img-thumbnail"/>
                </div>
            @endif
            <div class="img-product">
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="image">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" rows="3">{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback help-block d-block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="button-form-area">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i> Save
        </button>
        <a href="{{ route('admin.product.list') }}" class="btn btn-dark">
            Cancel
        </a>
    </div>

</form>


