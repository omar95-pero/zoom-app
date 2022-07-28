<!DOCTYPE html>
<html direction="rtl">
    <head>
        <title> طباعة </title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <style>
            body {margin: 20px}
        </style>
    </head>
    <body style="direction: rtl">
        <table class="table table-bordered table-condensed table-striped">
            @foreach($data as $row)
                @if ($row == reset($data))
                    <tr class="text-center">
                        @foreach($row as $key => $value)
                            <th class="text-center">{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr class="text-centet">
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td class="text-center">{!! $value !!}</td>
                        @else
                            <td class="text-center"></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </body>
</html>
