@extends('layouts.app')
@section('content')

<form action="{{route('subjects.update',$subject->id)}}"  method="POST">
@csrf
@method("PUT")
<div>
    <label >Name</label>
    <input class="form-control" type="text" name="name" value="{{$subject->name}}">
</div>
<div>
    <label >Code</label>
    <input class="form-control" type="text"  name="code" value="{{$subject->code}}">
</div>
<div>
    <label >Department Id</label>
    <input class="form-control" type="text"  name="department_id" value="{{$subject->department_id}}" >
</div>
<button type="submit" class="btn btn-success mt-4">Save</button>
</form>

@endsection
