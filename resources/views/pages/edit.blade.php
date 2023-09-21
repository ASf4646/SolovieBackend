@extends('layouts.vertical', ['title' => 'Pages Form', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Page', 'page_title' => 'Edit Page'])

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="mb-2 float-end">
                            <a href="{{route('pages.index')}}" class="btn btn-primary">
                                {{__("Back")}}
                                <!-- <span class=" ri-arrow-go-forward-fill"></span> -->
                            </a>
                        </div>
                        <form method="POST" action="{{ route('pages.update', $page->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">{{__("Page Title")}}</label>
                                <input type="text" name="title" value="{{old('title', $page->title)}}" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">{{__("Page Content")}}</label>
                                <textarea name="content" class="form-control" id=" example-textarea" rows="5">{{ old('content', $page->content) }}</textarea>
                            </div>
                    </div>
                </div>

                <button class="btn btn-success" type="submit">{{__("Update Page")}}</button>
                <a href="{{route('pages.index')}}" class="btn btn-primary" type="submit">{{__("Cancel")}}</a>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
</div>
<!-- container -->

</div>
<!-- End row -->
@endsection