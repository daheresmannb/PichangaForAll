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
