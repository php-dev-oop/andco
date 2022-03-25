@extends('layouts.admin-app')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card" style="border:#009ef7 1px solid;">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2> Permissions </h2>
                    </div>
                    <div class="card-title" style="margin-left:auto;">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-datatable-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                        </div>
                        <!--end::Search-->
                        <!--begin::Add role-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#CreatePermission"><i class="fa fa-plus"></i></button>
                        <!--end::Add role-->
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder text-uppercase">
                                <th>Name</th>
                                <th>Created Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ date('d M Y, H:i a',strtotime($permission->created_at)) }}</td>
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="javascript:;" class="btn btn-light-success EditPermission"
                                        data-id="{{ $permission->id }}" data-name="{{ $permission->name }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Edit {{ $permission->name }} Permission">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('permission/destroy/'.$permission->id) }}"
                                        class="btn btn-light-danger" data-toggle="tooltip" data-placement="top"
                                        title="Delete {{ $permission->name }} Permission">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

<div class="modal fade" tabindex="-1" id="CreatePermission">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('permission.store') }}" method="POST">@csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create Permission</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control form-control-lg"
                                placeholder="Enter Permission Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="EditPermission">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('permission.update') }}" method="POST">@csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Permission</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <input type="hidden" name="permission_id" id="permission_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="permission_name" required
                                class="form-control form-control-lg" placeholder="Enter Permission Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(".EditPermission").on("click",function(){
        
        $("#permission_id").empty();
        $("#permission_name").empty();

        var permission_id = $(this).attr("data-id");
        var permission_name = $(this).attr('data-name');

        $("#permission_id").val(permission_id);
        $("#permission_name").val(permission_name);

        $('#EditPermission').modal('show');
    });
    
</script>

@endsection