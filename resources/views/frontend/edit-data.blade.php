<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact manager</title>
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/js/bootstrap.js">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/style.css">
</head>
<body>
<section class="container-fluid p-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="btn-group mx-auto" role="group" aria-label="Basic mixed styles example">
                <a type="button"  class="btn btn-dark" href="{{route('/')}}">Show contact manager</a>
            </div><br><br>
            <div class="card" style="border: 1px solid black">
                <div class="card-header text-center bg-dark text-white">Update contact information</div>
                <div class="card-body p-4">
                    <form action="{{route('update-data')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="update_id" value="{{$value->id}}">
                        <div class="form-group">
                            <label for="Photos">Photos</label>
                            <input type="file" name="image" class="form-control" id="Photos">
                            <img src="{{asset($value->image)}}" style="height: 100px; width: 100px">
                        </div><br>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" value="{{$value->name}}" class="form-control" id="Name" placeholder="Enter name">
                        </div><br>
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="number" name="phone" value="{{$value->phone}}" class="form-control" id="Phone" placeholder="Enter number">
                        </div><br>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" value="{{$value->email}}" class="form-control" id="Email" placeholder="Enter email">
                        </div><br>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

