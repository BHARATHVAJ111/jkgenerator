@extends('layouts.layouts')
<div class="container">
    <h4 class="text-center mt-3"><span class="border-bottom border-primary border-4 pb-1">Vehicle History</span></h4>
<table class="table table-bordered border-dark table-striped table-hover table-responsive mt-5">
        <thead>
          <tr>
            <th scope="col">Vehicle No</th>
            <th scope="col">Service Date</th>
            <th scope="col">Vehicle History</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($history as $value)
          <tr>
            <td>{{$value->vehicle_no}}</td>
            <td>{{$value->date}}</td>
            <td>{{$value->description}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


    