<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss');
  </head>
  <body>
  <div class="container-scroller">
  @include('admin.navbar');
    
      <table class="table container">
      <thead>
        <tr>
          <th >#</th>
          <th >Title</th>
          <th >Price</th>
          <th >Image</th>
          <th >Description</th>
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
          <td>{{ $item->title}}</td>
          <td>{{ $item->price}}</td>
          <td><img src="/foodimage/{{ $item->image}}" style='height:100px; width:100px;' alt=""></td>
          <td>{{ $item->description}}</td>
          <td><a href="{{url('/deletefood',$item->id)}}" class="btn btn-danger">Delete</a>
          <a href="{{url('/updateview',$item->id)}}" class="btn btn-info">Edit</a>  
            </td>
          
         
        </tr>
    @endforeach
      
        
      <!-- </tbody> -->
    </table>

</div>
      
@include('admin.adminscript');
  </body>
</html>