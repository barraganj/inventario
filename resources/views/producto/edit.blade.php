<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">


<div class="container">

<form action="{{ url('/producto/'.$producto->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('producto.form')


</form>
</div>

 <script src="{{ asset(mix('js/app.js')) }}"></script>
