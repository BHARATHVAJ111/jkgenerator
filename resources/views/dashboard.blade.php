@extends('layouts.sidebar')
@section('content')
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
            @if (auth()->user()->role_id == 8)
                <div class="col">
                    <div class="welcome-back">Hai JKPL Service<span class="drop-truck"></span></div>
                </div>
            @endif
            @if (auth()->user()->role_id == 7)
                <div class="col">
                    <div class="welcome-back">Hai JKPL Sales<span class="drop-truck"></span></div>
                </div>
            @endif
            @if (auth()->user()->role_id == 6)
                <div class="col">
                    <div class="welcome-back">Hai JKPL Store<span class="drop-truck"></span></div>

                    {{-- <div class="welcome-back">Welcome Back,<span class="drop-truck"></span></div> --}}
                </div>
            @endif
            <div class="col-auto">

                <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
                <!-- Inside the 'content-wrapper' div -->
                {{-- @if (auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
            <button type="button" class="btn btn-success dash1 mt-3" data-bs-toggle="modal" data-bs-target="#createIndentModal">Add</button>
            @endif --}}


                <!-- Modal -->
                <div class="modal fade container-fluid" id="createIndentModal" tabindex="-1"
                    aria-labelledby="createIndentModalLabel" aria-hidden="true">
                    <div class="modal-dialog rounded" role="document">
                        <div class="modal-content">
                            <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                                ADD PARTS
                            </div>
                            <div class="modal-body">
                                @include('indent.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @dd($data) --}}
        @if (auth()->user()->role_id == 6)
        @yield('content')
            {{-- <div class="container-fluid">
      <div class="">
          <ul class="d-flex gap-5">
              <p class="nav-item">
                  <a href="{{route('sales.index')}}"
                      class="nav-link align-middle px-0 {{ request()->route()->getName() === 'sales.index' ? 'active' : '' }} " data-bs-toggle="modal"
                      data-bs-target="#createIndentModal">
                      <span class="ms-1 d-none d-sm-inline">
                          <span class="ms-1">Wainting Stocks</i></span>
                      </span>
                  </a>
              </p>
          </ul>
      </div>
  </div> --}}
        @endif
    @endsection
