@include('layout.v_head')
<!-- Site wrapper -->
@include('layout.v_header')

@include('layout.v_sidebar')

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">@yield('title_card')</h3>
        </div>
        <div class="card-body">
          @yield('content')
        </div>
        <div class="card-footer">
        </div>
      </div>

@include('layout.v_footer')
