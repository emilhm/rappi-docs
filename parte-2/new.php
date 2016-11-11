<?php

public function post_confirm(){
  $service_id = Input::get('service_id');
	$driver_id = Input::get('driver_id');
  $servicio = Service::find($service_id);

	if ($servicio == NULL)
		return Response::json(['error' => '3']);
  if ($servicio->status_id === '6')
    return Response::json(['error' => '2']);
	if (!($servicio->driver_id == NULL && $servicio->status_id === '1'))
		return Response::json(['error' => '1']);

  $servicio = Service::update(
		$service_id,
		[
      'driver_id' => $driver_id,
      'status_id' => '2'
  	]
	);
  Driver::update($driver_id, ['available' => '0']);
  $driverTmp = Driver::find($driver_id);
  Service::update($service_id, ['car_id' => $driverTmp->car_id]);
  $servicio = Service::find($service_id);
  if ($servicio->user->uuid === '')
    return Response::json(['error' => '0']);

	//Notificar a usuario!!
	$pushMessage = 'Tu servicio ha sido confirmado';
	$push = Push::make();

	// iPhone
  if ($servicio->user->type === '1') {
    $result = $push->ios(
			$servicio->user->uuid,
			$pushMessage,
			1,
			'honk.wav',
			'Open',
			['serviceId' => $servicio->id]
		);
  } else {
    $result = $push->android2(
			$servicio->user->uuid,
			$pushMessage,
			1,
			'default',
			'Open',
			['serviceId' => $servicio->id]
		);
  }

  return Response::json(['error' => '0']);
}
