@extends('layout.table')
@section('table')
    <form class="row mb-3" action="" method="get">
        <div class="col-9 d-flex">
            <input maxlength="20" name="search" placeholder="Search By Name Or Email Or Phone Or Address Or Date .." type="text" class="form-control form-control-lg" autocomplete="off"/>
            <select class="form-control form-control-lg ml-3 selectpicker" name="type">
                <option></option>
                <option value="1">Doctor</option>
                <option value="2">Patient</option>
            </select>
            @if(@$registrations[0]->status != 0)
                <select class="form-control form-control-lg ml-3 selectpicker" name="status">
                    <option></option>
                    <option value="1">Accepted</option>
                    <option value="2">Declined</option>
                </select>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
    </form>
    <table class="table table-separate table-head-custom dataTable dtr-inline" role="grid" aria-describedby="kt_datatable_info" id="datatable_2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            @if(@$registrations[0]->status != 0)<th>Status</th>@endif
            <th>Type</th>
            <th>Created At</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registrations as $registration)
            <tr class="tr-container">
                <td>{{$registration->id}}</td>
                <td>{{$registration->name}}</td>
                <td class="mail">{{$registration->email}}</td>
                <td>{{$registration->phone}}</td>
                <td>{{$registration->address}}</td>
                @if($registration->status != 0)<td>{{$registration->status == 1 ? 'Accepted' :'Declined'}}</td>@endif
                <td>{{$registration->type == 1 ? 'Doctor' : 'Patient'}}</td>
                <td>{{$registration->created_at}}</td>
                <td nowrap="nowrap">
                    @if($registration->status == 0)
                        <a href="{{route('registration.view',$registration->id)}}" title="View" data-toggle="tooltip" class="btn btn-sm btn-clean btn-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    @endif
                    @if($registration->email != 'Transferred')
                        <a class="createmail" type="button" data-toggle="modal" data-target="#mail">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    @endif
                    <a class="delete" data-id="{{$registration->id}}" data-url="request" data-name="Request" type="button" title="Delete" data-toggle="tooltip">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <div class="text-center">
        {{$registrations->links('layout.pagination')}}
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="mailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title sendto" id="mailLabel">Send Mail To: <strong class="usermail"></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="registration" name="body" cols="100" rows="10" autofocus></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary font-weight-bold sendmail">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

