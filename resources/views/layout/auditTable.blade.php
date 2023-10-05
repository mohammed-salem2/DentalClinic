@extends('layout.table')
@section('table')
    <table class="table table-separate table-head-custom dataTable dtr-inline" role="grid" aria-describedby="kt_datatable_info" id="datatable_2">
        <thead>
        <tr>
            <th>User</th>
            <th>Action</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($audits as $audit)
            <tr>
                <td>{{$audit->user->name}}</td>
                <td>{{$audit->event}}</td>
                <td>{{$audit->created_at}}</td>
                <td nowrap="nowrap">
                    <a href="@yield('route')" title="Details" data-toggle="tooltip" class="btn btn-sm btn-clean btn-icon">
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
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('footer')
    <div class="text-center">
        {{$audits->links('layout.pagination')}}
    </div>
@endsection
