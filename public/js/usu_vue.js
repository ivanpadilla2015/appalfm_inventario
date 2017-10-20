const  app = new Vue({
	el: '#app',

	 data: {

	    usuarios: [],
    	pagination: { total: 0, per_page: 2, from: 1, to: 0, current_page: 1 },
    	offset: 4,
    	formErrors:{},
    	formErrorsUpdate:{},
    	newItem : {'name':'','email':'','telefono':'', 'password':'','password_confirmation':''},
    	fillItem : {'name':'','email':'','telefono':'', 'password':'','password_confirmation':'','id':''}

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
  		this.getVueItems(this.pagination.current_page);
     },



    methods : {

        getVueItems: function(page){
           axios.get('/users?page='+page).then((response) => {
           this.usuarios = response.data.data.data;
           this.pagination = response.data.pagination;

          });

        },


      	changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
      	},

      	editItem: function(item){
         alert("hola");
          $("#edit-item").modal('show');
         },

/***************************************************************************************/
     createItem: function(){
		  var input = this.newItem;
		  axios.post('/users',input).then(response => {
          this.changePage(this.pagination.current_page);
          this.newItem = {'name':'','email':'','telefono':'','password':'','password_confirmation':''};

		    	$("#create-item").modal('hide');
    
			     toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});

		  	}).catch(error => this.formErrors = error.response.data) 
		}

      /*	deleteItem: function(item){
            this.$http.delete('/vueitems/'+item.id).then((response) => {
            this.changePage(this.pagination.current_page);
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});

	        });

    	},

      	

	   

        updateItem: function(id){
   		   var input = this.fillItem;
           this.$http.put('/vueitems/'+id,input).then((response) => {
           this.changePage(this.pagination.current_page);
           this.fillItem = {'title':'','description':'','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});

	         }, (response) => {

              this.formErrorsUpdate = response.data;

          	});

      	}

			*/

  	 }

});