<div class="form-group col-md-12">
    <br/>
    <label>Туманни танланг</label>
    {{Form::select('district_id', [__(' ')]+Arr::pluck($districts,'name','id'),$college->district_id??null, ['class' => 'form-control'])}}
    <label>Масулни танланг</label>
    {{Form::select('user_id', [__(' ')]+Arr::pluck($users,'name','id'),$college->user_id??null, ['class' => 'form-control'])}}
    {{--<label>Директор танланг</label>
    {{Form::select('director_id', [__(' ')]+Arr::pluck($directors,'name','id'),$college->director_id??null, ['class' => 'form-control'])}}--}}
    <label>Коллеж номи</label>
    {{Form::text('name', $college->name??null, ['class' => 'form-control'])}}
    <label>Коллеж қисқа рақами</label>
    {{Form::text('code', $college->code??null, ['class' => 'form-control'])}}
</div>