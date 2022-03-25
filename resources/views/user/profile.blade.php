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
						<h3 class="fw-bolder m-0">Profile Details</h3>
					</div>
					<div class="card-title m-0 pull-right">
						<a href="{{ route('user.changePassword') }}" class="btn btn-primary"> Change Password</a>
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
								<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<!--begin::Image input-->
									<div class="image-input image-input-outline" data-kt-image-input="true"
										style="background-image: url({{asset('admin/media/avatars/blank.png')}})">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-125px h-125px"
											style="background-image: url({{asset('admin/media/avatars/150-26.jpg')}})">
										</div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											title="Change avatar">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="avatar_remove" />
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
											title="Cancel avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="remove" data-bs-toggle="tooltip"
											title="Remove avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
									<!--end::Hint-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<!--begin::Row-->
									<div class="row">
										<!--begin::Col-->
										<div class="col-lg-6 fv-row">
											<input type="text" name="first_name"
												class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
												placeholder="First name" value="{{ $user->first_name }}" />
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6 fv-row">
											<input type="text" name="last_name"
												class="form-control form-control-lg form-control-solid"
												placeholder="Last name" value="{{ $user->last_name }}" />
										</div>

										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="email" name="company"
										class="form-control form-control-lg form-control-solid" placeholder="Email"
										value="{{ $user->email }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Card body-->
						<!--begin::Actions-->
						<div class="card-footer d-flex justify-content-end py-6 px-9">
							<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
							<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
								Changes</button>
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