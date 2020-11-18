
const visualizarEstudiante= (() => {

    const filterContent = document.querySelector('#filterContent');
    const filterBtn = document.querySelector('#filterbtn');
    const saveFilterBtn = document.querySelector('#saveFilter');
    const tableEst = document.querySelector('#EstuList');
    const generoSelect = document.querySelector('#Gen_ID');
    const carnetSelect = document.querySelector('#carnet');
    const carreraSelect = document.querySelector('#Car_ID');
    // const studentTable = document.querySelector('#EstuList');


    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
 
    

    const fillDataTableStudentList = ()=>{

        $('#EstuList').DataTable({
            // dom:"<'row'<'col-md-6'l>>",
            processing: true,
            serverSide: true,
            searching: false,
            dom: '<"row"<"col-md-6"l>><"row"<"col-md-12"<"row"<"col-md-6"B> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>>',
            buttons: {
                buttons: [
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' },
                ]
            },
            "pageLength": 10,
            "lengthMenu": [[10, 20, 50,-1],[10, 20, 50,'All']],
            
            destroy:true,
            "ajax":'api/AllStudent',
            "columns":[
                {data: 'Per_ID'},
                {data: 'per_Nombre'},
                {data: 'per_Apellido'},
                {data: 'per_Identificacion'},
                {data: 'est_Carnet'},
                {data: 'btnEdit',orderable:false, searchable:false},
                // {data: 'eliminar',orderable:false, searchable:false}
                
            ]
        });
    }

    const fillDataTableFilter = (dataPost)=>{

        // $('#EstuList').DataTable.destroy();

        $('#EstuList').DataTable({
            // dom:"<'row'<'col-md-6'l>>",
            processing: true,
            serverSide: true,
            dom: '<"row"<"col-md-6"l>><"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>>',
            buttons: {
                buttons: [
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' },
                ]
            },
            "pageLength": 10,
            "lengthMenu": [[10, 20, 50,-1],[10, 20, 50,'All']],
            
            destroy:true,
            "ajax":{
            url: "test",
            type:'POST',
            data: dataPost,
            // success: function(data){
            //     console.log(data);
            // },

            },
            
            "columns":[
                {data: 'Per_ID'},
                {data: 'per_Nombre'},
                {data: 'per_Apellido'},
                {data: 'per_Identificacion'},
                {data: 'est_Carnet'},
                {data: 'btnEdit',orderable:false, searchable:false},
                // {data: 'eliminar',orderable:false, searchable:false}
                
            ]
        });  
    }

    const showFilterForm = () => {

        const optionScrollView= {alignToTop: true, behavior: "smooth"}; //optionsToscrollIntoView, see info about scrollIntoView

        filterBtn.addEventListener('click', () => {
            if (filterContent.style.display === "none") {

                filterContent.style.display = "block";
                filterContent.classList.add('animate__animated','animate__fadeInDown');
                saveFilterBtn.scrollIntoView(optionScrollView);
            
            } else {
                filterContent.style.display = "none";

            }
        });

        
    }

    const getOptionFilter = ({Gen_ID, Car_ID, Carnet}) =>{
        
        const option = 
                    (Gen_ID.length && Car_ID.length && Carnet.length)!=0?'all'  :
                    (Gen_ID.length && Car_ID.length)!=0?'generoCarrera'         :
                    (Gen_ID.length && Carnet.length)!=0?'generoCarnet'          :
                    (Car_ID.length && Carnet.length)!=0?'carreraCarnet'         :
                    (Gen_ID.length)!=0?'genero'                                 :
                    (Car_ID.length)!=0?'carrera'                                 :
                    (Carnet.length)!=0?'carnet'                                 : 'invalida'
        
        return option;
    }
    const initilize = ()=>{
        const optionScrollView= {alignToTop: true, behavior: "smooth"}; //optionsToscrollIntoView, see info about scrollIntoView
        
        fillDataTableStudentList();
        showFilterForm();

        $('#saveFilter').click((event)=>{

            event.preventDefault();
            filterContent.style.display = "none";
            tableEst.scrollIntoView(optionScrollView);

            let dataPost = {

                Gen_ID: getOptionValueSelected(generoSelect),
                Car_ID: getOptionValueSelected(carreraSelect),
                Carnet: getOptionValueSelected(carnetSelect),
                option: ''
            };

            dataPost.option = getOptionFilter(dataPost);

            if(dataPost.option==='invalida'){alert('Selecciona una opcion de filtrado');}

            console.log(dataPost);

            fillDataTableFilter(dataPost);
      });
        
    }

    const getOptionValueSelected = (arr) =>{

        const valueSelected = [...arr.options]
                              .filter(option => option.selected)
                              .map(option => option.value);
        
        return valueSelected;
    }



    return {
        init: initilize
    }
    
})();




