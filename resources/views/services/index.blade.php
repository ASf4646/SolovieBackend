@extends('layouts.vertical', ['title' => 'Service', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Service Table','sub_title' => 'Service'])

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="header-title">Services</h4>
                <a href="{{route('services.create')}}" class="btn btn-success btn-sm">Add New Service</a>

            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Meta Title</th>
                                <th>Meta Keywords</th>
                                <th>Slug</th>
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service )
                            <tr>
                                <td>{{$service->title}}</td>
                                <td>{{$service->meta_title}}</td>
                                <td>{{$service->meta_keywords}}</td>
                                <td>{{$service->slug}}</td>
                                <td>
                                    <img src="{{ url('storage/'. $service->image) }}" width="80" alt="Service Banner" title="Service Banner" />


                                </td>
                                <td>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                                    </form>

                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    @endsection