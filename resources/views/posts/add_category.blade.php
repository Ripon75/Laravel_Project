@extends('welcome')

@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
            <a href="{{url('/addcategory')}}" class="btn btn-danger">Add Category</a>
            <a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
        <hr>

         <!-- from validation message -->
        @if ($errors->any())
         <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
         </div>
        @endif
        
        <form action="{{ route('store.category') }}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label> Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name">
            </div>
          </div>

          <!-- <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug">
            </div>
          </div> -->
          
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
        </div>
@endsection