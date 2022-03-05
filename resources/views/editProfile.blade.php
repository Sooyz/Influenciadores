@extends('layouts.app')
<style>
    input{
        margin-top:10rem;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header info">{{ __('Perfil') }}</div>
                <div class="card-body">
                    <form method="POST" action="/profile">
                        @csrf

 			            <label class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"/>

                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="{{Auth::user()->cpf}}"/>

                        <label class="form-label">Rede Social</label>
                        <select name="social_id" class="form-select" name="" id="">
                            <option value="1">Instagram</option>
                            <option value="2">Facebook</option>
                            <option value="3">TikTok</option>
                        </select>

                        <label class="form-label">Usuário (Rede Social)</label>
                        <input type="text" name="user" class="form-control" value="{{Auth::user()->user}}"/>

                        <label class="form-label">Data de nascimento</label>
                        <input type="date" name="dt_born" class="form-control" value="{{Auth::user()->dt_born}}"/>

                        <br/>
                        <button type="submit" class="btn btn-success">Enviar</button>
                        <a href="/profile"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptb')
<script>
      $(document).ready(function($){
          $("select option[value='{{Auth::user()->social_id}}']").attr("selected","selected");
          $('#cpf').mask('000.000.000-00');
      });
</script>
@endsection
