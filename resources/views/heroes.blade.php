<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">
        .hero_foto img{
            width: 200px;
        }

        .edit_foto img{
            width: 100px;
        }
        .action{
            float: left;
            margin-right: 10px;
        }

        .allheroes_pagination{
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

    </style>
    <title>Superheroes</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i></button>
            <table class="table table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>Images</th>
                <th>Nickname</th>
                <th>Actions</th>
                </thead>
                <tbody>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> - {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="btn btn-success">
                        <h5>{{session('success')}}</h5>
                    </div>
                @endif
                @foreach($superheroes as $hero)
                <tr>
                    <td><div class="hero_foto">
                            <img src="{{$hero->getImage()}}" alt="">
                        </div></td>
                    <td><a href="{{route('hero.show', ['nickname' => $hero->nickname])}}">{{$hero->nickname}}</a></td>
                    <td><div class="action"><a href="" class="btn btn-success" data-toggle="modal" data-target="#edit{{$hero->id}}"><i class="fa fa-edit"></i></a></div>
                        <form action="{{route('heroes.destroy', ['hero' => $hero->id])}}" method="post" class="float-left" onclick="return confirm('Подтвердите удаление')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>

                <!-- Modal edit hero-->
                <div class="modal fade" id="edit{{$hero->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create new hero</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('heroes.update',['hero' => $hero->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <small>nickname</small>
                                        <input type="text" name="nickname" class="form-control" value="{{$hero->nickname}}">
                                    </div>
                                    <div class="form-group">
                                        <small>real_name</small>
                                        <input type="text" name="real_name" class="form-control" value="{{$hero->real_name}}">
                                    </div>
                                    <div class="form-group">
                                        <small>origin_description</small>
                                        <label for=""></label>
                                        <textarea class="form-control" name="origin_description" id="origin_description" rows="3" >{{$hero->origin_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <small>superpowers</small>
                                        <input type="text" value="{{$hero->superpowers}}" name="superpowers" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <small>catch_phrase</small>
                                        <input type="text" name="catch_phrase" value="{{$hero->catch_phrase}}" class="form-control">
                                    </div>
                                    <div>
                                        <div class="edit_foto">
                                            <img src="{{$hero->getImage()}}" alt="">
                                        </div>
                                        <p>Загрузить изображение</p>

                                        <input type="file" name="image" placeholder="" value="">
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save hero</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal edit hero-->

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="allheroes_pagination">
        {{$superheroes->links()}}
    </div>

</div>

<!-- Modal create hero-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new hero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('heroes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <small>nickname</small>
                        <input type="text" name="nickname" class="form-control">
                    </div>
                    <div class="form-group">
                        <small>real_name</small>
                        <input type="text" name="real_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <small>origin_description</small>
                        <label for=""></label>
                        <textarea class="form-control" name="origin_description" id="origin_description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <small>superpowers</small>
                        <input type="text" name="superpowers" class="form-control">
                    </div>
                    <div class="form-group">
                        <small>catch_phrase</small>
                        <input type="text" name="catch_phrase" class="form-control">
                    </div>
                    <div>
                        <p>Загрузить изображение</p>
                        <input type="file" name="image" placeholder="" value="">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save hero</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal create hero-->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
