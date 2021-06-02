

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi...  {{ Auth::user()->name }}

            
        </h2>
    </x-slot>


<div class="py-12">
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times</span>
  </button>
</div>
@endif
                <div class="card-header">All Sales Person details</div>                
           
            
            <div class="btn-group">
  
  <!--a href="{{ route('all.salespersons') }}" class="btn btn-primary">Sales Person Details</a-->
</div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <!--th scope="col">created_at</th-->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@php($i=1)
    @foreach($details as $detail)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$detail->name}}</td>
      <td>{{$detail->email}}</td>
      <td>{{$detail->phone}}</td>
      <td>{{$detail->address}}</td>
      <!--td>{{Carbon\Carbon::parse($detail->created_at)->diffForHumans()}}</td-->
      <td><a href="{{url ('detail/edit/'.$detail->id)}}" class="btn btn-info">Edit</a></td>
      <td><a href="{{url ('detail/delete/'.$detail->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>

    @endforeach
    
  </tbody>
</table>


 </div>
 {{ $details->links()}}
            </div>
             <div class="col-md-12">
                <div class="card">

                <div class="card-header">Add Sales Person details</div>  
                <div class="card-body">
                    
                    <form action="{{route('store.details')}} " method="post">
                        @csrf
                    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="name" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
     </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('phone')
    <span class="text-danger">{{$message}}</span>
    @enderror
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
        @error('address')
    <span class="text-danger">{{$message}}</span>
    @enderror
   
  </div>
   
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div> 

                

                 </div>
            
        </div>
            
        </div>

       
        
    </div>

</div>
    
</x-app-layout>
