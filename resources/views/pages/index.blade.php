@extends('layouts.vertical', ['title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Menu Table','sub_title' => 'Pages'])

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="header-title">Menu</h4>
                <a href="{{route('pages.create')}}" class="btn btn-success btn-sm">Add Page</a>

            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page )
                            <tr>
                                <td>{{$page->title}}</td>
                                <td>{{$page->slug}}</td>
                                <td>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
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