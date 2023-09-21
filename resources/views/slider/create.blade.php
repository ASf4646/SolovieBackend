@extends('layouts.vertical', ['title' => 'Slider Form', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Base UI', 'page_title' => 'Slider'])

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="mb-2 float-end">
                            <a href="{{route('slider.index')}}" class="btn btn-primary">
                                {{__("Back")}}
                                <span class=" ri-arrow-go-forward-fill"></span>

                            </a>

                        </div>
                        <form method="POST" action="{{ route('slider.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">{{__("Title")}}</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is required @enderror" placeholder="{{__('Slider Title')}}">
                                @error('title')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">{{__("Description")}}</label>
                                <textarea name="description" class="form-control @error('description') is required @enderror" placeholder="{{__('Slider Description ')}}" id=" example-textarea" rows="5">{{old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <input type="file" name="image" />
                            </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">{{__("Upload Slider")}}</button>
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



<script>
    // Note that the name "myDropzone" is the camelized
    // id of the form.
    Dropzone.options.myDropzone = {
        // Configuration options go here
    };
</script>
<!-- <script>
    $('input[type=file]').dropify();
</script> -->