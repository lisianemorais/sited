@extends('layouts.front')

@section('content')
    <section class="box">
        <div class="container">
            <div class="row">
                <div id="formulario-ted" class="col-md-12 d-flex flex-column">
                    <div class="rounded box-ted" id='sender' >
                        <h4>Dados do Remetente</h4>
                        <div class="form-group">
                            <label>Banco</label>
                            <select name="bank" id="bank" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->code}} - {{$bank->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="agency">Agência</label>
                                <input type="text" class="form-control" id="agency" maxlength="4"  onkeypress="return onlynumber();" placeholder="Agência">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="account-sender">Conta</label>
                                <input type="text" class="form-control" id="account-sender" maxlength="10" onkeypress="return onlynumber();" placeholder="Conta">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="account-type">Tipo de Conta</label>
                                <select id="account-type" class="form-control" id="ano">
                                    <option value="">Selecione</option>
                                    @foreach($accountTypes as $accountType)
                                        <option value="{{$accountType->id}}">{{$accountType->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do remetente">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="document-type">Tipo de Documento</label>
                                <select id="document-type" class="form-control" onchange="setMaskDoc('#document','#document-type')">
                                    <option value="1">CPF</option>
                                    <option value="2">CNPJ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="document">Documento</label>
                                <input type="text" id="document"  name="document" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="rounded box-ted" id='receiver' >
                        <h4>Dados do Destinatário</h4>
                        <div class="form-group">
                            <label>Banco</label>
                            <select name="bank-receiver" id="bank-receiver" class="form-control">
                                <option value="">Selecione</option>
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->code}} - {{$bank->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="agency-receiver">Agência</label>
                                <input type="text" class="form-control" id="agency-receiver" maxlength="4" onkeypress="return onlynumber();"  placeholder="Agência">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="account-receiver">Conta</label>
                                <input type="text" class="form-control" id="account-receiver" maxlength="10" onkeypress="return onlynumber();"  placeholder="Conta">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="account-type-receiver">Tipo de Conta</label>
                                <select id="account-type-receiver" class="form-control" id="ano">
                                    <option value="">Selecione</option>
                                    @foreach($accountTypes as $accountType)
                                        <option value="{{$accountType->id}}">{{$accountType->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name-receiver">Nome</label>
                            <input type="text" name="name-receiver" class="form-control" id="name-receiver" placeholder="Nome do destinatário">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="document-type-receiver">Tipo de Documento</label>
                                <select id="document-type-receiver" class="form-control"  onchange="setMaskDoc('#document-receiver','#document-type-receiver')">
                                    <option value="1">CPF</option>
                                    <option value="2">CNPJ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="document-receiver">Documento</label>
                                <input type="text" name="document-receiver" id="document-receiver" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="purpose">Finalidade</label>
                                <select id="purpose" class="form-control" id="ano">
                                    <option value="">Selecione</option>
                                    @foreach($purposes as $purpose)
                                        <option value="{{$purpose->id}}">{{$purpose->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="description">Descrição</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Descrição da transferência">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="date">Data do Agendamento</label>
                                <input type="data"  name="date" id="date" class="form-control" value='<?php echo date("d/m/Y"); ?>'>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount">Valor da tranferência</label>
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="R$ 150,00">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tax">Taxa</label>
                                <input type="text" disabled name="tax" id="tax" class="form-control" value="14,90">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" onclick="agendarTed()" class="btn btn-lg btn-success">Confirmar</button>
                        <a href="{{route('index')}}" class="navbar-brand">
                            <button  class="btn btn-lg btn-secondary " >Cancelar</button>
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </section>
@endsection

@section('page-script')
    <script type="text/javascript">

        $(document).ready( function() {
            $('#date').mask('00/00/0000');
            $('#tax').mask('000.000.000.000.000,00', {reverse: true});
            $('#amount').mask('000.000.000.000.000,00', {reverse: true});
            //Sender
            setMaskDoc("#document" , "#document-type");
            //Receiver
            setMaskDoc("#document-receiver" , "#document-type-receiver");
        })
        

        function agendarTed()
        {   
            //Valida campos obrigatórios
            let validaCampos = validaCamposObrigatorios()

            if (validaCampos) {
                swal({
                    title: "Atenção",
                    text: "Campos obrigatórios devem ser preenchidos",
                    icon: "warning",
                    button: "Ok",
                })
            } else { 
                let sender = getValuesSender()
                let receiver = getValuesReceiver()
                let ted = getValuesTed()
                swal({
                    title: "Agendamento de TED",
                    text: "Deseja prosseguir com o agendamento da TED?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'post',
                            dataType: 'json',
                            url: `/store`,
                            async: true,
                            data: {
                                "_token": "{{ csrf_token() }}",
                                ted, receiver, sender},
                            success: function(response) {
                                swal("TED agendada com sucesso!", {
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    window.location.href = "/";
                                }, 1000);
                            }
                        });
                    } else {
                        swal("Agendamento cancelado!");
                        return false;
                    }
                });
            }
        }

        function getValuesSender() 
        {
            let sender = {
                "banks_id": $( "#bank" ).val(),
                "agency": $( "#agency" ).val(),
                "account":$( "#account-sender" ).val(),
                'account_types_id': $( "#account-type" ).val(),
                "name" : $( "#name" ).val(),
                "document":  $( "#document" ).val().replace(/\D+/g, '')
            };
            return sender;
        }

        function getValuesReceiver()
        {   
            let  receiver = {
                "banks_id": $( "#bank-receiver" ).val(),
                "agency": $( "#agency-receiver" ).val(),
                "account":$( "#account-receiver" ).val(),
                'account_types_id': $( "#account-type-receiver" ).val(),
                "name" : $( "#name-receiver" ).val(),
                "document": $( "#document-receiver" ).val().replace(/\D+/g, '')
            };
            return receiver
        }

        function getValuesTed()
        {
            let ted = {
                "purpose_id":$( "#purpose" ).val(),
                "description":$( "#description" ).val(),
                "date":$( "#date" ).val(),
                "amount":converteMoedaFloat($( "#amount" ).val()),
                "tax":converteMoedaFloat($( "#tax" ).val())
            }
            return ted
        }

        function validaCamposObrigatorios() {
            let camposSemPreenchimento = false;
            let idCamposForm = [ "#bank-receiver",  "#agency-receiver", "#account-receiver",
                "#account-type-receiver", "#name-receiver", "#document-receiver",
                "#bank", "#agency", "#account-sender", "#account-type", "#name", "#document",
                "#purpose", "#description", "#date", "#amount",  "#tax"
            ]

            idCamposForm.forEach(id => {
                if ($(id).val() == '') {
                    $(id).addClass('campos-obrigatorios');
                    camposSemPreenchimento = true
                }
            });
            return camposSemPreenchimento;
        }
        
        function validarDocumento(id, idDocType) {
            let val = $(id).val().replace(/\D+/g, '').length
            //CPF
            debugger
            if($(idDocType).val() == '1' && val < 11) {
                swal("Insira um CPF válido");
                return true
            }
            //CNPJ
            if($(idDocType).val() == '2' && val < 14) {
                swal("Insira um CNPJ válido");
                return true
            }
            return false
        }

        function onlynumber(evt) {
            let theEvent = evt || window.event;
            let key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            let regex = /^[0-9.]+$/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
        
        function converteMoedaFloat( valor ) {
            if (valor === ""){
                valor =  0;
            }else{
                valor = valor.replace(".","");
                valor = valor.replace(",",".");
            }
            return valor;
        }

        function setMaskDoc(id, idDocType) {
            $(id).val("")
            //CPF
            if($(idDocType).val() == '1') {
                $(id).mask('000.000.000-00', {reverse: true});
            }
            //CNPJ
            if($(idDocType).val() == '2') {
                $(id).mask('00.000.000/0000-00', {reverse: true});
            }
        }
    </script>
@endsection