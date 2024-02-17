@extends('layouts.admin.base')

@section('title' , __('Admins'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Admins'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Admins" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Filter-->
        <button type="button" class="btn btn-sm fw-bold btn-primary" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                fill="white"/>
                        </svg>
                    </span>
            <!--end::Svg Icon-->{{__('Filter')}}</button>
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
            <form method="GET" action="{{route('admin.admins.index')}}">
                <!--begin::Header-->
                <div class="px-7 py-5">
                    <div class="fs-5 text-dark fw-bolder">{{__('Filter Options')}}</div>
                </div>
                <!--end::Header-->
                <!--begin::Separator-->
                <div class="separator border-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Content-->
                <div class="px-7 py-5" data-kt-user-table-filter="form">
                    <div class="mb-10">
                        <label class="form-label fs-6 fw-bold">{{__('Role Name')}}:</label>
                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                data-placeholder="{{__('Please Chose One')}}" data-allow-clear="true"
                                data-kt-user-table-filter="role" data-hide-search="true" name="role">
                            <option value=""></option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                data-kt-menu-dismiss="true"
                                data-kt-user-table-filter="reset">{{__('Reset')}}</button>
                        <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true"
                                data-kt-user-table-filter="filter">{{__('Apply')}}</button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Content-->
            </form>
        </div>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$admins" search="Search In Admins" :formUrl="route('admin.admins.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>
            <th class="min-w-125px">{{__('Admin')}}</th>
            <th class="min-w-125px">{{__('Roles')}}</th>
            <th class="min-w-125px">{{__('Last Login')}}</th>
            <th class="min-w-125px">{{__('Joined Date')}}</th>

            <th class="text-end min-w-100px"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($admins as $admin)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$admin->id}}"/>
                    </div>
                </td>

                <!--begin::User=-->
                <td class="d-flex align-items-center">
                    <!--begin:: Avatar -->
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <div
                            class="symbol-label fs-3 bg-light-primary text-primary ">{{ strtoupper(substr($admin->name, 0, 2)) }} </div>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 mb-1">{{$admin->name}}
                        </p>
                        <a class="text-hover-primary text-gray-500"
                           href="mailto:{{$admin->email}}">{{$admin->email}}</a>
                    </div>
                    <!--begin::User details-->
                </td>
                <!--end::User=-->
                <td>
                    @if($admin->roles->isNotEmpty())
                        {{$admin->roles->first()->name}}
                    @else
                        {{__('No Role Assigned')}}
                    @endif
                </td>

                <!--begin::Last login=-->
                <td>
                    <div class="badge badge-light fw-bolder">
                        {{$admin->last_login_human}}
                    </div>
                </td>
                <!--end::Last login=-->
                <!--begin::Joined-->
                <td>{{$admin->created_at}}</td>
                <!--begin::Joined-->
                <!--begin::Action=-->

                <td>
                    <a href="{{route('admin.admins.switch' , [$admin->id])}}"
                       class="btn btn-outline-warning btn-outline btn-sm">
                        {{__('Switch To User')}}
                    </a>
                </td>
                <!--end::Action=-->

            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
@endsection

@section('js')
@endsection
