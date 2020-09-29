@extends('layouts.app')
@section('content')
    <table class="table table-striped projects">
      <a class="btn btn-success" href="{{ url('json/create') }}">Create</a>
    </tbody>
    <table class="table table-bordered" id="table">
      <thead>
      <tr>
        <th></th>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Status</th>
          <th>Action</th>
          <!-- <th>Type</th> -->
          <!-- <th>Action</th> -->
      </tr>
  </thead>
  <tbody>
     
      @foreach ($finaldata as $key => $value)
      <tr>
        <td></td>
          <td>{{ $key+1 }}</td>
          <td>{{ $value['name'] }}</td>
          <td>{{ $value['email'] }}</td>
          <td>{{ $value['gender'] }}</td>
          <td>{{ $value['status'] }}</td>
          <td>
              <form action="{{ url('json/delete',$value['id']) }}" method="POST">
 
          
                  <a class="btn btn-success" href="{{ url('json',$value['id']) }}">View</a>
                  <a class="btn btn-primary" href="{{ url('json/edit',$value['id']) }}">Edit</a>
 

                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" class="text-danger">Delete</button>
                 
              </form>
          </td>
        
      </tr>
      @endforeach
  </tbody>
  </table>
</table>
@endsection