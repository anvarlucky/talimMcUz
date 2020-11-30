<div class="form-group col-md-12">
    <br/>
    <label>Фойдаланувчи тўлиқ номи</label>
    {{Form::text('name', $user->name??null, ['class' => 'form-control'])}}
    <label>Фойдаланувчи номи</label>
    {{Form::text('f_name', $user->f_name??null, ['class' => 'form-control'])}}
    <label>Фойдаланувчи фамилияси</label>
    {{Form::text('s_name', $user->s_name??null, ['class' => 'form-control'])}}
    <label>Фойдаланувчи Отасининг исми</label>
    {{Form::text('l_name', $user->l_name??null, ['class' => 'form-control'])}}
    <label>Фойдаланувчи emailи</label>
    {{Form::email('email', $user->email??null, ['class' => 'form-control'])}}
@if(!isset($user))
        <div class="form-group">
            <label>Фойдаланувчи пароли</label>
            {{Form::password('password', ['class' => 'form-control'])}}
        </div>
@endif
    <label>Рол:</label>
    {{Form::select('role', [''=>'','Admin' => 'Admin', 'Hodim' => 'Hodim', 'Direktor' => 'Direktor'], $user->role??null,['class' => 'form-control'])}}

</div>
