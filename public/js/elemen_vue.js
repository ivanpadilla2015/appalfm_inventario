const  app = new Vue({
	el: '#app',

	 data: {

	    elements: [],
    	pagination: { total: 0, per_page: 2, from: 1, to: 0, current_page: 1 },
    	offset: 4,
    	formErrors:{},
    	formErrorsUpdate:{},
    	newItem : {'nombrelement':''},
    	fillItem : {'nombrelement':'', 'id' : ''},
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
           axios.get('/elemen?page='+page).then((response) => {
            //console.log(response);
           this.elements = response.data.data.data;
           this.pagination = response.data.pagination;

          });

        },


      	changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
      	},

        crearelemen: function(){
                   var input = this.newItem;
                   axios.post('/elemen',input).then((response) => {
                   this.changePage(this.pagination.current_page);
                   this.newItem = {'nombrelement':''};
                   this.modalIsOpen = false;
                  // this.getVueItems();
                   toastr.success('Creado Satisfactoriamente.', 'Tipo', {timeOut: 5000});
                  }, (response) => {

                      this.formErrors = response.data;

                 });
 
  	   },

         editelemen: function(item){
          this.fillItem.nombrelement = item.nombrelement;
          this.fillItem.id = item.id;
          this.modalEdit = true;
         },

         updatelemen: function(id){
             var input = this.fillItem;
             axios.put('/elemen/'+id,input).then((response) => {
             this.changePage(this.pagination.current_page);
             this.fillItem = {'nombrelement':'','id':''};
             this.modalEdit = false;
             toastr.success('Actualizado con Exito.', 'Tipo', {timeOut: 5000});
          }, (response) => {

              this.formErrorsUpdate = response.data;

              });

          },

          deletelemen: function(item){
           if (confirm('Confirma Eliminar esta Elemento')) {
                  axios.delete('/elemen/'+item.id).then((response) => {
                  this.changePage(this.pagination.current_page);
                  toastr.success('Eliminado con Exito.', 'Tipo', {timeOut: 5000});
                  }); 
              }
            }

     },

     components: {
       modal: VueStrap.modal
     }
 

});