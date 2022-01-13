<div class="form-group col-md-12">
    <br/>
    <label for="">Ўқув курси тури</label>
    {{Form::select('type', [''=>'','1' => 'Qisqa muddatli', '2' => 'Malaka oshirish'], $course->type??null,['class' => 'form-control'])}}
    <br/>
    <label>Ўқув курси номи</label>
    {{Form::text('name', $course->name??null, ['class' => 'form-control'])}}
</div>