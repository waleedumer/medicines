<?php

namespace App\Http\Controllers;

use App\Patients;
use App\AdditionalInfo;
use App\DoctorEvaluation;
use App\FamilyMedicalHistory;
use App\IssuesList;
use App\MedicalHistory;
use App\MedicalInfo;
use App\MedicalSymptoms;
use App\Notes;
use App\PatientFiles;
use App\PatientIds;
use App\Signature;
use App\Vitals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    
    public function index()
    {
        $patients = Patients::get();
        return view('patients.index', ['patients' => $patients]);
    }

    
    public function create()
    {
        $sections = array(
            array('name' => 'Ganeral Information' , 'controls' => '1'),
            array('name' => 'Medical Symptoms', 'controls' => '2'),
            array('name' => 'REGARDING MOST SIGNIFICANT ISSUE LISTED ABOVE (Optional)', 'controls' => '3' ),
            array('name' => 'DRIVERS LICENSE/STATE ID AND PHOTO (Optional)' , 'controls' => '4'), 
            array('name' => 'Patient Files', 'controls' => '5'), 
            array('name' => 'Medical Information', 'controls' => '6' ), 
            array('name' => 'Medical History', 'controls' => '7' ), 
            array('name' => 'Family Medical History', 'controls' => '8' ), 
            array('name' => 'DOCTOR EVALUATION', 'controls' => '9' ), 
            array('name' => 'Vitals', 'controls' => '10' ), 
            array('name' => 'Additional Information' , 'controls' => '11'), 
            array('name' => 'Notes', 'controls' => '12' ), 
            array('name' => 'Physician or Staff Signature', 'controls' => '13' )
        );

        $inputs =  array(
                    ['section' => '1', 'controls' => [
                            array('label' => 'First Name','name' => 'first_name', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Last Name','name' => 'last_name', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'State Id', 'name' => 'state_id', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Date of Birth', 'name' => 'dob', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Initial Visit','name' => 'initial_visit', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Expiration', 'name' => 'expiration', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Weight', 'name' => 'weight', 'class' => 'col-md-2', 'type' => 'text'),
                            array('label' => 'Height', 'name' => 'height', 'class' => 'col-md-2', 'type' => 'text'),
                            array('label' => 'Phone', 'name' => 'phone', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Email','name' => 'email', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Address 1', 'name' => 'address1', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Address 2','name' => 'address2', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'City','name' => 'city', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Country','name' => 'country', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'State','name' => 'state', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Zip Code', 'name' => 'zip', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Caregiver','name' => 'caregiver', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Internal #','name' => 'internal_no', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Social Security #', 'name' => 'social_security_no', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Sex', 'name' => 'sex', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Parent/Guardian', 'name' => 'parent_guardian', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Rec Type', 'name' => 'rec_type', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'Blood Pressure', 'name' => 'blood_pressure', 'class' => 'col-md-3', 'type' => 'text'),
                            array('label' => 'MMU ID #', 'name' => 'mmu_id', 'class' => 'col-md-3', 'type' => 'text'),
                            ]],

                    ['section' => '2', 'controls' => [
                                array('label' => 'Anorexia', 'name' => 'anorexia', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Arthritis', 'name' => 'arthritis', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Cachexia', 'name' => 'cachexia', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Cancer', 'name' => 'cancer', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Chronic Pain', 'name' => 'chronic_pain', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Glaucoma', 'name' => 'glaucoma', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'HIV/AIDS', 'name' => 'hiv_aids', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Migraine', 'name' => 'migraine', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Persistent Muscle Spasms', 'name' => 'persistent_muscle_spasms', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Seizures', 'name' => 'seizures', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Severe Nausea', 'name' => 'severe_nausea', 'class' => 'col-md-3', 'type' => 'checkbox'),
                                array('label' => 'Other', 'name' => 'other', 'class' => 'col-md-3', 'type' => 'checkbox'),
                            ]],
                    
                    ['section' => '3', 'controls' => [
                                array('label' => 'Main Medical Issue', 'name' =>'main_medical_issue', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'Intensity of symptoms', 'name' =>'intensity', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'What caused your medical issue', 'name' =>'what_cause', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'All treatments and medicine you have tried for this medical issue', 'name' =>'treatments', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'How long have you had these symptoms', 'name' =>'how_long', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'Do you have X-rays or test results?', 'name' =>'xray_test', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'Frequency of symptoms', 'name' =>'frequency', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'Additional details about your medical use', 'name' =>'additional_details', 'class' => 'col-md-6', 'type' => 'text'),
                                array('label' => 'Have you ever been prescribed or taken medication for any of these problems?', 'name' =>'taken_medicine', 'class' => 'col-md-12', 'type' => 'radio'),
                                array('label' => 'Additional doctors seen for this problem: (name, address, date of visit, reason for visit)', 'name' =>'additional_doc_info', 'class' => 'col-md-6', 'type' => 'text'),
                    ]],

                    ['section' => '4', 'controls' => [
                               array('label' => 'Drivers Lic Or State ID - Front', 'name' =>'lisenceFront', 'class' => 'col-md-4', 'type' => 'image'),
                               array('label' => 'Drivers Lic Or State ID - Back', 'name' =>'lisenceBack', 'class' => 'col-md-4', 'type' => 'image'),
                               array('label' => 'Patient Photo (Required For ID Card)', 'name' =>'photo', 'class' => 'col-md-4', 'type' => 'image'),
                    ]],

                    ['section' => '5', 'controls' => [
                        array('label' => '', 'name' =>'filename', 'class' => 'col-md-6', 'type' => 'file'),
                    ]],

                    ['section' => '6', 'controls' => [
                        array('label' => 'Do you currently smoke tobacco?', 'name' =>'smoke', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'Do you currently drink alcohol?', 'name' =>'alcohol', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'Do you currently use marijuana?', 'name' =>'marijuana', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'Have you ever been hospitalized?', 'name' =>'hospitalized', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'if female, are you pregnant?', 'name' =>'pregnant', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'if female, are you planning a pregnancy?', 'name' =>'planning_pregnancy', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'Are you currently taking any medications (Prescription and over the counter)?', 'name' =>'currently_medication', 'class' => 'col-md-12', 'type' => 'text'),
                        array('label' => 'List any medication allergies or side effects?', 'name' =>'allergies', 'class' => 'col-md-12', 'type' => 'text'),
                        array('label' => 'List and surgeries or broken bones?', 'name' =>'surgeries', 'class' => 'col-md-12', 'type' => 'text'),
                        array('label' => 'Have you ever been treated for symptoms of depression, been psychotic, attempted suicide or had any other mental problems?', 'name' =>'depression_treatment', 'class' => 'col-md-4', 'type' => 'radio'),
                        array('label' => 'If applicable, what is the name of your mental health physician?', 'name' =>'name_of_physician', 'class' => 'col-md-12', 'type' => 'text'),
                    ]],

                    ['section' => '7', 'controls' => [
                        array('label' => 'Name', 'name' =>'physician_name', 'class' => 'col-md-4', 'type' => 'text'),
                        array('label' => 'Phone', 'name' =>'phone', 'class' => 'col-md-4', 'type' => 'text'),
                        array('label' => 'Fax', 'name' =>'fax', 'class' => 'col-md-4', 'type' => 'text'),
                        array('label' => 'Address', 'name' =>'address', 'class' => 'col-md-4', 'type' => 'text'),
                        array('label' => 'Address 2', 'name' =>'address2', 'class' => 'col-md-4', 'type' => 'text'),
                        array('label' => 'City', 'name' =>'city', 'class' => 'col-md-2', 'type' => 'text'),
                        array('label' => 'State', 'name' =>'state', 'class' => 'col-md-1', 'type' => 'text'),
                        array('label' => 'Zipcode', 'name' =>'zip', 'class' => 'col-md-1', 'type' => 'text'),
                        array('label' => 'Date and reason for last visit?', 'name' =>'last_visit', 'class' => 'col-md-12', 'type' => 'text'),
                        array('label' => 'Date and reason for next planned visit?', 'name' =>'next_visit', 'class' => 'col-md-12', 'type' => 'text'),
                        array('label' => 'Is the physician above your current physician?', 'name' =>'current_physician', 'class' => 'col-md-6', 'type' => 'radio'),
                        array('label' => 'Did you bring medical records/documentation today?', 'name' =>'medical_records', 'class' => 'col-md-6', 'type' => 'radio')
                    ]],

                    ['section' => '8', 'controls' => [
                        array('label' => 'Alzheimer disease', 'name' =>'alzheimer', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Cystic fibrosis', 'name' =>'cystic', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Heart Attack', 'name' =>'heart_attack', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Kidney Disease', 'name' =>'kidney_disease', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Arthritis', 'name' =>'arthritis', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Dementhia', 'name' =>'dementhia', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Heart Disease', 'name' =>'heart_disease', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Liver Disease', 'name' =>'liver_disease', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Asthma', 'name' =>'asthma', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Depression', 'name' =>'depression', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'High Blood Pressure', 'name' =>'high_blood_pressure', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Migraines', 'name' =>'migraines', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Blood disorders', 'name' =>'blood_disorders', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Diabetes', 'name' =>'diabetes', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'High Cholesterol', 'name' =>'high_cholesterol', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Seizures', 'name' =>'seizures', 'class' => 'col-md-3', 'type' => 'checkbox'),
                        array('label' => 'Other', 'name' =>'other', 'class' => 'col-md-3', 'type' => 'checkbox'),
                    ]],

                    ['section' => '9', 'controls' => [
                        array('label' => 'Doctor Diagnosis', 'name' =>'doctor_diagnosis', 'class' => 'col-md-12', 'type' => 'text'),
                        array('label' => 'Medicine and Dosage Recommendation', 'name' =>'medicine_recommendation', 'class' => 'col-md-6', 'type' => 'text'),
                        array('label' => 'Etiology', 'name' =>'etiology', 'class' => 'col-md-6', 'type' => 'text'),
                    ]],

                    ['section' => '10', 'controls' => [
                        array('label' => 'Blood Pressure', 'name' =>'blood_pressure', 'class' => 'col-md-2', 'type' => 'text'),
                        array('label' => 'Pulse', 'name' =>'pulse', 'class' => 'col-md-2', 'type' => 'text'),
                        array('label' => 'Temperatue', 'name' =>'temprature', 'class' => 'col-md-2', 'type' => 'text'),
                        array('label' => 'Height', 'name' =>'height', 'class' => 'col-md-2', 'type' => 'text'),
                        array('label' => 'Weight', 'name' =>'weight', 'class' => 'col-md-2', 'type' => 'text'),
                        array('label' => 'BMI', 'name' =>'bmi', 'class' => 'col-md-2', 'type' => 'text'),
                    ]],

                    ['section' => '11', 'controls' => [
                        array('label' => 'Have you been evaluated by another doctor for medical marijuana in the past?', 'name' =>'past_evaluation', 'class' => 'col-md-6', 'type' => 'radio'),
                        array('label' => 'Have you been evaluated and denied a medical marijuana recommendation?', 'name' =>'denied_recommendation', 'class' => 'col-md-6', 'type' => 'radio'),
                        array('label' => 'Have you been arrested or charged with a crime in the last 2 years?', 'name' =>'arrested', 'class' => 'col-md-6', 'type' => 'radio'),
                        array('label' => 'Are you currently on parole or probation?', 'name' =>'probation', 'class' => 'col-md-6', 'type' => 'radio'),
                        array('label' => 'Are you currently enrolled or attending school?', 'name' =>'attending_school', 'class' => 'col-md-6', 'type' => 'radio'),
                        array('label' => 'Do you have children?', 'name' =>'rehabilitation', 'class' => 'col-md-6', 'type' => 'radio'),
                    ]],

                    ['section' => '12', 'controls' => [
                        array('label' => 'Notes', 'name' =>'notes', 'class' => 'col-md-12', 'type' => 'textarea'),
                    ]],

                    ['section' => '13', 'controls' => [
                        array('label' => 'Signees Name', 'name' =>'signee', 'class' => 'col-md-6', 'type' => 'text'),
                        array('label' => 'Signature', 'name' =>'signature', 'class' => 'col-md-6', 'type' => 'text'),
                    ]]

                    );


            
                    
        return view('patients.create', ['sections' => $sections, 'inputs' => $inputs]);
    }

    
    public function store(Request $request)
    {

        $request->request->add(['physician_id' => Auth::user()->id]);

        $patient = Patients::create($request->all());
        
        $request->request->add(['patient_id' => $patient->id]);

        // print_r($request->all());

        AdditionalInfo::create($request->all());

        DoctorEvaluation::create($request->all());

        FamilyMedicalHistory::create($request->all());

        IssuesList::create($request->all());

        MedicalHistory::create($request->all());

        MedicalInfo::create($request->all());

        MedicalSymptoms::create($request->all());

        Notes::create($request->all());

        PatientFiles::create($request->all());

        PatientIds::create($request->all());

        Signature::create($request->all());

        Vitals::create($request->all());
        
        return redirect()->route('patients.index')->withStatus(__('Patient Added Successfuly'));
    
    }

    
    public function show(Patients $patients)
    {
        //
    }

    
    public function edit(Patients $patients)
    {
        //
    }

    
    public function update(Request $request, Patients $patients)
    {
        //
    }

    
    public function destroy(Patients $patients)
    {
        //
    }
}
