
const dictionary = {
  en: {
    messages:{
      after: (field, [target]) => `El campo ${field} debe ser posterior a ${target}.`,
      alpha_dash: (field) => `El campo ${field} solo debe contener letras, números y guiones.`,
      alpha_num: (field) => `El campo ${field} solo debe contener letras y números.`,
      alpha_spaces: (field) => `El campo ${field} solo debe contener letras y espacios.`,
      alpha: (field) => `El campo ${field} solo debe contener letras.`,
      before: (field, [target]) => `El campo ${field} debe ser anterior a ${target}.`,
      between: (field, [min, max]) => `El campo ${field} debe estar entre ${min} y ${max}.`,
      confirmed: (field, [confirmedField]) => `El campo ${field} no coincide con ${confirmedField}.`,
      credit_card: (field, [confirmedField]) => `El campo ${field} es inválido.`,
      date_between: (field, [min, max]) => `El campo ${field} debe estar entre ${min} y ${max}.`,
      date_format: (field, [format]) => `El campo ${field} debe tener formato formato ${format}.`,
      decimal: (field, [decimals] = ['*']) => `El campo ${field} debe ser númerico y contener ${decimals === '*' ? '' : decimals} puntos decimales.`,
      digits: (field, [length]) => `El campo ${field} debe ser númerico y contener exactamente ${length} dígitos.`,
      dimensions: (field, [width, height]) => `El campo ${field} debe ser de ${width} pixeles por ${height} pixeles.`,
      email: (field) => `El campo ${field} debe ser un correo electrónico válido.`,
      ext: (field) => `El campo ${field} debe ser un archivo válido.`,
      image: (field) => `El campo ${field} debe ser una imagen.`,
      in: (field) => `El campo ${field} debe ser un valor válido.`,
      ip: (field) => `El campo ${field} debe ser una dirección ip válida.`,
      max: (field, [length]) => `El campo ${field} no debe ser mayor a ${length} caracteres.`,
      max_value: (field, [length]) => `El campo ${field} debe de ser ${length} o menor.`,
      mimes: (field) => `El campo ${field} debe ser un tipo de archivo válido.`,
      min: (field, [length]) => `El campo ${field} debe tener al menos ${length} caracteres.`,
      min_value: (field, [length]) => `El campo ${field} debe ser ${length} o superior.`,
      not_in: (field) => `El campo ${field} debe ser un valor válido.`,
      numeric: (field) => `El campo ${field} debe contener solo caracteres númericos.`,
      regex: (field) => `El formato del campo ${field} no es válido.`,
      required: (field) => `Este campo es obligatorio.`,
      size: (field, [size]) => `El campo ${field} debe ser menor a ${size} KB.`,
      url: (field) => `El campo ${field} no es una URL válida.`
    }
  }
};

Vue.use(VeeValidate);

new Vue({
  el: '#app',
  data: {
    depens : [],
    users : [], 
    elems : [],
    selected: '',
    selectuser: '',
    modalIsOpen: false, 
    fe: new Date(),
    newItem: {'element_id' : '', 'marca': '','modelo' : '', 'serial' : '','num_activo' : '', 'fechadquirido' : this.fe,'cantidad':''},
   	regis:[],
   	formErrors:[],
  },

  created(){
      
      this.$validator.updateDictionary(dictionary);  // para el ideioma de validador vee-validate
  		this.getCombox();
  },

  methods : {

  		 getCombox: function(){
           axios.get('/equipos').then((response) => {
             //console.log(response);
             this.depens = response.data.datadepe;
             this.users = response.data.datauser;
             this.elems = response.data.dataelem;
             
          });

        },

        addTabla: function(){
        	
        	  
            if (this.validate()) {
	          //si no paso la validacion eslint-disable-next-line
	          }else {

    	     	 	  fe1 = $("#single_cal4").val();
    	            //var fe1 = new Date(fe);
    	        	nom =  $( "#myselect option:selected" ).text(); //obtener texto del select
    	        	this.regis.push({nombre: nom, element_id : this.newItem.element_id,
    	        		             marca: this.newItem.marca,
    	        		             modelo : this.newItem.modelo, 
    	        		             serial : this.newItem.serial,
    	        		             num_activo : this.newItem.num_activo,
    	        		             fechadquirido : fe1,
    	        		             cantidad: this.newItem.cantidad});
    	        	//console.log(this.regis);
   	         this.newItem = {'element_id' : '', 'marca': '','modelo' : '', 'serial' : '','num_activo' : '', 'fechadquirido' :'','cantidad':''};
    	       this.errors = [];
             this.modalIsOpen = false;

             
	 
    	     }    
    	},
	     
      crearInventario: function(){

         		if (this.regis.length > 0)
         		{

         			axios.post('/equipos',{input:this.regis, user_id:this.selectuser, dependen_id:this.selected}).then((response) => {
                      this.selected = '';
    				  this.user_id = '';
                      this.regis = [];

                      if (this.formErrors) {
                          this.formErrors = [];
                      }

                      toastr.success('Creado Satisfactoriamente.', 'Inventario', {timeOut: 5000});
                   	 }, (error) => {

                      //console.log(error.response.data);
                      this.formErrors = error.response.data;

                 });
 

         		} else {

         			toastr.error('Hay que "Agregar Detalles" en la tabla', 'Error', {timeOut: 5000});

         		}	
        		

        	     
        },

	      eliminarItem: function(index){

           if(confirm("Confirma Eliminar registro")){
             this.regis.splice(index, 1); 
           }
           

        },

       validate: function() {
          this.$validator.validateAll();
	      return this.errors.any();
       }

       

  },

  components: {
       modal: VueStrap.modal
   }




});