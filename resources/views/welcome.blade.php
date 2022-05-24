
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--    bootstrap CDN   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

<!--    fontawsome      -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Salers | Manage</title>
</head>
<body>

<!--view table start-->

<div class="container">
    <div class="col-lg-12 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0" style="float: left">Sales Team</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" style="float: right" class="btn btn-light px-5 my-3" data-bs-toggle="modal"
                           data-bs-target="#addUser">
                            <i class="fa fa-plus"></i> Add New</a>
                        <table class="table table-left  table-bordered">
                            <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Current Route</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($sellers as $seller)
                            <tr>
                                <td>{{$seller -> id}}</td>
                                <td>{{$seller -> full_name}}</td>
                                <td>{{$seller -> email}}</td>
                                <td>{{$seller -> telephone}}</td>
                                <td>{{$seller -> current_routes}}</td>
                                <td>
                                 <div class="d-flex justify-content-center">
                                     <a href="#" class="btn btn-success btn-sm px-3" data-bs-toggle="modal"
                                        data-bs-target="#viewSeller{{$seller -> id}}"><i class="fa fa-eye"></i> View</a>
                                 </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-info btn-sm px-3" data-bs-toggle="modal"
                                           data-bs-target="#editSeller{{ $seller->id }}"><i class="fa fa-edit"></i> Edit</a>
                                    </div>

                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-danger btn-sm px-3" data-bs-toggle="modal"
                                           data-bs-target="#deleteSeller{{ $seller->id }}"><i class="fa fa-trash"></i> Delete</a>
                                    </div>

                                </td>
                            </tr>

                            <!--Model of view Saller-->
                            <div class="modal fade bg-dark-greay" id="viewSeller{{$seller -> id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{$seller->id}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!--Model of Edit seller-->

                        <div class="modal right fade mt-3" id="editSeller{{ $seller->id }}" data-bs-backdrop="static"
                             data-bs-keyboard="false" tabindex="-1"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialogg">
                                <div class="modal-content modal-contents">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Seller</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('update', $seller->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="">ID</label>
                                                <input type="text" name="id" value="{{ $seller->id}}" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" name="full_name" id="" value="{{ $seller->full_name}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Email Address</label>
                                                <input type="email" name="email" id="" value="{{ $seller->email}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Telephone</label>
                                                <input type="text" name="telephone" id="" value="{{ $seller->telephone}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Joined Date</label>
                                                <input type="date" name="joined_date" value="{{ $seller->joined_date}}" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Current Routes</label>
                                                <input type="text" name="current_routes" value="{{ $seller->current_routes}}" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Comments</label>
                                                <input type="text" name="comments" value="{{ $seller->comments}}" id="" class="form-control">
                                            </div>

                                            <div
                                                class="modal-footer justify-content-center align-items-center display-flex">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-warning btn-block w-100">
                                                        Update User
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Model of Delete user-->
                        <div class="modal right fade mt-3" id="deleteSeller{{ $seller->id }}" data-bs-backdrop="static"
                             data-bs-keyboard="false" tabindex="-1"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialogg">
                                <div class="modal-content modal-contents">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('destroy', $seller->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <p>Are sure want this delete this {{$seller->name}} ?</p>

                                            <div
                                                class="modal-footer justify-content-center align-items-center display-flex">
                                                <div class="col-md-6">
                                                    <button class="btn btn-default w-100" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger w-100">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Model of adding new Saler-->

<div class="modal right fade mt-3" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialogg">
        <div class="modal-content modal-contents">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Saler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="id" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="full_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Telephones</label>
                        <input type="text" name="telephone" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Joined Date</label>
                        <input type="date" name="joined_date" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Current Routes</label>
                        <input type="text" name="current_routes" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Comments</label>
                        <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="modal-footer justify-content-center align-items-center display-flex">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block w-100">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<style>
    .btn-light{
        background-color: #cccccc;
    }
    .btn-light:hover{
        background-color: #6c6c6c;
        color: #cccccc;
    }
    .bg-dark-greay{
        background-color: #6c6c6c;
    }
    .card-header{
        background-color: #cccccc;
    }

</style>
</html>
