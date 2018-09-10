@extends('emails.layout')

@section('title', 'Resume Confirmed')

@section('inbox-preview')
    The resume has been confirmed for {{ $resume->fullname }}.
@stop

@section('content')
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600"
           style="margin: auto;" class="email-container">
        <!-- 1 Column Text : BEGIN -->
        <tr>
            <td bgcolor="#ffffff"
                style="padding: 40px; text-align: justify; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                <p><b>Hello,</b></p>
                <p>The email has been generated automatically to inform you that the resume <b>{{ $resume->fullname }}</b> has been confirmed.</p>
                <p>Click the button below to view the details.</p>
                <br><br>
                <!-- Button : Begin -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"
                       style="margin: auto">
                    <tr>
                        <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                            <a href="{{ route('resume.show' , $resume->id )}}"
                               style="background: #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;"
                               class="button-a">
                                &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff;">View Information</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            </a>
                        </td>
                    </tr>
                </table>
                <!-- Button : END -->
            </td>
        </tr>
        <!-- 1 Column Text : BEGIN -->

        <!-- 1 Column Text + Button : BEGIN -->
        <tr>
            <td bgcolor="#ffffff">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                            If you're having trouble clicking the 'View Information' button, copy and paste the URL below into your web browser:
                            <br>{{ route('resume.show' , $resume->id ) }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- 1 Column Text + Button : BEGIN -->
    </table>
@stop