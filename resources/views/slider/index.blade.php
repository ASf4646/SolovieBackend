@extends('layouts.vertical', ['title' => 'Slider List', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@vite(['node_modules/admin-resources/rwd-table/rwd-table.min.css'])
@endsection

@section('content')
@include('layouts.shared/page-title', ['page_title' => 'Slider List', 'sub_title' => 'Slider'])

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="mb-2 float-end">
                    <a href="{{ route('slider.create') }}" class="btn btn-outline-primary"> <span class="ri-add-circle-line"></span> {{__("Add Slider")}}</a>

                </div>
                <div class="responsive-table-plugin">
                    <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Title</th>
                                        <th data-priority="3">Description</th>
                                        <th data-priority="1">Image</th>

                                        <th data-priority="6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slider as $slide)
                                    <tr>
                                        <td>{{$slide->title}}</td>
                                        <td>{{$slide->description}}</td>
                                        <td>
                                            <img src="{{ url('storage/'.$slide->image) }}" width="80" alt="Slider Image">

                                        </td>
                                        <td class="">
                                            <form action="{{ route('slider.destroy',$slide->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class=" btn btn-outline-danger "> Delete</button>
                                                <a href="{{route('slider.edit', $slide)}}" class="btn btn-outline-info">
                                                    Edit
                                                </a>
                                            </form>



                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive -->

                    </div> <!-- end .table-rep-plugin-->
                </div> <!-- end .responsive-table-plugin-->
            </div>
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('script')
@vite(['resources/js/pages/responsive-table.init.js'])
@endsection