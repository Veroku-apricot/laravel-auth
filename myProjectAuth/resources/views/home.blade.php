@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Icon Updater</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="" action="{{ route('update-icon') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('post')

                      <input type="file" name="icon" class="form-control border-0">

                      <br>

                      <input type="submit" name="" value="Submit Icon">
                      <a href="{{ route('delete-icon') }}" class="btn btn-danger">Delete Icon</a>
                    </form>
                </div>
            </div>

            <br>

            @if (Auth::user() -> icon)
              <div class="card">
                <div class="card-header">Selected icon</div>

                <div class="card-body">
                  <img src="{{ asset('storage/icon/' . Auth::user() -> icon) }}" width="300px" alt="">
                </div>
              </div>
            @endif
        </div>
    </div>
</div>
@endsection
