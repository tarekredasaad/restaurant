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
<form class="signup form"  method="POST" action="{{route('admin.food','App\Http\Controllers\AdminController@store')}}" enctype="multipart/form-data" >
	@csrf
    <h4 class="text-center"> </h4><br><br>
    <div class="form-group">
    <label>Title</label>
	<input class="form-control" type="text" name="title" placeholder=" name" autocomplete="off" require>
	</div>

    <div class="form-group">
    <label>price</label>
	<input class="form-control" type="text" name="price" placeholder=" price" autocomplete="off" require>
	</div>

    <div class="form-group">
    <label>Image</label>
	<input class="form-control" type="file" name="image"   require>
	</div>

    <div class="form-group">
    <label>Description</label>
	<textarea class="form-control" type="text" name="description" placeholder=" description" autocomplete="off" require>

    </textarea>
	</div>
    
    <div class="form-group">
	<input class="btn btn-success  send" type='submit' name="save" value="save">
    </div>
    
</form>
    </div>

</div>
      
@include('admin.adminscript');
  </body>
</html>