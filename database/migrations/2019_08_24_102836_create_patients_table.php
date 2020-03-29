<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('patients', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();            
        //     $table->string('first_name')->nullable();
        //     $table->string('last_name')->nullable();
        //     $table->string('state_id')->nullable();
        //     $table->string('dob')->nullable();
        //     $table->string('initial_visit')->nullable();
        //     $table->string('expiration')->nullable();
        //     $table->string('weight')->nullable();
        //     $table->string('height')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->string('email')->nullable();
        //     $table->string('address1')->nullable();
        //     $table->string('address2')->nullable();
        //     $table->string('city')->nullable();
        //     $table->string('country')->nullable();
        //     $table->string('state')->nullable();
        //     $table->string('zip')->nullable();
        //     $table->string('caregiver')->nullable();
        //     $table->string('internal_no')->nullable();
        //     $table->string('social_security_no')->nullable();
        //     $table->string('sex')->nullable();
        //     $table->string('parent_guardian')->nullable();
        //     $table->string('rec_type')->nullable();
        //     $table->string('blood_pressure')->nullable();
        //     $table->string('mmu_id')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('medical_symptoms', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('anorexia')->nullable();
        //     $table->string('arthritis')->nullable();
        //     $table->string('cachexia')->nullable();
        //     $table->string('cancer')->nullable();
        //     $table->string('chronic_pain')->nullable();
        //     $table->string('glaucoma')->nullable();
        //     $table->string('hiv_aids')->nullable();
        //     $table->string('migraine')->nullable();
        //     $table->string('persistent_muscle_spasms')->nullable();
        //     $table->string('seizures')->nullable();
        //     $table->string('severe_nausea')->nullable();
        //     $table->string('other')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('issues_list', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('main_medical_issue')->nullable();
        //     $table->string('intensity')->nullable();
        //     $table->string('what_cause')->nullable();
        //     $table->string('treatments')->nullable();
        //     $table->string('how_long')->nullable();
        //     $table->string('xray_test')->nullable();
        //     $table->string('frequency')->nullable();
        //     $table->string('additional_details')->nullable();
        //     $table->string('taken_medicine')->nullable();
        //     $table->string('additional_doc_info')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('patient_ids', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('lisenceFront')->nullable();
        //     $table->string('lisenceBack')->nullable();
        //     $table->string('photo')->nullable();    
        //     $table->timestamps();
        // });

        // Schema::create('patient_files', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('filename')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('medical_info', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('smoke')->nullable();
        //     $table->string('alcohol')->nullable();
        //     $table->string('marijuana')->nullable();
        //     $table->string('hospitalized')->nullable();
        //     $table->string('pregnant')->nullable();
        //     $table->string('planning_pregnancy')->nullable();
        //     $table->string('currently_medication')->nullable();
        //     $table->string('allergies')->nullable();
        //     $table->string('surgeries')->nullable();
        //     $table->string('depression_treatment')->nullable();
        //     $table->string('name_of_physician')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('medical_history', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('physician_name')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->string('fax')->nullable();
        //     $table->string('address')->nullable();
        //     $table->string('address2')->nullable();
        //     $table->string('city')->nullable();
        //     $table->string('state')->nullable();
        //     $table->string('zip')->nullable();
        //     $table->string('last_visit')->nullable();
        //     $table->string('next_visit')->nullable();
        //     $table->string('current_physician')->nullable();
        //     $table->string('medical_records')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('family_medical_history', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('physician_name')->nullable();
        //     $table->string('alzheimer')->nullable();
        //     $table->string('cystic')->nullable();
        //     $table->string('heart_attack')->nullable();
        //     $table->string('kidney_disease')->nullable();
        //     $table->string('arthritis')->nullable();
        //     $table->string('dementhia')->nullable();
        //     $table->string('heart_disease')->nullable();
        //     $table->string('liver_disease')->nullable();
        //     $table->string('asthma')->nullable();
        //     $table->string('depression')->nullable();
        //     $table->string('high_blood_pressure')->nullable();
        //     $table->string('migraines')->nullable();
        //     $table->string('blood_disorders')->nullable();
        //     $table->string('diabetes')->nullable();
        //     $table->string('high_cholesterol')->nullable();
        //     $table->string('seizures')->nullable();
        //     $table->string('other')->nullable();
        //     $table->timestamps();
        // });


        

        // Schema::create('doctor_evaluation', function (Blueprint $table) {
        //     $table->bigIncrements('id')->nullable();
        //     $table->integer('patient_id')->unsigned;
        //     $table->index('patient_id');
        //     $table->string('doctor_diagnosis')->nullable();
        //     $table->string('medicine_recommendation')->nullable();
        //     $table->string('etiology')->nullable();
        //     $table->timestamps();
        // });

        Schema::create('vitals', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->integer('patient_id')->unsigned;
            $table->index('patient_id');
            $table->string('blood_pressure')->nullable();
            $table->string('pulse')->nullable();
            $table->string('temprature')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->timestamps();
        });

        Schema::create('additional_info', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->integer('patient_id')->unsigned;
            $table->index('patient_id');
            $table->string('past_evaluation')->nullable();
            $table->string('denied_recommendation')->nullable();
            $table->string('arrested')->nullable();
            $table->string('probation')->nullable();
            $table->string('attending_school')->nullable();
            $table->string('rehabilitation')->nullable();
            $table->timestamps();
        });

        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->integer('patient_id')->unsigned;
            $table->index('patient_id');
            $table->string('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('signature', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->integer('patient_id')->unsigned;
            $table->index('patient_id');
            $table->string('signee')->nullable();
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('patients')->nullable();
    }
}
