@extends('layouts.vertical', ['title' => 'Settings', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Setting Table','sub_title' => 'Settings'])

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="header-title">Settings</h4>
                <a href="{{route('settings.create')}}" class="btn btn-success btn-sm">Add Settings</a>

            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Site Name</th>
                                <th>Salogan</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($settings as $set )
                            <tr>
                                <td>
                                    <img src="{{ url('storage/'. $set->logo) }}" width="80" alt="Logo" title="Logo" />
                                </td>
                                <td>
                                    {{ $set->site_name}}
                                </td>
                                <td>
                                    {{ $set->salogan}}
                                </td>
                                <td>
                                    {{ $set->footer_address}}
                                </td>
                                <td>
                                    {{ $set->footer_phone}}
                                </td>
                                <td>
                                    <form action="{{ route('settings.destroy',$set->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class=" btn btn-outline-danger "> Delete</button>
                                        <a href="{{route('settings.edit', $set)}}" class="btn btn-outline-info">
                                            Edit
                                        </a>
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