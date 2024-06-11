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
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>Enabled</option>
                                    <option value="2" {{ $category->status === 2 ? 'selected' : '' }}>Disabled</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_category">Select Parent Category</label>
                                <select name="parent_category" id="parent_category" class="form-control">
                                    <option value="0" selected="">No Parent</option>
                                    @if (!empty($categories_all))
                                        @foreach ($categories_all as $item)
                                            @if ($category->id !== $item->id)
                                                @if (!empty($item->parentHierarchy))
                                                    <option value="{{ $item->id }}"
                                                        {{ $category->parent_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->parentHierarchy }} > <b>{{ $item->name }}
                                                        </b>
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        {{ $category->parent_id == $item->id ? 'selected' : '' }}>
                                                        <b> {{ $item->name }}</b>
                                                    </option>
                                                @endif
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
                                    value="{{ old('name', $category->name) }}">
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
