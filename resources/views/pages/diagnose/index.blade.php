@extends('layout.table')
@section('table')
    <table class="table table-separate table-head-custom dataTable dtr-inline" role="grid" aria-describedby="kt_datatable_info" id="datatable_2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Diagnose</th>
            @role('Patient|Admin')<th>Doctor</th>@endrole
            @role('Doctor|Admin')<th>Patient</th>@endrole
            <th>Date</th>
            <th>Details</th>
            @role('Doctor') <th>Option</th> @endrole
        </tr>
        </thead>
        <tbody>
        @foreach($diagnoses as $diagnose)
            <tr class="tr-container">
                <td>{{$diagnose->id}}</td>
                <td>{{$diagnose->diagnose}}</td>
                @role('Patient|Admin')<td>{{$diagnose->doctor->name}}</td>@endrole
                @role('Doctor|Admin')<td>{{$diagnose->patient->name}}</td>@endrole
                <td>{{$diagnose->date}}</td>
                <td>
                    <a class="open-treatment" data-details="{{$diagnose->details}}" type="button" data-toggle="modal" data-target="#diagnose">
                        Details
                    </a>
                </td>
                @role('Doctor')
                <td nowrap="nowrap">
                    @if($diagnose->doctor_id == \Illuminate\Support\Facades\Auth::user()->id)
                        <a href="{{route('diagnose.edit' , $diagnose->id)}}" title="Edit" data-toggle="tooltip">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                        <a class="delete" data-id="{{$diagnose->id}}" data-url="diagnose" data-name="Diagnose" title="Delete" data-toggle="tooltip">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    @endif
                </td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('footer')
    <div class="text-center">
        {{$diagnoses->links('layout.pagination')}}
    </div>
@endsection
@section('modals')
    <div class="modal fade treatment-model" id="diagnose" tabindex="-1" role="dialog" aria-labelledby="diagnoseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="diagnoseLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="details-data">

                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection

