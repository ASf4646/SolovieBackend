@extends('layouts.vertical', ['title' => 'Footer Form', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Footer Form', 'page_title' => 'Footer'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Footer</h4>

            </div>
            <div class="card-body">
                <form action="{{route('settings.store')}}" method="Post" enctype="multipart/form-data">

                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label for="" class="form-label">Site Name</label>
                            <input type="text" name="site_name" class="form-control @error('site_name') is required @enderror" placeholder="Site Name">
                            @error('site_name')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputContent" class="form-label">Address</label>
                        <textarea name="footer_address" value="" class="form-control @error('footer_address') is required @enderror" rows="5"></textarea> @error('footer_address')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputContent" class="form-label">Phone no.</label>
                        <input type="number" name="footer_phone" value="" class="form-control @error('footer_phone') is required @enderror" rows="5">@error('footer_address')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputContent" class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control">
                    </div>


            </div>

            <button type="submit" class="btn btn-primary">Upload Footer</button>
            </form>

        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
</div>

@endsection