 <modal  :show.sync="modalIsOpen" effect="fade" width="800" :backdrop=false>
	<div slot="modal-header" class="modal-header">
	    <h4 class="modal-title">  <code>Creando Elemento</code> </h4>
	</div>
	<div slot="modal-body" class="modal-body">
		 <form id="demo-form2"  class="form-horizontal form-label-left"  v-on:submit.prevent="addTabla" >

		      <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Elemento <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="element_id" v-model="newItem.element_id" class="form-control col-md-6 col-xs-12" id="myselect" v-validate="'required'">
                                 <option value="">Seleccionar ........</option>
                                 <option v-for="option in elems" v-bind:value="option.id">
                                    @{{ option.nombrelement }}
                                  </option>
                            </select>
                            <span v-show="errors.has('element_id')">
				    	 		@{{errors.first('element_id')}}
				    	 	</span>
                       </div>
               </div>
               <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marca <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="marca" v-model="newItem.marca" class="form-control col-md-6 col-xs-12" v-validate="'required'">
				    	 <span v-show="errors.has('marca')">
				    	 	@{{errors.first('marca')}}
				    	 </span>
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Modelo <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="modelo" v-model="newItem.modelo" v-validate="'required'" class="form-control col-md-6 col-xs-12">
				    	 <span v-show="errors.has('modelo')">
				    	 	@{{errors.first('modelo')}}
				    	 </span>
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Serial  </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="serial" v-model="newItem.serial" class="form-control col-md-6 col-xs-12">
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cantidad <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="cantidad" v-model="newItem.cantidad" class="form-control col-md-6 col-xs-12" v-validate="'required'">
				    	 <span v-show="errors.has('cantidad')">
				    	 	@{{errors.first('cantidad')}}
				    	 </span>
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activo No <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="num_activo" v-model="newItem.num_activo" class="form-control col-md-6 col-xs-12" v-validate="'required'">
				    	 <span v-show="errors.has('num_activo')">
				    	 	@{{errors.first('num_activo')}}
				    	 </span>
					 </div>
			  </div>
			   <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Adquirio <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	
				    	<input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Fecha que se Adquirio" aria-describedby="inputSuccess2Status4" v-model="newItem.fechadquirido">
				    	<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
				    	
					 </div>
			  </div>
			  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-6">
                <button class="btn btn-primary" type="reset">Limpiar</button>
                <button type="submit" class="btn btn-primary" >Enviar</button>
                <button type="button" class="btn btn-default" @click="modalIsOpen = false">Salir</button>
			  </div>
		</form>
	</div>
	<div slot="modal-footer" class="modal-footer">
	    
	    
	</div>
</modal>






