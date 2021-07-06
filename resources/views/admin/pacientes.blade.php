@extends('admin.layouts.main')

@section('contenido')

<!--Tabla para mostrar medidas-->
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
                        <th>Peso</th>
                        <th>% grasa</th>
                        <th>BMI</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->weight}}</td>
                        <td>{{$p->fat_per}}</td>
                        <td>{{$p->bmi}}</td>
                        <td>
                            <button class="btn btn-primary btnData" data-id="{{ $p->id}}" data-name="{{$p->name}}"
                                data-toggle="modal" data-target="#modal-add">
                                <i class="fa fa-user"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal-patient-data -->
<div class="modal fade" id="modal-add" style="display: none;" 
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar mediciones</h4>
                    <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/admin/pacientes" method="POST" enctype="multipart/form-data">
                    @if($message= Session::get('errorData'))
                        <div class="alert alert-danger aler-dismissable fade show col-12" role="alert">
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
                        <input type="hidden" id="idData" name="id_user"> 
                        <input type="hidden" class="form-control" id="nameData" name="name">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="text" class="form-control" id="weight" name="weight">
                        </div>
                        <div class="form-group">
                            <label for="grasa">Porcentaje Grasa</label>
                            <input type="text" class="form-control" id="fat_per" name="fat_per">
                        </div>
                        <div class="form-group">
                            <label for="nombre">BMI</label>
                            <input type="text" class="form-control" id="bmi" name="bmi">
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
<!-- /.modal-patient-data -->


<!--Grafica-->
<style>
.chart-container {
    width: 50%;
    height: 50%;
    margin: auto;
}
</style>
<div class="card chart-container">
    <canvas id="chart"></canvas>
</div>

@endsection

@section('scripts')
<script>

var idData = -1;
@if($message = Session::get('errorData'))
$("#modal-add").modal('show');
@endif

$(".btnData").click(function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var weight = $(this).data('weight');
    $("#idData").val(id);
    $("#nameData").val(name);
})


const ctx = document.getElementById("chart").getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Enero", "Febrero", "Marzo",
            "Abril", "Mayo", "Junio", "Julio"
        ],
        datasets: [{
            label: 'Peso',
            backgroundColor: 'rgba(161, 198, 247, 1)',
            borderColor: 'rgb(47, 128, 237)',
            data: [{{$p->weight}}, {{$p->weight}}, {{$p->weight}}, {{$p->weight}}, {{$p->weight}}, {{$p->weight}}, {{$p->weight}}],
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }]
        }
    },
});
</script>
@endsection