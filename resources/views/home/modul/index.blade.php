{{-- <div class="img-wrapper-cover">
  <img src="/img/cover.jpeg" width="100%" alt="">
</div> --}}

<div class="container my-4">

    <div class="row">
      <div class="col-md-8">
        <div class="text-success pt-2"><h4><strong>Modul Pekerjaan  </strong></h4></div>

        <table class="table">
            <tr>
                <td>NO</td>
                <td>NAMA MODUL</td>
                <td>ACTION</td>
            </tr>

            <tr>
                @foreach ($modul as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/modul/download?modul={{ $item->modul }}"><i class="fas fa-download"></i> Download</a>
                        </td>
                    </tr>
                @endforeach
            </tr>

        </table>
        {{ $modul->links() }}
      </div>
      <div class="col-md-4">
        <div class="text-success py-4"><h4><strong>Kategori Berita</strong></h4></div>
        <div class="card p-3">
          @foreach ($kategori as $item)
          <a href="/artikel?kategori_id={{$item->id}}" class="text-decoration-none my-2"><strong>{{$item->name}}</strong></a>
          <hr>
          @endforeach
        </div>
  

      </div>
  
  
      </div>
  
      
  
    </div>
  </div>