
@include('layoutuser.v_head')
@include('layoutuser.v_nav')
@include('layoutuser.v_header')

        <!-- Section-->
        <section class="py-5">
          <h4 style="text-align:center;">Daftar Buku</h4>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  @foreach ($listbuku as $listbuku)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <h5 class="fw-bolder">{{$listbuku->judul_buku}}</h5>
                            <img class="card-img-top" src="{{ url('foto_buku/'.$listbuku->gambar_buku)}}" alt="{{$listbuku->gambar_buku}}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->

                                    {{-- <p>Posisi Buku</p> --}}
                                    <p>Berada pada rak buku dengan nama rak <b>{{$listbuku->nama_rak}}</b> </p>
                                    <!-- Product price-->

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                {{-- <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="#">Letak buku </a></div> --}}
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </section>

@include('layoutuser.v_footer')
