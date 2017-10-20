 <modal  :show.sync="modalIsOpen" effect="fade" width="800">
	<div slot="modal-header" class="modal-header">
	    <h4 class="modal-title">  <code>Creando Elemento</code> </h4>
	</div>
	<div slot="modal-body" class="modal-body">
		 <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" v-on:submit.prevent="addTabla" >

		      <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Elemento <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select v-model="newItem.element_id" class="form-control col-md-6 col-xs-12" id="myselect">
                                 <option value="0">Seleccionar ........</option>
                                 <option v-for="option in elems" v-bind:value="option.id">
                                    @{{ option.nombrelement }}
                                  </option>
                            </select>
                         </div>
               </div>
               <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marca <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="marca" v-model="newItem.marca" class="form-control col-md-6 col-xs-12">
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Modelo <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="modelo" v-model="newItem.modelo" class="form-control col-md-6 col-xs-12">
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Serial <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="serial" v-model="newItem.serial" class="form-control col-md-6 col-xs-12">
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cantidad <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="cantidad" v-model="newItem.cantidad" class="form-control col-md-6 col-xs-12">
					 </div>
			  </div>
			  <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activo No <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	 <input type="text" name="num_activo" v-model="newItem.num_activo" class="form-control col-md-6 col-xs-12">
					 </div>
			  </div>
			   <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Adquirio <span class="required">*</span> </label>
               	     <div class="col-md-6 col-sm-6 col-xs-12">
				    	
				    	<input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4" v-model="newItem.fechadquirido">
				    	<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
				    	  
					 </div>
			  </div>
			  			

		</form>
	</div>
	<div slot="modal-footer" class="modal-footer">
	    <button type="button" class="btn btn-default" @click="modalIsOpen = false">Salir</button>
	    <button type="submit" class="btn btn-success" >Enviar</button>
	</div>
</modal>






