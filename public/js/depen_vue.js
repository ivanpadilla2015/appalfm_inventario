const  app = new Vue({
	el: '#app',

	 data: {

	    depends: [],
    	pagination: { total: 0, per_page: 2, from: 1, to: 0, current_page: 1 },
    	offset: 4,
    	formErrors:{},
    	formErrorsUpdate:{},
    	newItem : {'nombredepen':''},
    	fillItem : {'nombredepen':'', 'id' : ''},
      modalIsOpen : false,
      modalEdit : false
    },

	//mounted(){
		//axios.get('/skills').then(response => console.log(response.data)); 
		//axios.get('/users').then( response => { this.usuarios = response.data}); 
	//}

	  computed: {

	        isActived: function () {
	            return this.pagination.current_page;
	        },

	        pagesNumber: function () {
	            if (!this.pagination.to) {
	                return [];
	            }
	            var from = this.pagination.current_page - this.offset;
	            if (from < 1) {
	                from = 1;
	            }
	            var to = from + (this.offset * 2);
	            if (to >= this.pagination.last_page) {
	                to = this.pagination.last_page;
	            }
	            var pagesArray = [];
	            while (from <= to) {
	                pagesArray.push(from);
	                from++;
	            }
	            return pagesArray;
	        }

    },

    created(){
      $("#capa_modal").show();
      $("#capa_tabla").show();
  		this.getVueItems(this.pagination.current_page);
     },

//.modal.in

    methods : {

        getVueItems: function(page){
           axios.get('/depen?page='+page).then((response) => {
            //console.log(response);
           this.depends = response.data.data.data;
           this.pagination = response.data.pagination;

          });

        },


      	changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
      	},

        creardepen: function(){
                   var input = this.newItem;
                   axios.post('/depen',input).then((response) => {
                   this.changePage(this.pagination.current_page);
                   this.newItem = {'nombredepen':''};
                   this.modalIsOpen = false;
                  // this.getVueItems();
                   toastr.success('Creada Satisfactoriamente.', 'Dependencia', {timeOut: 5000});
                  }, (response) => {

                      this.formErrors = response.data;

                 });
 
  	   },

         editdepen: function(item){
          this.fillItem.nombredepen = item.nombredepen;
          this.fillItem.id = item.id;
          this.modalEdit = true;
         },

         updatedepen: function(id){
             var input = this.fillItem;
             axios.put('/depen/'+id,input).then((response) => {
             this.changePage(this.pagination.current_page);
             this.fillItem = {'nombredepen':'','id':''};
             this.modalEdit = false;
             toastr.success('Actualizada con Exito.', 'Dependencia', {timeOut: 5000});
          }, (response) => {

              this.formErrorsUpdate = response.data;

              });

          },

          deletedepen: function(item){
           if (confirm('Cofirma Eliminar esta Dependencia')) {
                  axios.delete('/depen/'+item.id).then((response) => {
                  this.changePage(this.pagination.current_page);
                  toastr.success('Eliminada con Exito.', 'Dependencia', {timeOut: 5000});
                  }); 
              }
            }

     },

     components: {
       modal: VueStrap.modal
     }
 

});