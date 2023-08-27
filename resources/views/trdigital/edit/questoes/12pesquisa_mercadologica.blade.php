 {{-- ITEM 7 --}}
 {!! Form::close() !!}

 <div class="tab-pane fade" id="list-pesquisa" role="tabpanel" aria-labelledby="list-pesquisa">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title"> <big> <b> 12. </b> </big>Pesquisa Mercadológica</b></h5>

             <!-- Floating Labels Form -->
             <div class="card">
                 <div class="card-body">

                     <h5 class="card-title text-center">CADASTRO DE PESQUISA MERCADOLÓGICA</h5>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                         data-bs-target="#novo_pesquisa_mercadologica">
                         + Novo Registro
                     </button>
                     
                     @foreach ($pesquisa_mercadologica as $pesquisa)
                     <div class="col-md-6">
                         <div class="card mb-4">
                             <div class="card-body">
                                 <h5 class="card-title text-center">Descrição do Bem: <b> <u>
                                             {{ $pesquisa->Descricao_bem ?? '' }} </u></b></h5>
                                 @php
                                     $valorTotal = 0; // Inicializa o valor total
                                     $numRegistros = count($pesquisa->pesquisa_mercadologica_pivots); // Obtém o número total de registros
                                 @endphp
                                 @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
                                     <h6 class="card-subtitle mb-2 text-dark">Empresa: <b
                                             class="text-primary">{{ $pivot->Empresa ?? '' }}</b></h6>
                                     <h6 class="card-subtitle mb-2 text-primary">Valor Unid.: <b
                                             class="text-danger">R$ {{ $pivot->Valor ?? '' }}</b></h6>
                                     <h6 class="card-subtitle mb-2 text-primary">Quantidade: <b
                                             class="text-dark">{{ $pesquisa->Qtd ?? '' }}</b></h6>
                                     <h6 class="card-subtitle mb-2 text-primary">Total: <b
                                             class="text-danger">R$
                                             {{ $pivot->Valor * $pesquisa->Qtd }} </b></h6>
                                     @php
                                         $valorTotal += $pivot->Valor * $pesquisa->Qtd; // Adiciona o valor total atual
                                     @endphp
                                     <h6 class="card-subtitle mb-2 text-dark">Comprovante:
                                         @if ($pivot->Anexo == '')
                                             <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                                             Documento não enviado
                                         @else
                                             <i class="bi bi-file-earmark-pdf-fill text-success"></i>
                                             Documento enviado
                                             <a class="btn btn-primary btn-sm"
                                                 href="{{ asset('storage/' . $pivot->Anexo) }}"
                                                 target="_blank">
                                                 {{-- <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->Pesquisa_mercadologica) }}"
                                             target="_blank"> --}}
                                                 <i class="bi bi-file-earmark-pdf-fill"></i> Ver anexo
                                             </a>
                                         @endif
                                         <br>
                                         <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                             data-bs-target="#editar_pesquisamercadologica{{ $pivot->id ?? '' }}Editar"
                                             data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                             Editar
                                         </button>
                                         <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                             data-bs-target="#excluir_pesquisamercadologica{{ $pesquisa->id ?? '' }}"
                                             data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                             Excluir
                                         </button>
                                         <hr>
                                 @endforeach

                                 @php
                                     $valorTotalMedio = $valorTotal / $numRegistros;
                                 @endphp

                                 <h6 class="card-subtitle mb-2 text-primary">Valor Total Médio: <b
                                         class="text-danger"> R$ {{ number_format($valorTotalMedio, 2) }} </b>
                                 </h6>

                                 </h6>


                             </div>
                         </div>
                         <!-- End Card with titles, buttons, and links -->
                     </div>
                 @endforeach
                 </div>

                 @include('trdigital.edit.questoes.12pesquisamercadologica.criarpesquisamercadologica')
                 @include('trdigital.edit.questoes.12pesquisamercadologica.editarpesquisamercadologica')
                 @include('trdigital.edit.questoes.12pesquisamercadologica.excluirpesquisamercadologica')


                    </main>
