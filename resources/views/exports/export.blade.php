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
            <b>Date:</b> {{ $calc->date ?? 'N/A' }}<br />
            <b>Full Name:</b> {{ $patientInfo->FirstName }} {{ $patientInfo->LastName }}<br />
            <b>ID Number:</b> {{ $patientInfo->IdNumber }}<br />
            <b>Gender:</b> {{ $patientInfo->Gender }}<br />
            <b>Age:</b> {{ $patientInfo->Age }}<br />
            <b>Phone Number:</b> {{ $patientInfo->PhoneNumber }}<br /><br />
            <b>Comments:</b> {{ $calc->comment }}

        </td>
    </tr>
</table>

<table>
    <td>
        <h2>Anthropometry:</h2>
        <b>Weight:</b> {{ $calc->weight }}kg<br />
        <b>Height:</b> {{ $calc->height }}m<br />
        <b>BMI:</b> {{ round($calc->bmi, 1) }}<br />
        <b>BMI Classification:</b> {{ $calc->bmi_class }}<br /><br />
        <b>Waist Circumference:</b> {{ $calc->waist }}cm<br />
        <b>Hip Circumference:</b> {{ $calc->hip }}cm<br />
        <b>Waist/Hip Ratio:</b> {{ round($calc->wh_ratio, 2) }}<br />
        <b>Waist/Hip Classification:</b> {{ $calc->wh_class }}<br /><br />
        <b>MUAC:</b> {{ $calc->muac }}cm<br />
        <b>Tricept Skinfold:</b> {{ $calc->tricept_skinfold }}mm
    </td>


</table>
<table>
    <td>
        <h2>Biochemestry:</h2>
        <b>Sodium:</b> {{ $calc->sodium_class }} - {{ $calc->sodium }}mmol/l<br />
        <b>Potassium:</b> {{ $calc->potassium_class }} - {{ $calc->potassium }}mmol/l<br />
        <b>Chloride:</b> {{ $calc->chloride_class }} - {{ $calc->chloride }}mmol/l<br />
        <b>Urea:</b> {{ $calc->urea_class }} - {{ $calc->urea }}mmol/l<br />
        <b>Creatinine:</b> {{ $calc->creatinine_class }} - {{ $calc->creatinine }}mmol/l<br />
        <b>eGFR:</b> {{ $calc->egfr_class }} - {{ $calc->egfr }}mmol/l<br />
        <b>HbA1c:</b> {{ $calc->hba1c_class }} - {{ $calc->hba1c }}%<br />
        <b>Uric Acid:</b> {{ $calc->uric_acid_class }} - {{ $calc->uric_acid }}mmol/l<br />
        <b>Cholesterol:</b> {{ $calc->cholesterol_class }} - {{ $calc->cholesterol }}mmol/l<br />
        <b>Triglycerides:</b> {{ $calc->triglycerides_class }} - {{ $calc->triglycerides }}mmol/l
    </td>
    <td>
        <br /><br /><br /><br />
        <b>HDL:</b> {{ $calc->hdl_class }} - {{ $calc->hdl }}<br />
        <b>LDL:</b> {{ $calc->ldl_class }} - {{ $calc->ldl }}<br />
        <b>VLDL:</b> {{ $calc->vldl_class }} - {{ $calc->vldl }}<br />
        <b>Total Protein:</b> {{ $calc->total_protein_class }} - {{ $calc->total_protein }}<br />
        <b>Albumin:</b> {{ $calc->albumin_class }} - {{ $calc->albumin }}<br />
        <b>Calcium:</b> {{ $calc->calcium_class }} - {{ $calc->calcium }}<br />
        <b>Phosphorus:</b> {{ $calc->phosphorus_class }} - {{ $calc->phosphorus }}<br />
        <b>Magnesium:</b> {{ $calc->magnesium_class }} - {{ $calc->magnesium }}<br />
        <b>Copper:</b> {{ $calc->copper_class }} - {{ $calc->copper }}<br />
    </td>
</table>
<table>
    <td>
        <h2>Biochemestry:</h2>
        <b>Sodium:</b> {{ $calc->zinc_class }} - {{ $calc->zinc }}mmol/l<br />
        <b>Bilirubin Total:</b> {{ $calc->bilirubin_total_class }} - {{ $calc->bilirubin_total }}mmol/l<br />
        <b>Bilirubin Conj:</b> {{ $calc->bilirubin_conj_class }} - {{ $calc->bilirubin_conj }}mmol/l<br />
        <b>Bilirubin Unconj:</b> {{ $calc->bilirubin_unconj_class }} - {{ $calc->bilirubin_unconj }}mmol/l<br />
        <b>AST:</b> {{ $calc->ast_class }} - {{ $calc->ast }}mmol/l<br />
        <b>ALT:</b> {{ $calc->alt_class }} - {{ $calc->alt }}mmol/l<br />
        <b>LDH:</b> {{ $calc->ldh_class }} - {{ $calc->ldh }}%<br />
        <b>GGT:</b> {{ $calc->ggt_class }} - {{ $calc->ggt }}mmol/l<br />
        <b>ALP:</b> {{ $calc->alp_class }} - {{ $calc->alp }}mmol/l<br />
        <b>WBC:</b> {{ $calc->wbc_class }} - {{ $calc->wbc }}mmol/l
    </td>
    <td>
        <br /><br /><br /><br />
        <b>RBC:</b> {{ $calc->rbc_class }} - {{ $calc->rbc }}<br />
        <b>Haemoglobin:</b> {{ $calc->haemoglobin_class }} - {{ $calc->haemoglobin }}<br />
        <b>Haematocrit:</b> {{ $calc->haematocrit_class }} - {{ $calc->haematocrit }}<br />
        <b>MCV:</b> {{ $calc->mcv_class }} - {{ $calc->mcv }}<br />
        <b>MCH:</b> {{ $calc->mch_class }} - {{ $calc->mch }}<br />
        <b>MCHC:</b> {{ $calc->mchc_class }} - {{ $calc->mchc }}<br />
        <b>Platelet Count:</b> {{ $calc->platelet_count_class }} - {{ $calc->platelet_count }}<br />
        <b>CRP:</b> {{ $calc->crp_class }} - {{ $calc->crp }}
    </td>
</table>
</body>
</html>
