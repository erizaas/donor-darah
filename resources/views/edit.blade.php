<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
</head>
    @extends('layout')
    @section('content')
    <section>
        <div class="row justify-content-center">
          <div class="col-md-8 mb-4">
            <div class="card m-4">
              <div class="card-header py-3">
                <h5 class="mb-1">Blood Donation</h5>
                <label class="font-italic mb-1">Please fill all the input with the right value</label>
              </div>
              <div class="card-body">
                <form action="/update/{{$blood['id']}}" method="POST">

                  @csrf
                  @method('PATCH')
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                      </ul>
                    </div>
                  @endif

                {{-- Golongan darah --}}
                <label class="form-label font-italic">Golongan Darah</label>
                <div class="d-flex">
                  {{-- Golongan darah A --}}
                  <div class="form-check" style="margin-right: 15px">
                    <input name="blood" value="A" class="form-check-input" type="radio" name="flexRadioDefault" id="golForm1">
                    <label class="form-check-label" for="golForm1">A</label>
                  </div>

                  {{-- Golongan darah B --}}
                  <div class="form-check" style="margin-right: 15px">
                      <input name="blood" value="B" class="form-check-input" type="radio" name="flexRadioDefault" id="golForm2">
                      <label class="form-check-label" for="golForm2">B</label>
                  </div>

                  {{-- Golongan darah AB --}}
                  <div class="form-check" style="margin-right: 15px">
                      <input name="blood" value="AB" class="form-check-input" type="radio" name="flexRadioDefault" id="golForm3">
                      <label class="form-check-label" for="golForm3">AB</label>
                  </div>

                  {{-- Golongan darah O --}}
                  <div class="form-check mb-4">
                      <input name="blood" value="O" class="form-check-input" type="radio" name="flexRadioDefault" id="golForm4">
                      <label class="form-check-label" for="golForm4">O</label>
                  </div>
                </div>

                  {{-- Input Nik --}}
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="form-nik">NIK</label>
                        <input name="nik" type="number" id="form-nik" class="form-control" placeholder="1210xxxx" value="{{$blood['nik']}}">
                      </div>
                    </div>

                    {{-- Input Age --}}
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="form-age">Age</label>
                        <input name="age" type="number" id="form-age" class="form-control" placeholder="Masukan Umur" value="{{$blood['age']}}">
                      </div>
                    </div>
                  </div>

                  {{-- Input Name --}}
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form-name">Full name</label>
                    <input name="name" type="text" id="form-name" class="form-control" placeholder="Masukan Nama" value="{{$blood['name']}}">
                  </div>

                  {{-- Input Address --}}
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form-address">Address</label>
                    <input name="address" type="text" id="form-address" class="form-control" placeholder="Masukan Alamat" value="{{$blood['address']}}">
                  </div>

                  {{-- Input Address --}}
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form-kantong">Total Kantong</label>
                    <input name="cc" type="number" id="form-kantong" class="form-control" placeholder="0" value="{{$blood['cc']}}">
                  </div>

                  <button class="btn btn-secondary" type="button" style="font-family: 'Roboto', sans-serif;" onclick="window.location='/dashboard';">
                    BACK
                  </button>
                  <button class="btn btn-primary" type="submit" style="font-family: 'Roboto', sans-serif;">
                    UPDATE NOW <i class="fa-thin fa-pen-to-square ml-2"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
