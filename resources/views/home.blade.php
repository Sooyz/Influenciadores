@extends('layouts.app')
<style>
    .infoContainer{
        display:flex;
        justify-content: center;
        align-items:center;
    }
    .infoCard{
        width: 663px;

        background: #FFFFFF;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        display: flex;
        align-content: center;
        justify-content: center;
    }
    .insta{
        width: 100%;
    }
    .foto{
        display:flex;
        flex-flow:column;
        align-items:center;
        justify-content:center;
    }
    img{
        border-radius:50%;
    }
    .infoDetail{
        margin-top:2rem;
        display:grid;
        grid-template-columns:1fr 1fr;
        grid-template-rows:1fr 1fr 1fr 1fr;
        padding:2rem;
    }
    h4{
        justify-self: left;
    }
    p{
        justify-self:right;
    }
    .loader{
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .c-loader {
        animation: is-rotating 1s infinite;
        border: 6px solid #e5e5e5;
        border-radius: 50%;
        border-top-color: #51d4db;
        height: 50px;
        width: 50px;
    }

    @keyframes is-rotating {
        to {
            transform: rotate(1turn);
        }
    }

    .gridBlock{
        margin-top:2rem;
        display:grid;
        grid-template-columns:1fr 1fr;
        grid-template-rows:1fr 1fr 1fr 1fr;
        padding:2rem;
    }
    .err{

        display:flex;
        flex-flow:column;
        align-items:center;
        justify-content: center;
        height:500px;
    }
    .err h4{
        text-align: center;
    }
</style>
@section('content')
        <div class="infoContainer">
            <div class="infoCard">
                <div class="loader">
                    <div class="c-loader"></div>
                </div>
                @if ($info['type'] == 'Instagram')
                    <div class="insta">
                        <div class="foto">
                            <img id="imgProfile" src=""/>
                            <h1>{{$info['user']}}</h1>
                        </div>
                        <div class="infoDetail">
                            <h4>Seguidores:</h4>
                            <p id="seguidores">123123</p>
                            <h4>Seguindo:</h4>
                            <p id="seguindo">3212</p>
                            <h4>Data Nascimento:</h4>
                            <p>{{date('d/m/Y', strtotime($info['dt_nascimento']));}}</p>
                            <h4>Nome:</h4>
                            <p>{{$info['name']}}</p>
                        </div>
                    </div>
                    <div class="err" id="notFound">
                        <h4>Usuário não encontrado</h4>
                        <div class="gridBlock">
                            <h4>Usuário</h4>
                            <p>{{$info['user']}}</p>
                            <h4>Data Nascimento:</h4>
                            <p>{{date('d/m/Y', strtotime($info['dt_nascimento']));}}</p>
                            <h4>Nome:</h4>
                            <p>{{$info['name']}}</p>
                        </div>
                    </div>
                    <div class="err" id="private">
                        <h4>Conta Privada</h4>
                        <div class="gridBlock">
                            <h4>Usuário</h4>
                            <p>{{$info['user']}}</p>
                            <h4>Data Nascimento:</h4>
                            <p>{{date('d/m/Y', strtotime($info['dt_nascimento']));}}</p>
                            <h4>Nome:</h4>
                            <p>{{$info['name']}}</p>
                        </div>
                    </div>
                @else
                    <div class="">

                    </div>
                @endif
            </div>
        </div>
@endsection
@section('scriptb')
<script>
      $(document).ready(function($){
        $('.insta').hide();
        $('#notFound').hide();
        $('#private').hide();

        const user = "{{$info['user']}}";

        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://instagram130.p.rapidapi.com/account-info?username="+user,
            "method": "GET",
            "headers": {
                "x-rapidapi-host": "instagram130.p.rapidapi.com",
                "x-rapidapi-key": "189c37cdf2msh7520eff0054db60p1c03cejsna3fd495791a5"
            }
        };

        $.ajax(settings).done(function (response) {
            $(".loader").hide();
            if(response.blocked_by_viewer)
            {
                $('#private').show();
            }else{
                $('.insta').show();
                $("#seguidores").html(response.edge_followed_by.count);
                $("#seguindo").html(response.edge_follow.count);
                $("#imgProfile").attr('src',response.profile_pic_url_hd);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $(".loader").hide();
            $('#notFound').show();
        });

      });
</script>
@endsection
