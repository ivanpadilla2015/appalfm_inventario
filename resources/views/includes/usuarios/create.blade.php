         
           <div class="modal fade bs-example-modal-md" id="create-item" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h2 class="modal-title" id="myModalLabel">Crear Usuario</h2>
                        </div>
                        <div class="modal-body">

                       <form  v-on:submit.prevent="createItem" class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" name="name" class="form-control col-md-7 col-xs-12" v-model="newItem.name">
                            </div>
                             <span class="text-danger">@{{ formErrors.name?formErrors.name[0]:"" }}</span>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="email" required="required" class="form-control col-md-7 col-xs-12" v-model="newItem.email">
                            </div>
                            <span class="text-danger">@{{ formErrors.email?formErrors.email[0]:"" }}</span>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Telefono</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefono" v-model="newItem.telefono">
                              <span class="text-danger">@{{ formErrors.telefono?formErrors.telefono[0]:"" }}</span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password"  required="required" name="password" class="form-control col-md-7 col-xs-12" v-model="newItem.password">
                            </div>
                            <span class="text-danger">@{{ formErrors.password?formErrors.password[0]:"" }}</span>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Confirmar Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" required="required" name="password_confirmation" class="form-control col-md-7 col-xs-12" v-model="newItem.password_confirmation">
                            </div>
                              <span class="text-danger">@{{ formErrors.password_confirmation?formErrors.password_confirmation[0]:"" }}</span>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <div class="text-center">
                                <button class="btn btn-primary" type="reset">Limpiar</button>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                              </div>
                            </div>
                          </div>
                          
                    </form>
       
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                         
                        </div>

                      </div>
                    </div>
                  </div>
        