@extends('layouts.main')
@section('content')
<div class="container">
<h3>Қуйидаги жадвалларга маълумотларни киритинг</h3>
	{!! Form::open(['route' => 'validatsiya.store','method' => 'post','files'=>true]) !!}
	<div class="form-group col-md-12">
		<label>Ф.И.Ш.</label>
		{{Form::text('fullname', $validatsiya->fullname??null, ['class' => 'form-control'])}}
		<label>Тўғилган санаси:</label>
		{{Form::date('birthday', $validatsiya->birthday??null, ['class' => 'form-control'])}}
		<label>Яшаш манзили:</label>
		{{Form::text('address', $validatsiya->address??null, ['class' => 'form-control'])}}
		<label>Ўқув курси номи:</label>
		{{Form::text('course', $validatsiya->course??null, ['class' => 'form-control'])}}
		<label>Ўқув курси вилояти:</label>
		{{Form::text('courseRegion', $validatsiya->courseRegion??null, ['class' => 'form-control'])}}
		<label>Ўқув курси тумани:</label>
		{{Form::text('courseDistrict', $validatsiya->courseDistrict??null, ['class' => 'form-control'])}}
		<label>Қабул қилинганлиги бўйруқ рақами:</label>
		{{Form::text('enteringNumber', $validatsiya->enteringNumber??null, ['class' => 'form-control'])}}
		<label>Ўқув курси бошланган сана:</label>
		{{Form::date('startDay', $validatsiya->startDay??null, ['class' => 'form-control'])}}
		<label>Таълим муассаси номи:</label>
		{{Form::text('college', $validatsiya->college??null, ['class' => 'form-control'])}}
		<br/>
		<label>Расмингизни юкланг (3х4):</label>
		{{Form::file('photo', ['class' => 'form-control'])}}
		<label>Бўйруқ рақами ва санаси:</label>
		{{Form::file('certPhoto', ['class' => 'form-control'])}}
	</div>
	<button type="submit" class="btn btn-primary">Сақлаш</button>
	{!! Form::close() !!}
</div>
@endsection