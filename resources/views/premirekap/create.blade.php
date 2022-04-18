@extends('layouts.master')

@section('title')
    Transaction Rekap Premi Operator
@endsection

@push('css')

@endpush

@section('breadcrumb')
    @parent
    <li class="active">Rekap Premi Operator</li>
@endsection

@section('content')

    
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <div class="box box-widget">
            <div class="box-body">
                
                   <b>PREMI PRODUKSI</b> 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Periode</label>
                                </div>
                                <select class="custom-select" id="select_periode">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">NIK</label>
                                </div>
                                <select class="custom-select" id="select_nik">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <tr>
                                    <td style="vertical-align:top;">
                                        <label for="tot_premi_prod">Total Premi Produksi</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" id="tot_premi_prod" onkeyup="sum();" name="tot_premi_prod" style="text-align:right" class="form-control" readonly>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                        </div>
                    </div>
                    <br>
                   <div>
                    <button id="filter" class="btn btn-sm btn-outline-info">Filter</button>
                    <button id="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="record_table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Off To Work</th>
                                    <th>Insiden</th>
                                    <th>Premi Op Produksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                
            </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <div class="box box-widget">
            <div class="box-body">
                   <b>PREMI SUPPORT</b> 
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Periode</label>
                                </div>
                                <select class="custom-select" id="periode_support">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">NIK</label>
                                </div>
                                <select class="custom-select" id="nik_support">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                   <div>
                    <button id="filter2" class="btn btn-sm btn-outline-info">Filter</button>
                    <button id="reset2" class="btn btn-sm btn-outline-warning">Reset</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="record_tablespt" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Off To Work</th>
                                    <th>Insiden</th>
                                    <th>Premi Op Support</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>

      </div>
      
      <div class="col-sm-4 invoice-col">
        <div class="box box-widget">
            <div class="box-body">
               <b>ATTENDANCES </b> 
                <div class="row">
                 <div class="col-md-5">
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <label class="input-group-text" for="inputGroupSelect01">Periode</label>
                         </div>
                         <select class="custom-select" id="periode_atc">
                             <option value="">Choose...</option>
                         </select>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <label class="input-group-text" for="inputGroupSelect01">NIK</label>
                         </div>
                         <select class="custom-select" id="nik_atc">
                             <option value="">Choose...</option>
                         </select>
                     </div>
                 </div>
             </div>
             <br>
             <div>
                 <button id="filter3" class="btn btn-sm btn-outline-info">Filter</button>
                 <button id="reset3" class="btn btn-sm btn-outline-warning">Reset</button>
             </div>
             <div class="table-responsive">
                 <table class="table table-borderless" id="record_tableatc" style="width:100%;">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>NIK</th>
                             <th>Name Employee</th>
                             <th>Absen</th>
                         </tr>
                     </thead>
                 </table>
             </div>    

            </div>
        </div>
       
      </div>
     
    </div>
    

    <!-- Table row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <div class="box box-widget">
              <div class="box-body">
                  
                     <b>WARNING/SP</b> 
                      <div class="row">
                          <div class="col-md-4">
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">Periode</label>
                                  </div>
                                  <select class="custom-select" id="periode_warning">
                                      <option value="">Choose...</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">NIK</label>
                                  </div>
                                  <select class="custom-select" id="nik_warning">
                                      <option value="">Choose...</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <br>
                     <div>
                      <button id="filter4" class="btn btn-sm btn-outline-info">Filter</button>
                      <button id="reset4" class="btn btn-sm btn-outline-warning">Reset</button>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-borderless" id="record_table_warning" style="width:%;">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>NIK</th>
                                      <th>Name Employee</th>
                                      <th>Warning</th>
                                      
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  
              </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <div class="box box-widget">
              <div class="box-body">
                <tr>
                    <td style="vertical-align:top;">
                        <label for="ffpr">FFPR</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="ffpr" onkeyup="sum();" name="ffpr" style="text-align:right" class="form-control" readonly>
                        </div>
                    </td>
                </tr>
              </div>
          </div>
  
        </div>
        
        <div class="col-sm-4 invoice-col">
          <div class="box box-widget">
              <div class="box-body">
                 
                  
               
  
              </div>
          </div>
         
        </div>
       
      </div>
    

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </tbody></table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button>
      </div>
    </div>




{{-- @includeIf('transaction.parameter')
@includeIf('transaction.employee')
@includeIf('transaction.unit')
@includeIf('transaction.unit1')
@includeIf('transaction.unit2')
@includeIf('transaction.unit3') --}}

@endsection

@push('scripts')
<script>

    //Periode
    function fetch_prd() {
            $.ajax({
                url: "{{ route('periodes') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        stdBody +=
                            `<option value="${data[key]['parameter_date']}">${data[key]['parameter_date']}</option>`;
                    }
                    $("#select_periode").append(stdBody);
                }
            });
        }
        fetch_prd();


        //NIK
        function fetch_nik() {
            $.ajax({
                url: "{{ route('nik') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        resBody += `<option value="${data[key]['nik']}">${data[key]['nik']}</option>`;
                    }
                    $("#select_nik").append(resBody);
                }
            });
        }

        fetch_nik();


         // Fetch Records
         function fetch(prd, nik) {
            $.ajax({
                url: "{{ route('premirekaps/records')}}",
                type: "GEt",
                data: {
                    prd: prd,
                    nik: nik
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_table').DataTable({
                        "data": data.productions,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>",
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "name_employee"
                            },
                            {
                                "data": "off_to_work",
                                "render": function(data, type, row, meta) {
                                    return `${row.off_to_work}`;
                                }
                            },
                            {
                                "data": "insiden",
                                "render": function(data, type, row, meta) {
                                    return `${row.insiden}`;
                                }
                            },
                            {
                                "data": "premiopr"
                            }
                        ]
                    });
                }
            });

            

        }

 
        fetch();


        function sum(){
            var total_premi_prod = document.getElementById('total_premi_prod').value;

            var result = parseFloat(total_premi_prod) + parseFloat(total_premi_prod);

            if (!isNaN(result)) {
                document.getElementById('total_premi_prod').value = result;
            }
        }

         // Filter
         $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var prd = $("#select_periode").val();
            var nik = $("#select_nik").val();
            if (prd !== "" && nik !== "") {
                $('#record_table').DataTable().destroy();
                fetch(prd, nik);
            } else if (prd !== "" && nik == "") {
                $('#record_table').DataTable().destroy();
                fetch(prd, '');
            } else if (prd == "" && nik !== "") {
                $('#record_table').DataTable().destroy();
                fetch('', nik);
            } else {
                $('#record_table').DataTable().destroy();
                fetch();
            }

            sum();
        });


         // Reset
         $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#select_periode").html(`<option value="">Choose...</option>`);
            $("#select_nik").html(`<option value="">Choose...</option>`);
            $('#record_table').DataTable().destroy();
            fetch();
            fetch_prd();
            fetch_nik();
        });


        //Periode Support
    function fetch_spt() {
            $.ajax({
                url: "{{ route('periodespt') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        stdBody +=
                            `<option value="${data[key]['parameter_date']}">${data[key]['parameter_date']}</option>`;
                    }
                    $("#periode_support").append(stdBody);
                }
            });
        }
        fetch_spt();

         //NIK
         function fetch_nikspt() {
            $.ajax({
                url: "{{ route('nikspt') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        resBody += `<option value="${data[key]['nik']}">${data[key]['nik']}</option>`;
                    }
                    $("#nik_support").append(resBody);
                }
            });
        }

        fetch_nikspt();


        // Fetch Records
        function fetchsupport(spt, nik) {
            $.ajax({
                url: "{{ route('premirekaps/recordsupport')}}",
                type: "GEt",
                data: {
                    spt: spt,
                    nik: nik
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_tablespt').DataTable({
                        "data": data.supports,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>",
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "name_employee"
                            },
                            {
                                "data": "off_to_work",
                                "render": function(data, type, row, meta) {
                                    return `${row.off_to_work}`;
                                }
                            },
                            {
                                "data": "insiden",
                                "render": function(data, type, row, meta) {
                                    return `${row.insiden}`;
                                }
                            },
                            {
                                "data": "premi_op_support"
                            }
                        ]
                    });
                }
            });
        }

        fetchsupport();

         // Filter
         $(document).on("click", "#filter2", function(e) {
            e.preventDefault();
            var spt = $("#periode_support").val();
            var nik = $("#nik_support").val();
            if (spt !== "" && nik !== "") {
                $('#record_tablespt').DataTable().destroy();
                fetchsupport(spt, nik);
            } else if (spt !== "" && nik == "") {
                $('#record_tablespt').DataTable().destroy();
                fetchsupport(spt, '');
            } else if (spt == "" && nik !== "") {
                $('#record_tablespt').DataTable().destroy();
                fetchsupport('', nik);
            } else {
                $('#record_tablespt').DataTable().destroy();
                fetchsupport();
            }
        });

         // Reset
         $(document).on("click", "#reset2", function(e) {
            e.preventDefault();
            $("#periode_support").html(`<option value="">Choose...</option>`);
            $("#nik_support").html(`<option value="">Choose...</option>`);
            $('#record_tablespt').DataTable().destroy();
            fetchsupport();
            fetch_spt();
            fetch_nikspt();
        });


        //Periode Attendances
    function fetch_atc() {
            $.ajax({
                url: "{{ route('periodeatc') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        stdBody +=
                            `<option value="${data[key]['attendances_month']}">${data[key]['attendances_month']}</option>`;
                    }
                    $("#periode_atc").append(stdBody);
                }
            });
        }
        fetch_atc();


        // NIK ATC
        function fetch_nikatc() {
            $.ajax({
                url: "{{ route('nikatc') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        resBody += `<option value="${data[key]['nik']}">${data[key]['nik']}</option>`;
                    }
                    $("#nik_atc").append(resBody);
                }
            });
        }

        fetch_nikatc();


        // Fetch Records Attendances
        function fetchatc(atc, nik) {
            $.ajax({
                url: "{{ route('premirekaps/recordatc')}}",
                type: "GEt",
                data: {
                    atc: atc,
                    nik: nik
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_tableatc').DataTable({
                        "data": data.attendances,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>",
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "nik"
                            },
                            {
                                "data": "name_employee",
                                "render": function(data, type, row, meta) {
                                    return `${row.name_employee}`;
                                }
                            },
                            {
                                "data": "attendance_value",
                                "render": function(data, type, row, meta) {
                                    return `${row.attendance_value}`;
                                }
                            }
                        ]
                    });
                }
            });
        }

        fetchatc();

        // Filter Atc
        $(document).on("click", "#filter3", function(e) {
            e.preventDefault();
            var atc = $("#periode_atc").val();
            var nik = $("#nik_atc").val();
            if (atc !== "" && nik !== "") {
                $('#record_tableatc').DataTable().destroy();
                fetchatc(atc, nik);
            } else if (atc !== "" && nik == "") {
                $('#record_tableatc').DataTable().destroy();
                fetchatc(atc, '');
            } else if (atc == "" && nik !== "") {
                $('#record_tableatc').DataTable().destroy();
                fetchatc('', nik);
            } else {
                $('#record_tableatc').DataTable().destroy();
                fetchatc();
            }
        });

         // Reset Atc
         $(document).on("click", "#reset3", function(e) {
            e.preventDefault();
            $("#periode_atc").html(`<option value="">Choose...</option>`);
            $("#nik_atc").html(`<option value="">Choose...</option>`);
            $('#record_tableatc').DataTable().destroy();
            fetchatc();
            fetch_atc();
            fetch_nikatc();
        });

         //Periode Warning
        function fetch_warning() {
            $.ajax({
                url: "{{ route('periodewarning') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        stdBody +=
                            `<option value="${data[key]['warning_month']}">${data[key]['warning_month']}</option>`;
                    }
                    $("#periode_warning").append(stdBody);
                }
            });
        }
        fetch_warning();

         // NIK ATC
         function fetch_nikwarning() {
            $.ajax({
                url: "{{ route('nikwarning') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        resBody += `<option value="${data[key]['nik']}">${data[key]['nik']}</option>`;
                    }
                    $("#nik_warning").append(resBody);
                }
            });
        }

        fetch_nikwarning();

        // Fetch Records Warning
        function fetchwarning(wrn, nik) {
            $.ajax({
                url: "{{ route('premirekaps/recordwarning')}}",
                type: "GEt",
                data: {
                    wrn: wrn,
                    nik: nik
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_table_warning').DataTable({
                        "data": data.warnings,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>",
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "nik"
                            },
                            {
                                "data": "name_employee",
                                "render": function(data, type, row, meta) {
                                    return `${row.name_employee}`;
                                }
                            },
                            {
                                "data": "warning_value",
                                "render": function(data, type, row, meta) {
                                    return `${row.warning_value}`;
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetchwarning();

        // Filter Warning
        $(document).on("click", "#filter4", function(e) {
            e.preventDefault();
            var wrn = $("#periode_warning").val();
            var nik = $("#nik_warning").val();
            if (wrn !== "" && nik !== "") {
                $('#record_table_warning').DataTable().destroy();
                fetchwarning(wrn, nik);
            } else if (wrn !== "" && nik == "") {
                $('#record_table_warning').DataTable().destroy();
                fetchwarning(wrn, '');
            } else if (wrn == "" && nik !== "") {
                $('#record_table_warning').DataTable().destroy();
                fetchwarning('', nik);
            } else {
                $('#record_table_warning').DataTable().destroy();
                fetchwarning();
            }
        });

        // Reset Warning
        $(document).on("click", "#reset4", function(e) {
            e.preventDefault();
            $("#periode_warning").html(`<option value="">Choose...</option>`);
            $("#nik_warning").html(`<option value="">Choose...</option>`);
            $('#record_table_warning').DataTable().destroy();
            fetchwarning();
            fetch_warning();
            fetch_nikwarning();
        });






</script>

@endpush

