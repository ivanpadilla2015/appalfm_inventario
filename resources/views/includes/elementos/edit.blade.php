 <modal small :show.sync="modalEdit" effect="fade" width="400" :backdrop=false>
	<div slot="modal-header" class="modal-header">
	    <h4 class="modal-title">  <code>Editando Elemento</code> </h4>
	</div>
	<div slot="modal-body" class="modal-body">
		Nombre: <input type="text" name="nombrelement" v-model="fillItem.nombrelement">
	</div>
	<div slot="modal-footer" class="modal-footer">
	    <button type="button" class="btn btn-default" @click="modalEdit = false">Salir</button>
	    <button type="button" class="btn btn-success" @click="updatelemen(fillItem.id)">Grabar</button>
	</div>
</modal>