<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" /> --}}
    <style>

        .grid-container {
          display: grid;
          grid-template-columns: auto auto auto auto;
          background-color: white;
        }

        .grid-container > div {
          background-color: rgba(255, 255, 255, 0.8);
          text-align: center;
          font-size: 30px;
        }
        </style>
    <title>Dashboard</title>
</head>
@extends('layout')
@section('content')
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-light m-5">
        <div class="container">
            <label class="nav-link text-black" style="font-family: 'Roboto', sans-serif; font-size:20px;">Blood Donation <a style="font-family: 'Roboto', sans-serif; font-size:10px; color:gray">{{$blood->count()}} Total</a></label>
            <div class="card">
                <a class="nav-link btn btn-primary" href="/create">New Donation</a>
            </div>
        </div>
    </nav>
    {{-- Donors --}}
    <section>
        <div class="card m-5 border-0">
            <div class="grid-container">
                <div class="card m-3" >
                    <div class="item1">
                        <img src="https://cdn.pixabay.com/photo/2017/08/22/11/54/blood-group-2668685_1280.png" alt="" width="100px">
                        <label style="font-family: 'Roboto', sans-serif; font-size:20px;">Donators :</label>
                        <label style="font-family: 'Roboto', sans-serif; font-size:20px;">{{$a}}</label>
                    </div>
                </div>
                <div class="card m-3">
                    <div class="item2">
                        <img src="https://cdn.pixabay.com/photo/2017/08/22/11/56/blood-group-2668698_1280.png" alt="" width="100px">
                        <label style="font-family: 'Roboto', sans-serif; font-size:20px;">Donators :</label>
                        <label style="font-family: 'Roboto', sans-serif; font-size:20px;">{{$b}}</label>
                    </div>
                </div>
                <div class="card m-3">
                    <div class="item3">
                        <img src="https://cdn.pixabay.com/photo/2017/08/22/11/55/blood-group-2668693_1280.png" alt="" width="100px">
                        <label style="font-family: 'Roboto', sans-serif; font-size:20px;">Donators :</label>
                        <label style="font-family: 'Roboto', sans-serif; font-size:20px;">{{$ab}}</label>
                    </div>
                </div>
                <div class="card m-3">
                <div class="item4">
                    <img src="https://cdn.pixabay.com/photo/2017/08/22/11/54/blood-group-2668683_1280.png" alt="" width="100px">
                    <label style="font-family: 'Roboto', sans-serif; font-size:20px;">Donators :</label>
                    <label style="font-family: 'Roboto', sans-serif; font-size:20px;">{{$o}}</label>
                </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Table data --}}
    <section>
        <div class="card m-5">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex align-items-center h-100">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-12">
                        <div class="table-responsive bg-white">
                          <table class="table mb-0 text-center">
                            <thead>
                              <tr>
                                <th scope="col">NIK</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                                <th scope="col">Blood Type</th>
                                <th scope="col">Total CC</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($blood as $Blood)
                              <tr>
                                <th scope="row" style="color: #666666;">{{$Blood['nik']}}</th>
                                <td>{{$Blood['name']}}</td>
                                <td>{{$Blood['age']}}</td>
                                <td>{{$Blood['address']}}</td>
                                @if($Blood['blood'] == '')
                                <td>-</td>
                                <td>-</td>
                                @else
                                <td>{{$Blood['blood']}}</td>
                                <td>{{$Blood['cc']}}</td>
                                @endif
                                <td>
                                <button type="button" class="btn btn-warning fa-solid fa-pen-to-square" onclick="window.location='/edit/{{$Blood['id']}}';"></button>
                                <button onclick="deletedata({{ $Blood['id'] }})" class="btn btn-danger fa-solid fa-trash-can"></button>
                            </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
<script>
    function deletedata($data_id){
    var token = document.querySelector('meta[name="csrf-token"]').content;

    let bodyContent = new FormData();
    bodyContent.append("_token", token);
    bodyContent.append("_method", "DELETE");

    fetch('delete/'+$data_id, {
    method: 'POST',
    body: bodyContent
    });
    document.location.reload();
    };
</script>
@endsection
