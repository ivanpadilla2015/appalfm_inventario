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

      inven: [],
      pagination: { total: 0, per_page: 2, from: 1, to: 0, current_page: 1 },
      offset: 4,
      formErrors:{},
      formErrorsUpdate:{},
      newItem : {'nombrelement':''},
      fillItem : {'id':'', 'dependen_id' : '','user_id' : ''},
      
      depens : [],
      users : [], 
      elems : [],
      selected: '',
      selectuser: '',
      modalIsOpen: false, 
      fe: new Date(),
      newItem: {'element_id' : '', 'marca': '','modelo' : '', 'serial' : '','num_activo' : '', 'fechadquirido' : this.fe,'cantidad':''},
      regis:[],
      modalEdit : false
         

    },

  
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
      this.getLista(this.pagination.current_page);
      this.$validator.updateDictionary(dictionary);  // para el ideioma de validador vee-validate
      this.getCombox();
     },

    methods : {

       getCombox: function(){   // datos del modal
           axios.get('/equipos').then((response) => {
             //console.log(response);
             this.depens = response.data.datadepe;
             this.users = response.data.datauser;
             this.elems = response.data.dataelem;
             
          });

        },

        getLista: function(page){    //mostar del index
           axios.get('/invens?page='+page).then((response) => {
            //console.log(response);
           this.inven = response.data.data.data;
           this.pagination = response.data.pagination;

          });

        },


        changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
        },

         editinven: function(item){
         axios.get('/equipos/'+item.id+'/edit').then((response)=>{
            //console.log(response.data);
            this.regis = response.data;
            this.id = item.id;
         });
          this.selectuser = item.user_id;
          this.selected = item.dependen_id;
          this.fillItem.dependen_id = item.dependen_id;
          this.fillItem.user_id = item.user_id;
          this.fillItem.id = item.id;
          this.modalEdit = true;
         },

         deleteinven: function(item){
           if (confirm('Confirma Eliminar esta Elemento')) {
                  axios.delete('/elemen/'+item.id).then((response) => {
                  this.changePage(this.pagination.current_page);
                  toastr.success('Eliminado con Exito.', 'Tipo', {timeOut: 5000});
                  }); 
              }
          },

         addTabla: function(){ // del modal
          
            
            if (this.validate()) {
            //si no paso la validacion eslint-disable-next-line
            }else {

                fe1 = $("#single_cal4").val();
                  //var fe1 = new Date(fe);
                nom =  $( "#myselect option:selected" ).text(); //obtener texto del select
                this.regis.push({ element :{nombrelement: nom}, element_id : this.newItem.element_id,
                               marca: this.newItem.marca,
                               modelo : this.newItem.modelo, 
                               serial : this.newItem.serial,
                               num_activo : this.newItem.num_activo,
                               fechadquirido : fe1,
                               cantidad: this.newItem.cantidad});
                //console.log(this.regis);
             this.newItem = {'element_id' : '', 'marca': '','modelo' : '', 'serial' : '','num_activo' : '', 'fechadquirido' : '','cantidad':''};
             this.errors = [];
             this.modalIsOpen = false;

             $("#single_cal4").val('');
   
               }    
        },

        validate: function() {
          this.$validator.validateAll();
         return this.errors.any();
       },

       salirModal: function(){
        this.regis = [];
        this.modalEdit = false;
       },

       eliminarItem: function(index){

           if(confirm("Confirma Eliminar registro")){
             this.regis.splice(index, 1); 
           }
           

        },

        actualizaInventario: function(id){

            if (this.regis.length > 0)
            {
              
              axios.put('/equipos/'+id,{input:this.regis, user_id:this.selectuser, dependen_id:this.selected}).then((response) => {
                this.selected = '';
                this.user_id = '';
                this.regis = [];

                      if (this.formErrors) {
                          this.formErrors = [];
                      }
                      this.modalEdit = false;
                      toastr.success('Actualizado Satisfactoriamente.', 'Inventario', {timeOut: 5000});

                     }, (error) => {

                      //console.log(error.response.data);
                      this.formErrors = error.response.data;

                 });
 

            } else {

              toastr.error('Hay que "Agregar Detalles" en la tabla', 'Error', {timeOut: 5000});

            } 
            

               
        }

   },

   components: {
       modal: VueStrap.modal
     }
 

  });