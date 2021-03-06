@extends('layouts.app')
@section('title', 'Admin - YouTeach')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row mb-4">
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Students: {{ $students->count()}}</h2>
                  </div>
                  <div class="card-body">
                    
                      <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Student No.</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>
                            {{ $student->user_profile->family_name }}, {{ $student->user_profile->given_name }} {{ $student->user_profile->ext_name}} {{ $student->user_profile->middle_name
                            }}.
                        </td>
                        <td>{{$student->user_profile->gender}}</td>
                        <td>@if($student->isOnline()) <span class="dot-online"></span> @else <span class="dot-offline"></span> @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Events: {{ $events->count() }}</h2>
                  </div>
                  <div class="card-body">
                      <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($events as $event)
                    <tr>
                        <td>
                            {{ $event->title }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y - g:i A')}}</td>
                        <td>{{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y - g:i A')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                  </div>
                </div>

            </div>
          </section>
        </div>
        

@endsection