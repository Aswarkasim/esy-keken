<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/posts/kategori/create'))
          <form action="/admin/posts/kategori" method="POST">  
        @else
          <form action="/admin/posts/kategori/{{$kategori->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($kategori) ? $kategori->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          {{-- <input type="text" class="form-control" name="id" value="{{ isset($kategori) ? $kategori->id : '' }}"> --}}


     {{-- {!!form_input($errors, 'nama', 'Nama', isset($kategori) ? $kategori : null)!!} --}}

          <a href="/admin/posts/kategori" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

