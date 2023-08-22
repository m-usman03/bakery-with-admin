@extends("admin.layout.master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Topping</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form
                            @if(isset($topping))
                                action="{{ route('admin.topping.update', $topping->id) }}"
                            @else
                                action="{{ route('admin.topping.store') }}"
                            @endif
                            method="POST">
                            @csrf
                            @if(isset($topping))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name"
                                    placeholder="Topping Name"
                                    value="{{ old('name', isset($topping) ? $topping->name : '') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text"
                                    class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price"
                                    placeholder="Topping Price"
                                    value="{{ old('price', isset($topping) ? $topping->price : '') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                @if(isset($topping))
                                    Update Topping
                                @else
                                    Create Topping
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

