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

                      <input type="submit" name="" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
