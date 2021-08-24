
<div class="container">
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

<form action="{{ url('/producto') }}" method="post">
@csrf

@include('producto.form')
</form>


<script src="{{ asset(mix('js/app.js')) }}"></script>
</div>
