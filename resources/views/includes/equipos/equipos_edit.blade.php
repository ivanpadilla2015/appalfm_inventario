 <modal  :show.sync="modalEdit" effect="zoom"  width="80%" :backdrop=false>
	<div slot="modal-header" class="modal-header">
	    <h4 class="modal-title">  <code>Editando Inventario No :</code> @{{ fillItem.id }} </h4>
	</div>
	<div slot="modal-body" class="modal-body">
			
		<form id="demo-form2"  class="form-horizontal form-label-left"   v-on:submit.prevent="actualizaInventario(fillItem.id)">

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
                        <button type="submit" title="Actualizar Inventario" class="btn btn-success">Actualizar</button>
                        
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
                                     
                                      <td class=" ">@{{ item.element.nombrelement}}</td>
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
                          </div>
                        </form>

	</div>
	<div slot="modal-footer" class="modal-footer">
	   <button type="button" class="btn btn-default" @click="salirModal">Salir</button>
  </div>
</modal>






