@extends("admin.layout.master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form
                            @if(isset($product))
                                action="{{ route('admin.product.update', $product->id) }}"
                            @else
                                action="{{ route('admin.product.store') }}"
                            @endif
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($product))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name"
                                    placeholder="Product Name"
                                    value="{{ old('name', isset($product) ? $product->name : '') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text"
                                    class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price"
                                    placeholder="Product Price"
                                    value="{{ old('price', isset($product) ? $product->price : '') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description"
                                    rows="3"
                                    placeholder="Product Description">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text"
                                    class="form-control @error('weight') is-invalid @enderror"
                                    id="weight" name="weight"
                                    placeholder="Product Weight"
                                    value="{{ old('weight', isset($product) ? $product->weight : '') }}">
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="box" class="form-label">Box</label>
                                <input type="text"
                                    class="form-control @error('box') is-invalid @enderror"
                                    id="box" name="box"
                                    placeholder="Product Box"
                                    value="{{ old('box', isset($product) ? $product->box : '') }}">
                                @error('box')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail Image</label>
                                <input type="file"
                                    class="form-control @error('thumbnail') is-invalid @enderror"
                                    id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="thumbnailPreview"></div>
                            </div>

                            @if(isset($product))
                                <div class="mb-3">
                                    <label>Current Thumbnail</label><br>
                                    <img src="{{asset('storage/' . $product->thumbnail)}}" height='100px' width='100px'/>
                                </div>
                            @endif

                            
                            <div class="mb-3">
                                <label for="images" class="form-label">Images</label>
                                <input type="file"
                                    class="form-control @error('images') is-invalid @enderror"
                                    id="images" name="pics[]" multiple>
                                @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="imagesPreview"></div>
                            </div>
                        
                            @if(isset($product) && $product->pics)
                                <div class="mb-3">
                                    <label>Current Images</label><br>
                                    @foreach($product->pics as $pic)
                                        <img src="{{ asset('storage/' . $pic->image) }}" alt="Product Image" style="max-width: 150px; margin-right: 10px;">
                                    @endforeach
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">
                                @if(isset($product))
                                    Update Product
                                @else
                                    Create Product
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    $(document).ready(function () {
        $('#thumbnail').on('change', function (e) {
            const thumbnailPreview = $('#thumbnailPreview');
            thumbnailPreview.html(''); // Clear previous preview

            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    $('<img>')
                        .attr('src', event.target.result)
                        .css({ maxWidth: '150px' })
                        .appendTo(thumbnailPreview);
                };
                reader.readAsDataURL(file);
            }
        });

        $('#images').on('change', function (e) {
            const imagesPreview = $('#imagesPreview');
            imagesPreview.html(''); // Clear previous preview

            const files = e.target.files;
            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    $('<img>')
                        .attr('src', event.target.result)
                        .css({ maxWidth: '150px', marginRight: '10px' })
                        .appendTo(imagesPreview);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

@endsection