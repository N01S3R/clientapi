@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
@dd($response)
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scopr="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($response['data'] as $item)
                            <tr>
                            <th scope="row">{{ $item['id'] }}</th>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['content'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>
                              <form method="POST" action=" {{ route('posts.destroy', $item['id']) }} ">
                                <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $item['id']) }}"> 
                                   <i class="bi bi-pencil-square"></i> 
                                </a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                  <i class="bi bi-trash"></i>  
                                </button>	
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
