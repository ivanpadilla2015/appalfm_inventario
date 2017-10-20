@extends('layouts.blank')

@push('stylesheets')
  
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
   <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
@endpush

@section('main_container')
    
            <!-- page content -->
            <div class="right_col" role="main" >

                   <div class="col-md-12 col-sm-12 col-xs-12" id="app">
                         
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Asignar Equipos: <small> a Usuarios</small></h2>
                               
                              
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
                    <br>
                    <form id="demo-form2"  class="form-horizontal form-label-left"   v-on:submit.prevent="crearInventario()">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="selectuser" v-model="selectuser" class="form-control col-md-7 col-xs-12" >
                                 <option value="">Seleccionar ........</option>
                                 <option v-for="option in users" v-bind:value="option.id">
                                    @{{ option.name }}
                                  </option>
                            </select>
                            <span v-if="selectuser == '' " v-for="error in formErrors.user_id" class="error text-danger"> @{{ error }}</span>
                          </div>
                      </div>
                     
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Dependencia  <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="selected" v-model="selected" class="form-control col-md-7 col-xs-12">
                                 <option value="">Seleccionar ........</option>
                                 <option v-for="option in depens" v-bind:value="option.id">
                                    @{{ option.nombredepen }}
                                  </option>
                            </select>
                            <span v-if="selected == '' " v-for="error in formErrors.dependen_id" class="error text-danger"> @{{ error }}</span>
                         </div>
                      </div>
                      <button class="btn btn-default" type="button" @click="modalIsOpen = true" >Agregar Detalle</button>
                      <div class="pull-right">
                        <button class="btn btn-primary" type="reset">Limpiar</button>
                        <button type="submit" class="btn btn-success">Crear</button>
                      </div>
                      <div class="ln_solid"></div>

                      <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                              
                                <thead>
                                  <tr class="headings">
                                   
                                    <th class="column-title">Nombre </th>
                                    <th class="column-title">Marca </th>
                                    <th class="column-title">Modelo </th>
                                    <th class="column-title">Serial </th>
                                    <th class="column-title">Cantidad</th>
                                    <th class="column-title">Activo </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                  </tr>
                                </thead>
                
                                  <tbody>
                                    <tr  v-for="item, index in regis">
                                     
                                      <td class=" ">@{{ item.nombre}}</td>
                                      <td class=" ">@{{ item.marca}}</td>
                                      <td class=" ">@{{ item.modelo}}</td>
                                      <td class=" ">@{{ item.serial}}</td>
                                      <td class=" ">@{{ item.cantidad}}</td>
                                      <td class=" ">@{{ item.num_activo}}</td>
                                      <td class=" last">
                                        <a href="#" v-on:click="eliminarItem(index)" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                      </td>
                                    </tr>
                                   
                                  </tbody>
                              
                              </table>



                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                   
                                </div>
                              </div>

                        </form>
                 
                             

                        </div> <!-- x_Content -->
                          @include('includes.equipos.create')
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
    <script src="{{ asset('js/equips_vue.js?v=1') }}"></script>
    <script type="text/javascript">
            $(function() {
                $('#single_cal4').daterangepicker({
                    singleDatePicker: true
                     
                });
            });
    </script>
            
 @endpush
