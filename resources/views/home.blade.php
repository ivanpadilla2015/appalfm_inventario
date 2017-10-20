@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <link href=" <link href="{{ asset("css/https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.cssmyFile.min.css") }}" rel="stylesheet">" rel="stylesheet">
@endpush

@section('main_container')
    
            <!-- page content -->
            <div class="right_col" role="main" >

                   <div class="col-md-12 col-sm-12 col-xs-12" id="app">
                         
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Usuarios <small>Con Inventario</small></h2>
                               <div class="text-center"><button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-md">Crear Usuarios</button></div>
                              
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                               
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>

                          <div class="x_content">

                           
                            <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                   
                                    <th class="column-title">Nombre </th>
                                    <th class="column-title">Correo </th>
                                    <th class="column-title">Telefonos</th>
                                    <th class="column-title text-center">Cant Equipos</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <tr  v-for="use in usuarios ">
                                   
                                    <td class=" ">@{{ use.name }}</td>
                                    <td class=" ">@{{ use.email }}</td>
                                    <td class=" ">@{{ use.telefono }}</td>
                                    <td class="text-center"></td>
                                    <td class=" last">
                                     
                                    <a href="#" v-on:click="editItem(use)" title="Editar"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a href="#" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                    </td>
                                  </tr>
                                 
                                </tbody>
                              </table>
                                    <!-- Pagination -->

                                        <nav>

                                            <ul class="pagination">

                                                <li v-if="pagination.current_page > 1">

                                                    <a href="#" aria-label="Previous"

                                                       @click.prevent="changePage(pagination.current_page - 1)">

                                                        <span aria-hidden="true">«</span>

                                                    </a>

                                                </li>

                                                <li v-for="page in pagesNumber"

                                                    v-bind:class="[ page == isActived ? 'active' : '']">

                                                    <a href="#"

                                                       @click.prevent="changePage(page)">@{{ page }}</a>

                                                </li>

                                                <li v-if="pagination.current_page < pagination.last_page">

                                                    <a href="#" aria-label="Next"

                                                       @click.prevent="changePage(pagination.current_page + 1)">

                                                        <span aria-hidden="true">»</span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </nav>
                            </div>
                                    
                                
                          </div>
                        </div>
                            @include('includes.usuarios.create')
                      </div> <!-- /fin de App -->
            </div>  
    <!-- /page content -->

       
       @include('includes.usuarios.edit')    
     <!-- footer content -->
    <footer>
        <div class="pull-right">
            Inventario - Equipos by <a href="https://www.agencialogistica.gov.co">Agencia logistica De las Fuerzas Militares</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
@endsection

 @push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@2.3.3/dist/vue.js"></script>
    <script src="{{ asset('js/usu_vue.js?v=2') }}"></script>

 @endpush
