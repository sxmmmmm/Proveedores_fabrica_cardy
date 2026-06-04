<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Notificación — Cardy' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #F1F5F9;
            color: #1E293B;
            line-height: 1.6;
        }
        .wrapper {
            max-width: 600px;
            margin: 40px auto;
            background: #FFFFFF;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        .header {
            background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 100%);
            padding: 32px 40px;
            text-align: center;
        }
        .header .brand {
            font-size: 26px;
            font-weight: 800;
            color: #14B8A6;
            letter-spacing: 1px;
        }
        .header .tagline {
            font-size: 12px;
            color: #94A3B8;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .body {
            padding: 40px;
        }
        .title {
            font-size: 20px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 16px;
        }
        .text {
            font-size: 14px;
            color: #475569;
            margin-bottom: 12px;
        }
        .highlight-box {
            background: #F0FDFA;
            border-left: 4px solid #14B8A6;
            border-radius: 0 8px 8px 0;
            padding: 16px 20px;
            margin: 20px 0;
        }
        .highlight-box p {
            font-size: 14px;
            color: #0F172A;
        }
        .btn {
            display: inline-block;
            background: #14B8A6;
            color: #FFFFFF !important;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            margin: 20px 0;
        }
        .btn:hover { background: #0d9488; }
        .divider {
            border: none;
            border-top: 1px solid #E2E8F0;
            margin: 24px 0;
        }
        .table-container {
            overflow-x: auto;
            margin: 20px 0;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        table.data-table th {
            background: #0F172A;
            color: #FFFFFF;
            padding: 10px 14px;
            text-align: left;
            font-weight: 600;
        }
        table.data-table td {
            padding: 9px 14px;
            color: #334155;
            border-bottom: 1px solid #E2E8F0;
        }
        table.data-table tr:nth-child(even) td {
            background: #F8FAFC;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-danger { background: #FEE2E2; color: #DC2626; }
        .badge-success { background: #D1FAE5; color: #059669; }
        .footer {
            background: #F8FAFC;
            border-top: 1px solid #E2E8F0;
            padding: 24px 40px;
            text-align: center;
        }
        .footer p {
            font-size: 12px;
            color: #94A3B8;
            margin-bottom: 4px;
        }
        .footer a { color: #14B8A6; text-decoration: none; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="brand">CARDY</div>
            <div class="tagline">Fábrica de Calzado</div>
        </div>
        <div class="body">
            @yield('content')
        </div>
        <div class="footer">
            <p>Este correo fue generado automáticamente por el sistema <strong>Fábrica de Calzado Cardy</strong>.</p>
            <p>Por favor no respondas a este mensaje.</p>
            <p style="margin-top:8px;">
                <a href="{{ config('app.url') }}">{{ config('app.url') }}</a>
            </p>
        </div>
    </div>
</body>
</html>
