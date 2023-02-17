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
</head>
<body>
    <section class="container-fluid">
        <div class="row p-4">
            <div class="col-md-8 mx-auto">
                <div class="text-end">
                    <a href="{{route('login')}}" class="btn btn-dark px-5">{{session('message','login and insert data')}}</a>
                </div><hr>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title py-1 text-dark text-center">Contact manager</h3>
                        <table class="table table-bordered table-hover table-sm" style="border: 1px solid #04414d">
                            <thead class="text-center" style="background-color: #04414d; color: white;">
                            <tr>
                                <th>Sl No</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($contact as $value)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>
                                    <img class="mx-auto d-block" src="{{asset($value->image)}}" style="height: 40px; width: 40px;border-radius: 50%;">
                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->email}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Two Buttons">
                                        <a href="{{route('edit-data',['id'=>$value->id])}}" class="btn btn-warning btn-sm">Update</a>
                                        <form action="{{route('delete-data')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="update_id" value="{{$value->id}}">
                                            <input type="submit" value="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure !!')">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
