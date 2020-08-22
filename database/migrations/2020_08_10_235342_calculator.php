<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Calculator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();

            $table->string('patient_name')->nullable();
            $table->string('age')->nullable();
            $table->string('comment')->nullable();

            //BMI
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->double('bmi')->nullable();
            $table->string('bmi_class')->nullable();

            // Waist/Hip ratio
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->double('wh_ratio')->nullable();
            $table->string('wh_class')->nullable();

            //AMA
            $table->string('muac')->nullable();
            $table->string('tricept_skinfold')->nullable();

            //Biochem
            $table->string('sodium')->nullable();
            $table->string('potassium')->nullable();
            $table->string('chloride')->nullable();
            $table->string('urea')->nullable();
            $table->string('creatinine')->nullable();
            $table->string('egfr')->nullable();
            $table->string('hba1c')->nullable();
            $table->string('uric_acid')->nullable();
            $table->string('cholesterol')->nullable();
            $table->string('triglycerides')->nullable();
            $table->string('hdl')->nullable();
            $table->string('ldl')->nullable();
            $table->string('vldl')->nullable();
            $table->string('total_protein')->nullable();
            $table->string('albumin')->nullable();
            $table->string('calcium')->nullable();
            $table->string('phosphorus')->nullable();
            $table->string('magnesium')->nullable();
            $table->string('copper')->nullable();
            $table->string('zinc')->nullable();
            $table->string('bilirubin_total')->nullable();
            $table->string('bilirubin_conj')->nullable();
            $table->string('bilirubin_unconj')->nullable();
            $table->string('ast')->nullable();
            $table->string('alt')->nullable();
            $table->string('ldh')->nullable();
            $table->string('ggt')->nullable();
            $table->string('alp')->nullable();
            $table->string('wbc')->nullable();
            $table->string('rbc')->nullable();
            $table->string('haemoglobin')->nullable();
            $table->string('haematocrit')->nullable();
            $table->string('mcv')->nullable();
            $table->string('mch')->nullable();
            $table->string('mchc')->nullable();
            $table->string('platelet_count')->nullable();
            $table->string('crp')->nullable();

            $table->text('sodium_class')->nullable();
            $table->text('potassium_class')->nullable();
            $table->text('chloride_class')->nullable();
            $table->text('urea_class')->nullable();
            $table->text('creatinine_class')->nullable();
            $table->text('egfr_class')->nullable();
            $table->text('hba1c_class')->nullable();
            $table->text('uric_acid_class')->nullable();
            $table->text('cholesterol_class')->nullable();
            $table->text('triglycerides_class')->nullable();
            $table->text('hdl_class')->nullable();
            $table->text('ldl_class')->nullable();
            $table->text('vldl_class')->nullable();
            $table->text('total_protein_class')->nullable();
            $table->text('albumin_class')->nullable();
            $table->text('calcium_class')->nullable();
            $table->text('phosphorus_class')->nullable();
            $table->text('magnesium_class')->nullable();
            $table->text('copper_class')->nullable();
            $table->text('zinc_class')->nullable();
            $table->text('bilirubin_total_class')->nullable();
            $table->text('bilirubin_conj_class')->nullable();
            $table->text('bilirubin_unconj_class')->nullable();
            $table->text('ast_class')->nullable();
            $table->text('alt_class')->nullable();
            $table->text('ldh_class')->nullable();
            $table->text('ggt_class')->nullable();
            $table->text('alp_class')->nullable();
            $table->text('wbc_class')->nullable();
            $table->text('rbc_class')->nullable();
            $table->text('haemoglobin_class')->nullable();
            $table->text('haematocrit_class')->nullable();
            $table->text('mcv_class')->nullable();
            $table->text('mch_class')->nullable();
            $table->text('mchc_class')->nullable();
            $table->text('platelet_count_class')->nullable();
            $table->text('crp_class')->nullable();

            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculators');
    }
}
