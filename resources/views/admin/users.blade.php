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
          <th >User name</th>
          <th >User email</th>
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
          <td>{{ $item->email}}</td>
          @if($item->usertype == 0)
          <td><a href="{{url('/deleteuser',$item->id)}}">Delete</a></td>
          @else
          <td><a href="">Not Allowed</a></td>
          @endif
        </tr>
    @endforeach
      
        
      <!-- </tbody> -->
    </table>

</div>
      
@include('admin.adminscript');
  </body>
</html>