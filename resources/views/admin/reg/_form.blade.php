<div class="form-group col-md-12">
    <br/><p class="darkblue-color">Viloyat nomi UZ</p>
    {{Form::text('name[uz]', $region->name['uz']??null, ['class' => 'form-control'])}}
    <br/><p class="darkblue-color">Названия Региона RU</p>
    {{Form::text('name[ru]', $region->name['ru']??null, ['class' => 'form-control'])}}
    <br/><p class="darkblue-color">Name of Region EN</p>
    {{Form::text('name[en]', $region->name['en']??null, ['class' => 'form-control'])}}
</div>