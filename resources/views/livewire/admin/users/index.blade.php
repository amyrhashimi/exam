<div>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            تمام کاربران
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="row">
                                <div class="col-auto">
                                    <select class="form-control" wire:model="type">
                                        <option value="">همه</option>
                                        <option value="0">کاربران</option>
                                        <option value="1">ادمین ها</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" wire:model="paginate">
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">نام</th>
                                <th class="min-w-125px">نام خانوادگی</th>
                                <th class="min-w-125px">نام کاربری</th>
                                <th class="min-w-125px">ایمیل</th>
                                <th class="min-w-125px">موقعیت</th>
                                <th class="min-w-125px">تلفن همراه</th>
                                <th class="text-end min-w-100px">عملیات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold" >
                            @foreach( $users as $user )
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::User=-->
                                    <td class="d-flex align-items-center" >
                                        <!--begin:: Avatar -->
                                        <div>
                                            <a class="symbol symbol-circle symbol-50px overflow-hidden me-3" href="{{ route('users.edit', $user->id) }}">
                                                <img src="{{ $user->isAdmin == 1 ? asset('assets/media/avatars/admin.png') : asset('assets/media/avatars/users.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <!--end::User=-->
                                    <!--begin::Role=-->
                                    <td>
                                        {{ $user->family }}
                                    </td>
                                    <!--end::Role=-->
                                    <!--begin::Last login=-->
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <!--end::Last login=-->
                                    <!--begin::Two step=-->
                                    <td>
                                        @if($user->email !== null)
                                            {{ $user->email }}
                                        @else
                                            <div class="badge badge-warning fw-bolder"> ایملی ندارد </div>
                                        @endif
                                    </td>
                                    <!--end::Two step=-->
                                    <!--begin::Joined-->
                                    <td>
                                        @if($user->isAdmin == 1)
                                            <div class="badge badge-light fw-bolder"> ادمین </div>
                                        @else
                                            <div class="badge badge-light fw-bolder"> کاربر </div>
                                        @endif
                                    </td>
                                    <!--begin::Joined-->

                                    <!--begin::Joined-->
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <!--begin::Joined-->

                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black"/>
                                            </svg>
                                        </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div
                                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <span class="menu-link px-3" wire:click="edit({{ $user->id }})">ویرایش</span>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <form action="{{ route('users.destroy', $user->id ) }}" method="POST" id="delete-user-{{ $user->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <span class="menu-link px-3" onclick="document.getElementById('delete-user-{{ $user->id }}').submit()" data-kt-users-table-filter="delete_row">حذف</span>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->

                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->

                        <ul class="pagination pagination-rounded justify-content-end my-2">
                            {{ $users->appends( request()->query() )->links() }}
                        </ul>
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

</div>
