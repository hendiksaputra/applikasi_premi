

<div class="modal fade" id="modal-employee" tabindex="-1" role="dialog" aria-labelledby="modal-employee">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Employee</h4>
            </div>
            
            <div class="modal-body">
                <table class="table table-striped table-bordered table-produk" id="table2">
                    <thead>
                        <th width="5%">No</th>
                        <th>NIK</th>
                        <th>Employee Name</th>
                        <th>Project</th>
                        <th>Action</th>
                        
                    </thead>
                    <tbody>
                        @foreach ($employees as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->name_employee }}</td>
                                <td>{{ $item->project->code_project }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihEmployee('{{ $item->id }}', '{{ $item->nik }}', '{{ $item->name_employee }}')">
                                        <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                             </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

