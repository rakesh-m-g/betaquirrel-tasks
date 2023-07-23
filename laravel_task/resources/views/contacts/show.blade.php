@extends('contacts.layout')
@section('content') 
<div class="card">
  <div class="card-header">View Page</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-title">first Name : {{ $contacts->first_name }}</p>
        <p class="card-text">last name : {{ $contacts->last_name }}</p>
        <p class="card-text">Phone : {{ $contacts->mobile }}</p>
        <p class="card-title">Email : {{ $contacts->Email }}</p>
        <p class="card-text">Address : {{ $contacts->address }}</p>
        <p class="card-text">branch : {{ $contacts->branch }}</p>
        <p class="card-title">mobile : {{ $contacts->mobile }}</p>
        <p class="card-text">subject : {{ $contacts->subject }}</p>
  </div>
  </div>
  <style>
    p{
      font-size:20px;
      font-style: ;
      font-weight: 300;
    }
  </style>
</div>