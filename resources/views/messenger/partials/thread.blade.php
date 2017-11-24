

<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>



<div class="media alert {{ $class }}">
    <h4 class="media-heading">

        <tbody id="conttabla">
            <td>

        <a class="btn btn-success btn-lg btn-block" onclick="vermsg(target)" target="{{ $thread->id }}" 
            >{{ $thread->subject }}</a>
            </td>
    </h4>
   
      <td>  
    <p>
        <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
    </p>
</td>
<td>
    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</td>
<td>
    <button class="btn btn-danger btn-lg btn-block">eliminar</button>
</td>
</div>













