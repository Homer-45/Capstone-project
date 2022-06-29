@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                        <div class="card-header">In Line to be Baptize</div>
                    

            <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @php($i = 1)
        @foreach($unbaptizeds as $unbaptized)
    <tr>
      <th scope="row">{{ $i++ }}</th> 
      <td> {{ $unbaptized->name }} </td>
      <td> {{ $unbaptized->address }} </td>
      <td> {{ $unbaptized->mobile }} </td>
      <td>
      <a href="" class="btn btn-info">Edit</a>
      <a href="" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    
    
    @endforeach
    
  </tbody>
</table>
{{ $categories->links() }}

</div>
    </div>
   
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add People</div>
                <div class="card-body">

                
                <form action="{{ route('store.unbaptized') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Add List</button>
                </form>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
        </div>
            </div>
            </div>
        </div> 
    </div>
@endsection

