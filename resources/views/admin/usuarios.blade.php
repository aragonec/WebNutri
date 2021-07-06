@extends('admin.layouts.main')

@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <button class="btn btn-outline-primary btn-sm" 
                        data-toggle="modal" data-target="#modal-add">
                        <i class="fa fa-plus"> Agregar usuarios</i> 
                        </button>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="cointaner-fluid">
        <div class="row">
            @if($message= Session::get('Listo'))
                <div class="alert alert-success alert-dismissable fade show col-12" role="alert">
                    <h5>Listo:</h5>
                    <p>{{$message}}</p>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Modalidad</th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $u)
                    <tr>
                        <td>
                            <a href="/admin/pacientes/{{ $u->id }}"><img src="{{ asset('img/usuarios/'.$u->img_profile)}}" alt="" width="70px"></a>
                            {{$u->name}}
                        </td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->telefono}}</td>
                        <td>{{$u->modalidad}}</td>
                        
                        <td>
                            
                            <button class="btn btn-primary btnEdit" 
                            data-id="{{ $u->id}}"
                            data-name="{{$u->name}}"
                            data-email="{{$u->email}}"
                            data-telefono="{{$u->telefono}}"
                            data-modalidad="{{$u->modalidad}}"
                            data-password="{{$u->password}}"
                            data-level="{{$u->level}}"
                            data-toggle="modal" data-target="#modal-edit"> 
                            <i class="fa fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btnEliminar" 
                            data-id="{{ $u->id}}"
                            data-toggle="modal" data-target="#modal-delete"> 
                            <i class="fa fa-trash"></i>
                            </button>
                            <form class= "d-none" action="{{ url('/admin/usuarios', ['id'=>$u->id]) }}" 
                            method="POST" id="formEliminar_{{ $u->id}}">
                            @csrf
                            <input type="text" name="id" value="{{ $u->id}}">
                            <input type="text" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal-Edit -->
<div class="modal fade" id="modal-edit" style="display: none;" 
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuarios</h4>
                    <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/admin/usuarios/edit" method="POST" enctype="multipart/form-data">
                    @if($message= Session::get('errorEdit'))
                        <div class="alert alert-danger alert-dismissable fade show col-12" role="alert">
                            <h5>ERROR:</h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="idEdit" name="id">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nameEdit" name="name" value="{{ @old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="emailEdit" name="email" value="{{ @old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telEdit" name="telefono" value="{{ @old('telefono')}}">
                        </div>
                        <div class="form-group">
                            <label for="modalidad">Modalidad</label>
                            <input type="text" class="form-control" id="modaEdit" min="0" name="modalidad" value="{{ @old('modalidad')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="passEdit" min="0" name="password" value="{{ @old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="level">Nivel</label>
                            <input type="text" class="form-control" id="levelEdit" name="level" value="{{ @old('level')}}">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Foto del Usuario</label>
                        </div>
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="imgEdit" name="img_profile" value="{{ @old('img_profile')}}">
                            <label class="custom-file-label" for="customFile">Selecciona imagen</label>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">
                            Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal-edit -->

<!-- Modal-add -->
<div class="modal fade" id="modal-add" style="display: none;" 
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/admin/usuarios" method="POST" enctype="multipart/form-data">
                    @if($message= Session::get('errorInsert'))
                        <div class="alert alert-danger alert-dismissable fade show col-12" role="alert">
                            <h5>ERROR:</h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" min="1" name="telefono">
                        </div>
                        <div class="form-group">
                            <p style="font-weight: bold;">Modalidad</p>
                            <input type="radio" id="modalidad" name="modalidad" value="online">
                            <label for="online">Online</label>
                            <input type="radio" id="modalidad" name="modalidad" value="presencial">
                            <label for="presencial">Presencial</label><br>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" min="1" name="password">
                        </div>
                        <div class="form-group">
                        <p style="font-weight: bold;">Nivel</p>
                            <input type="radio" id="level" name="level" value="admin">
                            <label for="admin">Administrador</label>
                            <input type="radio" id="level" name="level" value="paciente">
                            <label for="paciente">Paciente</label><br>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Foto del Usuario</label>
                        </div>
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="img_profile" name="img_profile">
                            <label class="custom-file-label" for="customFile">Selecciona imagen</label>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">
                            Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal-add -->


<!-- Modal-delete -->
<div class="modal fade" id="modal-delete" style="display: none;" 
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <h2 class="h6">¿Desea eliminar al usuario?</h2>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger btnCloseEliminar">Eliminar</button>
                    </div>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-delete -->




@endsection

@section('scripts')
    <script>
        var idEliminar=-1;
        var idData=-1;
        $(document).ready(function(){
            @if($message= Session::get('errorInsert'))
                $("#modal-add").modal('show');
            @endif
            @if($message= Session::get('errorEdit'))
                $("#modal-edit").modal('show');
            @endif
            @if($message= Session::get('errorData'))
                $("#modal-data").modal('show');
            @endif
            $(".btnEliminar").click(function(){
                var id=$(this).data('id');
                idEliminar=id;
            })
            $(".btnData").click(function(){
                var id=$(this).data('id');
                var name=$(this).data('name');
                $("#idData").val(id);
                $("#nameData").val(name);
            })
            $(".btnCloseEliminar").click(function(){
                $("#formEliminar_"+idEliminar).submit();
            });            
            $(".btnEdit").click(function(){
                var id=$(this).data('id');
                var name=$(this).data('name');
                var email=$(this).data('email');
                var tel=$(this).data('telefono');
                var moda=$(this).data('modalidad');
                var level=$(this).data('level');
                var pass=$(this).data('password');
                $("#idEdit").val(id);
                $("#nameEdit").val(name);
                $("#emailEdit").val(email);
                $("#telEdit").val(tel);
                $("#modaEdit").val(moda);
                $("#levelEdit").val(level);
                $("#passEdit").val(pass);
            });
            
        });

    </script>
@endsection 