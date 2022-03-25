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
                    <div class="card-title"> <h2> Facts </h2></div>
                    <div class="card-title" style="margin-left:auto;">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1" >
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                        </div>
                        <!--end::Search-->
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CreateFact"><i class="fa fa-plus"></i></button>
                        <!--end::Add user-->
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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach($facts as $fact)
                            <tr>
                                <td>{{ $fact->title }}</td>
                                <td>{{ $fact->content }}</td>
                                <td>{{ date('d M Y, H:i a',strtotime($fact->created_at)) }}</td>
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="javascript:;" class="btn btn-light-success EditFact" data-id="{{ $fact->id }}" data-title="{{ $fact->title }}" data-content="{{ $fact->content }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit Fact">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('fact/destroy/'.$fact->id) }}" class="btn btn-light-danger"
                                        data-toggle="tooltip" data-placement="top" title="Delete Fact">
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

<div class="modal fade" tabindex="-1" id="CreateFact">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('fact.store') }}" method="POST">@csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create Fact</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" required class="form-control form-control-lg" placeholder="Enter Fact Title">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" required class="form-control form-control-lg" placeholder="Enter Fact Content"></textarea>
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

<div class="modal fade" tabindex="-1" id="EditFact">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('fact.update') }}" method="POST">@csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Fact</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <input type="hidden" name="fact_id" id="fact_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fact_title">Title</label>
                            <input type="text" name="title" id="fact_title" required class="form-control form-control-lg" placeholder="Enter Fact Title">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fact_content">Content</label>
                            <textarea name="content" id="fact_content" required class="form-control form-control-lg" placeholder="Enter Fact Content"></textarea>
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

    $(".EditFact").on("click",function(){
        
        $("#fact_id").empty();
        $("#fact_title").empty();
        $("#fact_content").empty();

        var fact_id = $(this).attr("data-id");
        var fact_title = $(this).attr('data-title');
        var fact_content = $(this).attr('data-content');

        $("#fact_id").val(fact_id);
        $("#fact_title").val(fact_title);
        $("#fact_content").val(fact_content);

        $('#EditFact').modal('show');
    });
    
</script>


@endsection