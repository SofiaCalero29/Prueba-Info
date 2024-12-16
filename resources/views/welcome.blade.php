<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesone.com/646ac4fad6.js" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar" style="background-color: #f9e3fd;">
        <!-- Navbar content -->
        <div class="container">
            <a class="navbar-brand" href="#">
                <button class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#ModalRegistrar">Registrar</button>

            </a>
            <a class="navbar-brand" href="#">
                <h1 style="color: blue;">Bienvenidos</h1>
            </a>

        </div>
    </nav>

    <div class="p-5 table-responsi">
        <table class="table">
            <i class="fa fa-align-center" aria-hidden="true">
                <h1 align="center" style="color:seagreen;">Listado de Visitantes</h1>
                <h1 align="center" style="color: maroon;">(EVENTO)</h1>
                <br>

                @if (session('Correcto'))
                    <div class="alert alert-success">{{ session('Correcto') }}</div>
                @endif

                @if (session('Incorrecto'))
                    <div class="alert alert-danger">{{ session('Incorrecto') }}</div>
                @endif

                <script>
                    var res = function() {
                        var not = confirm("¿Estas Seguro de Eliminar?");
                        return not;
                    }
                </script>


                <!-- Modal de Registrar Datos del Visitante -->
                <div class="modal fade" id="ModalRegistrar" tabindex="-1" aria-labelledby="ModalEditarLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModelLabel">Registrar Datos del Visitante</h1>
                                <button type="button" class="btn-close"
                                    data-bs-dismiss="modal"aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('prueba.create') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputNombre"class="form-label">Nombre</label>
                                        <input type="text"class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="txtNombre" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputApellido" class="form-label">Apellido</label>
                                        <input type="text"class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="txtApellido" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail"class="form-label">Email</label>
                                        <input type="email"class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="txtEmail" required>
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                            else.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputApellido" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date"class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="txtFecha" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputApellido" class="form-label">Telefono</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="txtTelefono" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"class="form-label">Password</label>
                                        <input type="password" class="form-control"id="exampleInputPassword1"
                                            name="txtPassword1" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword2"class="form-label">Confirmar Password</label>
                                        <input type="password" class="form-control"id="exampleInputPassword2"
                                            name="txtPassword2"required>
                                    </div>

                                    <div>
                                        <label for="lang">Categoria</label>
                                        <select name="Cate" id="lang" required>
                                            <option value="selecciona">Selecciona una Categoria</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Visitante">Visitante General</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tabla-->
                <div class="col-md-9">
                    <div style="text-align:center;">
                        <!--Encabezado de la Tabla-->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)
                                    <tr>
                                        <td>{{ $item->idVisi }} </td>
                                        <td>{{ $item->nombre }} {{ $item->apellido }} </td>
                                        <td>{{ $item->email }} </td>
                                        <td>{{ $item->telefono }} </td>
                                        <td>{{ $item->fecha_nac }} </td>
                                        <td>{{ $item->categoria }} </td>
                                        <td>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <form method="post">
                                                <a href="Modificar" type=" submit" name="accion2" value="Modificar"
                                                    class="btn btn-small btn-warning" style="color:black;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalEditar{{ $item->idVisi }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                    </svg>Modificar</a>

                                                <a href="{{ route('prueba.delete', $item->idVisi) }}"
                                                    onclick="return res()" class="btn btn-danger btn-sm"
                                                    style="color:black;"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg>Eliminar</a>
                                            </form>
                                        </td>


                                        <!-- Modal de modificar Datos del Visitante -->
                                        <div class="modal fade" id="ModalEditar{{ $item->idVisi }}" tabindex="-1"
                                            aria-labelledby="ModalEditarLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModelLabel">Modificar
                                                            Datos del Visitante</h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('prueba.update') }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="hidden" name="txtidVisi" id="txtidVisi"
                                                                    value="{{ $item->idVisi }}" />
                                                            </div>



                                                            <div class="mb-3">
                                                                <label
                                                                    for="exampleInputNombre"class="form-label">Nombre</label>
                                                                <input type="text"class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" name="txtNombre"
                                                                    value="{{ $item->nombre }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputApellido"
                                                                    class="form-label">Apellido</label>
                                                                <input type="text"class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" name="txtApellido"
                                                                    value="{{ $item->apellido }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label
                                                                    for="exampleInputEmail"class="form-label">Email</label>
                                                                <input type="email"class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" name="txtEmail"
                                                                    value="{{ $item->email }}">
                                                                <div id="emailHelp" class="form-text">We'll never
                                                                    share your email with anyone
                                                                    else.</div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputFecha"
                                                                    class="form-label">Fecha de Nacimiento</label>
                                                                <input type="date"class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" name="txtFecha"
                                                                    value="{{ $item->fecha_nac }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputTelefono"
                                                                    class="form-label">Telefono</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" name="txtTelefono"
                                                                    value="{{ $item->telefono }} ">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label
                                                                    for="exampleInputPassword1"class="form-label">Password</label>
                                                                <input type="password"
                                                                    class="form-control"id="exampleInputPassword1"
                                                                    name="txtPassword1" value="{{ $item->contra }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label
                                                                    for="exampleInputPassword2"class="form-label">Confirmar
                                                                    Password</label>
                                                                <input type="password"
                                                                    class="form-control"id="exampleInputPassword2"
                                                                    name="txtPassword2" value="{{ $item->contra }}">
                                                            </div>

                                                            <div>
                                                                <label for="lang">Categoria</label>
                                                                <select name="Cate" id="lang">
                                                                    <option value="{{ $item->categoria }}">Selecciona
                                                                        una Categoria
                                                                    </option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Visitante">Visitante General
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Modificar</button>
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
            </i>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
    </div>
</body>

</html>
