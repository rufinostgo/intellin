<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-body">

      <p class="title_view">Estas viendo</p>

      <h3 class="title">{{ $title }}</h3>

      <p class="description">{{ $description }}</p>

      <button type="button" class="cerrar border-0" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="close">&times;</span>
      </button>

      <div id="indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#indicators" data-slide-to="0" class="active">1</li>
          <li data-target="#indicators" data-slide-to="1">2</li>
          <li data-target="#indicators" data-slide-to="2">3</li>
        </ol>
        <p class="num"></p>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ $images }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ $images }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ $images }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div><!-- /.modal-body -->
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

@section('myscripts')
  <script type="text/javascript">

  </script>
@endsection
