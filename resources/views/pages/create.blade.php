@extends('layouts.vertical', ['title' => 'Menu Form', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Menu Form', 'page_title' => 'Menu'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Menu</h4>

            </div>
            <div class="card-body">
                <form action="{{route('pages.store')}}" method="Post" enctype="multipart/form-data">

                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label for="" class="form-label">Page Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is required @enderror" placeholder="Title">
                            @error('title')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputContent" class="form-label">Page Content</label>
                        <textarea name="content" value="" class="form-control @error('content') is required @enderror" rows="5">{{old('content')}}</textarea> @error('content')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


            </div>

            <button type="submit" class="btn btn-primary">Save Page</button>
            </form>

        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
</div>

@endsection