@extends('superadmin.dashboard.layout.layout')

@section('content')


                      

<div class="col-md-4">
    <button type="button" class="btn btn-block btn-default mb-3 border" data-bs-toggle="modal"
        data-bs-target="#modal-form">Tambah</button>
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h4 class="font-weight-bolder text-info text-gradient">Tambah Jalur</h4>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" action="{{ url('/superadmin/dashboard/jalur/store') }}"
                                method="POST">
                                @csrf
                                <label>Jalur</label>
                                <div class="input-group mb-3">
                                    <input type="text"  name="nama" class="form-control"
                                        placeholder="Nama">
                                </div>
                                <label>Bagian</label>
                                <input  type="text"  name="jenis" class="form-control"
                                        placeholder="Jenis" value="Extruder">
                                  
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col">
        <div class="card card-frame">
            @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
            @error('jenis')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="card-body">
                @foreach ($jalur as $item)
    

                <div class="card-body">
                    <div class="w-50 mx-auto">
                      <img src="./assets/img/kit/pro/anastasia.jpg" alt="" class="img-fluid">
                    </div>
                    <p class="card-description mb-5 mt-3">
                      "Use border utilities to quickly style the border and border-radius of an element. Great for images, buttons."
                    </p>
                    <div class="pull-left">
                      <span>―</span>
                      Collin Marcus
                    </div>
                    <a href="javascript:;" class="text-success icon-move-right pull-right">Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
                

                <a href="/superadmin/dashboard/loogbok/{{ $item->nama }}/data">
                    <button type="button" class="btn bg-gradient-secondary rounded-pill">{{ $item->nama }}</button>
                </a>   
                
                @endforeach
            </div>
        </div>
    </div>
    <div class="col">


  
    </div>

@endsection

