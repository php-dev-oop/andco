@extends('layouts.admin-app')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Basic info-->
			<div class="card mb-5 mb-xl-10">
				<!--begin::Card header-->
				<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
					data-bs-target="#kt_account_profile_details" aria-expanded="true"
					aria-controls="kt_account_profile_details">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Change Password</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--begin::Card header-->
				<!--begin::Content-->
				<div id="kt_account_settings_profile_details" class="collapse show">
					<!--begin::Form-->
					<form id="kt_account_profile_details_form" class="form">
						<!--begin::Card body-->
						<div class="card-body border-top p-9">
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-2 offset-lg-2 col-form-label required fw-bold fs-6">Current
									Password</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-4 fv-row">
									<input type="password" class="form-control form-control-lg form-control-solid"
										placeholder="Enter Current Password">
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-2 offset-lg-2 col-form-label required fw-bold fs-6">New
									Password</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-4 fv-row">
									<input type="password" class="form-control form-control-lg form-control-solid"
										placeholder="Enter New Password">
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-2 offset-lg-2 col-form-label required fw-bold fs-6">Confirm
									Password</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-4 fv-row">
									<input type="password" class="form-control form-control-lg form-control-solid"
										placeholder="Enter Congirm Password">
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Card body-->
						<!--begin::Actions-->
						<div class="card-footer d-flex py-6 px-9">
							<button type="submit" class="btn btn-primary">Update Password</button>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Basic info-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->

@endsection