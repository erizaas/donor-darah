<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Data</title>
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
                <form action="/create" method="POST">
                  @csrf
                  {{-- Golongan darah --}}

                  {{-- Input Nik --}}
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="form-nik">NIK</label>
                        <input name="nik" type="number" id="form-nik" class="form-control" placeholder="1210xxxx">
                      </div>
                    </div>

                    {{-- Input Age --}}
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="form-age">Age</label>
                        <input name="age" type="number" id="form-age" class="form-control" placeholder="Masukan Umur">
                      </div>
                    </div>
                  </div>

                  {{-- Input Name --}}
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form-name">Full name</label>
                    <input name="name" type="text" id="form-name" class="form-control" placeholder="Masukan Nama">
                  </div>

                  {{-- Input Address --}}
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form-address">Address</label>
                    <input name="address" type="text" id="form-address" class="form-control" placeholder="Masukan Alamat">
                  </div>

                  {{-- <hr class="my-4"> --}}

                  <button class="btn btn-secondary" type="button" onclick="window.location='/dashboard';" style="font-family: 'Roboto', sans-serif;">
                    BACK
                  </button>
                  <button class="btn btn-primary" type="submit" style="font-family: 'Roboto', sans-serif;">
                    ADD NOW <i class="fa-sharp fa-solid fa-plus ml-2"></i>
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
