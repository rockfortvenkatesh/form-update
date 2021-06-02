

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Detaila

            
        </h2>
    </x-slot>


<div class="py-12">
    <div class="container">
        <div class="row">


             <div class="col-md-12">
                <div class="card">

                <div class="card-header">Edit Sales Person details</div>  
                <div class="card-body">
                    
                    <form action="{{url('details/update/'.$details->id)}}" method="post">
                        @csrf
                    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Update Name</label>
    <input type="name" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$details->name}}">
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Update Email </label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$details->email}}">
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
     </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Update Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$details->phone}}">
    @error('phone')
    <span class="text-danger">{{$message}}</span>
    @enderror
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Update Address</label>
        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
        {{$details->address}}
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
