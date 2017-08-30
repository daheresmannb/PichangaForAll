@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (!Auth::guest())
                        <h2>
                            Bienvenido {{ Auth::user()->name }}
                        </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
