@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ Form::open(['route' => 'posts.store', 'method' => 'post']) }}
                    <div class="mb-2">
                        {{ Form::label('title', 'Post Title', ['class' => 'awesome']) }}
                        {{ Form::text('title', 'Add some text...', ['class' => 'form-control']) }}
                    </div>
                    <div class="mb-2">
                        {{ Form::label('content', 'Content', ['class' => 'form-label']) }}
                        {{ Form::text('content', 'Some content...', ['class' => 'form-control']) }}
                    </div>
                    <a class="btn btn-success" role="button"
                        href="{{ route('posts.index') }}">Cancel</a>
                    {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
