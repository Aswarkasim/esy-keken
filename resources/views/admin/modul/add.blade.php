<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/modul/create'))
          <form action="/admin/modul" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/modul/{{$modul->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          


            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($modul) ? $modul->name : old('name')}}" placeholder="Nama Lengkap">
                @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
            </div>

          <div class="form-group">
            <label for="">Modul</label>
            <input type="file" class="form-control  @error('modul') is-invalid @enderror"  name="modul"  placeholder="modul">
            <small>Hanya Menerima format PDF</small>
             @error('modul')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            {{-- @if (isset($modul))
                <img src="/{{$modul->image}}" width="100%" class="py-3" alt="">
            @endif --}}
          </div>

     
          <a href="/admin/modul" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

