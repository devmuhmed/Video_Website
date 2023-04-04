@extends('back-end.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('navTitle')
    {{ $title }}
@endsection

@section('content')
    {{-- @component('back-end.layouts.tool-bar')
        @slot('navTitle')
            {{$title}}
        @endslot
    @endcomponent --}}
    @component('back-end.shared.table', ['title' => $title, 'pageDesc' => $pageDesc, 'rows' => $rows])
        @slot('addButton')
            <a href="{{ route($routeName . '.create') }}" class="btn btn-sm btn-light btn-active-primary">
                Add {{ $sModuleName }}
            </a>
        @endslot
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-2 text-center">
                <!--begin::Table head-->
                <thead>
                    <tr class="border-0">
                        <th class="p-0">#</th>
                        <th class="p-0">Name</th>
                        <th class="p-0">Email</th>
                        <th class="p-0">Group</th>
                        <th class="p-0 min-w-100px text-end">Controll</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <a href="#"
                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $row->name }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                    {{ $row->email }}</a>
                            </td>
                            <td>
                                {{ $row->group }}
                            </td>
                            <td class="d-flex justify-content-end">
                                @include('back-end.shared.buttons.edit')
                                @include('back-end.shared.buttons.delete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            {{ $rows->links() }}
            <!--end::Table-->
        </div>
    @endcomponent
@endsection
