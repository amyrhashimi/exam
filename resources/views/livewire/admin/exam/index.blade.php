<div>

    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mt-10">
                    {{-- HEADER CARD --}}
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            @lang('examAdmin.exams')
                        </div>
                        <div class="card-toolbar">
                            <div class="row">
                                <div class="col-auto mt-5">
                                    <select class="form-control" wire:model="paginate">
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>

                                <div class="col-auto mt-5">
                                    <input type="text" class="form-control" placeholder="@lang('examAdmin.search')" wire:model="search">
                                </div>

                                <div class="col-auto mt-5">
                                    <button type="button" class="btn btn-primary btn-hover-scale" wire:click="create"> @lang('examAdmin.create') </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">

                            <thead>

                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">@lang('examAdmin.title')</th>
                                    <th class="min-w-125px">@lang('examAdmin.slug')</th>
                                    <th class="min-w-125px">@lang('examAdmin.count')</th>
                                    <th class="text-end min-w-100px">@lang('examAdmin.option')</th>
                                </tr>

                            </thead>

                            <tbody class="text-gray-600 fw-bold" >
                                @foreach( $exams as $exam )
                                    <tr>
                                        <td class="d-flex align-items-center" >
                                            <div>
                                                <a class="symbol symbol-circle symbol-50px overflow-hidden me-3" href="{{ route('exams.edit', $exam->id) }}">
                                                    <img src="{{ asset('assets/media/avatars/users.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('exams.edit', $exam->id) }}"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $exam->title }}</a>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $exam->slug }}
                                        </td>

                                        <td>
                                            {{ $exam->questions()->count() }}
                                        </td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">@lang('examAdmin.option')
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <span class="menu-link px-3" wire:click="edit({{ $exam->id }})">@lang('examAdmin.option')</span>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <span class="menu-link px-3" wire:click="showQuestion({{ $exam->id }})">@lang('examAdmin.showQuestion')</span>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <span wire:click="destroy({{ $exam->id }})" class="menu-link px-3" data-kt-users-table-filter="delete_row">@lang('examAdmin.delete')</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        </div>


                        <ul class="pagination pagination-rounded justify-content-end my-2">
                            {{ $exams->appends( request()->query() )->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
