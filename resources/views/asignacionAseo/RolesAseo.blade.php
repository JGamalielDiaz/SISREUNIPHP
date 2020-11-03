@extends('Layout/layout')
@section('Style')
    
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="LayoutAssets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="LayoutAssets/plugins/fullcalendar/custom-fullcalendar.advance.css" rel="stylesheet" type="text/css" />
    <link href="LayoutAssets/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="LayoutAssets/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="LayoutAssets/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLE -->
@endsection
@section('Content')

<div class="row layout-top-spacing" id="cancel-row">
     <div class="col-xl-12 col-lg-12 col-md-12">
         <div class="statbox widget box box-shadow">
             <div class="widget-content widget-content-area">
                 <h2>Calendario Asignaciones  de Aseos <i class="fas fa-calendar-alt"></i> </h2>
                 <div class="calendar-upper-section">
                     <div class="row">
                         <div class="col-md-8 col-12">
                             <div class="labels">
                                 <p class="label label-primary">Work</p>
                                 <p class="label label-warning">Travel</p>
                                 <p class="label label-success">Personal</p>
                                 <p class="label label-danger">Important</p>
                             </div>
                         </div>                                                
                         <div class="col-md-4 col-12">
                           <form action="" class="form-horizontal mt-md-0 mt-3 text-md-right text-center">  
                               <!-- javascript:void(0);-->
                              <a href="#" style="display: none;" id="myBtn" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Nuevo Reporte!</a>
                            </form> 
                           <a href="{{url('reporte')}}" style="float: right;"  class="btn btn-outline-primary"><i class="fas fa-marker"></i>  Nuevo Reporte!</a>
                         </div>
                     </div>
                     <div>
                        
                    <div id="calendar"></div>
                 </div>
        </div>
     </div>

     <!-- The Modal -->
      <!-- Modal -->
      
    <div id="modalDatos" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
           
            <h2 id="titleModal"></h2>
            <input type="hidden" id="start">
            <input type="hidden" id="end">
            <input type="hidden" id="numero">
            <input type="hidden" id="title">
            <table class="table table-bordered table-condensed responsive" id="table_data">
                <tr>
                   <thead>
                       <tr>
                           <th>Nombres</th>
                           <th>Aseo</th>
                           <th>Cuarto</th>
                           <th> Estado</th>
                           
                           
                       </tr>
                       
                 </thead>
                </tr>
            <tbody>
                
            </tbody>
            </table>
        </div>
    </div>

     </div>
@endsection
@section('Scripts')

     <!-- BEGIN PAGE LEVEL SCRIPTS -->
    
     <script src="{{asset('LayoutAssets/plugins/fullcalendar/moment.min.js')}}"></script>
     <script src="{{asset('LayoutAssets/plugins/flatpickr/flatpickr.js')}}"></script>
     <script src="{{asset('LayoutAssets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>


     {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script> --}}
    <script src="{{asset('js/parsley.js')}}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    <script src="LayoutAssets/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="LayoutAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="LayoutAssets/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="LayoutAssets/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="LayoutAssets/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
<!--<script>
   
</script> -->
     <!-- Inicio de Calendar!-->
     
      <script>
          $(document).ready(function() {
      
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    // Get the modal
    

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");



    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the all <input> elements insdie the modal
    var input = document.querySelectorAll('input[type="text"]');
    var radioInput = document.querySelectorAll('input[type="radio"]');

    // Get the all <textarea> elements insdie the modal
    var textarea = document.getElementsByTagName('textarea');

    // Create BackDrop ( Overlay ) Element
    function createBackdropElement () {
        var btn = document.createElement("div");
        btn.setAttribute('class', 'modal-backdrop fade show')
        document.body.appendChild(btn);
    }

    // Reset radio buttons

    function clearRadioGroup(GroupName) {
      var ele = document.getElementsByName(GroupName);
        for(var i=0;i<ele.length;i++)
        ele[i].checked = false;
    }
      
    /* initialize the calendar
    -----------------------------------------------------------------*/
   
   var datosJson="";
    $.ajax({
        type: "GET",
        url: "EventCalendar",
        dataType: "json",
        async:false,
        contentType:'application/json; charset=utf-8',
        success: function (datos) {
            datosJson=datos;          
        },error:function(){
            console.log(error);
        }
    });

     calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events:datosJson,
        editable: false,
        eventLimit: true,
     
        eventMouseout: function(event, jsEvent, view) {
            $('#'+event.id).popover('hide');
        },
        eventClick: function(info) {
      
          var start = info.start.format("YYYY-MM-DD");
          var end = start;
          var numero= info.Cuar_ID;
          $('#start').val(start), $('#end').val(end), $('#numero').val(numero), $('#title').val(info.title)
          CargarAseoCuarto(start, end, numero, info.title)
            // Calendar Event Featch
            var eventTitle = info.title;


            }
    })
    
function CargarAseoCuarto(start, end, numero, title)
{
    var url=`AsigancionCuarto/+${start}+/+${end}+/+${numero}`;
                //inicio
           $('#table_data').DataTable({
            select: true,
            dom: '<"row"<"col-md-6"l>><"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>>',
            buttons: {
                buttons: [
                    { extend: 'copy', className:  'btn btn-outline-primary btn-sm',text:'<i class="far fa-copy"></i>'},
                    { extend: 'excel', className: 'btn btn-outline-success btn-sm',text:'<i class="far fa-file-excel"></i>' },
                    { extend: 'print', className: 'btn btn-outline-danger  btn-sm',text:'<i class="far fa-file-pdf"></i>' }
                    ]
            },
            "pageLength": 20,
            "lengthMenu": [[10, 20, 50,-1],[10, 20, 50,'All']],
             "serverSide": true,
            destroy:true,
            "ajax": url,
            "columns":[
               
                {data: 'full_name'},
                {data:'tipoAseo_Nombre'},
                {data:'cuar_Numero'},
                {data:'btnEstado'}
                
            ], 
            "language":{
                "search":"Buscar Detalladamente",
                paginate:{
                    "next":"siguiente",
                    "previous":"Anterior"
                },
             
                "zeroRecords":"SISRESUNI NO ENCONTRO ESE DATO. :-(",
            },
        }); 
         //fin

            $('#titleModal').html(title);
            window.location.href = '#modalDatos';         
      
}
    function enableDatePicker() {
        var startDate = flatpickr(document.getElementById('start-date'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: new Date()
        });

        var abv = startDate.config.onChange.push(function(selectedDates, dateStr, instance) {

            var endtDate = flatpickr(document.getElementById('end-date'), {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: dateStr
            });
        })

        var endtDate = flatpickr(document.getElementById('end-date'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: new Date()
        });
    }

    function randomString(length, chars) {
        var result = '';
        for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
        return result;
    }
    const mailScroll = new PerfectScrollbar('.fc-scroller', {
        suppressScrollX : true
    });
});
    </script>     
    @endsection

   
