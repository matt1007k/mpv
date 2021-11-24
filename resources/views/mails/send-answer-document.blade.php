@component('mail::message')
@isset($user)
<h1>Hola {{ $user->name }},</h1>
@endisset
<div class="center">
    <table class="tb">
        <thead>
            <tr class="tb_title">
                <td colspan="2" class="tb_col">ASUNTO: {{ $subject }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tb_col tb_subtitle">REG. DE DOCUMENTO</td>
                <td class="tb_col tb_subtitle">{{ $response->document_number}}</td>
            </tr>
            <tr>
                <td class="tb_col tb_subtitle">REG. DE EXPEDIENTE</td>
                <td class="tb_col tb_subtitle">{{ $response->file_number}}</td>
            </tr>
        </tbody>
    </table>
</div>

@component('mail::button', ['url' => $url])
Consultar en el SISGEDO
@endcomponent

Gracias por usar nuestra aplicación,<br>
{{ config('app.name') }}
@endcomponent