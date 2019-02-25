@extends('templates.master')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif($message = Session::get('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif



    <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
                <i class="material-icons">contacts</i>

            </div>
            <h4 class="card-title">Tambah & Edit Data Penggunaan Lahan</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{route('tambaheditpenggunaanlahan.create')}}">
              {{csrf_field()}}
                @foreach ($datas as $data)

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="bmd-label-floating">Kecamatan</label>
                            <input type="text" class="form-control" value="{{$data->daerah}}" disabled>
                            <input type="hidden" name="id[]" @if ($data->nilai != NULL)
                            value="{{$data->id}}"
                            @endif required>
                            <input type="hidden" name="id_kecamatan[]" value="{{$data->id}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <select name="nilai[]" class="form-control" required>
                                @foreach ($datas1 as $item)
                                    <option value={{$item->kategori}}>{{$item->kategori}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                @endforeach

              <button type="submit" class="btn btn-rose pull-right">Update Data TPA</button>
              <div class="clearfix"></div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
