<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss');
  </head>
  <body>
  <div class="container-scroller">
  @include('admin.navbar');
    <div class="container">
  <h1>Customer Orders</h1>

    <form action="{{url('/search')}}" method="GET">
      @csrf
      <input type="text" name="search" style="color:blue;">
      <input type="submit" value="Seach" class="btn btn-success">

    </form>
    
    
      <table class="table container " style="display:block; ">
      <thead>
        <tr>
          <th >#</th>
          <th >Foodname</th>
          <th >Price</th>
          <th >Quantity</th>
          <th >Name</th>
          <th >Phone</th>
          <th >Address</th>
          <th >Total Price</th>
          <th >Action</th>
        </tr>
      </thead>
    @php
      $i = 0;
    @endphp
      <!-- <tbody> -->
      @foreach($data as $item) 
      <tr>
          <th >{{++$i}}</th>
          <td>{{ $item->foodname}}</td>
          <td>${{ $item->price}}</td>
          <td>{{ $item->quantity}}</td>
          <td>{{ $item->name}}</td>
          <td>{{ $item->phone}}</td>
          <td>{{ $item->address}}</td>
          <td>${{ $item->quantity * $item->price}}</td>
          <td><a href="{{url('/deletefood',$item->id)}}" class="btn btn-danger">Delete</a>
          <a href="{{url('/updateview',$item->id)}}" class="btn btn-info">Edit</a>  
            </td>
          
         
        </tr>
    @endforeach
      
        
      <!-- </tbody> -->
    </table>
    </div>

</div>
      
@include('admin.adminscript');
  </body>
</html>