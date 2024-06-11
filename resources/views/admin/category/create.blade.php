@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-light px-2 py-0 border-none">
                        <div class="row px-3 py-2 border-bottom">
                            <div class="col-md-6">
                                <h4 class="d-inline-block m-0">Add Category </h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                {{-- <a href="{{ route('category.order') }}" class="btn btn-info btn-sm mr-3">Arrange</a> --}}
                                <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>

                        </div>


                    </div>


                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected="">Enabled</option>
                                    <option value="2">Disabled</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_category">Select Parent Category</label>
                                <select name="parent_category" id="parent_category" class="form-control">
                                    <option value="0" selected="">No Parent</option>

                                    @if (!empty($categories))
                                        @foreach ($categories as $category)
                                            @if (!empty($category->parentHierarchy))
                                                <option value="{{ $category->id }}">
                                                    {{ $category->parentHierarchy }} > <b>{{ $category->name }} </b>
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">
                                                    <b> {{ $category->name }}</b>
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @error('parent_category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Categort Name</label>
                                <input type="text" name="category_name" class="form-control"
                                    value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>

                        </form>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script></script>
@endsection
