@extends('layouts.main')
@section('content')
<div class="container">
	@if(session()->get('success'))
		<div class="alert alert-success">
			{{session()->get('success')}}
		</div><br/>
	@endif
<h3>Қуйидаги жадвалларга маълумотларни киритинг</h3>
		{{Form::open(['route' => ['validatsiya.update', $validatsiya->id], 'method' => 'put'])}}
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
		{{Form::select('status', [''=>'Танланг','1' => 'Ўқиш жараёнида', '2' => 'Битирган', '3' => 'Четлатилган'], $validatsiya->status??null,['class' => 'form-control'])}}
		<label>Расмингизни юкланг (3х4):</label>
		{{Form::file('photo', ['class' => 'form-control'])}}
		<label>Бўйруқ рақами ва санаси:</label>
		{{Form::file('certPhoto', ['class' => 'form-control'])}}
		<label>Тамомланганлиги тўғрисидаги бўйруқ:</label>
		{{Form::text('exitingNumber', $validatsiya->exitingNumber??null, ['class' => 'form-control'])}}
		<label>Ўқув курси тугаган сана:</label>
		{{Form::date('endDay', $validatsiya->endDay??null, ['class' => 'form-control'])}}
		<label>Сертификат рақами:</label>
		{{Form::text('certNumber', $validatsiya->certNumber??null, ['class' => 'form-control'])}}
		<label>Сертификат олинган сана:</label>
		{{Form::date('certDate', $validatsiya->certDate??null, ['class' => 'form-control'])}}
		</div>
	<button type="submit" class="btn btn-primary">Сақлаш</button>
	{!! Form::close() !!}
</div>
@endsection