@extends('layouts.app')
@section('content')

{{-- @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subjects') }}</div>

                <div class="card-body">
@auth
@can('create')
<h1>
    <a href="{{route('subjects.create')}}">
      Add a new Subject
    </a>
  </h1>
@endcan
@endauth

  @foreach ($subjects as $subject)
    <div class="d-flex justify-content-between">
        <div>
          <a href="{{route('subjects.show',$subject->id)}}">

            {{$subject->name}}
          </a>
        </div>
@auth
@can('create')

<div>
    <a href="{{route('subjects.edit',$subject->id)}}">
        Edit
    </a>
    <form action="{{ route('subjects.destroy' , $subject->id) }}" method="POST" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-link">
            Delete
        </button>

    </form>
  </div>
  @endcan
@endauth


    </div>

  @endforeach


  {{$subjects ->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
