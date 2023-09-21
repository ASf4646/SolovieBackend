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
                <form action="{{route('services.update', $service->id)}}" method="Post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" value="{{old('title', $service->title)}}" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{old('meta_title', $service->meta_title)}}" id="inputPassword4" placeholder="Meta Title">
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" id="inputPassword4" value="{{old('meta_title', $service->meta_keywords)}}" placeholder="Meta Keywords">
                    </div>
                    <div class="mb-3">
                        <label for="inputContent" class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="5">{{old('content', $service->content)}}</textarea>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputContent" class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="5">{{old('short_description', $service->short_description)}}</textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputContent" class="form-label">Long Description</label>
                            <textarea name="long_description" class="form-control" rows="5">{{old('long_description', $service->long_description)}}</textarea>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="inputAddress2" class="form-label">Banner</label>
                        <input type="file" class="form-control" name="image" id="inputAddress2">
                    </div>
                    <button type="submit" class="btn btn-danger">Update Service</button>
                    <a href="{{route('services.index')}}" class="btn btn-dark">Cancel</a>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

@endsection