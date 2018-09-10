@extends('emails.layout')

@section('title', 'Email Sent')

@section('inbox-preview')
    Your message has been sent.
@stop

@section('content')
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600"
           style="margin: auto;" class="email-container">
        <!-- 1 Column Text : BEGIN -->
        <tr>
            <td bgcolor="#ffffff"
                style="padding: 40px; text-align: justify; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                <p><b>Hello,</b></p>
                <p>We have received your message. We will get back to you shortly.</p>
            </td>
        </tr>
        <!-- 1 Column Text : BEGIN -->
@stop