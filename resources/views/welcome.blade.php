<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD de Prueba</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/d9c5b7ad6d.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>CRUD</h1>
  <p>Esto es un CRUD de prueba</p> 
</div>
<div class="container mt-5">
    @if(session("Correcto"))
        <div class="alert alert-success">{{session("Correcto")}}</div>
    @endif
    @if(session("Error"))
        <div class="alert alert-danger">{{session("Error")}}</div>
    @endif
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Agregar</button>
    <!-- Modal Registro -->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <form action="{{route('crud.create')}}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtId>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtNombre>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtApellido>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Edad</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtEdad>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>

                            </form>


                            </div>
                            
                        </div>
                    </div>
                </div>
  <div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
            <tr>
                <th>{{$item->id}}</th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->apellido}}</td>
                <td>{{$item->edad}}</td>
                <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href=""class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </td>
                <!-- Modal Editar -->
                <div class="modal fade" id="modalEditar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Datos</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <form>
                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtId value="{{$item->id}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtNombre value="{{$item->nombre}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtApellido value="{{$item->apellido}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Edad</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=txtEdad value="{{$item->edad}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Modificar</button>
                                </div>

                            </form>


                            </div>
                            
                        </div>
                    </div>
                </div>

            </tr>
            @endforeach   
        </tbody>
    </table> 
  </div>
</div>

</body>
</html>
