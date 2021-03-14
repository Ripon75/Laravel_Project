@extends('welcome')

@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
            
          <div>
             
                
                <p>{{$student->name}}</p>
                
                <p>Category Name: {{ $student->email }}</p>
                <p>{{$student->phone}}</p>
              
          </div>
      
      </div>
    </div>
 </div>
@endsection