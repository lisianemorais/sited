@extends('layouts.front')

@section('content')
    <section class="box">
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex flex-column summary" >
                    <div class="p-2 bd-highlight back-green">
                    <h3 style="text-align: center; color:white">{{strtoupper($mes)}}</h3>
                    </div>
                    <div class="p-2 bd-highlight back-white summary-body">
                    <p> TEDs Agendadas: R$ {{ $sumMonth }} </p>
                    </div>
                </div>
                <div class="col-md-9 list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Finalidade</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teds as $t)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($t->date)->format('d/m/Y')}}</td>
                                    <td>{{$t->description}}</td>
                                    <td>{{$t->purpose->description}}</td>
                                    <td>R$ {{number_format($t->amount, 2, ',', '.')}}</td>
                                    <td>   
                                        <div class="btn-group">
                                            <button type="submit" onclick="deletarTed({{$t}})" class="btn btn-sm btn-danger" id="teste">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$teds->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script')
    <script type="text/javascript">
        function deletarTed(ted) 
        {
            let id = ted.id
            swal({
                title: "Tem certeza?",
                text: "Uma vez deletada, a TED não poderá ser recuperada !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'DELETE',
                        dataType: 'json',
                        url: `/destroy/${id}`,
                        async: true,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id},
                        success: function(response) {
                            swal("TED deletada com sucesso!", {
                                icon: "success",
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }
                    });
                } else {
                    swal("Exclusão cancelada!");
                    return false;
                }
            });
        }
    </script>
@endsection
