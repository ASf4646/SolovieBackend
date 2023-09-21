@extends('layouts.vertical', ['title' => 'Services Form', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Services', 'page_title' => 'Services'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Services</h4>

            </div>
            <div class="card-body">
                <form action="{{route('services.store')}}" method="Post" enctype="multipart/form-data">

                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is required @enderror" placeholder="Title">
                            @error('title')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control @error('meta_title') is required @enderror" id="inputPassword4" placeholder="Meta Title"> @error('meta_title')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{old('meta_keywords')}}" class="form-control @error('meta_keywords') is required @enderror" id="inputPassword4" placeholder="Meta Keywords"> @error('meta_keywords')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputContent" class="form-label">Content</label>
                        <textarea name="content" value="" class="form-control @error('content') is required @enderror" rows="5">{{old('content')}}</textarea> @error('content')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputContent" class="form-label">Short Description</label>
                            <textarea name="short_description" value="" class="form-control @error('short_description') is required @enderror" rows="5">{{old('short_description')}}</textarea> @error('short_description')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputContent" class="form-label">Long Description</label>
                            <textarea name="long_description" value="" class="form-control @error('long_description') is required @enderror" rows="5">{{old('long_description')}}</textarea> @error('long_description')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="inputAddress2" class="form-label">Banner</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Service</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

@endsection