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
          <th >Name</th>
          <th >Speciality</th>
          <th >Image</th>
          
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
          <td>{{ $item->name}}</td>
          <td>{{ $item->speciality}}</td>
          <td><img src="/foodimage/{{ $item->image}}" style='height:100px; width:100px;' alt=""></td>
         
          <td><a href="{{url('/deletechef',$item->id)}}" class="btn btn-danger">Delete</a>
          <a href="{{url('/updatechef',$item->id)}}" class="btn btn-info">Edit</a>  
            </td>
          
         
        </tr>
    @endforeach
      
        
      <!-- </tbody> -->
    </table>

</div>
      
@include('admin.adminscript');
  </body>
</html>