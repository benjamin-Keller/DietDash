<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        *{font-family: arial, sans-serif;}
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <td>
            <h2>General Information:</h2>
            <b>Date:</b> {{ $calc->date }}<br />
            <b>Full Name:</b> {{ $patientInfo->FirstName }} {{ $patientInfo->LastName }}<br />
            <b>ID Number:</b> {{ $patientInfo->IdNumber }}<br />
            <b>Gender:</b> {{ $patientInfo->Gender }}<br />
            <b>Age:</b> {{ $calc->age }}<br />
            <b>Phone Number:</b> {{ $patientInfo->PhoneNumber }}<br /><br />

        </td>
    </tr>
</table>
@foreach($history as $row)
    <h2 style="margin-bottom: auto">{{$row['date']}}</h2>
    <h3 style="margin-bottom: auto">Comments:</h3>
    <p>{{$row['comment']}}</p>
    <table>

        <td>
            <h2>Anthropometry:</h2>
            <b>Weight:</b> {{ $row['weight'] }}kg<br />
            <b>Height:</b> {{ $row['height'] }}m<br />
            <b>BMI:</b> {{ round($row['bmi'], 1) }}<br />
            <b>BMI Classification:</b> {{ $row['bmi_class'] }}<br /><br />
            <b>Waist Circumference:</b> {{ $row['waist'] }}cm<br />
            <b>Hip Circumference:</b> {{ $row['hip'] }}cm<br />
            <b>Waist/Hip Ratio:</b> {{ round($row['wh_ratio'], 2) }}<br />
            <b>Waist/Hip Classification:</b> {{ $row['wh_class'] }}<br /><br />
            <b>MUAC:</b> {{ $row['muac'] }}cm<br />
            <b>Tricept Skinfold:</b> {{ $row['tricept_skinfold'] }}mm
        </td>


    </table>
    <table>
        <td>
            <h2>Biochemestry:</h2>
            <b>Sodium:</b> {{ $row['sodium_class'] }} - {{ $row['sodium'] }}mmol/l<br />
            <b>Potassium:</b> {{ $row['potassium_class'] }} - {{ $row['potassium'] }}mmol/l<br />
            <b>Chloride:</b> {{ $row['chloride_class'] }} - {{ $row['chloride'] }}mmol/l<br />
            <b>Urea:</b> {{ $row['urea_class'] }} - {{ $row['urea'] }}mmol/l<br />
            <b>Creatinine:</b> {{ $row['creatinine_class'] }} - {{ $row['creatinine'] }}mmol/l<br />
            <b>eGFR:</b> {{ $row['egfr_class'] }} - {{ $row['egfr'] }}mmol/l<br />
            <b>HbA1c:</b> {{ $row['hba1c_class'] }} - {{ $row['hba1c'] }}%<br />
            <b>Uric Acid:</b> {{ $row['uric_acid_class'] }} - {{ $row['uric_acid'] }}mmol/l<br />
            <b>Cholesterol:</b> {{ $row['cholesterol_class'] }} - {{ $row['cholesterol'] }}mmol/l<br />
            <b>Triglycerides:</b> {{ $row['triglycerides_class'] }} - {{ $row['triglycerides'] }}mmol/l
        </td>
        <td>
            <br /><br /><br /><br />
            <b>HDL:</b> {{ $row['hdl_class'] }} - {{ $row['hdl'] }}<br />
            <b>LDL:</b> {{ $row['ldl_class'] }} - {{ $row['ldl'] }}<br />
            <b>VLDL:</b> {{ $row['vldl_class'] }} - {{ $row['vldl'] }}<br />
            <b>Total Protein:</b> {{ $row['total_protein_class'] }} - {{ $row['total_protein'] }}<br />
            <b>Albumin:</b> {{ $row['albumin_class'] }} - {{ $row['albumin'] }}<br />
            <b>Calcium:</b> {{ $row['calcium_class'] }} - {{ $row['calcium'] }}<br />
            <b>Phosphorus:</b> {{ $row['phosphorus_class'] }} - {{ $row['phosphorus'] }}<br />
            <b>Magnesium:</b> {{ $row['magnesium_class'] }} - {{ $row['magnesium'] }}<br />
            <b>Copper:</b> {{ $row['copper_class'] }} - {{ $row['copper'] }}<br />
        </td>
    </table>
    <table>
        <td>
            <h2>Biochemestry:</h2>
            <b>Zinc:</b> {{ $row['zinc_class'] }} - {{ $row['zinc'] }}mmol/l<br />
            <b>Bilirubin Total:</b> {{ $row['bilirubin_total_class'] }} - {{ $row['bilirubin_total'] }}mmol/l<br />
            <b>Bilirubin Conj:</b> {{ $row['bilirubin_conj_class'] }} - {{ $row['bilirubin_conj'] }}mmol/l<br />
            <b>Bilirubin Unconj:</b> {{ $row['bilirubin_unconj_class'] }} - {{ $row['bilirubin_unconj'] }}mmol/l<br />
            <b>AST:</b> {{ $row['ast_class'] }} - {{ $row['ast'] }}mmol/l<br />
            <b>ALT:</b> {{ $row['alt_class'] }} - {{ $row['alt'] }}mmol/l<br />
            <b>LDH:</b> {{ $row['ldh_class'] }} - {{ $row['ldh'] }}%<br />
            <b>GGT:</b> {{ $row['ggt_class'] }} - {{ $row['ggt'] }}mmol/l<br />
            <b>ALP:</b> {{ $row['alp_class'] }} - {{ $row['alp'] }}mmol/l<br />
            <b>WBC:</b> {{ $row['wbc_class'] }} - {{ $row['wbc'] }}mmol/l
        </td>
        <td>
            <br /><br /><br /><br />
            <b>RBC:</b> {{ $row['rbc_class'] }} - {{ $row['rbc'] }}<br />
            <b>Haemoglobin:</b> {{ $row['haemoglobin_class'] }} - {{ $row['haemoglobin'] }}<br />
            <b>Haematocrit:</b> {{ $row['haematocrit_class'] }} - {{ $row['haematocrit'] }}<br />
            <b>MCV:</b> {{ $row['mcv_class'] }} - {{ $row['mcv'] }}<br />
            <b>MCH:</b> {{ $row['mch_class'] }} - {{ $row['mch'] }}<br />
            <b>MCHC:</b> {{ $row['mchc_class'] }} - {{ $row['mchc'] }}<br />
            <b>Platelet Count:</b> {{ $row['platelet_count_class'] }} - {{ $row['platelet_count'] }}<br />
            <b>CRP:</b> {{ $row['crp_class'] }} - {{ $row['crp'] }}
        </td>
    </table>
    <br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br /><br />
@endforeach
</body>
</html>
