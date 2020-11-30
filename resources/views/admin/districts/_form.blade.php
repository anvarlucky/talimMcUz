<div class="form-group col-md-12">
    <br/>
    <label>Вилоят номи</label>
    {{Form::select('region_id', [__('')]+Arr::pluck($regions,'name','id'),$district->region_id??null, ['class' => 'form-control'])}}
    <label class="mt-2">Туман номи</label>
    {{Form::text('name', $district->name??null, ['class' => 'form-control'])}}
</div>