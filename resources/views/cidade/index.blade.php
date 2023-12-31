@extends('base.novabase')
@section('content')
<?php 
$processoCount = session()->get('processoCount'); 
$processoCount_corrigir = session()->get('processoCount_corrigir'); 
$processoCount_finalizado = session()->get('processoCount_finalizado'); 
$processoCount_aguardando = session()->get('processoCount_aguardando'); 
$processoCount_tramitada = session()->get('processoCount_tramitada'); 
$processoCount_nao_finalizada = session()->get('processoCount_nao_finalizada'); 
?>
    <main id="main" class="main">



        <div class="pagetitle">
            <h1>CIDADES</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                    <li class="breadcrumb-item active">Painel Gerencial</li>
                    <li class="breadcrumb-item active">Cidades</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <a class="btn btn-primary" href="{{ route('cidade.create') }}"> Cadastrar</a>


        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card">

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @elseif ($message = Session::get('edit'))
                            <div class="alert alert-warning">
                                <p>{{ $message }}</p>
                            </div>
                        @elseif ($message = Session::get('delete'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                    </div>
                </div>
                @endif

                <table class='table datatable' id="table1">
                    <thead>

                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    @foreach ($cidade as $cidades)
                        <td>{{ $cidades->Nome }}</td>

                        <td> <a class="btn btn-warning" href="{{ route('cidade.edit', $cidades->id) }}">Editar</a>
                        
                        </td>



                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            </div>

        </section>
        </div>
    </main>
    @endsection
