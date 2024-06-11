@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">

                    <div class="card-header bg-light px-2 py-0 border-none">
                        <div class="row px-3 py-2 border-bottom">
                            <div class="col-md-6">
                                <h4 class="d-inline-block m-0"> Category </h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                {{-- <a href="{{ route('category.order') }}" class="btn btn-info btn-sm mr-3">Arrange</a> --}}
                                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Add
                                    New</a>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <form action="{{ route('category.index') }}" method="get" class="filter_form"
                                    id="filter_form">
                                    <div class="table-responsive d-flex justify-content-end">
                                        <table class="filter_table">
                                            <tr>
                                                <td class="">
                                                    <div class="form-group">
                                                        <label for="start_date">Start date</label>
                                                        <input type="datetime-local"
                                                            class="form-control form-control-sm input_with_select2"
                                                            id="start_date" name="start_date" placeholder="Start date"
                                                            value="{{ old('start_date', request('start_date')) }}">
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="form-group">
                                                        <label for="end_date">End date</label>
                                                        <input type="datetime-local"
                                                            class="form-control form-control-sm input_with_select2"
                                                            id="end_date" name="end_date" placeholder="Start date"
                                                            value="{{ old('end_date', request('end_date')) }}">
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="form-group">
                                                        <label for="show_item_at_once">Show</label>
                                                        <select class="form-control form-control-sm  w-100 select2"
                                                            name="show_item_at_once" id="show_item_at_once">
                                                            <option value="">show</option>
                                                            <option value="10"
                                                                {{ request('show_item_at_once') == 10 ? 'selected' : '' }}>
                                                                10
                                                            </option>
                                                            <option value="20"
                                                                {{ request('show_item_at_once') == 20 ? 'selected' : '' }}>
                                                                20
                                                            </option>
                                                            <option value="40"
                                                                {{ request('show_item_at_once') == 40 ? 'selected' : '' }}>
                                                                40
                                                            </option>
                                                            <option value="80"
                                                                {{ request('show_item_at_once') == 80 ? 'selected' : '' }}>
                                                                80
                                                            </option>
                                                            <option value="120"
                                                                {{ request('show_item_at_once') == 120 ? 'selected' : '' }}>
                                                                120
                                                            </option>
                                                            <option value="200"
                                                                {{ request('show_item_at_once') == 200 ? 'selected' : '' }}>
                                                                200
                                                            </option>
                                                            <option value="300"
                                                                {{ request('show_item_at_once') == 300 ? 'selected' : '' }}>
                                                                300
                                                            </option>
                                                            <option value="500"
                                                                {{ request('show_item_at_once') == 500 ? 'selected' : '' }}>
                                                                500
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>


                                                <td class="w_200">
                                                    <div class="form-group">
                                                        <label for="s_query">Search</label>
                                                        <input type="search"
                                                            class="form-control form-control-sm  w-100 input_with_select2"
                                                            placeholder="Search..." name="s_query" id="s_query"
                                                            value="{{ request('s_query') ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group pt-3">
                                                        <button class="btn btn-primary btn-sm mt-2   w-100" type="submit"
                                                            id="filter_btn">
                                                            Filter</button>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group pt-3">
                                                        <a href="{{ route('category.index') }}"
                                                            class="btn btn-warning btn-sm mt-2 " id="filter_btn">
                                                            Clear</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>


                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr data-id={{ $item->id }}>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <p>
                                                @if (!empty($item->parentHierarchy))
                                                    {{ $item->parentHierarchy }} > <b>{{ $item->name }} </b>
                                                @else
                                                    <b> {{ $item->name }}</b>
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            <div class="form-group m-0">
                                                <select
                                                    class="form-control form-control-sm status {{ $item->status == 2 ? 'border-warning' : '' }}">

                                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>
                                                        Enabled
                                                    </option>
                                                    <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>
                                                        Disabled
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->created_at->format('d-m-Y h:ia') }}

                                        </td>
                                        <td>
                                            <div class="input-group edit_delete">

                                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info"><i
                                                        class="fas fa-pencil-alt"></i></a>

                                                <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger confirmDeleteForm"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example " class="pagination">
                            {{ $categories->links() }}
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            $('body').on('change', '.status', function() {
                var status = $(this).val();

                var record_id = $(this).closest("tr").data('id');
                $element = $(this);

                // console.log(status);



                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/category/changestatus',
                    data: {
                        'status': status,
                        'id': record_id
                    },
                    success: function(data) {
                        alert("Category Status Changed Successfully!");
                        if (status == 1) {
                            $element.removeClass('border-warning');
                            // $element.addClass('border-success');
                        } else {
                            // $element.removeClass('border-success');
                            $element.addClass('border-warning');
                        }


                        // window.location.reload();
                    }
                });
            })
        });

        $(".confirmDeleteForm").click(function(e) {
            // e.preventDefault();
            if (confirm("Are you sure to delete this ?")) {
                return true;
            } else {
                return false;
            }
        });
    </script>
@endsection
