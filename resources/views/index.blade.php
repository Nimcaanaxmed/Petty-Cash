@extends('dashboard')
@section('admin')

@php


$lastStatement = App\Models\Statement::orderBy('id', 'desc')->first();
$lastBalance = $lastStatement ? $lastStatement->balance : 0;


$setting = App\Models\Setting::find(1);


@endphp

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          @if(Auth::user()->can('dashboard.boxes'))   
          <div class="row">
           
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <i class="fas fa-circle-dollar-to-slot"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Current Balance</h4>
                  </div>
                  <div class="card-body">
                 {{$setting->currency}} {{number_format($lastBalance,2) }}
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                <i class="fas fa-circle-dollar-to-slot"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pending Amount</h4>
                  </div>
                  <div class="card-body">
                  {{$setting->currency}} 5676
                  </div>
                  <span class="">Due Amount: <strong> 546</strong></span>
                </div>
              </div>
            </div> -->
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <i class="fas fa-solid fa-landmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                  7565
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif



           
        </section>
      </div>


      @endsection