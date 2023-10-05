@extends('layout.table')
@section('table')
    @if($category == null)
        <form class="row mb-3" action="" method="get">
            <div class="col-8 d-flex">
                <input maxlength="20" name="search" placeholder="Search By Account ID Or Name Or Email Or Phone .." type="text" class="form-control form-control-lg" autocomplete="off"/>
                @if(@$users[0] != null ? @$users[0]->hasRole('Doctor') : null)
                    <select class="form-control form-control-lg ml-3 selectpicker" name="category">
                        <option value=""></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        {{$category = null}}
                    </select>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </form>
    @endif
    <table class="table table-separate table-head-custom dataTable dtr-inline" role="grid" aria-describedby="kt_datatable_info" id="datatable_2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Account ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>About</th>
            @if($category == null && (@$users[0] != null ? @$users[0]->hasRole('Doctor') : null)) <th>Category</th> @endif
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="tr-container">
                <td>{{$user->id}}</td>
                <td>{{$user->account_id}}</td>
                <td>{{$user->name}}</td>
                <td class="mail">{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>
                    <a class="open-treatment" data-details="{{$user->about}}" type="button" data-toggle="modal" data-target="#about">
                        About
                    </a>
                </td>
                @if($category ==  null && $user->hasRole('Doctor')) <td>{{$user->category != null ? $user->category->name : 'No Category'}}</td> @endif
                <td nowrap="nowrap">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-light-primary font-weight-bold dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                             Options
                        </a>
                        <div class="dropdown-menu dropdown-menu-md py-5" style="">
                            <ul class="navi navi-hover navi-link-rounded-lg">
                                @if($user->hasRole('Patient'))
                                    <li class="navi-item">
                                        <a class="navi-link files" type="button" data-toggle="modal" data-id="{{\App\Models\File::where(['user_id' => $user->id])->pluck('file')}}" data-target="#doctorFiles">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Files</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="navi-item">
                                    <a class="navi-link createmail" type="button" data-toggle="modal" data-target="#mail">
                                        <span class="navi-icon">
                                            <span class="svg-icon svg-icon-primary">...</span>
                                        </span>
                                        <span class="navi-text">Send Mail</span>
                                    </a>
                                </li>
                                @role('Admin')
                                    <li class="navi-item">
                                        <a class="navi-link" href="{{route('appointment.index' , ['user_id' => $user->id])}}">
                                                <span class="navi-icon">
                                                    <span class="svg-icon svg-icon-primary">...</span>
                                                </span>
                                            <span class="navi-text">Appointments</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a class="navi-link" href="{{route('appointment.request' , ['user_id' => $user->id])}}">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Requested Appointments</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a class="navi-link" href="{{route('appointment.index' , ['user_id' => $user->id])}}">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Archived Appointments</span>
                                        </a>
                                    </li>
                                @endrole
                                @if($user->hasRole('Doctor'))
                                    <li class="navi-item">
                                        <a class="navi-link" type="button" href="{{route('schedule.index' , ['user_id' => $user->id])}}">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Schedule</span>
                                        </a>
                                    </li>
                                @endif
                                @role('Admin')
                                    <li class="navi-item">
                                        <a class="navi-link" type="button" href="{{route('treatment.index' , ['user_id' => $user->id])}}">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Treatments</span>
                                        </a>
                                    </li>
                                @endrole
                                @role('Doctor')
                                    @if($user->hasRole('Patient'))
                                        <li class="navi-item">
                                            <a class="navi-link" type="button" href="{{route('treatment.index' , ['user_id' => $user->id])}}">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-primary">...</span>
                                                    </span>
                                                <span class="navi-text">Treatments</span>
                                            </a>
                                        </li>
                                    @endif
                                @endrole
                                @role('Admin')
                                <li class="navi-item">
                                    <a class="navi-link" type="button" href="{{route('diagnose.index' , ['user_id' => $user->id])}}">
                                        <span class="navi-icon">
                                            <span class="svg-icon svg-icon-primary">...</span>
                                        </span>
                                        <span class="navi-text">Diagnoses</span>
                                    </a>
                                </li>
                                @endrole
                                @role('Doctor')
                                @if($user->hasRole('Patient'))
                                    <li class="navi-item">
                                        <a class="navi-link" type="button" href="{{route('diagnose.index' , ['user_id' => $user->id])}}">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Diagnoses</span>
                                        </a>
                                    </li>
                                @endif
                                @endrole
                                @role('Admin')
                                @if($user->hasRole('Doctor'))
                                    <li class="navi-item">
                                        <a class="navi-link" href="{{route('user.editCategory' , $user->id)}}">
                                            <span class="navi-icon">
                                                <span class="svg-icon svg-icon-primary">...</span>
                                            </span>
                                            <span class="navi-text">Edit</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="navi-item">
                                    <a class="navi-link delete" data-id="{{$user->id}}" data-url="user" data-name="User" type="button">
                                        <span class="navi-icon">
                                            <span class="svg-icon svg-icon-primary">...</span>
                                        </span>
                                        <span class="navi-text">Delete</span>
                                    </a>
                                </li>
                                @endrole
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <div class="text-center">
        {{$users->links('layout.pagination')}}
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="doctorFiles" tabindex="-1" role="dialog" aria-labelledby="doctorFilesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doctorFilesLabel">Files</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body filesbody">

                </div>
            </div>
        </div>
    </div>
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
                    <textarea class="details" name="body" cols="100" maxlength="700" rows="10" autofocus></textarea>
                    <span id="chars">700</span> characters remaining
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary font-weight-bold sendmail">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade about-model" id="about" tabindex="-1" role="dialog" aria-labelledby="aboutLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutLabel">About</h5>
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
