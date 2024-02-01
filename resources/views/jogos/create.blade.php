@extends('layouts.app')

@section('title','Criação')

@section('content')
    <!-- Tudo aqui dentro vai ser renderizado lá no template app.blade.php-->
    <div class="container mt-5">
        <h1>Crie um novo jogo</h1>
        <hr>
        <form action=" {{ route('jogos-store') }} " method="POST">
        <!-- csrf - falsicação de solitação entre os sites. Segurança com tokens -->
        @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome...">
                </div>
                <br>
                <div class="form-group">    
                    <label for="categoria">Categoria:</label>
                    <input type="text" class="form-control" name="categoria" placeholder="Digite uma categoria para o jogo...">
                </div>
                <br>
                <div class="form-group">
                    <label for="ano_criacao">Ano de Criação:</label>
                    <input type="text" class="form-control" name="ano_criacao" placeholder="Ano de criação..." maxlength="4">
                </div>
                <br>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="number" class="form-control" name="valor" placeholder="Digite um valor para o jogo...">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
