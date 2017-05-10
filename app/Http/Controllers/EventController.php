<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{


	public function create1() 
	{
		// Pentru ca avem $fillable in model Event 
		$event = Event::create1([
			'title' => 'Titlu fillable1',
			'location' => 'Location fillable1',
			'seat' => 60,
		]);

		// $event = new Event();
		// $event->title = 'Titlu test';
		// $event->location = 'Baia mare';
		// $event->seat = 40;

		// $event->save();

		echo 'Event saved';
	}

}
