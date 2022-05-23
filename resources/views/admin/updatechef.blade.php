<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss');
  </head>
  <body>
  <div class="container-scroller">
  @include('admin.navbar');
  <!--  -->
  <div  class='container'>
<form class="signup form"  method="POST" action="{{url('/updatechef',$data->id)}}" enctype="multipart/form-data" >
	@csrf
    <h4 class="text-center"> </h4><br><br>
    <div class="form-group">
    <label>Name</label>
	<input class="form-control" type="text" name="name" value="{{$data->name}}" require>
	</div>

    <div class="form-group">
    <label>Speciality</label>
	<input class="form-control" type="text" name="speciality" value="{{$data->speciality}}" require>
	</div>

    <div class="form-group">
    <label>Old Image</label>
	<img src="/foodimage/{{ $data->image}}" style='height:100px; width:100px;' alt="">
    </div>

    <div class="form-group">
    <label>Image</label>
	<input class="form-control" type="file" name="image"   require>
	</div>

    
    <div class="form-group">
	<input class="btn btn-success  send" type='submit' name="save" value="update">
    </div>
    
</form>
    </div>

</div>
      
@include('admin.adminscript');
  </body>
</html>