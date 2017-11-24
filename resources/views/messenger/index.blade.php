@extends('layouts.master')

@section('content')
    @include('messenger.partials.flash')

<script type="text/javascript">
  function vermsg(msg_id) {
      $('#content').empty();
      $('#content').load(
          "<?php echo url('messages'); ?>"+ "/" +msg_id
      );

  }

</script>
    @each(
      'messenger.partials.thread',
      $threads,
      'thread',
      'messenger.partials.no-threads'
    )
@stop
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-futbol-o">Mensajes</i>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>nombre</th>
              <th>creado por</th>
              <th>participantes</th>
              <th>eliminar</th>
            </tr>
          </thead>
          