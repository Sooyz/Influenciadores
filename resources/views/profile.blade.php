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
                        <label class="form-label">Nome</label>
                        <p class="form-control info">{{$info['name']}}</p>


                        <label class="form-label">CPF</label>
                        <p class="form-control info">{{Auth::user()->cpf}}</p>


                        <label class="form-label">Rede Social</label>
                        <p class="form-control info">{{$info['social']}}</p>


                        <label class="form-label">Usuário (Rede Social)</label>
                        <p class="form-control info">{{$info['user']}}</p>


                        <label class="form-label">Data de nascimento</label>
                        <p class="form-control info">{{date('d/m/Y', strtotime($info['dt_born']))}}</p>


                        <a href="/editProfile" class="btn btn-primary info">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('scriptb')
<script>
      $(document).ready(function($){
          $('.edit').hide();
          $("select option[value='{{$info['social_id']}}']").attr("selected","selected");
      });
      function editarPerfil()
      {
        $('.info').hide();
        $('.edit').show();
      }
      function cancelarEdicao()
      {
        $('.info').show();
        $('.edit').hide();
      }
</script>
@endsection --}}
