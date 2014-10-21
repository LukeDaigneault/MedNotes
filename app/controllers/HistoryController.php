<?php

class HistoryController extends \BaseController {

	protected $history;

	public function __construct(History $history){
		$this->history = $history;
	}

 	
	public function showCreate($patientID)
	{
		$patient = new Patient;
		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		return View::make('history.createHistoryForm', compact('patient'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function handleCreate($patientID)
	{
		$patient = new Patient;
		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		
		$oldHistory = $patient->history();
		$oldHistory->delete();

		
		$history = new History;
		$history->social = Input::get('social'); 
		$history->drug = Input::get('drug');
		$history->details = Input::get('details');
		if(Input::has('diplopia')) $history->diplopia = Input::get('diplopia');
		if(Input::has('dizziness')) $history->dizziness = Input::get('dizziness');
		if(Input::has('speechSwallow')) $history->speechSwallow = Input::get('speechSwallow');
		if(Input::has('blackouts')) $history->blackouts = Input::get('blackouts');
		if(Input::has('bilateralNeuroSigns')) $history->bilateralNeuroSigns = Input::get('bilateralNeuroSigns');
		if(Input::has('bladderBowel')) $history->bladderBowel = Input::get('bladderBowel');
		if(Input::has('saddleAnaesthesia')) $history->saddleAnaesthesia = Input::get('saddleAnaesthesia');
		if(Input::has('cancerHistory')) $history->cancerHistory = Input::get('cancerHistory');
		if(Input::has('weightloss')) $history->weightloss = Input::get('weightloss');
		if(Input::has('steroids')) $history->steroids = Input::get('steroids');
		if(Input::has('anticoagulants')) $history->anticoagulants = Input::get('anticoagulants');
		if(Input::has('pregnant')) $history->pregnant = Input::get('pregnant');
		if(Input::has('pacemaker')) $history->pacemaker = Input::get('pacemaker');
		if(Input::has('diabetes')) $history->diabetes = Input::get('diabetes');
		if(Input::has('epilepsy')) $history->epilepsy = Input::get('epilepsy');
		if(Input::has('bloodPressure')) $history->bloodPressure = Input::get('bloodPressure');
		if(Input::has('heartConditions')) $history->heartConditions = Input::get('heartConditions');
		if(Input::has('osteoporosis')) $history->osteoporosis = Input::get('osteoporosis');
		if(Input::has('thyroid')) $history->thyroid = Input::get('thyroid');
		if(Input::has('arthritis')) $history->arthritis = Input::get('arthritis');
		$history->user_id = Auth::id();
		$history->save();
		
		$patient->history()->associate($history);
		
  		$patient->save();


    	return Redirect::route('treat.patient', ['patient' => $patientID]);		
		
	}
	
	public function showEdit($patientID)
    {
        // Show delete confirmation page.
		$patient = new Patient;
		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		$history = $patient->history;
		
		
        return View::make('history.editHistoryForm', ['patient' => $patient, 'history' => $history]);
    }
	
	public function handleEdit($patientID)
	{
	$patient = new Patient;
		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		
		$history = $patient->history;
		
		$history->social = Input::get('social'); 
		$history->drug = Input::get('drug');
		$history->details = Input::get('details');
		if(Input::has('diplopia')) $history->diplopia = Input::get('diplopia');
		if(Input::has('dizziness')) $history->dizziness = Input::get('dizziness');
		if(Input::has('speechSwallow')) $history->speechSwallow = Input::get('speechSwallow');
		if(Input::has('blackouts')) $history->blackouts = Input::get('blackouts');
		if(Input::has('bilateralNeuroSigns')) $history->bilateralNeuroSigns = Input::get('bilateralNeuroSigns');
		if(Input::has('bladderBowel')) $history->bladderBowel = Input::get('bladderBowel');
		if(Input::has('saddleAnaesthesia')) $history->saddleAnaesthesia = Input::get('saddleAnaesthesia');
		if(Input::has('cancerHistory')) $history->cancerHistory = Input::get('cancerHistory');
		if(Input::has('weightloss')) $history->weightloss = Input::get('weightloss');
		if(Input::has('steroids')) $history->steroids = Input::get('steroids');
		if(Input::has('anticoagulants')) $history->anticoagulants = Input::get('anticoagulants');
		if(Input::has('pregnant')) $history->pregnant = Input::get('pregnant');
		if(Input::has('pacemaker')) $history->pacemaker = Input::get('pacemaker');
		if(Input::has('diabetes')) $history->diabetes = Input::get('diabetes');
		if(Input::has('epilepsy')) $history->epilepsy = Input::get('epilepsy');
		if(Input::has('bloodPressure')) $history->bloodPressure = Input::get('bloodPressure');
		if(Input::has('heartConditions')) $history->heartConditions = Input::get('heartConditions');
		if(Input::has('osteoporosis')) $history->osteoporosis = Input::get('osteoporosis');
		if(Input::has('thyroid')) $history->thyroid = Input::get('thyroid');
		if(Input::has('arthritis')) $history->arthritis = Input::get('arthritis');

		$history->save();
		
		$patient->history()->associate($history);
		
  		$patient->save();

		return Redirect::to('index');		
		
	}


}
