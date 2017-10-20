@extends('layouts.blank')

@push('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
@endpush

@section('main_container')
 
<div class="right_col" role="main" >

                   <div class="col-md-12 col-sm-12 col-xs-12" id="app">
                         
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Listado de Inventarios</h2>
                              
                                          
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
                                     
                                      <th class="column-title">Num </th>
                                      <th class="column-title">Funcionario </th>
                                      <th class="column-title">Dependencia </th>
                                      <th class="column-title no-link last"><span class="nobr">Action</span>
                                      </th>
                                      <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                    </tr>
                                  </thead>
                  
                                    <tbody>
                                         <tr  v-for="inv in inven ">
                                           <td class=" ">@{{ inv.id }}</td>
                                           <td class=" ">@{{ inv.user.name }}</td>
                                           <td class=" ">@{{ inv.dependen.nombredepen }}</td>
                                           <td class=" last">
                                       
                                            <a href="#" v-on:click="editinven(inv)" title="Editar"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                            <a href="#" v-on:click="deleteinven(inv)" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                           </td>
                                         </tr>
                                    </tbody>
                                
                                </table>
                                     <!-- Pagination -->
                                     @include('includes.pagination')
                               </div>

                             </div> <!-- fin capa -->  
                                

                          </div><!-- x_Content -->
                        </div>
                             <div id="capa_modal"  style="display: none;"> <!--//modals -->
                                    @include('includes.equipos.equipos_edit')
                                    @include('includes.equipos.create')
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
    <script src="{{ asset('js/moment.js') }}"></script> 
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@2.3.3/dist/vue.js"></script>
    <script src="{{ asset('js/vue-strap.min.js') }}"></script>
    <script src="{{ asset('js/vee-validate.js')}}"></script>
    <script src="{{ asset('js/equips_list.js?v=1') }}"></script>
    <script type="text/javascript">
            $(function() {
                $('#single_cal4').daterangepicker({
                    singleDatePicker: true,
                    locale: { format: 'MM/DD/YYYY'}
                     
                });
            });
    </script>
 @endpush
