@extends('layouts.blank')

@push('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endpush

@section('main_container')

<div class="right_col" role="main" >

                   <div class="col-md-12 col-sm-12 col-xs-12" id="app">
                         
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Dependencias</h2>
                               <div class="text-center">
									               <button class="btn btn-default" @click="modalIsOpen = true">Crear Dependencia</button>
							                </div>
						                              
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

                           <div id="capa_tabla"  style="display: none;">
                            <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                              
                                <thead>
                                  <tr class="headings">
                                   
                                    <th class="column-title">Nombre </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
								
	                                <tbody>
	                                  <tr  v-for="depe in depends ">
	                                   
	                                    <td class=" ">@{{ depe.nombredepen }}</td>
	                                    <td class=" last">
	                                     
	                                    <a href="#" v-on:click="editdepen(depe)" title="Editar"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

	                                    <a href="#" v-on:click="deletedepen(depe)" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

	                                    </td>
	                                  </tr>
	                                 
	                                </tbody>
	                            
                              </table>
                                    <!-- Pagination -->
                                    @include('includes.pagination')
                             </div>
                          </div><!--  fin capa_tabla   -->          
                                
                          </div><!-- x_Content -->
                        </div>
                            <div id="capa_modal"  style="display: none;"> <!--//modals -->
                                    @include('includes.dependen.create')
                                    @include('includes.dependen.edit')
							              </div>
                      </div> <!-- /fin de App -->
            </div>  
    <!-- /page content -->

       
       
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@2.3.3/dist/vue.js"></script>
    <script src="{{ asset('js/vue-strap.min.js') }}"></script>
    <script src="{{ asset('js/depen_vue.js?v=1') }}"></script>
 @endpush
