@foreach ($departments as $department)
 <h1>
    {{$department->name}}
 </h1>

 <div>
    {{$department->code}}
 </div>

    
@endforeach