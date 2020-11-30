<div class="form-group col-md-12">
    <br/>
    <label>Вилоят номи</label>
    {{Form::select('region_id', [__('')]+Arr::pluck($regions,'name','id'),$district->region_id??null, ['class' => 'form-control'])}}
    <label class="mt-2">Tuman Nomi UZ</label>
    {{Form::text('name[uz]', $district->name['uz']??null, ['class' => 'form-control'])}}
    <br/>    <label class="mt-2">Название района RU</label>
    {{Form::text('name[ru]', $district->name['ru']??null, ['class' => 'form-control'])}}
    <br/>    <label class="mt-2">Name of District EN</label>
    {{Form::text('name[en]', $district->name['en']??null, ['class' => 'form-control'])}}

</div>