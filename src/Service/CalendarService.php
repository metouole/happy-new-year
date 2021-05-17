<?php

namespace App\Service;
use DateTimeZone;
use DateTimeInterface;
use DateTimeImmutable;

class CalendarService
{

	public function __construct(private string $timezone)
	{
		
	}

	public function isNewYear(): bool
	{
		 return $this->today()->format('z') == '0';
	}


	public function daysLeftUntilNextYear(): int
	{
		$nextJanuaryFirst = new DateTimeImmutable('1st January Next Year', new DateTimeZone('America/Montreal'));

        return $nextJanuaryFirst->diff($this->today())->days;
	}

	public function today(): DateTimeInterface
	{
		return new DateTimeImmutable('now', new DateTimeZone('America/Montreal'));
	}
}