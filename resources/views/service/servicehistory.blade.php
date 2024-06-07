{{-- @dd($value3,$visitone,$visittwo,$visitthree,$visitfour); --}}
@extends('layouts.layouts')
{{-- @section('content') --}}
<div class="main">


    @extends('layouts.layouts')

    @section('content')
        <div class="main">
            <div class="row align-items-center">
                <div class="col-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            {{-- <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill shadow pt-3 ">
                    <p class="nav-item">
                        <a href="{{route('master.show',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0
                             {{ request()->route()->getName() === 'master.show' ? 'active' : '' }} "  >
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Asset Details</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visitone',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visitone' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-1</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visittwo',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visittwo' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-2</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visitthree',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visitthree' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-3</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visitfour',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visitfour' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-4</i></span>
                            </span>
                        </a>
                    </p>
                </ul>
            </div>
        </div> --}}
        <table class="table table-hover table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>Visit-1</th>
                    <th>Visit-2</th>
                    <th>Visit-3</th>
                    <th>Visit-4</th>
                    <th>DG Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if ($visitone->isNotEmpty())
                        @foreach ($visitone as $visit)
                                <p>{{ $visit->general }}</p>
                                <p>{{ $visit->last_os_service }}</p>
                                <p>{{ $visit->oil_service_date }}</p>
                                <p>{{ $visit->repair_work }}</p>
                            @endforeach
                        @else
                            <p>No records</p>
                        @endif
                    </td>
                    <td>
                        @if ($visittwo->isNotEmpty())
                            <h5>Last Oil Service</h5>
                            @foreach ($visittwo as $visit)
                                <p>{{ $visit->last_os_service }}</p>
                            @endforeach
                        @else
                            <p>No records</p>
                        @endif
                    </td>
                    <td>
                        @if ($visitthree->isNotEmpty())
                            <h5>Last Oil Service</h5>
                            @foreach ($visitthree as $visit)
                                <p>{{ $visit->last_os_service }}</p>
                            @endforeach
                        @else
                            <p>No records</p>
                        @endif
                    </td>
                    <td>
                        @if ($visitfour->isNotEmpty())
                            <h5>Last Oil Service</h5>
                            @foreach ($visitfour as $visit)
                                <p>{{ $visit->last_os_service }}</p>
                            @endforeach
                        @else
                            <p>No records</p>
                        @endif
                    </td>
                    <td>
                        {{-- @dd($value3) --}}
                        @if (isset($value3))
                        @php
                            $color = '';
                            if ($value3 <= 100) {
                                $color = 'green';
                            } elseif ($value3 >= 100 && $value3 <= 150) {
                                $color = 'yellow';
                            } elseif ($value3 > 150 && $value3 > 200) {
                                $color = 'red';
                            }
                            @endphp
                            <div style="width: 70px; height: 20px; background-color: {{ $color }};"></div>
                        @else
                        <p>No DG status available</p>
                    @endif
                    </td>
                </tr>
            </tbody>
        </table>













            {{-- @if ($visitone->isEmpty() && $visittwo->isEmpty() && $visitthree->isEmpty() && $visitfour->isEmpty())
                <p>No visit records found for the provided asset number and engineer ID.</p>
            @endif --}}
