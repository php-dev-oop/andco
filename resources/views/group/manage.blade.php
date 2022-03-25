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
                        <h2> Groups </h2>
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
                            <input type="text" data-datatable="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                        </div>
                        <!--end::Search-->
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Default Role</th>
                                <th>Group Invitations</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($groups as $group)
                            <tr>
                                <td>
                                    <a href="{{ asset('admin/media/avatars/150-26.jpg') }}" data-lightbox="roadtrip">
                                        <img src="{{ asset('admin/media/avatars/150-26.jpg') }}"
                                            alt="{{ $group->image }}" class="h-100px">
                                    </a>
                                </td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->code }}</td>
                                <td>{{ $group->new_user_role }}</td>
                                <td>
                                    <!-- data-bs-toggle="modal" data-bs-target="#group_invitation_listing_modal" -->
                                    <a href="javascript:;" class="badge badge-primary GroupInvitationModal"
                                        data-id="{{ $group->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Group Invitation List">{{ $group->invited_count }}</a>
                                </td>
                                <td>{{ $group->user()->first()->display_name }}</td>
                                <td>{{ date('d M Y, H:i a',strtotime($group->created_at)) }}</td>
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

<div class="modal fade" tabindex="-1" id="group_invitation_listing_modal">
    <div class="modal-dialog" style="max-width:60% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Group Invitations</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="modal-body">
                <!--begin::Scroll-->
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable_modal">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder text-uppercase">
                                <th>Email</th>
                                <th>Role</th>
                                <th>Invited By</th>
                                <th>Invitation Status</th>
                                <th>Approved</th>
                                <th>Approved By</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <tr>
                                <td>haris@ooptechnologies.com</td>
                                <td>Viewer</td>
                                <td>AndCo.Mag Admin</td>
                                <td>
                                    <span class="badge badge-success">Invitation Accepted</span>
                                    <br>
                                    <span class="badge badge-primary">Invitation Pending</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">Approved</span>
                                    <br>
                                    <span class="badge badge-primary">Pending</span>
                                    <br>
                                    <span class="badge badge-danger">Rejected</span>
                                </td>
                                <td>AndCo.Mag Admin</td>
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Scroll-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".GroupInvitationModal").on("click",function(e){

        e.preventDefault();
        var group_id = $(this).attr('data-id');

        $.ajax({
            type: "GET",
            url: "{{ url('groupinvitations') }}/"+group_id,
            success: function(response){
                
                console.log(response);
                
                $.each(response,function(key, value) {
                    var my_item = {};
                    
                });
                
                //$("#group_invitation_listing_modal").modal('show');

            }
        });
    });

</script>

@endsection