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
          <th >Email</th>
          <th >Phone</th>
          <th >Guest</th>
          <th >Date</th>
          <th >Time</th>
          <th >Message</th>
          
          <th >Action</th>
        </tr>
      </thead>
    @php
      $i = 0;
    @endphp
      <!-- <tbody> -->
      @foreach($data as $item) 
      <tr>
          <td >{{++$i}}</td>
          <td>{{ $item->name}}</td>
          <td>{{ $item->email}}</td>
         
          <td>{{ $item->phone}}</td>
          <td >{{ $item->guest}}</td>
          <td >{{ $item->date}}</td>
          <td >{{ $item->time}}</td>
          <td >{{ $item->message}}</td>
          <td><a href="{{url('/deletereservation',$item->id)}}" class="btn btn-danger">Delete</a>
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