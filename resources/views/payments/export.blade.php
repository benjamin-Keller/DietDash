<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $payments->patient_name }} Invoice</title>
    <link rel="stylesheet" href="css/payments.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="img/logo.png">
    </div>
    <h1>INVOICE #{{ $payments->id }}</h1>
    <div style="float: right" >
        <div>DietDash</div>
    <div>{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
        <div>{{ \Illuminate\Support\Facades\Auth::user()->email }}</div>
    </div>
    <div id="project">
        <div><span>CLIENT</span> {{ $payments->patient_name }}</div>
        <div><span>EMAIL</span> {{ $payments->email }}</div>
        <div><span>DUE DATE</span> {{ $payments->date }}</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <!-- Details -->
        <tr>
            <th>DATE</th>
            <th class="desc" colspan="3">DESCRIPTION</th>
            <th></th>
            <th></th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <!-- Description -->
        <tr>
            <td class="service">{{ $payments->date }}</td>
            <td class="desc" colspan="3">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td></td>
            <td ></td>
            <td class="total">R{{ $payments->amount }}</td>
        </tr>

        <!-- Totals -->
        <tr>
            <td colspan="6">SUBTOTAL</td>
            <td class="total">R{{ $payments->sub_total }}</td>
        </tr>
       {{-- <tr>
            <td colspan="5">VAT 15%</td>
            <td class="total">$1,300.00</td>
        </tr>--}}
        <tr>
            <td colspan="6" class="grand total">GRAND TOTAL</td>
            <td class="grand total">R{{ $payments->total }}</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice"></div>
    </div>
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>
